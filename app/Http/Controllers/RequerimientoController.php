<?php

namespace App\Http\Controllers;

use App\Models\Requerimiento;
use App\Http\Requests\StoreRequerimientoRequest;
use App\Http\Requests\UpdateRequerimientoRequest;
use App\Models\AdjReq;
use App\Models\Cargos;
use App\Models\CentroDeSalud;
use App\Models\TipoContrato;
use App\Models\DatosPer;
use App\Models\DocAdjunto;
use App\Models\Nivel;
use App\Models\RegEstadosReq;
use App\Models\Departamento;
use App\Models\Afp;
use App\Models\RevisionesReq;
use App\Models\RevisorReq;
use App\Models\Contrato;
use App\Models\EspecialidadResidente;
use App\Models\Garante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class RequerimientoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
          
          $npage=1;
          $str="";
        //   $keyword="%";
          if (array_key_exists('npage',$request->input())) {
              $npage = $request->input()['npage']?$request->input()['npage']:1;
          }
          $fecha1=""; //CI o nombre o apellidos
          $fecha2=""; //Centro de salud
          
          if (array_key_exists('fecha1',$request->input())) {
            $fecha1=$request->input("fecha1");
        }
        if (array_key_exists("fecha2",$request->input())) {
            $fecha2=$request->input("fecha2");
           /// dump($fecha2);
          }
            $requerimientoList = Requerimiento::join('cargos','requerimiento.id_car','=','cargos.id_car')
            ->join('centro_de_salud','requerimiento.id_cs','=','centro_de_salud.id_cs')
            ->join('estado_requerimiento','requerimiento.id_esreq','=','estado_requerimiento.id_esreq')
            ->leftJoin('datos_per','requerimiento.id_per','=','datos_per.id_per')
            ->where('centro_de_salud.nombre_cs','like','%'.$fecha2.'%')
            ->where(function($q)use ($fecha1){
                $q->where('datos_per.CI','like','%'.strtoupper($fecha1).'%')
                ->orWhere('datos_per.a_paterno','like','%'.strtoupper($fecha1).'%','or')
                ->orWhere('datos_per.a_materno','like','%'.strtoupper($fecha1).'%','or')
                ->orWhere('datos_per.nombres','like','%'.strtoupper($fecha1).'%');
            })
            ->orderBy('id_req','DESC')->paginate(10,['*'],'page',$npage);
         
          //$personalList=$personalList->with('estadoPersonal'); 
          $centrosDeSalud = CentroDeSalud::get();
          
        return view('requerimientos.index',['requerimientoList'=>$requerimientoList,
        'fecha1'=>$fecha1,'fecha2'=>$fecha2,
        'centrosDeSalud'=>$centrosDeSalud]);
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $centrosSalud=CentroDeSalud::where('estado','=','1')->get();
        $tiposContrato=TipoContrato::where('estado','=','1')->get();
        $cargos = Cargos::where('estado','=','1')->get();
        $niveles = Nivel::where('estado','=','1')->get();
        $especialidades = EspecialidadResidente::where('estado','=','1')->get();
        $departamentos = Departamento::where('estado','=','1')->get();
        $garantes = Garante::where('estado','=','1')->get();
        return view('requerimientos.new',['centrosSalud'=> $centrosSalud,
                                          'tiposContrato'=>$tiposContrato,
                                          'cargos'=>$cargos,
                                          'niveles'=>$niveles,
                                          'especialidades'=>$especialidades,
                                          'departamentos'=> $departamentos,
                                          'garantes'=>$garantes]);
                                          
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequerimientoRequest $request)
    {
       // dump($request->all());
        if($request->get('id_tic')!= '9')  
        {
            
        $request->validate([
                "id_cs"=>["required"],
                "id_tic"=>["required"],
                "id_niv"=>["required"],
                "id_car"=>["required"],
                //"nroReq"=>["required"],
                "motivo"=>["required"],
                //"fechareq"=>["required"],
                "fechaIni"=>["required"],
                "fechaFin"=>["required"],
                //"jornada"=>["required"],
                //"nota"=>["required"],
                //"foto"=>["required"],
                //"observaciones"=>["required"],
                //"id_esreq"=>["required"],
                //"fecha_nota"=>["required"],
                ]);
            }else{
                $request->validate([
                    "id_cs"=>["required"],
                    "id_tic"=>["required"],
                    "id_niv"=>["required"],
                    "id_car"=>["required"],
                    //"nroReq"=>["required"],
                    "motivo"=>["required"],
                    //"fechareq"=>["required"],
                    //"fechaIni"=>["required"],
                    "fechaFin"=>["required"],
                    //"jornada"=>["required"],
                    //"nota"=>["required"],
                    //"foto"=>["required"],
                    //"observaciones"=>["required"],
                    //"id_esreq"=>["required"],
                    //"fecha_nota"=>["required"],
                    "id_cono"=>["required"]
                    ]);
                    $request['id_esreq']='1';
            }
        $requerimientoStore= $request;
        //$requerimientoStore['motivo'] = strtoupper($requerimientoStore['motivo']);
       
        $requerimientoStore['id_us']=auth()->id();
        $nro=$requerimientoStore->get('nroReq');
         if(!(isset($nro))){
             $requerimientoStore['nroReq']= '';
         }
        
       $reqcreado = Requerimiento::create($requerimientoStore->toArray());
       $hashreq= Hash::make($reqcreado->id_req.$reqcreado->id_us.$reqcreado->fechareq);
       $reqcreado->update(['foto'=>$hashreq]);

       session()->flash('status','Requirement created successfully');
       return to_route('requerimiento.index') ;
        // dump($requerimientoStore->all());
       //return "guardando el requerimiento";
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Requerimiento $requerimiento)
    {
        //
        $cad = '';
        if(isset($requerimiento->nroReq)){
            $mas = 10 - strlen($requerimiento->nroReq);
            for ($i=0; $i < $mas ; $i++) { 
                $cad .= "0";
            }
            $cad.=$requerimiento->nroReq;  
        }    
        
        $centroSalud=CentroDeSalud::findOrFail($requerimiento->id_cs);
        $tipoContrato=TipoContrato::findOrFail($requerimiento->id_tic);
        $cargo = Cargos::findOrFail($requerimiento->id_car);
        $nivel = Nivel::findOrFail($requerimiento->id_niv);
        $persona =DatosPer::findOrFail($requerimiento->id_per);
        $depa = Departamento::findOrFail($persona->id_dep);
        $afpa = Afp::findOrFail($persona->id_afp);
        $revisionJuridico = RevisionesReq::join("revisor_req","revisiones_req.id_revisor","=","revisor_req.id")
        ->join("users","users.id","=","revisor_req.id_us")
        ->where("id_req","=",$requerimiento->id_req)->where('revisor_req.tipo','juridico')->first();
        $revisionSumariante = RevisionesReq::join("revisor_req","revisiones_req.id_revisor","=","revisor_req.id")
        ->join("users","users.id","=","revisor_req.id_us")
        ->where("id_req","=",$requerimiento->id_req)->where('revisor_req.tipo','sumariante')->first();
        return view('requerimientos.show',['requerimiento'=> $requerimiento,
        'centroSalud'=>$centroSalud,
        'cadNroReq'=>$cad,
        'tipoContrato'=>$tipoContrato,
        'cargo'=>$cargo,
        'nivel'=>$nivel,
        'persona'=>$persona,
        'depa'=>$depa,
        'afpa'=>$afpa,
        'revisionJuridico'=>$revisionJuridico,
        'revisionSumariante'=>$revisionSumariante]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($requerimiento)
    {
        $requerimient=Requerimiento::findOrFail($requerimiento);
        $centrosSalud=CentroDeSalud::where('estado','=','1')->get();
        $tiposContrato=TipoContrato::where('estado','=','1')->get();
        $cargos = Cargos::where('estado','=','1')->get();
        $niveles = Nivel::where('estado','=','1')->get();
        $docAdjuntos = DocAdjunto::where('estado','=','1')->get();
        $adjReq = AdjReq::where('estado','=','1')->where('id_req','=',$requerimient->id_req) ->get();       
        foreach ($adjReq as $adj) {
                foreach ($docAdjuntos as $doc) {
                    if($adj->id_adj== $doc->id_adj) {
                        $doc->checked = true;
                    }
                }
        }
        $personal = [];
        if ($requerimient->id_per){
            $personal= DatosPer::where('id_per','=',$requerimient->id_per)->get()->first();
        }
        $revisionesReq = RevisionesReq::with('revisorReq')->where('id_req','=',$requerimient->id_req)->get();
        $yoRevisorReq = RevisorReq::where('id_us','=',auth()->id())->where('estado','=','1')->get()->first();
        
        return view('requerimientos.edit',['requerimiento'=> $requerimient,
                                            'centrosSalud'=>$centrosSalud,
                                            'tiposContrato'=>$tiposContrato,
                                            'cargos'=>$cargos,
                                            'niveles'=>$niveles,
                                            'personal'=> $personal,
                                            'docAdjuntos'=>$docAdjuntos,
                                            'adjReq'=> $adjReq,
                                            'revisionesReq'=>$revisionesReq,
                                            'yoRevisorReq'=> $yoRevisorReq
                                            ]);
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequerimientoRequest $request, Requerimiento $requerimiento)
    {
        
        $validated= $request->validate([
            "id_cs"=>["required"],
            "id_tic"=>["required"],
            "id_niv"=>["required"],
            "id_car"=>["required"],
            "id_per"=>[],
            "nroReq"=>[],
            "motivo"=>["required"],
            //"fechareq"=>["required"],
            "fechaIni"=>["required"],
            "fechaFin"=>["required"],
            //"jornada"=>["required"],
            "nota"=>[],
            //"foto"=>["required"],
            "observaciones"=>[],
            "id_esreq"=>[],
            "fecha_nota"=>[],
            "docadj"=>[]
            ]);
        //$docsAdj = $request["docadj"];
    $requerimientoUpdate = $validated;
        if (key_exists("docadj",$validated)) {
            //$requerimientoUpdate = array_diff ($validated,$validated['docadj']); 
            # code...
            foreach ($request["docadj"] as $doc) {
              //  echo($requerimiento->id_req);
                AdjReq::create(["id_req"=>$requerimiento->id_req,
                "id_adj"=>$doc,"observaciones"=>""]);
            }
        }
        
        $requerimientoUpdate['id_usmodif']=auth()->id();
        $requerimientoUpdate['fecha_modif']=date("Y-m-d H:i:s");
        $requerimientoUpdate['conteo_edicion']=$requerimiento->conteo_edicion+1;
        
        if (key_exists("id_per",$validated) && isset($validated["id_per"]) ) {
            if($validated["id_per"] != $requerimiento->id_per )
            {
                //$requerimientoUpdate["foto"]= Hash::make($requerimiento->id_req.$requerimiento->id_us.$requerimiento->fechareq);
                $requerimientoUpdate["id_esreq"]=1;
                RegEstadosReq::create(["id_us"=>auth()->id(),
                "id_req"=>$requerimiento->id_req,
                "id_estfin"=>$requerimientoUpdate["id_esreq"]]);
                $datosPer = DatosPer::findOrFail($validated["id_per"]);
                $datosPer->update(["id_esper"=>'1']);
            }  
        }
        $requerimiento->update($requerimientoUpdate);   
        session()->flash('status','Successfully updated Requirement');
        return to_route('requerimiento.index') ;
        //dump($request);
      //return ;
    }

    public function updateStatus(UpdateRequerimientoRequest $request, Requerimiento $requerimiento){
         $request['id_usmodif']=auth()->id();
         $request['fecha_modif']=date("Y-m-d H:i:s");
         $request['conteo_edicion']=$requerimiento->conteo_edicion+1;
         $requerimiento->update($request->all());
         $newStatus='2';
         if($request['id_esreq']=='2')
         {
            session()->flash('status','Requirement Rejected');
        }else{
             session()->flash('status','Requirement enabled');
             $newStatus='5';
         }
         RegEstadosReq::create(["id_us"=>auth()->id(),
         "id_req"=>$requerimiento->id_req,
         "id_estfin"=>$newStatus]);
         return to_route('requerimiento.edit',$requerimiento);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Requerimiento $requerimiento)
    {
        //
    }

    public function newAdenda(Contrato $contrato){
        $requerimient=Requerimiento::findOrFail($contrato->id_req);
        $centrosSalud=CentroDeSalud::where('estado','=','1')->get();
        //$tiposContrato=TipoContrato::where('estado','=','1')->get();
        $cargos = Cargos::where('estado','=','1')->get();
        $niveles = Nivel::where('estado','=','1')->get();
        $docAdjuntos = DocAdjunto::where('estado','=','1')->get();
        $personal= DatosPer::where('id_per','=',$contrato->id_per)->get()->first();
        // $adjReq = AdjReq::where('estado','=','1')->where('id_req','=',$requerimient->id_req) ->get();       
        return view('requerimientos.newadenda',['requerimiento'=> $requerimient,
                                                'centrosSalud'=>$centrosSalud,
                                                'contrato'=>$contrato,
                                                // 'tiposContrato'=>$tiposContrato,
                                                'cargos'=>$cargos,
                                                'niveles'=>$niveles,
                                                'personal'=> $personal,
                                                'docAdjuntos'=>$docAdjuntos
                                                // 'adjReq'=> $adjReq
                                                ]);
    }
}

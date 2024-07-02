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
          $fecha1="";
          $fecha2="";
          if (array_key_exists('fecha1',$request->input()) && array_key_exists('fecha2',$request->input()) ) {
            $fecha1=$request->input("fecha1");
            $fecha2=$request->input("fecha2");
            $requerimientoList = Requerimiento::with('cargos')->with('centroDeSalud')->with('estadoRequerimiento')->whereBetween('fechareq',[$fecha1,$fecha2])->orderBy('id_req','DESC')->paginate(10,['*'],'page',$npage);
          }else{
            $requerimientoList = Requerimiento::with('cargos')->with('centroDeSalud')->with('estadoRequerimiento')->orderBy('id_req','DESC')->paginate(10,['*'],'page',$npage);
          }
          //$personalList=$personalList->with('estadoPersonal'); 
          
        return view('requerimientos.index',['requerimientoList'=>$requerimientoList,
                                            'fecha1'=>$fecha1,'fecha2'=>$fecha2]);
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
        return view('requerimientos.new',['centrosSalud'=> $centrosSalud,
                                          'tiposContrato'=>$tiposContrato,
                                          'cargos'=>$cargos,
                                          'niveles'=>$niveles]);
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequerimientoRequest $request)
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
        $requerimientoStore= $request;
        //$requerimientoStore['motivo'] = strtoupper($requerimientoStore['motivo']);
        $requerimientoStore['id_us']=auth()->id();
         if(!($requerimientoStore->hasKey('nroReq'))){
             $requerimientoStore['nroReq']= '';
         }
       // dump($requerimientoStore->toArray());
        Requerimiento::create($requerimientoStore->toArray());
        session()->flash('status','Requirement created successfully');
        return to_route('requerimiento.new') ;
        //return "guardando el requerimiento";
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Requerimiento $requerimiento)
    {
        //
        return view('requerimientos.show',['requerimiento'=> $requerimiento]);
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

        return view('requerimientos.edit',['requerimiento'=> $requerimient,
                                            'centrosSalud'=>$centrosSalud,
                                            'tiposContrato'=>$tiposContrato,
                                            'cargos'=>$cargos,
                                            'niveles'=>$niveles,
                                            'personal'=> $personal,
                                            'docAdjuntos'=>$docAdjuntos,
                                            'adjReq'=> $adjReq
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
                $requerimientoUpdate["foto"]= Hash::make($requerimiento->id_req.$requerimiento->fechareq);
            }
        }
        
        $requerimientoUpdate['id_usmodif']=auth()->id();
        $requerimientoUpdate['fecha_modif']=date("Y-m-d H:i:s");
        $requerimientoUpdate['conteo_edicion']=$requerimiento->conteo_edicion+1;

        if (key_exists("id_per",$validated) && isset($validated["id_per"]) ) {
            if($validated["id_per"] != $requerimiento->id_per )
            {
                $requerimientoUpdate["id_esreq"]=1;
                RegEstadosReq::create(["id_us"=>auth()->id(),
                "id_req"=>$requerimiento->id_req,
                "id_estfin"=>$requerimientoUpdate["id_esreq"],
                "fecha"=> date('Y-m-d H:i:s')]);
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Requerimiento $requerimiento)
    {
        //
    }
}

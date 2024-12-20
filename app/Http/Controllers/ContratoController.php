<?php

namespace App\Http\Controllers;

use App\Models\Vobofirma;
use App\Models\CircularInstReg;
use App\Models\AutoridadesVb;
use App\Models\RegEstadosReq;
use App\Models\Cite;
use App\Models\User;
use App\Models\CircularInstNal;
use App\Models\Contrato;
use App\Models\CentroDeSalud;
use App\Models\Nivel;
use App\Models\TipoContrato;
use App\Models\Cargos;
use App\Models\Requerimiento;
use App\Models\EspecialidadResidente;

use App\Http\Requests\StoreContratoRequest;
use App\Http\Requests\UpdateContratoRequest;
use App\Models\DatosPer;
use App\Models\HisContrato;
use App\Models\ComplementoResidente;
use App\Models\Garante;
use App\Utils\PersonalUtil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class ContratoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //     //
    //     return view('contratos.index');
    // }
    public function index(Request $request)
    {
          
          $npage=1;
          if (array_key_exists('npage',$request->input())) {
              $npage = $request->input()['npage']?$request->input()['npage']:1;
          }
          $fecha1=""; //CI, nombre o apellidos
          $fecha2=""; //
          if (array_key_exists('fecha1',$request->input())) {
            $fecha1=$request->input("fecha1");
        }
        if (array_key_exists("fecha2",$request->input())) {
            $fecha2=$request->input("fecha2");
           /// dump($fecha2);
          }
            $contratoList = contrato::join('cargos','contrato.id_car','=','cargos.id_car')
            ->join('centro_de_salud','contrato.id_cs','=','centro_de_salud.id_cs')
            ->join('estado_contrato','contrato.id_esco','=','estado_contrato.id_esco')
            ->leftJoin('datos_per','contrato.id_per','=','datos_per.id_per')
            ->where('centro_de_salud.nombre_cs','like','%'.$fecha2.'%')
            ->where(function($q) use ($fecha1){
                $q->where('datos_per.CI','like','%'.strtoupper($fecha1).'%')
                ->orWhere('datos_per.a_paterno','like','%'.strtoupper($fecha1).'%')
                ->orWhere('datos_per.a_materno','like','%'.strtoupper($fecha1).'%')
                ->orWhere('datos_per.nombres','like','%'.strtoupper($fecha1).'%');      
            })
            ->orderBy('id_con','DESC')->paginate(10,['*'],'page',$npage);
         
          //$personalList=$personalList->with('estadoPersonal'); 
          $centrosDeSalud = CentroDeSalud::get();
          
        return view('contratos.index',['contratoList'=>$contratoList,
                                            'fecha1'=>$fecha1,'fecha2'=>$fecha2,
                                        'centrosDeSalud'=>$centrosDeSalud]);
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create( $idReq)
    {
        $requerimiento = Requerimiento::findOrFail($idReq);
        $personal = DatosPer::findOrFail($requerimiento->id_per);
        $centrosSalud=CentroDeSalud::where('estado','=','1')->get();
        $tiposContrato=TipoContrato::where('estado','=','1')->get();
        $cargos = Cargos::where('estado','=','1')->get();
        $niveles = Nivel::where('estado','=','1')->get();
        $cirinstnal = CircularInstNal::where('estado','=','1')->get();
        $cirinstreg = CircularInstReg::where('estado','=','1')->get();
        $cite = Cite::where('estado','=','1')->get();
        $contrato = null;
        if(isset($requerimiento->id_cono) && $requerimiento->id_cono){
            $contrato = Contrato::findOrFail($requerimiento->id_cono);
        }
        $especialidades = EspecialidadResidente::where('estado','=','1')->get();
        $complemento = NULL;
        $garante1 = NULL;
        $garante2 = NULL;
        if($requerimiento->id_tic=='10'){
            $complemento = ComplementoResidente::where('id_req','=',$requerimiento->id_req)->get()->first();
            $garante1=Garante::findOrFail($complemento->id_gari);
            $garante2=Garante::findOrFail($complemento->id_garii);
        }
        return view('contratos.new',[
            'personal'=>$personal,
            'centrosSalud'=> $centrosSalud,
            'tiposContrato'=>$tiposContrato,
            'cargos'=>$cargos,
            'niveles'=>$niveles,
            'requerimiento'=>$requerimiento,
            'cirinstnal'=>$cirinstnal,
            'cirinstreg'=>$cirinstreg,
            'cite'=>$cite,
            'contrato'=>$contrato,
            'especialidades'=>$especialidades,
            'complemento'=>$complemento,
            'garante1'=>$garante1,
            'garante2'=>$garante2]);
            
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreContratoRequest $request)
    {
        $ticon = $request->get('id_tic');
        switch ($ticon) {
            case '9':
                $request->validate([
                    "id_per" => ["required"],
                    "id_req" => ["required"],
                    "partPres" => ["required"],
                    "id_cinal" => ["required"],
                    "id_cireg" => ["required"],
                    "id_cite" => ["required"],
                    "id_cs" => ["required"],
                    "id_tic" => ["required"],
                    "id_car" => ["required"],
                    "id_niv" => ["required"],
                   // "motivo" => ["required"],
                    "fechaIni" => ["required"],
                    "fechaFin" => ["required"],
                    "fecha_crea"=>[],
                    "us_crea"=>[],
                   // "nota" => ["required"],
                   // "fecha_nota" => ["required"],
                    "observaciones" => [],
                    "observaciones2" => [],
                    "id_cono" => ['required']
    
                ]);
                break;
            case '10':
                $request->validate([
                    "id_per" => ["required"],
                    "id_req" => ["required"],
                    "partPres" => ["required"],
                    "id_cinal" => ["required"],
                    "id_cireg" => ["required"],
                    "id_cite" => ["required"],
                    "id_cs" => ["required"],
                    "id_tic" => ["required"],
                    "id_car" => ["required"],
                    "id_niv" => ["required"],
                   // "motivo" => ["required"],
                    "fechaIni" => ["required"],
                    "fechaFin" => ["required"],
                    "fecha_crea"=>[],
                    "us_crea"=>[],
                   // "nota" => ["required"],
                   // "fecha_nota" => ["required"],
                    "observaciones" => [],
                    "observaciones2" => [],
                    "id_complemento" => ["required"]
                ]);
                break;
            default:
                $request->validate([
                    "id_per" => ["required"],
                    "id_req" => ["required"],
                    "partPres" => ["required"],
                    "id_cinal" => ["required"],
                    "id_cireg" => ["required"],
                    "id_cite" => ["required"],
                    "id_cs" => ["required"],
                    "id_tic" => ["required"],
                    "id_car" => ["required"],
                    "id_niv" => ["required"],
                // "motivo" => ["required"],
                    "fechaIni" => ["required"],
                    "fechaFin" => ["required"],
                    "fecha_crea"=>[],
                    "us_crea"=>[],
                // "nota" => ["required"],
                // "fecha_nota" => ["required"],
                    "observaciones" => [],
                    "observaciones2" => [],
                ]);
                break;
        }
            $contratoStore = $request;
            $contratoStore['id_us']=auth()->id();
            $contratoStore['us_crea']=auth()->id();
            $contratoStore['noCon']="";
            $contratoStore['horaCon']=date('h:i:s');
            $autoridad=AutoridadesVb::where('estado','=','1')->first();
            $contratoStore['gestion_au']=$autoridad->gestion_au;
            $contratoCreado=Contrato::create($contratoStore->toArray());
            $cad=implode($contratoCreado->toArray());
            $hash = Hash::make($cad);
            $contratoCreado->update(['hash1'=>$hash]);
            $histoContrato = Contrato::findOrFail($contratoCreado->id_con);
            HisContrato::create($histoContrato->toArray());
            $requerimiento= Requerimiento::findOrFail($contratoCreado->id_req);
            $requerimiento->update(['id_esreq'=>'3']);
            RegEstadosReq::create(["id_us"=>auth()->id(),
            "id_req"=>$contratoCreado->id_req,
            "id_estfin"=>"3"]);
            $personalu =DatosPer::findOrFail($contratoCreado->id_per);
            $personalu->update(["id_esper"=> "2"]);
            
            if($ticon=='10'){
                $complementoResidente = ComplementoResidente::findOrFail($contratoStore['id_complemento']); 
                $complementoResidente->update(['id_con'=>$contratoCreado->id_con]);
            }
            
            session()->flash('status','Contract created successfully');
            return to_route('contrato.index') ;
           //echo $cad; 
           //dump($contratoCreado);
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Contrato $contrato, Request $request)
    {
        $requerimiento = Requerimiento::findOrFail($contrato->id_req);
        $centrosSalud=CentroDeSalud::with('cargoEnc')->findOrFail($contrato->id_cs);
        $tiposContrato=TipoContrato::findOrFail($contrato->id_tic);
        $cargos = Cargos::findOrFail($contrato->id_car);
        $niveles = Nivel::findOrFail($contrato->id_niv);
        $usuario = User::findOrFail($contrato->id_us);

        $cirinstnal = CircularInstNal::findOrFail($contrato->id_cinal);
        $cirinstreg = CircularInstReg::findOrFail($contrato->id_cireg);
        $cite = Cite::findOrFail($contrato->id_cite);
        $firmas = Vobofirma::with('autoridadesVb.user')->where('id_con','=',$contrato->id_con)->get() ;
        
        $jefeair = AutoridadesVb::with('user')->where('estado','=','1')->where('orden','=','1')->orderBy('id','desc')->get()->first();
        $admair = AutoridadesVb::with('user')->where('estado','=','1')->where('orden','=','2')->orderBy('id','desc')->get()->first();
        $jefeaim = AutoridadesVb::with('user')->where('estado','=','1')->where('orden','=','3')->orderBy('id','desc')->get()->first();
        $jefeaiadm = AutoridadesVb::with('user')->where('estado','=','1')->where('orden','=','4')->orderBy('id','desc')->get()->first();
        $datosPer = DatosPer::with('departamento')
        ->with('filePer')->findOrFail($contrato->id_per);
        $copia =$request->all()['cop'];
        $jeferrhh=explode(' ',$jefeair->user->nombres);
        $iniciales='';
        for ($i=0; $i < sizeof($jeferrhh); $i++) {
           // if ($i>0) {
            $iniciales.= substr($jeferrhh[$i],0,1); 	
           // }
        }
        $iniciales.= substr($jefeair->user->a_paterno,0,1);
        $iniciales.= substr($jefeair->user->a_materno,0,1);
        $ut = new PersonalUtil();
        return view('contratos.show',['contrato'=>$contrato,
        'requerimiento'=>$requerimiento,
        'centrosal'=>$centrosSalud,
        'tipocon'=>$tiposContrato,
        'cargo'=>$cargos,
        'nivel'=>$niveles,
        'cirinsnal'=>$cirinstnal,
        'cireg'=>$cirinstreg,
        'cite'=>$cite,
        'personal'=>$datosPer,
        'jefeaim'=>$jefeaim,
        'jefeair'=>$jefeair,
        'admair'=>$admair,
        'jefeaiadm'=>$jefeaiadm,
        'copia'=>$copia,
        'iniciales'=>$iniciales,
        'ut'=>$ut,
        'usuario'=>$usuario        
        ]);
    }

    public function showall(Contrato $contrato)
    {
        $requerimiento = Requerimiento::findOrFail($contrato->id_req);
        $centrosSalud=CentroDeSalud::with('cargoEnc')->findOrFail($contrato->id_cs);
        $tiposContrato=TipoContrato::findOrFail($contrato->id_tic);
        $cargos = Cargos::findOrFail($contrato->id_car);
        $niveles = Nivel::findOrFail($contrato->id_niv);
        $usuario = User::findOrFail($contrato->id_us);

        $cirinstnal = CircularInstNal::findOrFail($contrato->id_cinal);
        $cirinstreg = CircularInstReg::findOrFail($contrato->id_cireg);
        $cite = Cite::findOrFail($contrato->id_cite);
        $firmas = Vobofirma::with('autoridadesVb.user')->where('id_con','=',$contrato->id_con)->get() ;
        
        $jefeair = AutoridadesVb::with('user')->where('estado','=','1')->where('orden','=','1')->orderBy('id','desc')->get()->first();
        $admair = AutoridadesVb::with('user')->where('estado','=','1')->where('orden','=','2')->orderBy('id','desc')->get()->first();
        $jefeaim = AutoridadesVb::with('user')->where('estado','=','1')->where('orden','=','3')->orderBy('id','desc')->get()->first();
        $jefeaiadm = AutoridadesVb::with('user')->where('estado','=','1')->where('orden','=','4')->orderBy('id','desc')->get()->first();
        $datosPer = DatosPer::with('departamento')
        ->with('filePer')->findOrFail($contrato->id_per);
        $copia ='1';
        $jeferrhh=explode(' ',$jefeair->user->nombres);
        $iniciales='';
        for ($i=0; $i < sizeof($jeferrhh); $i++) {
           // if ($i>0) {
            $iniciales.= substr($jeferrhh[$i],0,1); 	
           // }
        }
        $iniciales.= substr($jefeair->user->a_paterno,0,1);
        $iniciales.= substr($jefeair->user->a_materno,0,1);
        $ut = new PersonalUtil();
        return view('contratos.showall',['contrato'=>$contrato,
        'requerimiento'=>$requerimiento,
        'centrosal'=>$centrosSalud,
        'tipocon'=>$tiposContrato,
        'cargo'=>$cargos,
        'nivel'=>$niveles,
        'cirinsnal'=>$cirinstnal,
        'cireg'=>$cirinstreg,
        'cite'=>$cite,
        'personal'=>$datosPer,
        'jefeaim'=>$jefeaim,
        'jefeair'=>$jefeair,
        'admair'=>$admair,
        'jefeaiadm'=>$jefeaiadm,
        'copia'=>$copia,
        'iniciales'=>$iniciales,
        'ut'=>$ut,
        'usuario'=>$usuario        
        ]);
    }

    public function showAdenda(Contrato $contrato, Request $request)
    {
        $requerimiento = Requerimiento::findOrFail($contrato->id_req);
        $centrosSalud=CentroDeSalud::with('cargoEnc')->findOrFail($contrato->id_cs);
        $tiposContrato=TipoContrato::findOrFail($contrato->id_tic);
        $cargos = Cargos::findOrFail($contrato->id_car);
        $niveles = Nivel::findOrFail($contrato->id_niv);
        $usuario = User::findOrFail($contrato->id_us);
        $cirinstnal = CircularInstNal::findOrFail($contrato->id_cinal);
        $cirinstreg = CircularInstReg::findOrFail($contrato->id_cireg);
        $cite = Cite::findOrFail($contrato->id_cite);
        $firmas = Vobofirma::with('autoridadesVb.user')->where('id_con','=',$contrato->id_con)->get() ;
        $jefeair = AutoridadesVb::with('user')->where('estado','=','1')->where('orden','=','1')->orderBy('id','desc')->get()->first();// jefe a.i. rrhh 1
        $admair = AutoridadesVb::with('user')->where('estado','=','1')->where('orden','=','2')->orderBy('id','desc')->get()->first();//administrador a.i. regional 2
        $jefeaim = AutoridadesVb::with('user')->where('estado','=','1')->where('orden','=','3')->orderBy('id','desc')->get()->first(); // jefe a.i. medico contratos medicos 3
        $jefeaiadm = AutoridadesVb::with('user')->where('estado','=','1')->where('orden','=','4')->orderBy('id','desc')->get()->first();// jefe a.i. administrativo contratos administrativos 4
        $datosPer = DatosPer::with('departamento')
        ->with('filePer')->findOrFail($contrato->id_per);
        $copia =$request->all()['cop'];
        $jeferrhh=explode(' ',$jefeair->user->nombres);
        $iniciales='';
        for ($i=0; $i < sizeof($jeferrhh); $i++) {
           // if ($i>0) {
            $iniciales.= substr($jeferrhh[$i],0,1); 	
           // }
        }
        $iniciales.= substr($jefeair->user->a_paterno,0,1);
        $iniciales.= substr($jefeair->user->a_materno,0,1);
        $contratoOrigen = Contrato::findOrFail($contrato->id_cono); 
        $ut = new PersonalUtil();
        return view('contratos.showadenda',['contrato'=>$contrato,
        'contratoOrigen'=>$contratoOrigen,
        'requerimiento'=>$requerimiento,
        'centrosal'=>$centrosSalud,
        'tipocon'=>$tiposContrato,
        'cargo'=>$cargos,
        'nivel'=>$niveles,
        'cirinsnal'=>$cirinstnal,
        'cireg'=>$cirinstreg,
        'cite'=>$cite,
        'personal'=>$datosPer,
        'jefeaim'=>$jefeaim,
        'jefeair'=>$jefeair,
        'admair'=>$admair,
        'jefeaiadm'=>$jefeaiadm,
        'copia'=>$copia,
        'iniciales'=>$iniciales,
        'ut'=>$ut,
        'usuario'=>$usuario        
        ]);
    }

    public function showallAdenda(Contrato $contrato)
    {
        $requerimiento = Requerimiento::findOrFail($contrato->id_req);
        $centrosSalud=CentroDeSalud::with('cargoEnc')->findOrFail($contrato->id_cs);
        $tiposContrato=TipoContrato::findOrFail($contrato->id_tic);
        $cargos = Cargos::findOrFail($contrato->id_car);
        $niveles = Nivel::findOrFail($contrato->id_niv);
        $usuario = User::findOrFail($contrato->id_us);
        $cirinstnal = CircularInstNal::findOrFail($contrato->id_cinal);
        $cirinstreg = CircularInstReg::findOrFail($contrato->id_cireg);
        $cite = Cite::findOrFail($contrato->id_cite);
        $firmas = Vobofirma::with('autoridadesVb.user')->where('id_con','=',$contrato->id_con)->get() ;
        $jefeair = AutoridadesVb::with('user')->where('estado','=','1')->where('orden','=','1')->orderBy('id','desc')->get()->first();// jefe a.i. rrhh 1
        $admair = AutoridadesVb::with('user')->where('estado','=','1')->where('orden','=','2')->orderBy('id','desc')->get()->first();//administrador a.i. regional 2
        $jefeaim = AutoridadesVb::with('user')->where('estado','=','1')->where('orden','=','3')->orderBy('id','desc')->get()->first(); // jefe a.i. medico contratos medicos 3
        $jefeaiadm = AutoridadesVb::with('user')->where('estado','=','1')->where('orden','=','4')->orderBy('id','desc')->get()->first();// jefe a.i. administrativo contratos administrativos 4
        $datosPer = DatosPer::with('departamento')
        ->with('filePer')->findOrFail($contrato->id_per);
        $copia ='1';//$request->all()['cop'];
        $jeferrhh=explode(' ',$jefeair->user->nombres);
        $iniciales='';
        for ($i=0; $i < sizeof($jeferrhh); $i++) {
           // if ($i>0) {
            $iniciales.= substr($jeferrhh[$i],0,1); 	
           // }
        }
        $iniciales.= substr($jefeair->user->a_paterno,0,1);
        $iniciales.= substr($jefeair->user->a_materno,0,1);
        $contratoOrigen = Contrato::findOrFail($contrato->id_cono); 
        $ut = new PersonalUtil();
        return view('contratos.showalladenda',['contrato'=>$contrato,
        'contratoOrigen'=>$contratoOrigen,
        'requerimiento'=>$requerimiento,
        'centrosal'=>$centrosSalud,
        'tipocon'=>$tiposContrato,
        'cargo'=>$cargos,
        'nivel'=>$niveles,
        'cirinsnal'=>$cirinstnal,
        'cireg'=>$cirinstreg,
        'cite'=>$cite,
        'personal'=>$datosPer,
        'jefeaim'=>$jefeaim,
        'jefeair'=>$jefeair,
        'admair'=>$admair,
        'jefeaiadm'=>$jefeaiadm,
        'copia'=>$copia,
        'iniciales'=>$iniciales,
        'ut'=>$ut,
        'usuario'=>$usuario        
        ]);
    }
    
    public function showResidente(Contrato $contrato,Request $request){
        $requerimiento = Requerimiento::findOrFail($contrato->id_req);
        $centrosSalud=CentroDeSalud::with('cargoEnc')->findOrFail($contrato->id_cs);
        $tiposContrato=TipoContrato::findOrFail($contrato->id_tic);
        $cargos = Cargos::findOrFail($contrato->id_car);
        $niveles = Nivel::findOrFail($contrato->id_niv);
        $usuario = User::findOrFail($contrato->id_us);

        $cirinstnal = CircularInstNal::findOrFail($contrato->id_cinal);
        $cirinstreg = CircularInstReg::findOrFail($contrato->id_cireg);
        $cite = Cite::findOrFail($contrato->id_cite);
        $firmas = Vobofirma::with('autoridadesVb.user')->where('id_con','=',$contrato->id_con)->get() ;
        
        $jefeair = AutoridadesVb::with(['user'=> function($query){
            return $query->with('departamento');
        }])->where('estado','=','1')->where('orden','=','1')->orderBy('id','desc')->get()->first();
        $admair = AutoridadesVb::with(['user'=> function($query){
            return $query->with('departamento');
        }])->where('estado','=','1')->where('orden','=','2')->orderBy('id','desc')->get()->first();
        $jefeaim = AutoridadesVb::with(['user'=> function($query){
            return $query->with('departamento');
        }])->where('estado','=','1')->where('orden','=','3')->orderBy('id','desc')->get()->first();
        $jefeaiadm = AutoridadesVb::with(['user'=> function($query){
            return $query->with('departamento');
        }])->where('estado','=','1')->where('orden','=','4')->orderBy('id','desc')->get()->first();
        $datosPer = DatosPer::with('departamento')
        ->with('filePer')->findOrFail($contrato->id_per);
        $copia =$request->all()['cop'];
        $jeferrhh=explode(' ',$jefeair->user->nombres);
        $iniciales='';
        for ($i=0; $i < sizeof($jeferrhh); $i++) {
           // if ($i>0) {
            $iniciales.= substr($jeferrhh[$i],0,1); 	
           // }
        }
        $iniciales.= substr($jefeair->user->a_paterno,0,1);
        $iniciales.= substr($jefeair->user->a_materno,0,1);
        $ut = new PersonalUtil();

         $complemento= ComplementoResidente::with('especialidad')
                                           ->where('id_con','=',$contrato->id_con)
                                           ->get()->first();
        $garante1 = Garante::with('departamento')->findOrFail($complemento->id_gari);
        $garante2 = Garante::with('departamento')->findOrFail($complemento->id_garii);

        return view('contratos.showresidente',['contrato'=>$contrato,
        'requerimiento'=>$requerimiento,
        'centrosal'=>$centrosSalud,
        'tipocon'=>$tiposContrato,
        'cargo'=>$cargos,
        'nivel'=>$niveles,
        'cirinsnal'=>$cirinstnal,
        'cireg'=>$cirinstreg,
        'cite'=>$cite,
        'personal'=>$datosPer,
        'jefeaim'=>$jefeaim,
        'jefeair'=>$jefeair,
        'admair'=>$admair,
        'jefeaiadm'=>$jefeaiadm,
        'copia'=>$copia,
        'iniciales'=>$iniciales,
        'ut'=>$ut,
        'usuario'=>$usuario,
        'complemento'=>$complemento,
        'garante1'=>$garante1,
        'garante2'=>$garante2
        ]);

    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contrato $contrato)
    {
       // dump($contrato);
        $contrato=Contrato::findOrFail($contrato->id_con);
        $requerimiento = Requerimiento::findOrFail($contrato->id_req);
        $centrosSalud=CentroDeSalud::where('estado','=','1')->get();
        $tiposContrato=TipoContrato::where('estado','=','1')->get();
        $cargos = Cargos::where('estado','=','1')->get();
        $niveles = Nivel::where('estado','=','1')->get();
        $personal= DatosPer::with('departamento')->where('id_per','=',$contrato->id_per)->get()->first();
        $cirinstnal = CircularInstNal::where('estado','=','1')->get();
        $cirinstreg = CircularInstReg::where('estado','=','1')->get();
        $cite = Cite::where('estado','=','1')->get();
        $yoAutoridad = AutoridadesVb::where('id_us','=',auth()->id())->where('estado','=','1')->get()->first();
        $firmas = Vobofirma::with('autoridadesVb.user')->where('id_con','=',$contrato->id_con)->get() ;
        
        $nofirme=true;
        if(isset($yoAutoridad)){
            foreach ($firmas as $key => $value) {
                # code...
                if($value->id_au ==$yoAutoridad->id){
                    $nofirme = false;
                }
            }
        }
        $complemento = NULL;
        $garante1 = NULL;
        $garante2 = NULL;
        $especialidades=[];
        if($requerimiento->id_tic=='10'){
            $complemento = ComplementoResidente::where('id_req','=',$requerimiento->id_req)->get()->first();
            $garante1=Garante::findOrFail($complemento->id_gari);
            $garante2=Garante::findOrFail($complemento->id_garii);
            $especialidades = EspecialidadResidente::where('estado','=','1')->get();
        }

        return view('contratos.edit',['contrato'=> $contrato,
                                            'requerimiento'=>$requerimiento,
                                            'centrosSalud'=>$centrosSalud,
                                            'tiposContrato'=>$tiposContrato,
                                            'cargos'=>$cargos,
                                            'niveles'=>$niveles,
                                            'personal'=> $personal,
                                            'cirinstnal'=>$cirinstnal,
                                            'cirinstreg'=>$cirinstreg,
                                            'cite'=>$cite,
                                            'yoAutoridad'=>$yoAutoridad,
                                            'firmas'=>$firmas,
                                            'nofirme'=>$nofirme,
                                            'complemento'=>$complemento,
                                            'garante1'=>$garante1,
                                            'garante2'=>$garante2,
                                            'especialidades'=>$especialidades
                                        ]);
        
    }

    

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateContratoRequest $request, Contrato $contrato)
    {
            $validated=$request->validate([
                "id_per" => ["required"],
                "id_req" => ["required"],
                "partPres" => ["required"],
                "id_cinal" => ["required"],
                "id_cireg" => ["required"],
                "id_cite" => ["required"],
                "id_cs" => ["required"],
                "id_tic" => ["required"],
                "id_car" => ["required"],
                "id_niv" => ["required"],
                "firmado"=>[],
               // "motivo" => ["required"],
                "fechaIni" => ["required"],
                "fechaFin" => ["required"],
                "fecha_crea"=>[],
                "us_crea"=>[],
               // "nota" => ["required"],
               // "fecha_nota" => ["required"],
                "observaciones" => [],
                "observaciones2" => [],
            ]);
        $contratoUpdate = $validated;
        if(array_key_exists('firmado',$contratoUpdate)){
            if(isset($contratoUpdate['firmado']) && $contratoUpdate['firmado'] != $contrato->firmado ){
                $contratoUpdate['id_esco'] = '1';
                $persona= DatosPer::findOrFail($contrato->id_per);
                $cont= $persona->conteo+1;
                if($contratoUpdate['id_tic'] == '9' || $contratoUpdate['id_tic'] == '10' || $contratoUpdate['id_tic'] == '11'  ){
                    $persona->update(['id_esper'=>'4']);
                }else{
                    $persona->update(['id_esper'=>'4','conteo'=>$cont]);
                }

                $requerimiento =Requerimiento::findOrFail($contrato->id_req);
                $requerimiento->update(['id_esreq'=>'4']);
                RegEstadosReq::create([
                    'id_us'=>auth()->id(),
                    'id_req'=>$contrato->id_req,
                    'id_estfin'=>'4'
                ]);
            }
        }
        $contratoUpdate['us_modif']=auth()->id();
        $contratoUpdate['feche_modif']=date("Y-m-d H:i:s");
        $contratoUpdate['conteo_edicion']=$contrato->conteo_edicion+1;
        $contrato->update($contratoUpdate);
        $histoContrato = Contrato::findOrFail($contrato->id_con);
        HisContrato::create($histoContrato->toArray());
        
        session()->flash('status','Successfully updated Contract');
        return to_route('contrato.edit',$contrato) ;
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contrato $contrato)
    {
        //
    }
}

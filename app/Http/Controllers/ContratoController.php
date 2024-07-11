<?php

namespace App\Http\Controllers;

use App\Models\CircularInstReg;
use App\Models\AutoridadesVb;
use App\Models\RegEstadosReq;
use App\Models\Cite;
use App\Models\CircularInstNal;
use App\Models\Contrato;
use App\Models\CentroDeSalud;
use App\Models\Nivel;
use App\Models\TipoContrato;
use App\Models\Cargos;
use App\Models\Requerimiento;
use App\Http\Requests\StoreContratoRequest;
use App\Http\Requests\UpdateContratoRequest;
use App\Models\DatosPer;
use App\Models\HisContrato;
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
          $fecha1="";
          $fecha2="";
          if (array_key_exists('fecha1',$request->input()) && array_key_exists('fecha2',$request->input()) ) {
            $fecha1=$request->input("fecha1");
            $fecha2=$request->input("fecha2");
            $contratoList = Contrato::with('cargos')->with('centroDeSalud')->with('estadoContrato')->with('datosPer')->whereBetween('fechaCon',[$fecha1,$fecha2])->orderBy('id_con','DESC')->paginate(10,['*'],'page',$npage);
          }else{
            $contratoList = Contrato::with('cargos')->with('centroDeSalud')->with('estadoContrato')->with('datosPer')->orderBy('id_con','DESC')->paginate(10,['*'],'page',$npage);
          }
          //$personalList=$personalList->with('estadoPersonal'); 
          
        return view('contratos.index',['contratoList'=>$contratoList,
                                            'fecha1'=>$fecha1,'fecha2'=>$fecha2]);
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
        return view('contratos.new',[
            'personal'=>$personal,
            'centrosSalud'=> $centrosSalud,
            'tiposContrato'=>$tiposContrato,
            'cargos'=>$cargos,
            'niveles'=>$niveles,
            'requerimiento'=>$requerimiento,
            'cirinstnal'=>$cirinstnal,
            'cirinstreg'=>$cirinstreg,
            'cite'=>$cite]);
            
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreContratoRequest $request)
    {
        if($request->get('id_tic')!= '9')  
        {
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
            
        }else{
            echo('tic = 9');
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
            session()->flash('status','Contract created successfully');
            return to_route('contrato.index') ;
           //echo $cad; 
           //dump($contratoCreado);
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Contrato $contrato)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contrato $contrato)
    {
        dump ($contrato);
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateContratoRequest $request, Contrato $contrato)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contrato $contrato)
    {
        //
    }
}

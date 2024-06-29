<?php

namespace App\Http\Controllers;

use App\Models\Requerimiento;
use App\Http\Requests\StoreRequerimientoRequest;
use App\Http\Requests\UpdateRequerimientoRequest;
use App\Models\Cargos;
use App\Models\CentroDeSalud;
use App\Models\TipoContrato;
use App\Models\DatosPer;
use App\Models\Nivel;
use Illuminate\Http\Request;

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
        $personal = [];
        if ($requerimient->id_per){
            $personal= DatosPer::where('id_per','=',$requerimient->id_per);
        }

        return view('requerimientos.edit',['requerimiento'=> $requerimient,
                                            'centrosSalud'=>$centrosSalud,
                                            'tiposContrato'=>$tiposContrato,
                                            'cargos'=>$cargos,
                                            'niveles'=>$niveles,
                                            'personal'=> $personal
                                            ]);
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequerimientoRequest $request, Requerimiento $requerimiento)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Requerimiento $requerimiento)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Afp;
use App\Models\DatosPer;
use App\Models\Departamento;
use App\Http\Requests\StoreDatosPerRequest;
use App\Http\Requests\UpdateDatosPerRequest;
use App\Utils\PersonalUtil;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
class DatosPerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {  
        //
        $npage=1;
        $str="";
        $keyword="%";
        if (array_key_exists('strBusqueda',$request->input())) {
            # code..
            $str = $request->input()['strBusqueda']?$request->input()['strBusqueda']:'';
            $keyword= '%'.strtoupper($str).'%';
        }

        if (array_key_exists('npage',$request->input())) {
            $npage = $request->input()['npage']?$request->input()['npage']:1;
        }

        $personalList = DatosPer::where(function($query) use($keyword) {
            $query->where("a_paterno","LIKE",$keyword);
            $query->orWhere("a_materno","LIKE",$keyword);
            $query->orWhere("nombres","LIKE",$keyword);
        } )->where('id_esper','<>','5')->paginate(10,['*'],'page',$npage);
         
        
       return view('personal.index',['personalList'=>$personalList,'str'=>$str]);
       //return view('personal.index',['request'=> $request]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departamentos = Departamento::where ('estado','=','1')->get();
        $afps = Afp::where('estado','=','1')->get();
        return view('personal.new',['departamentos'=> $departamentos, 'afps'=>$afps]);
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDatosPerRequest $request)
    {
        $request->validate([
        'a_paterno'=>['required','alpha:ascii', 'string', 'max:45','min:2'],
        'a_materno'=>['required','alpha:ascii', 'string', 'max:45','min:2'],
        'nombres'=>['required','alpha:ascii', 'string', 'max:45','min:2'],
        'CI'=> ['required','unique:datos_per,CI'],
        'id_dep'=>['required','numeric','min:1'],
        'est_civil'=>'required',
        'sexo'=>'required',
        'localidad'=>['required','string', 'max:45','min:5'],
        'direccion'=>['required', 'string', 'max:250','min:10'],
        'calle'=>['required', 'string', 'max:55'],
        'No'=>['required', 'string', 'max:10'],
        'telefono'=>['required', 'string', 'max:40','min:6'],
        'email'=>['required','email','unique:datos_per,email'],
        'fecha_nac'=>'required',
        'id_afp'=>['required','numeric','min:1']
        ]);
        $perUtil = new PersonalUtil();
        $personalStore=$request;
        $personalStore['a_paterno']=strtoupper($personalStore['a_paterno']);
        $personalStore['a_materno']=strtoupper($personalStore['a_materno']);
        $personalStore['nombres']=strtoupper($personalStore['nombres']);
        $personalStore['hashDp']=Hash::make($personalStore['CI'].$personalStore['a_paterno'].$personalStore['a_materno'].$personalStore['nombres']);
        $personalStore['id_uscrea']=auth()->id();
        $personalStore['id_esper'] = 3;
        $personalStore['estado_conteo'] = 'habil';
        $personalStore['matricula']=$perUtil->generaMatricula($personalStore['sexo'],$personalStore['fecha_nac'],$personalStore['a_paterno'],$personalStore['a_materno'],$personalStore['nombres']);
        DatosPer::create($personalStore->toArray());
        session()->flash('status','Successfully created staff');
        return to_route('personal.new') ;
                //
    }

    /**
     * Display the specified resource.
     */
    public function show(DatosPer $datosPer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DatosPer $datosPer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDatosPerRequest $request, DatosPer $datosPer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DatosPer $datosPer)
    {
        //
    }
}

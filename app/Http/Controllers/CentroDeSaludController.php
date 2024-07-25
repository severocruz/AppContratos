<?php

namespace App\Http\Controllers;

use App\Models\CentroDeSalud;
use App\Models\CargoEnc;
use App\Http\Requests\StoreCentroDeSaludRequest;
use App\Http\Requests\UpdateCentroDeSaludRequest;
use Illuminate\Http\Request;

class CentroDeSaludController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    { $npage=1;
        //
        if (array_key_exists('npage',$request->input())) {
            $npage = $request->input()['npage']?$request->input()['npage']:1;
        }
        $centros = CentroDeSalud::with('cargoEnc')->where('estado','=','1')
        ->orderBy('id_cs','DESC')->paginate(10,['*'],'page',$npage);
        return view('centrosdesalud.index',[
            'centros'=>$centros
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cargos = CargoEnc::where('estado','=','1')->get();
        //
        return view('centrosdesalud.new',[
            'cargos'=>$cargos
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCentroDeSaludRequest $request)
    {
        //
        //dump($request);
        $request->validate([
            'codigo_cs'=>['required'],
            'nombre_cs'=>['required'],
            'idcargos_encs'=>['required'],
            'nombre_enc'=> ['required'],
            'telefonos'=>['required']
            ]);
        $centroStore = $request;
        CentroDeSalud::create($centroStore->toArray());
        session()->flash('status','Successfully created Workplace');
        return to_route('centrodesalud.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(CentroDeSalud $centroDeSalud)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($centroDeSalud)
    {
        //
        $centro = CentroDeSalud::findOrFail($centroDeSalud);
        $cargos = CargoEnc::where('estado','=','1')->get();
        return view('centrosdesalud.edit',[
            'centroDeSalud'=>$centro,
            'cargos'=>$cargos]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCentroDeSaludRequest $request, CentroDeSalud $centroDeSalud)
    {
        //
        $request->validate([
            'codigo_cs'=>['required'],
            'nombre_cs'=>['required'],
            'idcargos_encs'=>['required'],
            'nombre_enc'=> ['required'],
            'telefonos'=>['required']
        ]);
        
        $centroStore = $request;
        $centroUpdt= CentroDeSalud::findOrFail($centroStore['id_cs']);
        $centroUpdt->update(['estado'=>'0']);
        CentroDeSalud::create($centroStore->toArray());
        session()->flash('status','Successfully updated Workplace');
        return to_route('centrodesalud.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CentroDeSalud $centroDeSalud)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Contrato;
use App\Models\CentroDeSalud;
use App\Models\Nivel;
use App\Models\TipoContrato;
use App\Models\Cargos;
use App\Models\Requerimiento;
use App\Http\Requests\StoreContratoRequest;
use App\Http\Requests\UpdateContratoRequest;
use App\Models\DatosPer;
use Illuminate\Http\Request;
class ContratoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('contratos.index');
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
        return view('contratos.new',[
            'personal'=>$personal,
            'centrosSalud'=> $centrosSalud,
            'tiposContrato'=>$tiposContrato,
            'cargos'=>$cargos,
            'niveles'=>$niveles,
            'requerimiento'=>$requerimiento]);
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreContratoRequest $request)
    {
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

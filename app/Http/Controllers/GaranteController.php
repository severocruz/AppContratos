<?php

namespace App\Http\Controllers;

use App\Models\Garante;
use App\Http\Requests\StoreGaranteRequest;
use App\Http\Requests\UpdateGaranteRequest;
use Illuminate\Http\Request;
class GaranteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGaranteRequest $request)
    {
        //
        $request->validate([
            "a_paterno"=>["required"],
            "a_materno"=>["required"],
            "nombres"=>["required"],
            "ci"=>["required"],
            "id_dep"=>["required"],
            "origen"=>["required"]
            ]);
        $garanteStore=$request;
        if($garanteStore['origen']=='requerimiento'){
            $garante = Garante::create($garanteStore->toArray());
            session()->flash('status','Successfully created guarantor');
            return to_route('requerimiento.new') ;
        }
         dump($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(Garante $garante)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Garante $garante)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGaranteRequest $request, Garante $garante)
    {
        //
    }

    public function geByCI(Request $request ){

        $ci = trim($request->input('CI')) ;
        $datosPer = Garante::where('CI','=',$ci)
        ->where('estado','=','1')->get() ;
        return $datosPer->all();
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Garante $garante)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\DatosPer;
use App\Http\Requests\StoreDatosPerRequest;
use App\Http\Requests\UpdateDatosPerRequest;

class DatosPerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('personal.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('personal.new');
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDatosPerRequest $request)
    {
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

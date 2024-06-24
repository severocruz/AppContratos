<?php

namespace App\Http\Controllers;

use App\Models\Requerimiento;
use App\Http\Requests\StoreRequerimientoRequest;
use App\Http\Requests\UpdateRequerimientoRequest;

class RequerimientoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('requerimientos.index');
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
    public function store(StoreRequerimientoRequest $request)
    {
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
    public function edit(Requerimiento $requerimiento)
    {
        //
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

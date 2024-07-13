<?php

namespace App\Http\Controllers;

use App\Models\Vobofirma;
use App\Models\Contrato;
use App\Http\Requests\StoreVobofirmaRequest;
use App\Http\Requests\UpdateVobofirmaRequest;

class VobofirmaController extends Controller
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
    public function store(StoreVobofirmaRequest $request)
    { 
        // dump($request->all());
        $contrato = Contrato::findOrFail($request->all()["id_con"]);
        Vobofirma::create($request->all());
        
        session()->flash('status','Signature registered successfully');
       return to_route('contrato.edit',$contrato);
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Vobofirma $vobofirma)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vobofirma $vobofirma)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateVobofirmaRequest $request, Vobofirma $vobofirma)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vobofirma $vobofirma)
    {
        //
    }
}

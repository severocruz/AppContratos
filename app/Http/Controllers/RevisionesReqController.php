<?php

namespace App\Http\Controllers;

use App\Models\RevisionesReq;
use App\Models\Requerimiento;
use App\Http\Requests\StoreRevisionesReqRequest;
use App\Http\Requests\UpdateRevisionesReqRequest;

class RevisionesReqController extends Controller
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
    public function store(StoreRevisionesReqRequest $request)
    {
        //

        $requerimiento = Requerimiento::findOrFail($request->all()["id_req"]);
        RevisionesReq::create($request->all());
        //dump($request->all());
       return to_route('requerimiento.edit',$requerimiento);
    }

    /**
     * Display the specified resource.
     */
    public function show(RevisionesReq $revisionesReq)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RevisionesReq $revisionesReq)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRevisionesReqRequest $request, RevisionesReq $revisionesReq)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RevisionesReq $revisionesReq)
    {
        //
    }
}

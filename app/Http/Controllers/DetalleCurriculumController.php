<?php

namespace App\Http\Controllers;

use App\Models\DetalleCurriculum;
use App\Models\DatosPer;
use App\Http\Requests\StoreDetalleCurriculumRequest;
use App\Http\Requests\UpdateDetalleCurriculumRequest;

class DetalleCurriculumController extends Controller
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
    public function store(StoreDetalleCurriculumRequest $request)
    {
       DetalleCurriculum::create($request->all());
       $personal = DatosPer::where("id_cv","=",$request->all()['id_cv'])->first();
       session()->flash('status','Successfully created item');
       return to_route('curriculum.index',['personal'=>$personal]);
    }

    /**
     * Display the specified resource.
     */
    public function show(DetalleCurriculum $detalleCurriculum)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DetalleCurriculum $detalleCurriculum)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDetalleCurriculumRequest $request, DetalleCurriculum $detalleCurriculum)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DetalleCurriculum $detalleCurriculum)
    {
        //
    }
}

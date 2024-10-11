<?php

namespace App\Http\Controllers;

use App\Models\Curriculum;
use App\Models\DatosPer;
use App\Http\Requests\StoreCurriculumRequest;
use App\Http\Requests\UpdateCurriculumRequest;
use App\Models\DetalleCurriculum;

class CurriculumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(DatosPer $personal)
    {
        //
        // dump($personal);
        if(!isset($personal->id_cv)){
            $curriculum = Curriculum::create(['fecha'=>date('Y-m-d')]);
            $personal->update(['id_cv'=>$curriculum->id_cv]);
        }else{
            $curriculum = Curriculum::findOrFail($personal->id_cv);
        }
        $detalle = DetalleCurriculum::where('estado','=','activo')
                                    ->where('id_cv','=',$personal->id_cv)
                                    ->get();
        return view('curriculum.index',[
        'personal'=>$personal,
        'detalle'=>$detalle,
        'curriculum'=>$curriculum
        ]);
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
    public function store(StoreCurriculumRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Curriculum $curriculum)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Curriculum $curriculum)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCurriculumRequest $request, Curriculum $curriculum)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Curriculum $curriculum)
    {
        //
    }
}

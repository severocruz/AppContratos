<?php

namespace App\Http\Controllers;

use App\Models\FilePer;
use App\Models\DatosPer;
use App\Http\Requests\StoreFilePerRequest;
use App\Http\Requests\UpdateFilePerRequest;

class FilePerController extends Controller
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
    public function store(StoreFilePerRequest $request)
    {
       // dump($request->all());
        $personal = DatosPer::findOrFail($request->all()["id_per"]);
        
        $fileper = FilePer::create($request->all());
        FilePer::where('id_file','<>',$fileper->id_file)
               ->where('nombre','=',$fileper->nombre)
                ->update(['estado'=>'0']);
        $personal->update(["id_file"=> $fileper->id_file]);
        session()->flash('status','File assigned successfully');
        return to_route('personal.edit',$personal) ;
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(FilePer $filePer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FilePer $filePer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFilePerRequest $request, FilePer $filePer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FilePer $filePer)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\DocAdjunto;
use App\Http\Requests\StoreDocAdjuntoRequest;
use App\Http\Requests\UpdateDocAdjuntoRequest;
use Illuminate\Http\Request;

class DocAdjuntoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $npage=1;
        //
        if (array_key_exists('npage',$request->input())) {
            $npage = $request->input()['npage']?$request->input()['npage']:1;
        }
        $docadjuntos = DocAdjunto::where('estado','=','1')
        ->orderBy('id_adj','DESC')->paginate(10,['*'],'page',$npage);
        return view('docadjuntos.index',[
            'adjuntos'=>$docadjuntos
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('docadjuntos.new');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDocAdjuntoRequest $request)
    {
        //
        $request->validate([
            'documento'=>['required'],
            'descripcion'=>['required']
            ]);
        $adjuntoStore = $request;
        DocAdjunto::create($adjuntoStore->toArray());
        session()->flash('status','Documento Adjunto creado con éxito');
        return to_route('docadjunto.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(DocAdjunto $docAdjunto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($docAdjunto)
    {
        //
        $adjunto = DocAdjunto::findOrFail($docAdjunto);
        return view('docadjuntos.edit',
        ['adjunto'=>$adjunto]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDocAdjuntoRequest $request, DocAdjunto $docAdjunto)
    {
        //
        $request->validate([
            'documento'=>['required'],
            'descripcion'=>['required']
        ]);
        
        $circularStore = $request;
        $circularUpdt= DocAdjunto::findOrFail($circularStore['id_adj']);
        //dump($circularUpdt->toArray());
         $circularUpdt->update(['estado'=>'0']);
        DocAdjunto::create($circularStore->toArray());
        session()->flash('status','Documento Adjunto editado con éxito');
        return to_route('docadjunto.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DocAdjunto $docAdjunto)
    {
        //
    }
}

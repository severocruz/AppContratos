<?php

namespace App\Http\Controllers;

use App\Models\Cite;
use App\Http\Requests\StoreCiteRequest;
use App\Http\Requests\UpdateCiteRequest;
use Illuminate\Http\Request;

class CiteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
         //
         $npage=1;
         //
         if (array_key_exists('npage',$request->input())) {
             $npage = $request->input()['npage']?$request->input()['npage']:1;
         }
         $circulares = Cite::where('estado','=','1')
         ->orderBy('id','DESC')->paginate(10,['*'],'page',$npage);
         return view('cites.index',[
             'circulares'=>$circulares
         ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cites.new');
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCiteRequest $request)
    {
        //
        $request->validate([
            'no'=>['required'],
            'fecha'=>['required']
            ]);
        $circularStore = $request;
        Cite::create($circularStore->toArray());
        session()->flash('status','Cite creado con éxito');
        return to_route('cite.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cite $cite)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($cite)
    {
        //
        $circular = Cite::findOrFail($cite);
        return view('cites.edit',
        ['circular'=>$circular]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCiteRequest $request, Cite $cite)
    {
        //
        $request->validate([
            'no'=>['required'],
            'fecha'=>['required']
        ]);
        
        $circularStore = $request;
        $circularUpdt= Cite::findOrFail($circularStore['id']);
        //dump($circularUpdt->toArray());
         $circularUpdt->update(['estado'=>'0']);
        Cite::create($circularStore->toArray());
        session()->flash('status','Cite editado con éxito');
        return to_route('cite.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cite $cite)
    {
        //
    }
}

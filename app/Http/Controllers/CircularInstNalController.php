<?php

namespace App\Http\Controllers;

use App\Models\CircularInstNal;
use App\Http\Requests\StoreCircularInstNalRequest;
use App\Http\Requests\UpdateCircularInstNalRequest;
use Illuminate\Http\Request;

class CircularInstNalController extends Controller
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
        $circulares = CircularInstNal::where('estado','=','1')
        ->orderBy('id','DESC')->paginate(10,['*'],'page',$npage);
        return view('circularinstnals.index',[
            'circulares'=>$circulares
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        
        //
        return view('circularinstnals.new');
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCircularInstNalRequest $request)
    {
        //
        $request->validate([
            'no'=>['required'],
            'fecha'=>['required']
            ]);
        $circularStore = $request;
        CircularInstNal::create($circularStore->toArray());
        session()->flash('status','Circular creado con éxito');
        return to_route('circularinstnal.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(CircularInstNal $circularInstNal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $circularInstNal)
    {
        //
        $circular = CircularInstNal::findOrFail($circularInstNal);
        return view('circularinstnals.edit',
        ['circular'=>$circular]
    );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCircularInstNalRequest $request, CircularInstNal $circularInstNal)
    {
        //
        $request->validate([
            'no'=>['required'],
            'fecha'=>['required']
        ]);
        
        $circularStore = $request;
        $circularUpdt= CircularInstNal::findOrFail($circularStore['id']);
        //dump($circularUpdt->toArray());
         $circularUpdt->update(['estado'=>'0']);
        CircularInstNal::create($circularStore->toArray());
        session()->flash('status','Circular editado con éxito');
        return to_route('circularinstnal.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CircularInstNal $circularInstNal)
    {
        //
    }
}

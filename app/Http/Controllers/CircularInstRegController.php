<?php

namespace App\Http\Controllers;

use App\Models\CircularInstReg;
use App\Http\Requests\StoreCircularInstRegRequest;
use App\Http\Requests\UpdateCircularInstRegRequest;
use Illuminate\Http\Request;
class CircularInstRegController extends Controller
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
        $circulares = CircularInstReg::where('estado','=','1')
        ->orderBy('id','DESC')->paginate(10,['*'],'page',$npage);
        return view('circularinstregs.index',[
            'circulares'=>$circulares
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('circularinstregs.new');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCircularInstRegRequest $request)
    {
        //
        $request->validate([
            'no'=>['required'],
            'fecha'=>['required']
            ]);
        $circularStore = $request;
        CircularInstReg::create($circularStore->toArray());
        session()->flash('status','Circular creado con éxito');
        return to_route('circularinstreg.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(CircularInstReg $circularInstReg)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $circularInstReg)
    {
        //
        $circular = CircularInstReg::findOrFail($circularInstReg);
        return view('circularinstregs.edit',
        ['circular'=>$circular]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCircularInstRegRequest $request, CircularInstReg $circularInstReg)
    {
        //
        $request->validate([
            'no'=>['required'],
            'fecha'=>['required']
        ]);
        
        $circularStore = $request;
        $circularUpdt= CircularInstReg::findOrFail($circularStore['id']);
        //dump($circularUpdt->toArray());
         $circularUpdt->update(['estado'=>'0']);
        CircularInstReg::create($circularStore->toArray());
        session()->flash('status','Circular editado con éxito');
        return to_route('circularinstreg.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CircularInstReg $circularInstReg)
    {
        //
    }
}

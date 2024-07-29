<?php

namespace App\Http\Controllers;

use App\Models\RevisorReq;
use App\Models\User;
use App\Http\Requests\StoreRevisorReqRequest;
use App\Http\Requests\UpdateRevisorReqRequest;

class RevisorReqController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $autoridades = RevisorReq::with('user')
        ->where('estado','=','1')->get();
        $users = User::where('id_estus','=','1')->get();
        return view('revisoresreq.index',
        ['autoridades'=>$autoridades,
        'users'=>$users]);
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
    public function store(StoreRevisorReqRequest $request)
    {
        //
        $request->validate([
            'id_ussumariante'=>['required'],
            'tiposumariante'=>['required'],
            'id_usjuridico'=>['required'],
            'tipojuridico'=>['required'],
        ]);
        dump($request->all());
        RevisorReq::where('estado','=','1')->update(['estado'=>'0']);
        RevisorReq::create([
            'tipo'=>$request->all()['tipojuridico'],
            'id_us'=>$request->all()['id_usjuridico']
        ]);
        RevisorReq::create([
            'tipo'=>$request->all()['tiposumariante'],
            'id_us'=>$request->all()['id_ussumariante']
        ]);
        session()->flash('status','Autoridades modificadas con éxito');
        return to_route('revisorreq.index') ;
    }

    /**
     * Display the specified resource.
     */
    public function show(RevisorReq $revisorReq)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RevisorReq $revisorReq)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRevisorReqRequest $request, RevisorReq $revisorReq)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RevisorReq $revisorReq)
    {
        //
    }
}

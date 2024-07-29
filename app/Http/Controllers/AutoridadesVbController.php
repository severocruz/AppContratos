<?php

namespace App\Http\Controllers;

use App\Models\AutoridadesVb;
use App\Models\User;
use App\Http\Requests\StoreAutoridadesVbRequest;
use App\Http\Requests\UpdateAutoridadesVbRequest;
use Illuminate\Support\Facades\Storage;


class AutoridadesVbController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $autoridades = AutoridadesVb::with('user')
        ->where('estado','=','1')
        ->orderBy('orden')->get();
        $users = User::where('id_estus','=','1')->get();
        return view('autoridadesvb.index',
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
    public function store(StoreAutoridadesVbRequest $request)
    {
        $request->validate([
            'gestion_au'=>['required'],
            'nombre1'=>['required'],
            'cargo1'=>['required'],
            'orden1'=>['required'],
            'img_firma1'=>[],
            'id_us1'=>['required'],
            'nombre2'=>['required'],
            'cargo2'=>['required'],
            'orden2'=>['required'],
            'img_firma2'=>[],
            'id_us2'=>['required'],
            'nombre3'=>['required'],
            'cargo3'=>['required'],
            'orden3'=>['required'],
            'img_firma3'=>[],
            'id_us3'=>['required'],
            'nombre4'=>['required'],
            'cargo4'=>['required'],
            'orden4'=>['required'],
            'img_firma4'=>[],
            'id_us4'=>['required']
        ]);
        $gestion_new = $request->all()['gestion_au']+1;
        AutoridadesVb::where('estado','=','1')->update(['estado'=>'0']);
        AutoridadesVb::create([
            'nombre'=>$request->all()['nombre1'],
            'cargo'=>$request->all()['cargo1'],
            'orden'=>$request->all()['orden1'],
            'gestion_au'=>$gestion_new,
            'img_firma'=>$request->all()['img_firma1'],
            'id_us'=>$request->all()['id_us1'],
        ]);
        AutoridadesVb::create([
            'nombre'=>$request->all()['nombre2'],
            'cargo'=>$request->all()['cargo2'],
            'orden'=>$request->all()['orden2'],
            'gestion_au'=>$gestion_new,
            'img_firma'=>$request->all()['img_firma2'],
            'id_us'=>$request->all()['id_us2'],
        ]);
        AutoridadesVb::create([
            'nombre'=>$request->all()['nombre3'],
            'cargo'=>$request->all()['cargo3'],
            'orden'=>$request->all()['orden3'],
            'gestion_au'=>$gestion_new,
            'img_firma'=>$request->all()['img_firma3'],
            'id_us'=>$request->all()['id_us3'],
        ]);
        AutoridadesVb::create([
            'nombre'=>$request->all()['nombre4'],
            'cargo'=>$request->all()['cargo4'],
            'orden'=>$request->all()['orden4'],
            'gestion_au'=>$gestion_new,
            'img_firma'=>$request->all()['img_firma4'],
            'id_us'=>$request->all()['id_us4'],
        ]);
        session()->flash('status','Autoridades modificadas con éxito');
        return to_route('autoridadvb.index') ;
        //dump($request->all());
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(AutoridadesVb $autoridadesVb)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $autoridadesVb)
    {
        $autoridad= AutoridadesVb::with('user')->findOrFail($autoridadesVb);
        //
        return view('autoridadesvb.edit',[
            'autoridad'=>$autoridad
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAutoridadesVbRequest $request, AutoridadesVb $autoridadesVb)
    {
        //
       // dump($request->all());
        $autoridad = AutoridadesVb::findOrFail($request->all()['id_au']);
        if ($request->hasFile('firma')) {
            # code...
            $file=$request->file('firma');
            $nombrefoto = date('YmdHis').$request->all()['id_au'].''; 
            Storage::putFileAs('public/firmas',$file,$nombrefoto);
            $request['foto']=$nombrefoto;
            $autoridad->update(['img_firma'=>$nombrefoto]);
            session()->flash('status','Imagen asignada con éxito');
            return to_route('autoridadvb.index'); 
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AutoridadesVb $autoridadesVb)
    {
        //
    }
}

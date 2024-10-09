<?php

namespace App\Http\Controllers;

use App\Models\ImagenContrato;
use App\Models\Contrato;
use App\Http\Requests\StoreImagenContratoRequest;
use App\Http\Requests\UpdateImagenContratoRequest;
use Illuminate\Support\Facades\Storage;
class ImagenContratoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Contrato $contrato)
    {
         
        $imagenes = ImagenContrato::where("id_con","=",$contrato->id_con)
                                  ->where("estado","=","1")->get();
        
        // dump($imagenes);                                  
        return view('contratos.images',
            ['contrato' => $contrato,
            'imagenes'=>$imagenes
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
    public function store(StoreImagenContratoRequest $request)
    {
        //
        if ($request->hasFile('imagencontrato')) {
            # code...
            $file=$request->file('imagencontrato');
            $nombrefoto = date('YmdHis').str_replace(' ','',$file->getClientOriginalName()); 
            Storage::putFileAs('public/contratos',$file,$nombrefoto);
            $request['imagen']=$nombrefoto;
        }
        $request->validate([
            'imagen'=>['required'],
            'detalle'=>['required'],
            'id_con'=>['required']
             ]);
        $request['estado']='1';
        $contrato = Contrato::findOrFail($request['id_con']);
        ImagenContrato::create($request->toArray());
        session()->flash('status','Successfully created image');
        return to_route('imagencontrato.index',['contrato'=>$contrato]) ;
    }

    /**
     * Display the specified resource.
     */
    public function show(ImagenContrato $imagenContrato)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ImagenContrato $imagenContrato)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateImagenContratoRequest $request, ImagenContrato $imagenContrato)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ImagenContrato $imagenContrato)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\ImagenCurriculum;
use App\Http\Requests\StoreImagenCurriculumRequest;
use App\Http\Requests\UpdateImagenCurriculumRequest;
use App\Models\DetalleCurriculum;
use Illuminate\Support\Facades\Storage;

class ImagenCurriculumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(DetalleCurriculum $detalle)
    {
        //
        $imagenes = ImagenCurriculum::where("id_dcv","=",$detalle->id_dcv)
        ->where("estado","=","activo")->get();

        // dump ($detalle);
        // dump($imagenes);                                  
        return view('Curriculum.images',
        ['detalle' => $detalle,
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
    public function store(StoreImagenCurriculumRequest $request)
    {
        //
         //
         if ($request->hasFile('imagencurriculum')) {
            # code...
            $file=$request->file('imagencurriculum');
            $nombrefoto = date('YmdHis').str_replace(' ','',$file->getClientOriginalName()); 
            Storage::putFileAs('public/curriculums',$file,$nombrefoto);
            $request['imagen']=$nombrefoto;
        }
        $request->validate([
            'imagen'=>['required'],
            'detalle'=>['required'],
            'id_dcv'=>['required']
             ]);
        $detalle = DetalleCurriculum::findOrFail($request['id_dcv']);
        ImagenCurriculum::create($request->toArray());
        session()->flash('status','Successfully created image');
        return to_route('imagencurriculum.index',['detalle'=>$detalle]) ;
    }

    /**
     * Display the specified resource.
     */
    public function show(ImagenCurriculum $imagenCurriculum)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ImagenCurriculum $imagenCurriculum)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateImagenCurriculumRequest $request, ImagenCurriculum $imagenCurriculum)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ImagenCurriculum $imagenCurriculum)
    {
        //
    }
}

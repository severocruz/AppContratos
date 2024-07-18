<?php

namespace App\Http\Controllers;

use App\Models\Contrato;
use App\Models\DatosPer;
use App\Models\Nivel;
use App\Models\Cargos;
use App\Models\AutoridadesVb;
use App\Utils\PersonalUtil;
use Illuminate\Http\Request;
class ImpresionController extends Controller
{
    public function avc(Contrato $contrato, Request $request){
        $ut = new PersonalUtil();
        $datosPer = DatosPer::with('departamento')
        ->with('filePer')->findOrFail($contrato->id_per);
        $nivel = Nivel::findOrFail($contrato->id_niv);
        $cargo = Cargos::findOrFail($contrato->id_car);
        $rrhh = AutoridadesVb::with('user')->where('estado','=','1')->where('orden','=','1')->get()->first();
        $cop=$request->all()['cop'];
        return view("impresiones.avc",['ut'=>$ut,
                                    'persona'=>$datosPer,
                                    'contrato'=>$contrato,
                                    'nivel'=>$nivel,
                                    'cargo'=>$cargo,
                                    'rrhh'=>$rrhh,
                                    'cop'=>$cop]);
    }
    public function avisoBaja(Contrato $contrato, Request $request){
        $ut = new PersonalUtil();
        $datosPer = DatosPer::with('departamento')
        ->with('filePer')->findOrFail($contrato->id_per);
        $nivel = Nivel::findOrFail($contrato->id_niv);
        $cargo = Cargos::findOrFail($contrato->id_car);
        $rrhh = AutoridadesVb::with('user')->where('estado','=','1')->where('orden','=','1')->get()->first();
        $cop=$request->all()['cop'];
        return view("impresiones.avisobaja",['ut'=>$ut,
                                    'persona'=>$datosPer,
                                    'contrato'=>$contrato,
                                    'nivel'=>$nivel,
                                    'cargo'=>$cargo,
                                    'rrhh'=>$rrhh,
                                    'cop'=>$cop]);

    }
}
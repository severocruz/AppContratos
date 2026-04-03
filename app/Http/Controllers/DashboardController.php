<?php

namespace App\Http\Controllers;

use App\Models\Contrato;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index(){
        $hoy =  Carbon::today();
        $contratos = Contrato::with('datosPer')
                             ->with('centroDeSalud')
                             ->with('cargos')
                             ->with('estadoContrato')
                             ->where('id_esco','<>',2)
                             ->where('id_esco','<>',3)
                             ->where('fechaFin','<',$hoy)
                             ->get();

        return view('dashboard',['contratos'=>$contratos]);
    }
}

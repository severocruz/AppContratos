<?php

use App\Http\Controllers\ContratoController;
use App\Http\Controllers\DatosPerController;
use App\Http\Controllers\FilePerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ImpresionController;
use App\Http\Controllers\RequerimientoController;
use App\Http\Controllers\RevisionesReqController;
use App\Http\Controllers\VobofirmaController;
use App\Http\Controllers\CentroDeSaludController;
use App\Http\Controllers\CircularInstNalController;
use App\Http\Controllers\CircularInstRegController;
use App\Http\Controllers\CiteController;
use App\Http\Controllers\DocAdjuntoController;
use App\Http\Controllers\AutoridadesVbController;
use App\Http\Controllers\RevisorReqController;
// use App\Models\Vobofirma;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::middleware('auth')->group(function () {

    Route::view('/dashboard','dashboard')->name('dashboard');
        
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    
    Route::get('/personal',[DatosPerController::class,'index'])->name('personal.index');
    Route::get('/personalByCI', [DatosPerController::class,'geByCI'])->name('personal.getbyci');
    Route::get('/personalNew',[DatosPerController::class,'create'])->name('personal.new');
    Route::post('/personal', [DatosPerController::class,'store'])->name('personal.store');
    Route::get('/personal/{datosper}/edit',[DatosPerController::class,'edit'])->name('personal.edit');
    Route::put('/personal/{datosPer}',[DatosPerController::class,'update'])->name('personal.update');
    
    
    Route::get('/requerimientos',[RequerimientoController::class,'index'])->name('requerimiento.index');
    Route::get('/requerimientosNew',[RequerimientoController::class,'create'])->name('requerimiento.new');
    Route::post('/requerimientos', [RequerimientoController::class,'store'])->name('requerimiento.store');
    Route::get('/requerimientos/{requerimiento}/edit', [RequerimientoController::class,'edit'])->name('requerimiento.edit');
    Route::put('/requerimientos/{requerimiento}',[RequerimientoController::class,'update'])->name('requerimiento.update');
    Route::put('/requerimientos/{requerimiento}/status',[RequerimientoController::class,'updateStatus'])->name('requerimiento.updateStatus');
    Route::get('/requerimientos/{requerimiento}/show',[RequerimientoController::class,'show'])->name('requerimiento.show');
    Route::get('/requerimientos/{contrato}/newadenda',[RequerimientoController::class,'newAdenda'])->name('requerimiento.newadenda');

    Route::post('/revisionesreq', [RevisionesReqController::class,'store'])->name('revisionesreq.store');

    Route::get('/contratos', [ContratoController::class,'index'])->name('contrato.index');
    Route::get('contratosNew/{contrato}', [ContratoController::class,'create'])->name('contrato.new');
    Route::post('/contratos', [ContratoController::class,'store'])->name('contrato.store');
    Route::get('/contratos/{contrato}/edit', [ContratoController::class,'edit'])->name('contrato.edit');
    Route::put('/contratos/{contrato}',[ContratoController::class,'update'])->name('contrato.update');
    Route::get('/contratos/{contrato}/show',[ContratoController::class,'show'])->name('contrato.show');
    Route::get('/contratos/{contrato}/showadenda',[ContratoController::class,'showAdenda'])->name('contrato.showadenda');

    Route::post('/vobofirmas', [VobofirmaController::class,'store'])->name('vobofirma.store');

    Route::post('/filepers', [FilePerController::class,'store'])->name('fileper.store');

    Route::get('/impresiones/{contrato}/avc', [ImpresionController::class,'avc'])->name('impresion.avc');
    Route::get('/impresiones/{contrato}/avisobaja', [ImpresionController::class,'avisoBaja'])->name('impresion.avisobaja');
    Route::get('/impresiones/{contrato}/credencial', [ImpresionController::class,'credencial'])->name('impresion.credencial');

    Route::get('/centrosdesalud',[CentroDeSaludController::class,'index'])->name('centrodesalud.index');
    Route::get('/centrosdesaludNew',[CentroDeSaludController::class,'create'])->name('centrodesalud.new');
    Route::post('/centrosdesalud', [CentroDeSaludController::class,'store'])->name('centrodesalud.store');
    Route::get('/centrosdesalud/{centro}/edit',[CentroDeSaludController::class,'edit'])->name('centrodesalud.edit');
    Route::put('/centrosdesalud/{centro}',[CentroDeSaludController::class,'update'])->name('centrodesalud.update');

    Route::get('/circularinstnals',[CircularInstNalController::class,'index'])->name('circularinstnal.index');
    Route::get('/circularinstnalsNew',[CircularInstNalController::class,'create'])->name('circularinstnal.new');
    Route::post('/circularinstnals', [CircularInstNalController::class,'store'])->name('circularinstnal.store');
    Route::get('/circularinstnals/{circular}/edit',[CircularInstNalController::class,'edit'])->name('circularinstnal.edit');
    Route::put('/circularinstnals/{circular}',[CircularInstNalController::class,'update'])->name('circularinstnal.update');

    Route::get('/circularinstregs',[CircularInstRegController::class,'index'])->name('circularinstreg.index');
    Route::get('/circularinstregsNew',[CircularInstRegController::class,'create'])->name('circularinstreg.new');
    Route::post('/circularinstregs', [CircularInstRegController::class,'store'])->name('circularinstreg.store');
    Route::get('/circularinstregs/{circular}/edit',[CircularInstRegController::class,'edit'])->name('circularinstreg.edit');
    Route::put('/circularinstregs/{circular}',[CircularInstRegController::class,'update'])->name('circularinstreg.update');

    Route::get('/cites',[CiteController::class,'index'])->name('cite.index');
    Route::get('/citesNew',[CiteController::class,'create'])->name('cite.new');
    Route::post('/cites', [CiteController::class,'store'])->name('cite.store');
    Route::get('/cites/{cite}/edit',[CiteController::class,'edit'])->name('cite.edit');
    Route::put('/cites/{cite}',[CiteController::class,'update'])->name('cite.update');

    Route::get('/docadjuntos',[DocAdjuntoController::class,'index'])->name('docadjunto.index');
    Route::get('/docadjuntosNew',[DocAdjuntoController::class,'create'])->name('docadjunto.new');
    Route::post('/docadjuntos', [DocAdjuntoController::class,'store'])->name('docadjunto.store');
    Route::get('/docadjuntos/{doc}/edit',[DocAdjuntoController::class,'edit'])->name('docadjunto.edit');
    Route::put('/docadjuntos/{doc}',[DocAdjuntoController::class,'update'])->name('docadjunto.update');

    Route::get('/autoridadesvb',[AutoridadesVbController::class,'index'])->name('autoridadvb.index');
    Route::post('/autoridadesvb', [AutoridadesVbController::class,'store'])->name('autoridadvb.store');
    Route::get('/autoridadesvb/{autoridad}/edit',[AutoridadesVbController::class,'edit'])->name('autoridadvb.edit');
    Route::put('/autoridadesvb/{autoridad}',[AutoridadesVbController::class,'update'])->name('autoridadvb.update');

    Route::get('/revisoresreq',[RevisorReqController::class,'index'])->name('revisorreq.index');
    Route::post('/revisoresreq', [RevisorReqController::class,'store'])->name('revisorreq.store');
    Route::get('/revisoresreq/{revisor}/edit',[RevisorReqController::class,'edit'])->name('revisorreq.edit');
    Route::put('/revisoresreq/{revisor}',[RevisorReqController::class,'update'])->name('revisorreq.update');
});

require __DIR__.'/auth.php';

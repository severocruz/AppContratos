<?php

use App\Http\Controllers\ContratoController;
use App\Http\Controllers\DatosPerController;
use App\Http\Controllers\FilePerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ImpresionController;
use App\Http\Controllers\RequerimientoController;
use App\Http\Controllers\RevisionesReqController;
use App\Http\Controllers\VobofirmaController;
use App\Models\Vobofirma;
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

    Route::post('/revisionesreq', [RevisionesReqController::class,'store'])->name('revisionesreq.store');

    Route::get('/contratos', [ContratoController::class,'index'])->name('contrato.index');
    Route::get('contratosNew/{contrato}', [ContratoController::class,'create'])->name('contrato.new');
    Route::post('/contratos', [ContratoController::class,'store'])->name('contrato.store');
    Route::get('/contratos/{contrato}/edit', [ContratoController::class,'edit'])->name('contrato.edit');
    Route::put('/contratos/{contrato}',[ContratoController::class,'update'])->name('contrato.update');
    Route::get('/contratos/{contrato}/show',[ContratoController::class,'show'])->name('contrato.show');

    Route::post('/vobofirmas', [VobofirmaController::class,'store'])->name('vobofirma.store');

    Route::post('/filepers', [FilePerController::class,'store'])->name('fileper.store');

    Route::get('/impresiones/{contrato}/avc', [ImpresionController::class,'avc'])->name('impresion.avc');
    Route::get('/impresiones/{contrato}/avisobaja', [ImpresionController::class,'avisoBaja'])->name('impresion.avisobaja');
    Route::get('/impresiones/{contrato}/credencial', [ImpresionController::class,'credencial'])->name('impresion.credencial');

});

require __DIR__.'/auth.php';

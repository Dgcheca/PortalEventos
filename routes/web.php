<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TorneoController;
use App\Http\Controllers\EquipoController;
use App\Http\Controllers\InscripcionController;
use App\Http\Controllers\JuegoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//PARA QUE LA RUTA PRINCIPAL SIEMPRE SERA /INICIO
Route::get('/', function () {
    return redirect('inicio');
});
Route::get('/inicio', [TorneoController::class, 'index'])->name('inicio');

//RUTAS DE TORNEO
Route::prefix('/torneo')->group(function () {
    //INDEPENDIENTE DE ESTAR LOGUEADO
    Route::get('/{torneo}', [TorneoController::class, 'show'])->name('torneo.show');
    //SOLO SI ESTAS LOGUEADO
    Route::middleware(['auth'])->group(function () {
        Route::get('/nuevo/create', [TorneoController::class, 'create'])->name('torneo.create');
        Route::post('/', [TorneoController::class, 'store'])->name('torneo.store');
        Route::get('/{torneo}/edit', [TorneoController::class, 'edit'])->name('torneo.edit');
        Route::put('/{torneo}', [TorneoController::class, 'update'])->name('torneo.update');
        Route::get('/{torneo}/delete', [TorneoController::class, 'destroy'])->name('torneo.destroy');
        //EXTRA PARA LAS INSCRIPCIONES
    });
});
//RUTAS DE LOS EQUIPOS
Route::prefix('/equipos')->group(function () {
    Route::middleware(['auth'])->group(function () {
        Route::get('/', [EquipoController::class, 'index'])->name('equipo.index');
        Route::get('/nuevo/create', [EquipoController::class, 'create'])->name('equipo.create');
        Route::post('/', [EquipoController::class, 'store'])->name('equipo.store');
        Route::get('/{equipo}/delete', [EquipoController::class, 'destroy'])->name('equipo.destroy');
    });
});
//RUTAS DE LAS INSCRIPCIONES
Route::prefix('/inscripcion')->group(function () {
    Route::middleware(['auth'])->group(function () {
        Route::get('/{torneo}', [InscripcionController::class, 'create'])->name('inscripcion.create');
        Route::post('/{torneo}', [InscripcionController::class, 'store'])->name('inscripcion.store');
        Route::get('/{torneo}/{equipo}/delete', [InscripcionController::class, 'destroy'])->name('inscripcion.destroy');
    });
});

//RUTAS DE LOS JUEGOS
Route::prefix('/juegos')->group(function () {
    Route::middleware(['auth'])->group(function () {
        Route::get('/', [JuegoController::class, 'index'])->name('juegos.index');
        Route::get('/nuevo/create', [JuegoController::class, 'create'])->name('juegos.create');
        Route::post('/', [JuegoController::class, 'store'])->name('juegos.store');
        Route::get('/{juego}/delete', [JuegoController::class, 'destroy'])->name('juegos.destroy');
    });
});

require __DIR__ . '/auth.php';

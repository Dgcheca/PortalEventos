<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TorneoController;

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

Route::get('/', function(){return redirect('inicio');});
Route::get('/inicio',[TorneoController::class, 'index'])->name('inicio');

//RUTAS DE TORNEO
Route::prefix('/torneo')->group(function () {
    //INDEPENDIENTE DE ESTAR LOGUEADO
    Route::get('/{torneo}',[TorneoController::class, 'show'])->name('torneo.show');
    //SOLO SI ESTAS LOGUEADO
    Route::middleware(['auth'])->group(function () {
        Route::get('/nuevo/create',[TorneoController::class, 'create'])->name('torneo.create');
        Route::post('/',[TorneoController::class, 'store'])->name('torneo.store');
        Route::get('/{torneo}/edit',[TorneoController::class, 'edit'])->name('torneo.edit');
        Route::put('/{torneo}',[TorneoController::class, 'update'])->name('torneo.update');
        Route::get('/{torneo}/delete',[TorneoController::class, 'destroy'])->name('torneo.destroy');
    });
});
Route::get('/dashboard', function () {return view('dashboard');})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

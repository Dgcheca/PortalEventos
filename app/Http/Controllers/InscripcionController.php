<?php

namespace App\Http\Controllers;

use App\Models\Torneo;
use App\Models\Juego;
use App\Models\User;
use App\Models\Equipo;
use App\Http\Resources\TorneoResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InscripcionController extends Controller
{
    //METODO DE INSCRIPCION DE LOS USUARIOS AL TORNEO
    public function create($id)
    {
        $torneo = Torneo::find($id);
        $equipos = Equipo::all();
        return view('inscripcionTorneo', ['equipos' => $equipos, 'torneo' => $torneo]);
    }
    public function store(Request $request, $id)
    {
        $torneo = Torneo::find($id);
        $torneo->equipos()->attach($request->equipos);
        return redirect()->route('inicio');
    }
    public function destroy($torneoid, $equipoid)
    {
        $equipo = Equipo::find($equipoid);
        $equipo->torneos($torneoid)->detach();

        return redirect()->route('inicio');
    }

}

<?php

namespace App\Http\Controllers;

use App\Models\Torneo;
use App\Models\Juego;
use App\Models\User;
use App\Models\Equipo;
use App\Http\Resources\TorneoResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EquipoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()) {
            if (Auth::user()->rol == 'Admin') {
                $equipos = Equipo::paginate(10);
            } else if(Auth::user()->rol == 'Jugador') {
                $user = User::find(Auth::user()->id);
                $equipos = $user->equipos()->paginate(10);
            }
            return view('indexEquipos', ['equipos' => $equipos]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $usuarios = User::where('rol', 'Jugador')->get();
        return view('createEquipo', ['usuarios' => $usuarios]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validación
        $validated = $request->validate([
            'nombre' => 'required|max:255',
            'tipo' => 'required',
        ]);

        $equipo = new Equipo();
        $equipo->nombre = $request->nombre;
        $equipo->tipo = $request->tipo;
        $equipo->save();

        //COMPROBAMOS CUANTOS CAMPOS DE JUGADOR HABIA EN EL FORMULARIO Y VAMOS AGREGANDOLOS AL ARRAY
        $jugadores = array();
        array_push($jugadores, $request->jugador1);
        if (isset($request->jugador2)) {
            array_push($jugadores, $request->jugador2);
        }
        if (isset($request->jugador3)) {
            array_push($jugadores, $request->jugador3);
        }
        if (isset($request->jugador4)) {
            array_push($jugadores, $request->jugador4);
        }
        if (isset($request->jugador5)) {
            array_push($jugadores, $request->jugador5);
        }

        //HAYA CUANTOS HAYA EN EL ARRAY, VAMOS UNO A UNO METIENDOLOS EN LA BASE DE DATOS
        foreach ($jugadores as $jugador) {
            $id = $jugador;
            $equipo->users()->attach($id);
        }
        return redirect()->route('equipo.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Equipo  $equipo
     * @return \Illuminate\Http\Response
     */
    public function show(Equipo $equipo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Equipo  $equipo
     * @return \Illuminate\Http\Response
     */
    public function edit(Equipo $equipo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Equipo  $equipo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Equipo $equipo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Equipo  $equipo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $equipo = Equipo::find($id);
        //$this->authorize('delete', $equipo);
        $equipo->users()->detach();
        Equipo::destroy($id);

        return redirect()->route('equipo.index');
    }
}

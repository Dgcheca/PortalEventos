<?php

namespace App\Http\Controllers;

use App\Models\Torneo;
use App\Models\Juego;
use App\Models\User;
use App\Models\Equipo;
use App\Http\Resources\TorneoResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TorneoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $torneos = Torneo::orderBy('fecha')->paginate(10);
        return view('inicio', ['torneos' => $torneos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$this->authorize('create');
        
        $juegos = Juego::all();
        return view('createTorneo', ['juegos' => $juegos]);
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
            'descripcion' => 'required|max:255',
            'fecha' => 'required|min:'
        ]);
        if ($request->minutos < 10) {
            $minutos = '0' . $request->minutos;
        } else {
            $minutos = $request->minutos;
        }
        $hora_inicio = "" . $request->hora . ":" . $minutos;
        //Insercción
        $torneo = new Torneo;
        $torneo->juego_id = $request->juego_id;
        $torneo->fecha = $request->fecha;
        $torneo->hora_inicio = $hora_inicio;
        $torneo->descripcion = $request->descripcion;
        $torneo->aforo_maximo = $request->aforo;
        $torneo->nequipos = 0;
        $torneo->tipo = $request->tipo;
        $torneo->user_id = Auth::id();
        $torneo->save();
        return redirect()->route('inicio');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Torneo  $torneo
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $torneo = Torneo::findOrFail($id);
        $equipos = $torneo->equipos();
        $inscrito = true;
        return view('verTorneo', ['torneo' => $torneo, 'equipos' => $equipos, 'inscrito' => $inscrito]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Torneo  $torneo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $torneo = Torneo::findOrFail($id);
        $this->authorize('update', $torneo);
        $juegos = Juego::all();
        $hora = explode(':', $torneo->hora_inicio);
        return view('updateTorneo', ['torneo' => $torneo, 'juegos' => $juegos, 'hora' => $hora]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Torneo  $torneo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Validación
        $validated = $request->validate([
            'descripcion' => 'required|max:255',
            'fecha' => 'required|min:'
        ]);
        $torneo = Torneo::find($id);

        //CONVIERTE LAS HORAS Y MINUTOS AL FORMATO DE HORA
        if ($request->minutos < 10) {
            $minutos = '0' . $request->minutos;
        } else {
            $minutos = $request->minutos;
        }
        $hora_inicio = $request->hora . ":" . $minutos;

        $torneo = Torneo::find($id);
        $torneo->juego_id = $request->juego_id;
        $torneo->fecha = $request->fecha;
        $torneo->hora_inicio = $hora_inicio;
        $torneo->descripcion = $request->descripcion;
        $torneo->aforo_maximo = $request->aforo;
        $torneo->tipo = $request->tipo;
        $torneo->user_id = Auth::id();
        $torneo->save();

        return redirect()->route('inicio');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Torneo  $torneo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //$this->authorize('delete', $torneo);
        Torneo::destroy($id);

        return redirect()->route('inicio');
    }
}

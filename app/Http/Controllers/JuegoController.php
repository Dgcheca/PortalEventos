<?php

namespace App\Http\Controllers;

use App\Models\Torneo;
use App\Models\Juego;
use App\Models\User;
use App\Models\Equipo;
use App\Http\Resources\TorneoResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JuegoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $juegos = Juego::paginate(10);
        return view('indexJuegos', ['juegos' => $juegos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$this->authorize('create');
        return view('createJuego');
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
            'file' => 'mimes:jpeg,jpg,bmp,png'
        ]);

        $juego = new Juego;

        $juego->nombre = $request->nombre;
        $imagen = $request->file('file');
        $juego->imagen = base64_encode($imagen->openFile()->fread($imagen->getSize()));
        $juego->save();
        return redirect()->route('juegos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Juego  $juego
     * @return \Illuminate\Http\Response
     */
    public function show(Juego $juego)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Juego  $juego
     * @return \Illuminate\Http\Response
     */
    public function edit(Juego $juego)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Juego  $juego
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Juego $juego)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Juego  $juego
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Juego::destroy($id);

        return redirect()->route('juegos.index');
    }
}

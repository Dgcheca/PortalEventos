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
        //$torneos = TorneoResource::collection(Torneo::all());
        $torneos = Torneo::orderBy('fecha')->paginate(10); 
        return view('welcome',['torneos' => $torneos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Torneo  $torneo
     * @return \Illuminate\Http\Response
     */
    public function show(Torneo $torneo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Torneo  $torneo
     * @return \Illuminate\Http\Response
     */
    public function edit(Torneo $torneo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Torneo  $torneo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Torneo $torneo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Torneo  $torneo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Torneo $torneo)
    {
        //
    }
}

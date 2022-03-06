<?php

namespace App\Http\Resources;
use App\Models\Juego;
use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

class TorneoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'juego' => Juego::find($this->juego_id)->nombre,
            'fecha' => $this->fecha,
            'hora_inicio' => $this->hora_inicio,
            'descripcion' => $this->descripcion,
            'aforo_maximo' => $this->aforo_maximo,
            'nequipos' => $this->nequipos,
            'tipo' => $this->tipo,
            'organizador' => User::find($this->user_id)->nombre,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Juego;
use App\Models\User;

class Torneo extends Model
{
    public function juego(){
        return $this->belongsTo(Juego::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function equipos()
    {
        return $this->belongsToMany(Equipo::class)->withPivot('equipo_id');;
    }
}

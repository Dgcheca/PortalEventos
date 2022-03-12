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
    public function organizador(){
        return $this->belongsTo(User::class);
    }
}

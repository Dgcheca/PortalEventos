<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Torneo;

class Equipo extends Model
{
    use HasFactory;
    public function users()
    {
        return $this->belongsToMany(User::class)->withPivot('user_id');;
    }
    public function torneos()
    {
        return $this->belongsToMany(Torneo::class)->withPivot('torneo_id');;
    }
}

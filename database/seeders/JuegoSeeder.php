<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JuegoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('juegos')->insert([ 'nombre' => 'Street Fighter V', 'imagen' => 'streetfighterv.jpg']);
        DB::table('juegos')->insert([ 'nombre' => 'Guitar Hero Live', 'imagen' => 'guitarherolive.jpg']);
        DB::table('juegos')->insert([ 'nombre' => 'Dota2', 'imagen' => 'dota2.jpg']);
        DB::table('juegos')->insert([ 'nombre' => 'OverCooked 2', 'imagen' => 'overcooked2.jpg']);
        DB::table('juegos')->insert([ 'nombre' => 'Street of Rage 4', 'imagen' => 'streetofrage4.jpg']);
        DB::table('juegos')->insert([ 'nombre' => 'Pro Evolution Soccer', 'imagen' => 'pes2021.jpg']);
        DB::table('juegos')->insert([ 'nombre' => 'Pang Adventures', 'imagen' => 'pangadventures.jpg']);
    }
}

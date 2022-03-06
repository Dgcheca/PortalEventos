<?php

namespace Database\Seeders;

use DateTime;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TorneoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('torneos')->insert([ 'juego_id' => 1, 'fecha' => '2022-04-10', 'hora_inicio' => '10:00:00', 'aforo_maximo' => 1000, 'nequipos' => 0, 'tipo' => 1, 'user_id' => 2]);
        DB::table('torneos')->insert([ 'juego_id' => 2, 'fecha' => '2022-04-10', 'hora_inicio' => '20:00:00', 'aforo_maximo' => 600, 'nequipos' => 0, 'tipo' => 1, 'user_id' => 3]);
        DB::table('torneos')->insert([ 'juego_id' => 3, 'fecha' => '2022-04-12', 'hora_inicio' => '10:00:00', 'aforo_maximo' => 4000, 'nequipos' => 0, 'tipo' => 5, 'user_id' => 2]);
        DB::table('torneos')->insert([ 'juego_id' => 4, 'fecha' => '2022-04-12', 'hora_inicio' => '20:00:00', 'aforo_maximo' => 1500, 'nequipos' => 0, 'tipo' => 4, 'user_id' => 3]);
        DB::table('torneos')->insert([ 'juego_id' => 5, 'fecha' => '2022-04-14', 'hora_inicio' => '10:00:00', 'aforo_maximo' => 2500, 'nequipos' => 0, 'tipo' => 2, 'user_id' => 2]);
        DB::table('torneos')->insert([ 'juego_id' => 6, 'fecha' => '2022-04-14', 'hora_inicio' => '20:00:00', 'aforo_maximo' => 2000, 'nequipos' => 0, 'tipo' => 3, 'user_id' => 3]);
        DB::table('torneos')->insert([ 'juego_id' => 7, 'fecha' => '2022-04-15', 'hora_inicio' => '10:00:00', 'aforo_maximo' => 1200, 'nequipos' => 0, 'tipo' => 2, 'user_id' => 2]);
    }
}

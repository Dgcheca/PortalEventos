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
        DB::table('torneos')->insert([ 'juego_id' => 1, 'fecha' => '2022-04-10', 'hora_inicio' => '10:00:00', 'descripcion' => 'Torneaco de Street Fighter V 1vs1', 'aforo_maximo' => 1000, 'tipo' => 1, 'user_id' => 2]);
        DB::table('torneos')->insert([ 'juego_id' => 2, 'fecha' => '2022-04-10', 'hora_inicio' => '20:00:00', 'descripcion' => 'Torneaco de Guitar Hero Live 1vs1', 'aforo_maximo' => 600, 'tipo' => 1, 'user_id' => 3]);
        DB::table('torneos')->insert([ 'juego_id' => 3, 'fecha' => '2022-04-12', 'hora_inicio' => '10:00:00', 'descripcion' => 'Torneaco de Dota2, por supuesto en equipos completos de 5 jugadores',  'aforo_maximo' => 4000, 'tipo' => 5, 'user_id' => 2]);
        DB::table('torneos')->insert([ 'juego_id' => 4, 'fecha' => '2022-04-12', 'hora_inicio' => '20:00:00', 'descripcion' => 'Torneaco de OverCooked 2, Acumula puntos con un grupo de 4 personas',  'aforo_maximo' => 1500, 'tipo' => 4, 'user_id' => 3]);
        DB::table('torneos')->insert([ 'juego_id' => 5, 'fecha' => '2022-04-14', 'hora_inicio' => '10:00:00', 'descripcion' => 'Torneaco de Street of Rage 4. Limpia las calles con tu equipo de 2 personas',  'aforo_maximo' => 2500, 'tipo' => 2, 'user_id' => 2]);
        DB::table('torneos')->insert([ 'juego_id' => 6, 'fecha' => '2022-04-14', 'hora_inicio' => '20:00:00', 'descripcion' => 'Torneaco de Pro Evolution Soccer. Competicion para grupos de 3vs3',  'aforo_maximo' => 2000, 'tipo' => 3, 'user_id' => 3]);
        DB::table('torneos')->insert([ 'juego_id' => 7, 'fecha' => '2022-04-15', 'hora_inicio' => '10:00:00', 'descripcion' => 'Torneaco de Pang Adventures, combate a los alieligenas con un compañero',  'aforo_maximo' => 1200, 'tipo' => 2, 'user_id' => 2]);
    }
}

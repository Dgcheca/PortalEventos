<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([ 'nombre' => 'Admin Administrez', 'email' => 'admin@gmail.com', 'telefono' => '696969696', 'rol' => 'Admin', 'password' => Hash::make('jaroso22')]);
        DB::table('users')->insert([ 'nombre' => 'Pedro Organizator', 'email' => 'organi1@gmail.com', 'telefono' => '696969697', 'rol' => 'Organizador', 'password' => Hash::make('jaroso22')]);
        DB::table('users')->insert([ 'nombre' => 'Juan Organilez', 'email' => 'organi2@gmail.com', 'telefono' => '696969698', 'rol' => 'Organizador', 'password' => Hash::make('jaroso22')]);
        DB::table('users')->insert([ 'nombre' => 'Primero Segundez', 'email' => 'priseg@gmail.com', 'telefono' => '696969699', 'rol' => 'Jugador', 'password' => Hash::make('jaroso22')]);
        DB::table('users')->insert([ 'nombre' => 'Segundo Tercerez', 'email' => 'segter@gmail.com', 'telefono' => '696969691', 'rol' => 'Jugador', 'password' => Hash::make('jaroso22')]);
        DB::table('users')->insert([ 'nombre' => 'Tercero Cuartez', 'email' => 'tercua@gmail.com', 'telefono' => '696969692', 'rol' => 'Jugador', 'password' => Hash::make('jaroso22')]);
        DB::table('users')->insert([ 'nombre' => 'Cuarto Quintez', 'email' => 'cuaqui@gmail.com', 'telefono' => '696969693', 'rol' => 'Jugador', 'password' => Hash::make('jaroso22')]);
        DB::table('users')->insert([ 'nombre' => 'Quinto Sextez', 'email' => 'quisex@gmail.com', 'telefono' => '696969694', 'rol' => 'Jugador', 'password' => Hash::make('jaroso22')]);
        DB::table('users')->insert([ 'nombre' => 'Sexto Septimez', 'email' => 'sexsep@gmail.com', 'telefono' => '696969695', 'rol' => 'Jugador', 'password' => Hash::make('jaroso22')]);
        DB::table('users')->insert([ 'nombre' => 'Septimo Octavez', 'email' => 'sepoct@gmail.com', 'telefono' => '696969691', 'rol' => 'Jugador', 'password' => Hash::make('jaroso22')]);
        DB::table('users')->insert([ 'nombre' => 'Octavo Novenez', 'email' => 'octnov@gmail.com', 'telefono' => '696969682', 'rol' => 'Jugador', 'password' => Hash::make('jaroso22')]);
        DB::table('users')->insert([ 'nombre' => 'Noveno Decimez', 'email' => 'novdec@gmail.com', 'telefono' => '696969683', 'rol' => 'Jugador', 'password' => Hash::make('jaroso22')]);
        DB::table('users')->insert([ 'nombre' => 'Maximo Decimo Meridio', 'email' => 'legionfenix@gmail.com', 'telefono' => '696969684', 'rol' => 'Jugador', 'password' => Hash::make('jaroso22')]);
    }
}

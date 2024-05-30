<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PistaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('Pistas')->insert([
            'Tipo'=>'Futbol 7',
            'ubicacion'=>'Avd.Extremadura'
        ]);  
        DB::table('Pistas')->insert([
            'Tipo'=>'Futbol 11',
            'ubicacion'=>'Calle Pastor'
        ]);
        DB::table('Pistas')->insert([
            'Tipo'=>'Tenis',
            'ubicacion'=>'Calle Guerrero',
        ]);
        DB::table('Pistas')->insert([
            'Tipo'=>'Tenis',
            'ubicacion'=>'Calle buenavida'
        ]);
        DB::table('Pistas')->insert([
            'Tipo'=>'Padel',
            'ubicacion'=>'Calle alcala'
        ]);  DB::table('Pistas')->insert([
            'Tipo'=>'Padel',
            'ubicacion'=>'Calle vazquez'
        ]);  DB::table('Pistas')->insert([
            'Tipo'=>'Baloncesto',
            'ubicacion'=>'Calle almendral'
        ]);  DB::table('Pistas')->insert([
            'Tipo'=>'Baloncesto',
            'ubicacion'=>'Calle alfonso X'
        ]);
    }
}

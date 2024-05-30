<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class Admin extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'Nombre'=>'Admin',
            'Apellido'=>'admin',
            'DNI'=>'Admin',
            'Calle'=>'Admin',
            'Usuario'=>'Admin',
            'admin'=>'D',
            'email'=>'Admin@gmail.com',
            'password'=>Hash::make('Desarrollador1492')
        ]);  
    }
}

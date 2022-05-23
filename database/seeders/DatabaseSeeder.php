<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::create([
            'nombre' => "Administrador",
            'apellido_paterno' => "Administrador",
            'telefono_movil' => "1",
            'direccion' => "1",
            'status' => 1,
            'rut' => "123456",
            'email' => "admin@admin.cl",
            'password' => Hash::make("123456"),
            'rol' => "administrativo"
        ]);
    }
}

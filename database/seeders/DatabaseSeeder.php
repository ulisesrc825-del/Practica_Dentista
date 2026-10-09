<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Appointment;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Crear el usuario exclusivo para la Dentista
        User::updateOrCreate(
            ['email' => 'doctora@clinicadental.com'],
            [
                'name' => 'Dra. Especialista',
                'password' => Hash::make('password123'),
            ]
        );

        // 2. Poblar el MVP con citas de prueba
        Appointment::factory(15)->create();
    }
}
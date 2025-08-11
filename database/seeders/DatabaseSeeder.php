<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Crear usuario administrador
        User::create([
            'name' => 'Paola Yepez',
            'email' => 'comunicaciones@fuvidit.com',
            'password' => Hash::make('fuvidit2025'),
        ]);
    }
}

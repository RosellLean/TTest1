<?php

namespace Database\Seeders;

use App\Models\User;
use App\Enums\UserRole;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Usuario Agente
        User::create([
            'name' => 'Leandro Agente',
            'email' => 'leandrorosell26@gmail.com',
            'password' => Hash::make('userAgentPass'),
            'role' => UserRole::Agent,
        ]);

        // Usuario Regular
        User::create([
            'name' => 'Leandro Usuario',
            'email' => 'leandrousuario@example.com',
            'password' => Hash::make('userPass'),
            'role' => UserRole::User,
        ]);
        User::create([
            'name' => 'Juan Usuario',
            'email' => 'juanusuario@example.com',
            'password' => Hash::make('userPass'),
            'role' => UserRole::User,
        ]);
    }
}

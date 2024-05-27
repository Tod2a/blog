<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // On crée un admin
        \App\Models\User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'role_id' => 1,
        ]);

        // 10 auteurs
        \App\Models\User::factory(10)->create([
            'role_id' => 2,
        ]);

        // On crée notre utilisateur de test
        \App\Models\User::factory()->create([
            'name' => 'User User',
            'email' => 'test@example.com',
            'role_id' => 3,
        ]);

        // 30 utilisateurs lambda
        \App\Models\User::factory(30)->create([
            'role_id' => 3,
        ]);
    }
}

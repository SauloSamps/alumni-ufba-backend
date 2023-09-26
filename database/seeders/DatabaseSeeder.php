<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Leandro Barbosa',
            'email' => 'leandro@email.com',
        ]);

        User::factory()->create([
            'name' => 'Paulo Trigo',
            'email' => 'paulo@email.com',
        ]);

        User::factory()->create([
            'name' => 'Benjamin Anderson',
            'email' => 'benjamin@email.com',
        ]);

        User::factory()->create([
            'name' => 'Eduardo Goes',
            'email' => 'eduardo@email.com',
        ]);

        User::factory()->create([
            'name' => 'Laion Silva',
            'email' => 'laion@email.com',
        ]);

        User::factory()->create([
            'name' => 'Saulo Sampaio',
            'email' => 'saulo@email.com',
        ]);

        User::factory()->create([
            'name' => 'Diego Anjos',
            'email' => 'diego@email.com',
        ]);

        User::factory()->create([
            'name' => 'Victor Martinez',
            'email' => 'victor@email.com',
        ]);

        User::factory(10)->create();
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Deixamos APENAS a chamada para o seu UsuarioSeeder
        $this->call(UsuarioSeeder::class);
    }
}
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{
    public function run(): void
    {
        $dados = [
            'name' => 'Admin',
            'email' => 'admin@mail.com',
            'password' => Hash::make('123'), // Criptografa a senha para o Laravel conseguir ler
        ];

        // Verifica se o usuário já existe para não duplicar
        if (User::where('email', '=', $dados['email'])->count() == 0) {
            User::create($dados);
            $this->command->info('Usuário admin@mail.com criado com sucesso!');
        } else {
            $this->command->warn('O usuário admin@mail.com já existe no banco.');
        }
    }
}
<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Exibe a tela de login
    public function index() {
        return view('login.index');
    }

    // Valida os dados digitados e faz o login
    public function entrar(Request $req) {
        // Validação básica para garantir que os campos não venham vazios
        $req->validate([
            'email' => 'required|email',
            'senha' => 'required',
        ]);

        // Tenta autenticar usando o e-mail digitado e a senha digitada
        if (Auth::attempt(['email' => $req->email, 'password' => $req->senha])) {
            
            // ESSENCIAL PARA O LARAVEL REGENERAR A SESSÃO NO MAC/POSTGRES:
            $req->session()->regenerate();
            
            return redirect()->route('admin.cursos');
        }

        // Se falhar, volta para o login com uma mensagem de erro
        return redirect()->route('login')->withErrors(['login_erro' => 'E-mail ou senha incorretos.']);
    }

    // Desloga o usuário do sistema
    public function sair() {
        Auth::logout();
        return redirect()->route('login');
    }
}
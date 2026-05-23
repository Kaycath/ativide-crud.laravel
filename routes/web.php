<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CursoController;
use App\Http\Controllers\LoginController;

// 1. Rota da Home (Raiz do site)
Route::get('/', function () {
    return view('welcome');
});

// 2. Rotas de Autenticação (Login / Sair)
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login/entrar', [LoginController::class, 'entrar'])->name('login.entrar');
Route::get('/login/sair', [LoginController::class, 'sair'])->name('login.sair');

// 3. Grupo de rotas do Admin (Protegido por senha usando o Middleware 'auth')
Route::middleware(['auth'])->prefix('admin')->group(function () {
    
    // Listagem de cursos
    Route::get('/cursos', [CursoController::class, 'index'])->name('admin.cursos');
    
    // Criação/Salvar Cursos
    Route::get('/cursos/adicionar', [CursoController::class, 'adicionar'])->name('admin.cursos.adicionar');
    Route::post('/cursos/salvar', [CursoController::class, 'salvar'])->name('admin.cursos.salvar');
    
    // Edição/Atualizar Cursos
    Route::get('/cursos/editar/{id}', [CursoController::class, 'editar'])->name('admin.cursos.editar');
    Route::put('/cursos/atualizar/{id}', [CursoController::class, 'atualizar'])->name('admin.cursos.atualizar');
    
    // Exclusão de Cursos
    Route::get('/cursos/excluir/{id}', [CursoController::class, 'excluir'])->name('admin.cursos.excluir');
    
});
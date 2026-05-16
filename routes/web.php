<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CursoController;

// Rota principal (Home do site)
Route::get('/', function () {
    return view('welcome');
});

// Grupo de rotas do Admin (Todas começam com /admin/...)
Route::prefix('admin')->group(function () {
    
    // Lista todos os cursos
    Route::get('/cursos', [CursoController::class, 'index'])->name('admin.cursos');
    
    // Abre a tela com o formulário para adicionar
    Route::get('/cursos/adicionar', [CursoController::class, 'adicionar'])->name('admin.cursos.adicionar');
    
    // Recebe os dados do formulário e salva no banco de dados (POST)
    Route::post('/cursos/salvar', [CursoController::class, 'salvar'])->name('admin.cursos.salvar');
    
    // Abre a tela de edição carregando os dados do curso específico pelo {id}
    Route::get('/cursos/editar/{id}', [CursoController::class, 'editar'])->name('admin.cursos.editar');
    
    // Recebe as alterações da tela de edição e atualiza o banco de dados (PUT)
    Route::put('/cursos/atualizar/{id}', [CursoController::class, 'atualizar'])->name('admin.cursos.atualizar');
    
    // Deleta o curso do banco de dados com base no {id}
    Route::get('/cursos/excluir/{id}', [CursoController::class, 'excluir'])->name('admin.cursos.excluir');
    
});
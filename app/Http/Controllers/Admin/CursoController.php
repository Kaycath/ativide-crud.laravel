<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// Adicione esta linha bem aqui:
use App\Models\Curso; 

class CursoController extends Controller
{
    public function index() {
        $rows = Curso::all(); // Agora o Laravel vai saber quem é o "Curso"!
        return view('admin.cursos.index', compact('rows'));
    }

    public function adicionar() {
        return view('admin.cursos.adicionar');
    }

    public function editar($id) {
        $linha = Curso::find($id); // carrega o registro
        return view('admin.cursos.editar', compact('linha'));
    }

    public function excluir($id) {
        Curso::find($id)->delete(); // deleta o registro
        return redirect()->route('admin.cursos');
    }

    public function salvar(Request $req) {
        $dados = $req->all();
        
        // Adicione esta linha para limpar o token de segurança antes de mandar pro banco:
        unset($dados['_token']);

        if(isset($dados['publicado'])){
            $dados['publicado'] = 'sim';
        } else {
            $dados['publicado'] = 'nao';
        }

        if($req->hasFile('arquivo')){
            $imagem = $req->file('arquivo');
            $num = rand(1111,9999);
            $dir = "img/cursos/";
            $ex = $imagem->guessClientExtension();
            $nomeImagem = "imagem_".$num.".".$ex;
            $imagem->move($dir,$nomeImagem);
            $dados['imagem'] = $dir."/".$nomeImagem; 
        }

        Curso::create($dados);
        return redirect()->route('admin.cursos');
    }

    public function atualizar(Request $req, $id) {
        $dados = $req->all();
        
        // Adicione aqui também para garantir a edição:
        unset($dados['_token']); 
        unset($dados['_method']); // Limpa o método PUT também

        if(isset($dados['publicado'])){
            $dados['publicado'] = 'sim';
        } else {
            $dados['publicado'] = 'nao';
        }

        if($req->hasFile('arquivo')){
            $imagem = $req->file('arquivo');
            $num = rand(1111,9999);
            $dir = "img/cursos/";
            $ex = $imagem->guessClientExtension();
            $nomeImagem = "imagem_".$num.".".$ex;
            $imagem->move($dir,$nomeImagem);
            $dados['imagem'] = $dir."/".$nomeImagem;
        }

        Curso::find($id)->update($dados);
        return redirect()->route('admin.cursos'); 
    }
}
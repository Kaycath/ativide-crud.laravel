<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    // Esta linha é crucial! Ela autoriza apenas estes campos a entrarem no banco de dados
    protected $fillable = [
        'titulo', 
        'descricao', 
        'imagem', 
        'valor', 
        'publicado'
    ];
}
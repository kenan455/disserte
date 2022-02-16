<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Redacao extends Model
{
    use HasFactory;

    protected $table = "redacoes";

    protected $fillable = [
    	'autor',
    	'titulo',
    	'tema_redacao',
        'redacao',
        'corrigida',
        'user_id',
        'qtd_correcoes',
        'arquivo'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Servicos extends Model
{
    protected $table = "Servicos";
    protected $fillable = ['nome', 'descricao','preco', 'duracao'];
}

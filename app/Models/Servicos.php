<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Servico extends Model
{
    protected $table = "servicos"; // minúsculo e plural
    protected $fillable = ['nome', 'descricao', 'preco', 'duracao'];

    public function barbeiros()
    {
        return $this->belongsToMany(\App\Models\Barbeiro::class, 'barbeiro_servico', 'id_servico', 'id_barbeiro');
    }
}

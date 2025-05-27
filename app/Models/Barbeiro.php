<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barbeiro extends Model
{
    protected $table = "barbeiro";
    protected $fillable = ['nome', 'especialidade'];

    public function servicos()
    {
        return $this->belongsToMany(\App\Models\Servico::class, 'barbeiro_servico', 'id_barbeiro', 'id_servico');
    }
}

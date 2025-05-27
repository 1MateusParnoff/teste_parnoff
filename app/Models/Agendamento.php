<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Agendamento extends Model
{
    protected $table = "agendamentos";  // plural e minúsculo, caso sua tabela seja assim
    protected $fillable = ['id_cliente', 'id_barbeiro', 'id_servico', 'data_hora', 'status'];

    public function cliente()
    {
        return $this->belongsTo(\App\Models\Cliente::class, 'id_cliente');
    }

    public function barbeiro()
    {
        return $this->belongsTo(\App\Models\Barbeiro::class, 'id_barbeiro');
    }

    public function servico()
    {
        return $this->belongsTo(\App\Models\Servicos::class, 'id_servico');
    }
}

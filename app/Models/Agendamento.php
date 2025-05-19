<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Agendamento extends Model
{
    protected $table = "Agendamento";
    protected $fillable = ['id_cliente', 'id_barbeiro', 'data_hora', 'status'];
}

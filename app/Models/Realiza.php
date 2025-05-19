<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Realiza extends Model
{
    protected $table = "Realiza";
    protected $fillable = ['id_barbeiro', 'id_agendamento'];
}

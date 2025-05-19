<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barbeiros extends Model
{
    protected $table = "Barbeiro";
    protected $fillable = ['nome', 'especialidade'];
}

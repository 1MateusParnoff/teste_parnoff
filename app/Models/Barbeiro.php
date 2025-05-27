<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barbeiro extends Model
{
    protected $table = "barbeiro";
    protected $fillable = ['nome', 'especialidade'];
}

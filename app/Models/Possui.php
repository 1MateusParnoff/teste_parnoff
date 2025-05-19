<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Possui extends Model
{
    protected $table = "Possui";
    protected $fillable = ['id_barbearia', 'id_barbeiro'];
}

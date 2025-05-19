<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barbearia extends Model
{
    protected $table = "Barbearia";
    protected $fillable = ['nome', 'telefone', 'email', 'endereco'];
}

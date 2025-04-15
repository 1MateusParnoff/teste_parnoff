<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('barbearia', function (Blueprint $table) {
            $table->id(); 
            $table->unsigedBigInteger('id_agendamentos');
            $table->String('nome'); 
            $table->String('telefone');
            $table->email('email'); 
            $table->email('endereco'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};

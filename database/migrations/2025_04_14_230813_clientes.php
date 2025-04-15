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
        Schema::create('clientes', function (Blueprint $table) {
            $table->id(); 
            $table->unsigedBigInteger('id_agendamentos');
            $table->String('nome'); 
            $table->String('celular');
            $table->email('email'); 
            $table->timestamps();
            $table->foreign('id_agendamentos')->references('id')->on('agendamentos')->onDelete('cascade');
            
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

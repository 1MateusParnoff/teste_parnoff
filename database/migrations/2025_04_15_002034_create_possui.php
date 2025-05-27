<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('possui', function (Blueprint $table) {
            $table->unsignedBigInteger('id_servico');
            $table->unsignedBigInteger('id_agendamento');
            $table->timestamps();
        
            $table->foreign('id_servico')->references('id')->on('servicos')->onDelete('cascade');
            $table->foreign('id_agendamento')->references('id')->on('agendamentos')->onDelete('cascade');
        });        
    }


    public function down(): void
    {
        
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('realiza', function (Blueprint $table) {
            $table->unsignedBigInteger('id_barbeiros');
            $table->unsignedBigInteger('id_agendamentos');
            $table->timestamps();

            $table->foreign('id_barbeiros')->references('id')->on('barbeiro')->onDelete('cascade');
            $table->foreign('id_agendamentos')->references('id')->on('agendamentos')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('realiza');
    }
};

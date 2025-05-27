<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::table('clientes', function (Blueprint $table) {
            $table->foreign('id_agendamentos')->references('id')->on('agendamentos')->onDelete('cascade');
        });
    }


    public function down(): void
    {
        Schema::table('clientes', function (Blueprint $table) {
            
        });
    }
};

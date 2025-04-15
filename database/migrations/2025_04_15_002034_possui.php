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
        Schema::create('possui', function (Blueprint $table) {
            $table->id(); 
            $table->unsigedBigInteger('id_barbearia');
            $table->unsigedBigInteger('id_barbeiros');
            $table->timestamps();
            $table->foreign('id_barbeiros')->references('id')->on('barbeiros')->onDelete('cascade');
            $table->foreign('id_barbearia')->references('id')->on('barbearia')->onDelete('cascade');
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

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
        Schema::create('agendamentos', function (Blueprint $table) {
            $table->id(); 
            $table->unsignedBigInteger('id_cliente');
            $table->unsignedBigInteger('id_barbeiro');
            $table->dateTime('data_hora'); 
            $table->string('status'); 
            $table->timestamps();

            $table->foreign('id_barbeiro')->references('id')->on('barbeiros')->onDelete('cascade');
            $table->foreign('id_cliente')->references('id')->on('clientes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agendamentos');
    }
};

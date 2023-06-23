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
        Schema::create('indicacoes', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 50)->nullable();
            $table->string('cpf', 20)->nullable();
            $table->string('telefone', 30)->nullable();
            $table->string('email', 100)->nullable();
            $table->tinyInteger('status_id')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('indicacoes');
    }
};
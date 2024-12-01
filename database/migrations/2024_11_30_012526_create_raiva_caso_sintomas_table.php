<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('raiva_caso_sintomas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('raiva_id')->constrained('raivas')->onDelete('cascade');
            $table->foreignId('raiva_sintoma_id')->constrained('raiva_sintomas')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('raiva_caso_sintomas');
    }
};

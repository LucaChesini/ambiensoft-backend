<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('raiva_sintomas', function (Blueprint $table) {
            $table->id();
            $table->string('descricao');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('raiva_sintomas');
    }
};

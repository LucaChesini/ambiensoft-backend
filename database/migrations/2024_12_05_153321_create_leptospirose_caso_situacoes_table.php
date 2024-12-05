<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('leptospirose_caso_situacaos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('leptospirose_id')->constrained('leptospiroses')->onDelete('cascade');
            $table->foreignId('leptospirose_situacao_id')->constrained('leptospirose_situacaos')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('leptospirose_caso_situacoes');
    }
};

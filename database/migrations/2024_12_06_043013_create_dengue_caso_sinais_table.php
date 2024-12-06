<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('dengue_caso_sinals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dengue_id')->constrained('dengues')->onDelete('cascade');
            $table->foreignId('dengue_sinal_id')->constrained('dengue_sinals')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('dengue_caso_sinals');
    }
};

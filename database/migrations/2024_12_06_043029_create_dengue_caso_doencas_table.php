<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('dengue_caso_doencas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dengue_id')->constrained('dengues')->onDelete('cascade');
            $table->foreignId('dengue_doenca_id')->constrained('dengue_doencas')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('dengue_caso_doencas');
    }
};

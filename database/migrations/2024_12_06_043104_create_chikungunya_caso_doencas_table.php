<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('chikungunya_caso_doencas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('chikungunya_id')->constrained('chikungunyas')->onDelete('cascade');
            $table->foreignId('chikungunya_doenca_id')->constrained('chikungunya_doencas')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('chikungunya_caso_doencas');
    }
};

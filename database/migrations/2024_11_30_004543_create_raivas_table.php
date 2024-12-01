<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('raivas', function (Blueprint $table) {
            $table->id();
            $table->unsignedTinyInteger('tipo_exposicao');
            $table->unsignedTinyInteger('ferimento');
            $table->unsignedTinyInteger('localizacao_ferimento');
            $table->unsignedTinyInteger('especie_animal_agressor');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('raivas');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('arboviroses', function (Blueprint $table) {
            $table->id();
            $table->string('doenca');
            $table->string('unidade_saude');
            $table->string('nome');
            $table->date('data_nascimento');
            $table->integer('idade');
            $table->string('sexo', 1);
            $table->string('numero_sus');
            $table->string('municipio_residencia');
            $table->string('numero');
            $table->foreignId('bairro_id')->constrained('bairros')->onDelete('cascade');
            $table->foreignId('rua_id')->constrained('ruas')->onDelete('cascade');
            $table->morphs('arbovirosable');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('arboviroses');
    }
};

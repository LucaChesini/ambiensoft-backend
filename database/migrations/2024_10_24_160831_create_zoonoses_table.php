<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('zoonoses', function (Blueprint $table) {
            $table->id();
            $table->string('tipo_notificacao');
            $table->string('doenca');
            $table->date('data_notificacao');
            $table->string('uf_notificacao', 2);
            $table->string('municipio_notificacao');
            $table->string('codigo_ibge_notificacao');
            $table->string('unidade_saude');
            $table->string('codigo_unidade_saude');
            $table->date('data_primeiros_sintomas');
            $table->string('nome');
            $table->date('data_nascimento');
            $table->integer('idade');
            $table->string('sexo', 1);
            $table->tinyInteger('gestante');
            $table->tinyInteger('raca_cor');
            $table->tinyInteger('escolaridade');
            $table->string('numero_sus');
            $table->string('nome_mae');
            $table->string('uf', 2);
            $table->string('municipio_residencia');
            $table->string('codigo_ibge');
            $table->string('distrito');
            $table->string('bairro');
            $table->string('logradouro');
            $table->string('logradouro_codigo');
            $table->string('numero');
            $table->string('complemento');
            $table->string('geo_campo_1');
            $table->string('geo_campo_2');
            $table->string('ponto_referencia');
            $table->string('cep');
            $table->tinyInteger('zona');
            $table->string('pais');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('zoonoses');
    }
};

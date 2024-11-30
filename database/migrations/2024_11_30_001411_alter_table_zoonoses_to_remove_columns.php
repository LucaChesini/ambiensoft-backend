<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('zoonoses', function (Blueprint $table) {
            $table->dropColumn([
                'tipo_notificacao',
                'data_notificacao',
                'uf_notificacao',
                'municipio_notificacao',
                'codigo_ibge_notificacao',
                'codigo_unidade_saude',
                'data_primeiros_sintomas',
                'gestante',
                'raca_cor',
                'escolaridade',
                'nome_mae',
                'uf',
                'codigo_ibge',
                'distrito',
                'complemento',
                'geo_campo_1',
                'geo_campo_2',
                'ponto_referencia',
                'cep',
                'zona',
                'pais'
            ]);
        });
    }

    public function down(): void
    {
        Schema::table('zoonoses', function (Blueprint $table) {
            $table->string('tipo_notificacao');
            $table->date('data_notificacao');
            $table->string('uf_notificacao', 2);
            $table->string('municipio_notificacao');
            $table->string('codigo_ibge_notificacao');
            $table->string('codigo_unidade_saude');
            $table->date('data_primeiros_sintomas');
            $table->tinyInteger('gestante');
            $table->tinyInteger('raca_cor');
            $table->tinyInteger('escolaridade');
            $table->string('nome_mae');
            $table->string('uf', 2);
            $table->string('codigo_ibge');
            $table->string('distrito');
            $table->string('bairro');
            $table->string('logradouro');
            $table->string('logradouro_codigo');
            $table->string('complemento');
            $table->string('geo_campo_1');
            $table->string('geo_campo_2');
            $table->string('ponto_referencia');
            $table->string('cep');
            $table->tinyInteger('zona');
            $table->string('pais');
        });
    }
};

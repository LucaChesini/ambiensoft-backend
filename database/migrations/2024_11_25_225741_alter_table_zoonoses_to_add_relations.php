<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('zoonoses', function (Blueprint $table) {
            $table->dropColumn(['bairro', 'logradouro', 'logradouro_codigo']);
            $table->foreignId('bairro_id')->constrained('bairros')->onDelete('cascade');
            $table->foreignId('rua_id')->constrained('ruas')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('zoonoses', function (Blueprint $table) {
            $table->dropForeign(['bairro_id']);
            $table->dropForeign(['rua_id']);
            $table->dropColumn(['bairro_id', 'rua_id']);

            $table->string('bairro');
            $table->string('logradouro');
            $table->string('logradouro_codigo');
        });
    }
};

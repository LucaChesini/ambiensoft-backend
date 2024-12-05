<?php

namespace Database\Seeders;

use App\Enums\SituacaoRiscoLeptospirose;
use App\Models\LeptospiroseSituacao;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SituacaoLeptospiroseSeeder extends Seeder
{
    public function run(): void
    {
        $sintomas = SituacaoRiscoLeptospirose::getOptions();

        foreach ($sintomas as $codigo => $nome) {
            LeptospiroseSituacao::updateOrCreate(
                ['id' => $codigo],
                ['descricao' => $nome]
            );
        }

        $this->command->info('Tabela leptospirose_situacaos populada com sucesso');
    }
}

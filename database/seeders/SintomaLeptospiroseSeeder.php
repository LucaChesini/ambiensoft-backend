<?php

namespace Database\Seeders;

use App\Enums\SintomasLeptospirose;
use App\Models\LeptospiroseSintoma;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SintomaLeptospiroseSeeder extends Seeder
{
    public function run(): void
    {
        $sintomas = SintomasLeptospirose::getOptions();

        foreach ($sintomas as $codigo => $nome) {
            LeptospiroseSintoma::updateOrCreate(
                ['id' => $codigo],
                ['descricao' => $nome]
            );
        }

        $this->command->info('Tabela leptospirose_sintomas populada com sucesso');
    }
}

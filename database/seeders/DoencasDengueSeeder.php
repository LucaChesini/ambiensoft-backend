<?php

namespace Database\Seeders;

use App\Enums\DoencasPreExistentes;
use App\Models\DengueDoenca;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DoencasDengueSeeder extends Seeder
{
    public function run(): void
    {
        $sintomas = DoencasPreExistentes::getOptions();

        foreach ($sintomas as $codigo => $nome) {
            DengueDoenca::updateOrCreate(
                ['id' => $codigo],
                ['descricao' => $nome]
            );
        }

        $this->command->info('Tabela dengue_doencas populada com sucesso');
    }
}

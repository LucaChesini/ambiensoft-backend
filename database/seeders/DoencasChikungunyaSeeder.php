<?php

namespace Database\Seeders;

use App\Enums\DoencasPreExistentes;
use App\Models\ChikungunyaDoenca;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DoencasChikungunyaSeeder extends Seeder
{
    public function run(): void
    {
        $sintomas = DoencasPreExistentes::getOptions();

        foreach ($sintomas as $codigo => $nome) {
            ChikungunyaDoenca::updateOrCreate(
                ['id' => $codigo],
                ['descricao' => $nome]
            );
        }

        $this->command->info('Tabela chikungunya_doencas populada com sucesso');
    }
}

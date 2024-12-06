<?php

namespace Database\Seeders;

use App\Enums\SinaisClinicos;
use App\Models\ChikungunyaSinal;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SinaisChikungunyaSeeder extends Seeder
{
    public function run(): void
    {
        $sintomas = SinaisClinicos::getOptions();

        foreach ($sintomas as $codigo => $nome) {
            ChikungunyaSinal::updateOrCreate(
                ['id' => $codigo],
                ['descricao' => $nome]
            );
        }

        $this->command->info('Tabela chikungunya_sinals populada com sucesso');
    }
}

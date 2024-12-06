<?php

namespace Database\Seeders;

use App\Enums\SinaisClinicos;
use App\Models\DengueSinal;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SinaisDengueSeeder extends Seeder
{
    public function run(): void
    {
        $sintomas = SinaisClinicos::getOptions();

        foreach ($sintomas as $codigo => $nome) {
            DengueSinal::updateOrCreate(
                ['id' => $codigo],
                ['descricao' => $nome]
            );
        }

        $this->command->info('Tabela dengue_sinals populada com sucesso');
    }
}

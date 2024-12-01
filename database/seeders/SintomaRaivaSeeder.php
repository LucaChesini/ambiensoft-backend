<?php

namespace Database\Seeders;

use App\Enums\SintomasRaiva;
use App\Models\RaivaSintoma;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SintomaRaivaSeeder extends Seeder
{
    public function run(): void
    {
        $sintomas = SintomasRaiva::getOptions();

        foreach ($sintomas as $codigo => $nome) {
            RaivaSintoma::updateOrCreate(
                ['id' => $codigo],
                ['descricao' => $nome]
            );
        }

        $this->command->info('Tabela raiva_sintomas populada com sucesso');
    }
}

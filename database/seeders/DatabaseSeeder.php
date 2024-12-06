<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call(SintomaRaivaSeeder::class);
        $this->call(SintomaLeptospiroseSeeder::class);
        $this->call(SinaisDengueSeeder::class);
        $this->call(SinaisChikungunyaSeeder::class);
        $this->call(DoencasDengueSeeder::class);
        $this->call(DoencasChikungunyaSeeder::class);
    }
}

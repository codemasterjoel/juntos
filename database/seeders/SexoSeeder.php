<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Sexo;

class SexoSeeder extends Seeder
{
    public function run(): void
    {
        Sexo::insert([
            ['nombre' => 'MUJER'],
            ['nombre' => 'HOMBRE'],
            ['nombre' => 'INTERSEXUAL']
        ]);
    }
}

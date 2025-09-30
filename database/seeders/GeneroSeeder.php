<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Genero;

class GeneroSeeder extends Seeder
{
    public function run(): void
    {
        Genero::insert([
            ['nombre' => 'FEMENINO'],
            ['nombre' => 'MASCULINO'],
            ['nombre' => 'NO BINARIO/QUEER/GÉNERO FLUIDO']
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Genero;

class GeneroSeeder extends Seeder
{
    public function run(): void
    {
        Genero::created(['nombre' => 'FEMENINO']);
        Genero::created(['nombre' => 'MASCULINO']);
        Genero::created(['nombre' => 'NO BINARIO/QUEER/GÉNERO FLUIDO']);
    }
}

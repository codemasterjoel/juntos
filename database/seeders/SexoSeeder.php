<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Sexo;

class SexoSeeder extends Seeder
{
    public function run(): void
    {
        Sexo::created(['nombre' => 'MUJER']);
        Sexo::created(['nombre' => 'HOMBRE']);
        Sexo::created(['nombre' => 'INTERSEXUAL']);
    }
}

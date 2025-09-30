<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Entero;

class EnteroSeeder extends Seeder
{
    public function run(): void
    {
        Entero::insert([
            ['nombre' => 'GRAN MISION VUELTA LA PATRIA'],
            ['nombre' => 'REDES SOCIALES'],
            ['nombre' => 'RECOMENDACIÓN DE UN AMIGO'],
            ['nombre' => 'RECOMENDACIÓN DE ALGUN ESPECIALISTA'],
            ['nombre' => 'ACTIVIDAD COMUNITARIA'],
            ['nombre' => 'UNIVERSIDAD BOLIVARIANA DE VENEZUELA'],
            ['nombre' => 'GRAN MISIÓN VENEZUELA JOVEN']
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MotivoSeeder extends Seeder
{
    public function run(): void
    {
        $motivos = [
            ['nombre' => 'ME HE SENTIDO ANSIOSO'],
            ['nombre' => 'HE ESTADO DEPRIMIDO'],
            ['nombre' => 'HE ESTADO ESTRESADO'],
            ['nombre' => 'HE TENIDO FOBIAS'],
            ['nombre' => 'HE TENIDO PROBLEMAS CON LA ADICCIÓN'],
            ['nombre' => 'HE TENIDO PROBLEMAS FAMILIARES'],
            ['nombre' => 'HE TENIDO PROBLEMAS CON MI PAREJA'],
            ['nombre' => 'HE TENIDO PROBLEMAS EN MI COMUNIDAD'],
            ['nombre' => 'HE TENIDO PROBLEMAS EN MI TRABAJO'],
            ['nombre' => 'HE ESTADO EN DUELO POR LA PÉRDIDA DE UN TRABAJO'],
            ['nombre' => 'HE ESTADO EN DUELO POR LA PÉRDIDA DE UN FAMILIAR'],
            ['nombre' => 'HE ESTADO EN DUELO POR UNA PÉRDIDA MATERIAL'],
            ['nombre' => 'HE ESTADO EN DUELO POR LA MIGRACIÓN DE UN SER QUERIDO'],
            ['nombre' => 'HE SUFRIDO VIOLENCIA POR PARTE DE MI PAREJA'],
            ['nombre' => 'HE SUFRIDO VIOLENCIA DE GÉNERO'],
            ['nombre' => 'HE SUFRIDO VIOLENCIA LABORAL'],
            ['nombre' => 'HE SUFRIDO VIOLENCIA POLÍTICA'],
            ['nombre' => 'HE SUFRIDO VIOLENCIA SEXUAL'],
            ['nombre' => 'HE SUFRIDO VIOLENCIA CRIMINAL'],
            ['nombre' => 'HE SIDO VIOLENTO'],
            ['nombre' => 'HE TENIDO PROBLEMA CON MI AUTOESTIMA'],
            ['nombre' => 'HE TENIDO PROBLEMAS EN MI INSTITUCIÓN EDUCATIVA'],
            ['nombre' => 'QUIERO TRABAJAR EN MI SEXUALIDAD'],
            ['nombre' => 'QUIERO TRABAJAR EN MI PROYECTO DE VIDA'],
            ['nombre' => 'QUIERO CONOCERME MÁS'],
            ['nombre' => 'QUIERO HERRAMIENTAS DE CRIANZA PARA MIS HIJOS(AS)'],
            ['nombre' => 'QUIERO HERRAMIENTAS PARA MI EMBARAZO(PARTO Y POSTPARTO)'],
            ['nombre' => 'QUIERO TRABAJAR EN MI IDENTIDAD DE GÉNERO']
        ];

        foreach ($motivos as $motivo) {
            \App\Models\Motivo::create($motivo);
        }
    }
}

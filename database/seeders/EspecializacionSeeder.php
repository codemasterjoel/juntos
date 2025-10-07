<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Especializacion;

class EspecializacionSeeder extends Seeder
{
    public function run(): void
    {
        Especializacion::insert([
            ['nombre' => 'Cardiología'],
            ['nombre' => 'Dermatología'],
            ['nombre' => 'Neurología'],
            ['nombre' => 'Pediatría'],
            ['nombre' => 'Psiquiatría'],
            ['nombre' => 'Oncología'],
            ['nombre' => 'Ginecología'],
            ['nombre' => 'Endocrinología'],
            ['nombre' => 'Oftalmología'],
            ['nombre' => 'Ortopedia'],
            ['nombre' => 'Urología'],
            ['nombre' => 'Gastroenterología'],
            ['nombre' => 'Nefrología'],
            ['nombre' => 'Hematología'],
            ['nombre' => 'Reumatología'],
            ['nombre' => 'Infectología'],
            ['nombre' => 'Otorrinolaringología'],
            ['nombre' => 'Medicina Interna'],
            ['nombre' => 'Cirugía General'],
            ['nombre' => 'Anestesiología'],
            ['nombre' => 'Medicina Familiar'],
            ['nombre' => 'Medicina del Deporte'],
            ['nombre' => 'Medicina Preventiva'],
            ['nombre' => 'Radiología'],
            ['nombre' => 'Patología'],
            ['nombre' => 'Toxicología'],
            ['nombre' => 'Genética Médica'],
            ['nombre' => 'Medicina Paliativa'],
            ['nombre' => 'Psicología'],
            ['nombre' => 'Psiquitaría'],
            ['nombre' => 'Logopedia'],
            ['nombre' => 'Fisioterapia'],
            ['nombre' => 'Nutrición y Dietética'],
            ['nombre' => 'Epidemiología'],
            ['nombre' => 'Medicina del Trabajo'],
            ['nombre' => 'Medicina Forense'],
            ['nombre' => 'Cuidados Intensivos'],
            ['nombre' => 'Cirugía Plástica y Reconstructiva'],
        ]);
    }
}

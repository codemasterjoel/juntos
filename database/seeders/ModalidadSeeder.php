<?php

namespace Database\Seeders;
use App\Models\Modalidad;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ModalidadSeeder extends Seeder
{
    public function run(): void
    {
        Modalidad::insert([
            ['nombre' => 'PRESENCIAL'],
            ['nombre' => 'VIRTUAL'],
            ['nombre' => 'AMBAS'],
            ['nombre' => 'PRESENCIAL EN GRUPO'],
        ]);
    }
}
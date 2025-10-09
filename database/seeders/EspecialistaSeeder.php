<?php

namespace Database\Seeders;

use App\Models\Especialista;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EspecialistaSeeder extends Seeder
{
    public function run(): void
    {
        Especialista::create([
            'cedula' => '1',
            'nombre' => 'Administrador',
            'tlf_contacto' => '0000000000',
            'genero_id' => '1',
            'fecha_nac' => '1990-01-01',
            'edad' => 35,
            'estado_id' => '1',
            'municipio_id' => null,
            'parroquia_id' => null,
            'comuna_id' => null,
            'consejo_comunal_id' => null,
            'direccion' => null,
            'is_active' => true,
            'foto' => null,
            'especializacion_id' => null,
        ]);
        Especialista::create([
            'cedula' => '12345678',
            'nombre' => 'Juan Perez',
            'tlf_contacto' => '123456789',
            'genero_id' => '1',
            'fecha_nac' => '1990-01-01',
            'edad' => 31,
            'estado_id' => '1',
            'municipio_id' => '101',
            'parroquia_id' => '10105',
            'comuna_id' => '1723',
            'consejo_comunal_id' => '15558',
            'direccion' => 'Calle Falsa 123',
            'is_active' => true,
            'foto' => null,
            'especializacion_id' => '28',
        ]);
    }
}

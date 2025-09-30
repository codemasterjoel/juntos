<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


class DatabaseSeeder extends Seeder
{
    public function run()
    {

        $this->call([
            PaisSeeder::class,
            EstadoSeeder::class,
            MunicipioSeeder::class,
            ParroquiaSeeder::class,
            ComunaSeeder::class,
            ConsejoComunalSeeder::class,
            ConsejoComunal2Seeder::class,
            ConsejoComunal3Seeder::class,
            ConsejoComunal4Seeder::class,
            ConsejoComunal5Seeder::class,
            ConsejoComunal6Seeder::class,
            ConsejoComunal7Seeder::class,
            ConsejoComunal8Seeder::class,
            ConsejoComunal9Seeder::class,
            ConsejoComunal10Seeder::class,
            CentroSeeder::class,
            Centros2Seeder::class,
            Centros3Seeder::class,
            MotivoSeeder::class,
            EnteroSeeder::class,
            ModalidadSeeder::class,
            NivelAcademicoSeeder::class,
            GeneroSeeder::class,
            SexoSeeder::class,
            ProfesionSeeder::class,
            UserSeeder::class,
            RolePermissionSeeder::class
        ]);
    }
}
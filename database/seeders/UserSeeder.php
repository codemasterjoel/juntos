<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

// use Spatie\Permission\Models\Role;
// use Spatie\Permission\Models\Permission;
// use Spatie\Permission\Traits\HasRole;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::insert([
            ['name' => 'ADMINISTRADOR', 'email' => 'admin@email.com','password' => bcrypt('21246813'),'role' => 'admin',],
        ]);
        User::insert([
            ['name' => 'Juan Perez', 'email' => 'caracas@email.com','password' => bcrypt('caracas'), 'role' => 'especialista', 'especialista_id' => 1, ],
        ]);

    }
}

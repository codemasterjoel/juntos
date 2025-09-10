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
            ['name' => 'ADMINISTRADOR', 'email' => 'admin@email.com','password' => bcrypt('21246813'), 'estado_id' => '25', 'is_active' => true, 'especializacion' => ''],
            ['name' => 'caracas', 'email' => 'caracas@email.com','password' => bcrypt('caracas'), 'estado_id' => '1', 'is_active' => true, 'especializacion' => 'Medico General'],
        ]);

        // $user = User::Where('email', '=', 'admin@email.com')->get();
        // $user->assignRole('Admin');
    }
}

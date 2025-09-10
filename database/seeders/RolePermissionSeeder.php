<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        $adminRole = Role::create(['name' => 'admin']);
        $doctorRole = Role::create(['name' => 'doctor']);
        $pacienteRole = Role::create(['name' => 'paciente']);

        $permission = Permission::create(['name' => 'ver pacientes']);
        $permission = Permission::create(['name' => 'crear pacientes']);
        $permission = Permission::create(['name' => 'editar pacientes']);
        $permission = Permission::create(['name' => 'eliminar pacientes']);

        $permission = Permission::create(['name' => 'ver usuario']);
        $permission = Permission::create(['name' => 'crear usuario']);
        $permission = Permission::create(['name' => 'editar usuario']);
        $permission = Permission::create(['name' => 'eliminar usuario']);

        $permission = Permission::create(['name' => 'ver doctor']);
        $permission = Permission::create(['name' => 'crear doctor']);
        $permission = Permission::create(['name' => 'editar doctor']);
        $permission = Permission::create(['name' => 'eliminar doctor']);

        $AdminUser = User::find(1);
        $AdminUser->assignRole('admin');
        $permissionAdminUser = Permission::query()->pluck('name');
        $adminRole->syncPermissions($permissionAdminUser);

        $doctorRole->givePermissionTo(['ver pacientes', 'crear pacientes', 'editar pacientes']);

        // $DoctorUser = User::find(2);
        //$DoctorUser->assignRole('doctor');
        // $permissionDoctorUser = Permission::whereIn('name', ['ver pacientes', 'crear pacientes', 'editar pacientes'])->pluck('name');
        // $doctorRole->syncPermissions($permissionDoctorUser);
    }

}

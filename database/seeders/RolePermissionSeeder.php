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
        $especialistaRole = Role::create(['name' => 'especialista']);
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

        $permission = Permission::create(['name' => 'otros datos']);
        $permission = Permission::create(['name' => 'especialidad']);

        // $AdminUser = User::find(1);
        // $AdminUser->assignRole('admin');
        // $permissionAdminUser = Permission::query()->pluck('name');
        // $adminRole->syncPermissions($permissionAdminUser);
        $especialistaRole->givePermissionTo([
            'ver pacientes',
            'crear pacientes',
            'editar pacientes',
            'eliminar pacientes',
            'ver usuario',
            'crear usuario',
            'editar usuario',
            'eliminar usuario',
            'ver doctor',
            'crear doctor',
            'editar doctor',
            'eliminar doctor',
        ]);
        $especialistaRole->givePermissionTo(['ver pacientes', 'especialidad']);

        // $DoctorUser = User::find(2);
        // $DoctorUser->assignRole('doctor');
        // $permissionDoctorUser = Permission::whereIn('name', ['ver pacientes', 'crear pacientes', 'editar pacientes'])->pluck('name');
        // $doctorRole->syncPermissions($permissionDoctorUser);
    }

}

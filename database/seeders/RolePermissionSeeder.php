<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        // Crear permisos
        $permissions = [
            'ver usuarios',
            'crear usuarios',
            'editar usuarios',
            'eliminar usuarios',
        ];

        foreach ($permissions as $permiso) {
            Permission::firstOrCreate(['name' => $permiso]);
        }

        // Crear roles y asignar permisos
        $admin = Role::firstOrCreate(['name' => 'Administrador']);
        $usuario = Role::firstOrCreate(['name' => 'Usuario']);

        // Asignar permisos al rol admin
        $admin->givePermissionTo(Permission::all());
    }
}

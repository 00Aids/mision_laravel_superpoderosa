<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSedeer extends Seeder
{
      /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
     
        $admin = Role::create(['name' => 'admin']);
        $manager = Role::create(['name' => 'manager']);


        Permission::create(['name' => 'listar deporte']);
        Permission::create(['name' => 'actualizar deporte']);
        Permission::create(['name' => 'eliminar deporte']);
        Permission::create(['name' => 'index deporte']);

        Permission::create(['name' => 'listar equipo']);
        Permission::create(['name' => 'actualizar equipo']);
        Permission::create(['name' => 'eliminar equipo']);
        Permission::create(['name' => 'index equipo']);

        Permission::create(['name' => 'listar jugador']);
        Permission::create(['name' => 'actualizar jugador']);
        Permission::create(['name' => 'eliminar jugador']);
        Permission::create(['name' => 'index jugador']);

        Permission::create(['name' => 'listar entrenador']);
        Permission::create(['name' => 'actualizar entrenador']);
        Permission::create(['name' => 'eliminar entrenador']);
        Permission::create(['name' => 'index entrenador']);

        $admin ->givePermissionTo(Permission::all());
        $manager ->givePermissionTo([

            'listar equipo',
            'actualizar equipo',
            'eliminar equipo',
            'index equipo',

            'listar entrenador',
            'actualizar entrenador',
            'eliminar entrenador',
            'index entrenador',

            'listar jugador',
            'actualizar jugador',
            'eliminar jugador',
            'index jugador',
        ]);

    }

}
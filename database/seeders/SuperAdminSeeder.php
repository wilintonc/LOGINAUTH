<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usuario = User::create([
            'name' => 'Administrador creado automáticamente',
            'email' => 'userdefaultadmin@gmail.com',
            'password' => bcrypt('1234')
        ]);
        //$rol = Role::create(['name' => 'Administrador']);
        //$permisos = Permission::pluck('id', 'id')->all();
        //$rol->syncPermissions($permisos);
        //$usuario->assignRole([$rol->id]);
        $usuario->assignRole('Administrador');
    }
}

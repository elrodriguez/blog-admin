<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserRole extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $role = Role::create(['name' => 'Super Admin']);

        $permissions = [];

        array_push($permissions, Permission::create(['name' => 'seg_dashboard']));
        array_push($permissions, Permission::create(['name' => 'seg_usuarios']));
        array_push($permissions, Permission::create(['name' => 'seg_usuarios_nuevo']));
        array_push($permissions, Permission::create(['name' => 'seg_usuarios_editar']));
        array_push($permissions, Permission::create(['name' => 'seg_usuarios_eliminar']));
        array_push($permissions, Permission::create(['name' => 'seg_usuarios_ver']));
        array_push($permissions, Permission::create(['name' => 'seg_roles']));
        array_push($permissions, Permission::create(['name' => 'seg_roles_nuevo']));
        array_push($permissions, Permission::create(['name' => 'seg_roles_editar']));
        array_push($permissions, Permission::create(['name' => 'seg_roles_eliminar']));
        array_push($permissions, Permission::create(['name' => 'seg_permisos']));
        array_push($permissions, Permission::create(['name' => 'seg_permisos_nuevo']));
        array_push($permissions, Permission::create(['name' => 'seg_permisos_editar']));
        array_push($permissions, Permission::create(['name' => 'seg_permisos_eliminar']));
        array_push($permissions, Permission::create(['name' => 'blog_dashboard']));

        foreach ($permissions as $permission) {
            $role->givePermissionTo($permission->name);
        }

        $user = User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('12345678')
        ]);

        $user->assignRole('Super Admin');
    }
}

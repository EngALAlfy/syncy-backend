<?php

namespace Database\Seeders;

use App\Helpers\Roles;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionsRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        DB::table('permissions')->truncate();
        DB::table('roles')->truncate();
        DB::table('role_has_permissions')->truncate();
        DB::table('model_has_permissions')->truncate();
        DB::table('model_has_roles')->truncate();
        Schema::enableForeignKeyConstraints();

        foreach (Roles::cases() as $role) {
            Role::create(["id" => $role->value, "name" => $role->name, "guard_name" => "web"]);
        }

        Permission::create(["id" => 1, "name" => "posts.index", "guard_name" => "web"]);
        Permission::create(["id" => 2, "name" => "posts.store", "guard_name" => "web"]);
        Permission::create(["id" => 3, "name" => "posts.update", "guard_name" => "web"]);
        Permission::create(["id" => 4, "name" => "posts.delete", "guard_name" => "web"]);



    }
}

<?php

namespace Database\Seeders;

use App\Enums\PermissionEnum;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name' => PermissionEnum::CREATE_EVENT->value]);
        Permission::create(['name' => PermissionEnum::LIST_EVENTS->value]);
        Permission::create(['name' => PermissionEnum::VIEW_EVENT->value]);
        Permission::create(['name' => PermissionEnum::UPDATE_EVENT->value]);
        Permission::create(['name' => PermissionEnum::DELETE_EVENT->value]);
    }
}

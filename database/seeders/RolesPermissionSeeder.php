<?php

namespace Database\Seeders;

use App\Enums\Roles\PermsEnum;
use App\Enums\Roles\RolesEnum;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $founder = app(Role::class)->findOrCreate(RolesEnum::FOUNDER->value);
        $admin = app(Role::class)->findOrCreate(RolesEnum::ADMIN->value);
        $mod = app(Role::class)->findOrCreate(RolesEnum::MOD->value);
        $uploader = app(Role::class)->findOrCreate(RolesEnum::UPLOADER->value);
        $vip = app(Role::class)->findOrCreate(RolesEnum::VIP->value);
        $user = app(Role::class)->findOrCreate(RolesEnum::USER->value);

        Permission::create(['name' => PermsEnum::CREATE_MANGA->value]);
        Permission::create(['name' => PermsEnum::DELETE_MANGA->value]);
        Permission::create(['name' => PermsEnum::UPDATE_MANGA->value]);
        Permission::create(['name' => PermsEnum::DELETE_CHAPTER->value]);
        Permission::create(['name' => PermsEnum::CREATE_CHAPTER->value]);
        Permission::create(['name' => PermsEnum::UPDATE_CHAPTER->value]);

        $founder->syncPermissions(Permission::all());

        $admin->givePermissionTo([
            PermsEnum::CREATE_MANGA->value,
            PermsEnum::DELETE_MANGA->value,
            PermsEnum::UPDATE_MANGA->value,
            PermsEnum::CREATE_CHAPTER->value,
            PermsEnum::UPDATE_CHAPTER->value,
            PermsEnum::DELETE_CHAPTER->value,
        ]);

        $uploader->givePermissionTo([
            PermsEnum::CREATE_CHAPTER
        ]);

        //$mod->givePermissionTo([]);
        //$vip->givePermissionTo([]);
        //$user->givePermissionTo([]);
    }
}

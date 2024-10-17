<?php

namespace Database\Seeders;

use App\Enums\Roles\RolesEnum;
use App\Models\User\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserFounderSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = new User();
        $user->username = 'Eriton';
        $user->password = Hash::make('123456');
        $user->email = 'eriton@gmail.com';
        $user->save();

        $user->assignRole(RolesEnum::FOUNDER->value);
    }
}

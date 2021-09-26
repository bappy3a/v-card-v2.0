<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create admin
        User::updateOrCreate([
            'name' => 'Mr Admin',
            'email' => 'bappy@dev.local',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);
    }
}

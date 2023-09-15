<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'first_name' => 'Nicholas',
            'last_name' => 'Mabeya',
            'mobile' => '07000000000',
            'username' => 'nmabeya',
            'email' => 'nickmabeya5@gmail.com',
            'password' => Hash::make('Admin.'),
            'status' => 'activated',
        ]);

        // Get the "Administrator" role
        $adminRole = Role::where('name', 'Administrator')->first();

        // Assign the role to the user
        $user = User::where('email', 'nickmabeya5@gmail.com')->first();
        $user->assignRole($adminRole);

    }
}

<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserDefaultSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (! User::Where('email', 'user@default.com')->first()) {
            User::create([
                'name' => 'userDefault',
                'email' => 'user@default.com',
                'password' => Hash::make('password'),
            ]);
        }
    }
}

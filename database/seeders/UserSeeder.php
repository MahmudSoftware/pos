<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $user = [
            [
                'id' => '1', 'first_name' => 'Global','last_name' => 'Soft','phone' => '01750444499','email' => 'globalsoftbdltd@gmail.com', 'password' => Hash::make('123456789'), 'user_type' => '1', 'address' => 'Dhaka',
            ],
        ];

        foreach ($user as $user) {
            User::create($user);
        }
    }
}

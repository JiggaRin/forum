<?php

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name'              => 'User',
                'email'             => Str::random(10).'@gmail.com',
                'password'          => Hash::make('password'),
            ],
            [
                'name'              => 'admin',
                'email'             => Str::random(8).'@gmail.com',
                'password'          => Hash::make('12345678'),
            ],
        ];

            User::insert($users);
    }
}

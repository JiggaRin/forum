<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
        $data = [
            [
                'name'              => Str::random(10),
                'email'             => Str::random(10).'@gmail.com',
                'password'          => Hash::make('password'),
            ],
            [
                'name'              => 'admin',
                'email'             => Str::random(8).'@gmail.com',
                'password'          => Hash::make('12345678'),
            ],
        ];

            DB::table('users')->insert($data);
    }
}

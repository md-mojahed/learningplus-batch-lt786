<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use DB;
use Hash;

use App\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = 'Mojahed';
        $user->email = 'sourav@gmail.com';
        $user->password = Hash::make('abcs');
        $user->created_at = date('Y-m-d H:i:s');
        $user->save();

        User::insert([
            [
                'name' => 'Himel1',
                'email' => 'himel1@gmail.com',
                'password' => Hash::make('abcs'),
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'Himel2',
                'email' => 'himel2@gmail.com',
                'password' => Hash::make('abcs'),
                'created_at' => date('Y-m-d H:i:s')
            ]
        ]);
    }
}

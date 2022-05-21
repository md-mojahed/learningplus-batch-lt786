<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use DB;
use Str;

class FriendTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('friends')->insert([
            [
                'name' => 'Rahim',
                'age' => 31,
                'pocket_money' => 1000.00,
                'description' => Str::random(500),
                'skill' => Str::random(5000)
            ],
            [
                'name' => 'Karim',
                'age' => 21,
                'pocket_money' => 10000.00,
                'description' => Str::random(500),
                'skill' => Str::random(5000)
            ],
            [
                'name' => 'Rimon',
                'age' => 25,
                'pocket_money' => 5000.00,
                'description' => Str::random(500),
                'skill' => Str::random(5000)
            ]
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use DB;
use Str;

class FriendCourseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('friends_courses')->insert([
            [
                'name' => Str::random(10),
                'friend_id' => 1,
            ],
            [
                'name' => Str::random(10),
                'friend_id' => 1,
            ],
            [
                'name' => Str::random(10),
                'friend_id' => 2,
            ],
            [
                'name' => Str::random(10),
                'friend_id' => 2,
            ],
            [
                'name' => Str::random(10),
                'friend_id' => 3,
            ],
            [
                'name' => Str::random(10),
                'friend_id' => 3,
            ],
            [
                'name' => Str::random(10),
                'friend_id' => 3,
            ],
            [
                'name' => Str::random(10),
                'friend_id' => 3,
            ]
        ]);
    }
}

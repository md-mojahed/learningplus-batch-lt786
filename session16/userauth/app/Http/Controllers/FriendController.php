<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

use App\Models\Friend;

class FriendController extends Controller
{
    public function index()
    {
        $friends = DB::table('friends')
            ->select('friends.*', 'friends_courses.name as course_name')
            ->join('friends_courses', 'friends.id', '=', 'friends_courses.friend_id')
            ->get();
        return view('welcome', [
            'friends' => $friends
        ]);
    }

    public function friends()
    {
        $friends = Friend::with('courses')->get();

        return view('friends', [
            'friends' => $friends
        ]);
    }
}

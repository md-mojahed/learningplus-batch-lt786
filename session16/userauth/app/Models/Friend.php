<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Friend extends Model
{
    use HasFactory;

    public function courses()
    {
        return $this->hasMany(FriendCourse::class, 'friend_id', 'id');
    }
}

<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\FriendController;

Route::get('/', [FriendController::class, 'index']);
Route::get('/friends', [FriendController::class, 'friends']);

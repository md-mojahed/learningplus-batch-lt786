<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Auth;
use App\Models\User;

class HomeController extends Controller
{
    public function login()
    {
        return view('pages.login');
    }

    public function loginAction(Request $req)
    {
        $user = User::where('email', $req->email)->first();

        if (empty($user)) {
            abort(404);
        }

        if (Auth::attempt([
            'email' => $req->email,
            'password' => $req->password
        ])) {
            return redirect('/');
        }

        return "Invalid login";
    }

    public function home()
    {
        // echo "<pre>";
        return "LoggedIn";
    }
}

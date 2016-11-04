<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Http\Requests;

class UserController extends Controller
{
    public function index() {
        $user = Auth::user();

        $last_login = $user['updated_at']->toDateTimeString();

        return view('user.index')
            ->with('user', $user)
            ->with('username', $user->name)
            ->with('last_login', $last_login);
    }
}

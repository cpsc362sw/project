<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $user = Auth::user();

        if ($user->isAdmin()) {
            return redirect('admin');
        }

        $last_login = $user['updated_at']->toDateTimeString();

        // return redirect('user'); // Why can't I just do this? redirect('admin') above work, doesn't pass $user
        // even including '->with' etc. won't function

        return view('user.index')
            ->with('user', $user)
            ->with('username', $user->name)
            ->with('last_login', $last_login);
    }
}

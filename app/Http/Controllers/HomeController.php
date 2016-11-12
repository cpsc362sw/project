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
        } else if ($user->isUser()) {
            return redirect('user');
        } else if ($user->isManager()) {
            return redirect('manager');
        } else {
            return view('welcome');
        }
    }
}

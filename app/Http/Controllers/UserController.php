<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Timeclock;

class UserController extends Controller
{
    public function index() {
        $user = Auth::user();

        $entries = $user->getTodaysEntries();

        return view('user.index')
            ->with('user', $user)
            ->with('username', ucwords($user->name))
            ->with('today', date('m-d-Y'))
            ->with('entries', $entries);
    }
}

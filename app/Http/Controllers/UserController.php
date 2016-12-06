<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Timeclock;
use App\User;

class UserController extends Controller
{
    public function index() {
        $user = Auth::user();

        $entries = $user->getTodaysEntries();

        return view('user.index')
            ->with('user', $user)
            ->with('today', date('m-d-Y'))
            ->with('entries', $entries);
    }
    
    # user get edit time clock
    public function getEditTimeClock() {
        $user = Auth::user();
        $entries = $user->getTimeEntries();

    	return view('user.timeclock.index')
            ->with('user', $user)
            ->with('entries', $entries);
    }
    
    # user post edit time clock
    public function postEditTimeClock() {
        $user = Auth::user();
        $entry = new Timeclock;

        $entry->user_id = $user->id;
        $entry->action = $_POST['action'];
        $entry->time = date('Y-m-d H:i:s', time());

        $entry->save();

        return redirect('user')
            ->with('status', 'Time Logged Successfully.');
    }

    public function postEditEntryTime() {
        $id = $_POST['id'];
        $time = $_POST['time'];

        $entry = Timeclock::where('id', '=', $id)->first();

        $date = date('Y-m-d', strtotime($entry->time));
        $newTime = date('H:i:s', strtotime($time));

        $entry->time = $date . " " . $newTime;
        $entry->save();

        return redirect('user/timeclock');
    }
    
    public function getEditBenefits() {
        $user = Auth::user();
        
        return view('user.benefits.index')
        ->with('user', $user);
    }

    public function getProfile() {
        $user = Auth::user();

        return view('user.profile.index')
            ->with('user', $user);
    }
}

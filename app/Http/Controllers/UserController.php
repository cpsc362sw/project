<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Timeclock;
use App\Audit_Timeclock;
use App\User;
use App\FileUtilities;

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
        $entryType = array('time_in','lunch_out','lunch_in','time_out');

    	return view('user.timeclock.index')
            ->with('user', $user)
            ->with('entries', $entries)
            ->with('entryType', $entryType);
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
        $date = $_POST['date'];
        $id = $_POST['id'];
        $time = $_POST['time'];
        $user = Auth::user();

        // Create db entry with timeclock audit
        $entry = new Audit_Timeclock;
        $entry->user_id = $user->id;
        $entry->action = $_POST['type'];
        $newDate = preg_replace('/(\d{2})-(\d{2})-(\d{4})/', '$3-$1-$2', $date);
        $entry->time = $newDate . " " . $time;

        $entry->save();

        /*}
            // update existing record
            else {
            $entry = Timeclock::where('id', '=', $id)->first();
            $newEntry = new Audit_Timeclock;

            $date = date('Y-m-d', strtotime($entry->time));
            $newTime = date('H:i:s', strtotime($time));

            $newEntry->time = $date . " " . $newTime;
            $newEntry->save();
        }*/

        // TODO: Fix status message style in view
        return redirect('user/timeclock')
            ->with('status', 'Correction submitted!');
    }
    
    public function getEditBenefits() {
        $user = Auth::user();

        return view('user.benefits.index')
        ->with('user', $user);
    }
    
    public function postEditBenefits() {
    	
    	return view('user.index');
    }

    public function getProfile() {
        $user = Auth::user();

        return view('user.profile.index')
            ->with('user', $user);
    }

    public function postProfile(Request $request) {
        $user = Auth::user();

        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'avatar' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // accepted inputs
        $acceptedFields = ['name','email','job_title','home_phone','mobile_phone'];

        // find items by key in our POST variable
        $acceptedInput = array_intersect_key($_POST, array_flip($acceptedFields));

        if (!empty($_FILES['avatar']['name'])) {
            $tmp_name = $_FILES["avatar"]["tmp_name"];
            $file_name = $_FILES["avatar"]["name"];

            move_uploaded_file($tmp_name, public_path('img/avatars/') . $file_name);

            $user->avatar = '/img/avatars/' . $file_name;
        }

        $user->name = $acceptedInput['name'];
        $user->email = $acceptedInput['email'];
        $user->job_title = $acceptedInput['job_title'];
        $user->home_phone = $acceptedInput['home_phone'];
        $user->mobile_phone = $acceptedInput['mobile_phone'];
        $user->save();


        return view('user.profile.index')
            ->with('user', $user)
            ->with('success', "Profile Updated");
    }
}

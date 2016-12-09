<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Timeclock;
use App\Audit_Timeclock;
use App\User;
use App\FileUtilities;
use App\Benefit;

class UserController extends Controller
{
    public function index() {
        $user = Auth::user();

        $entries = $user->getTodaysEntries();
        
        # gets the benefits table associated with the user by ID
        $benefits = Benefit::where('user_id', '=', $user->id)->first();
        
        return view('user.index')
            ->with('user', $user)
            ->with('today', date('m-d-Y'))
            ->with('entries', $entries)
            ->with('benefits', $benefits);
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
    	# all the values being received from the view
    	$health = $_POST['health'];
    	$vision = $_POST['vision'];
    	$dental = $_POST['dental'];
    	$life = $_POST['life'];
    	$retirement = $_POST['retirement'];
    	$first_1 = $_POST['firstname1'];
    	$last_1 = $_POST['lastname1'];
    	$relation_1 = $_POST['relation1'];
    	$first_2 = $_POST['firstname2'];
    	$last_2 = $_POST['lastname2'];
    	$relation_2 = $_POST['relation2'];
    	$first_3 = $_POST['firstname3'];
    	$last_3 = $_POST['lastname3'];
    	$relation_3 = $_POST['relation3'];
    	$first_4 = $_POST['firstname4'];
    	$last_4 = $_POST['lastname4'];
    	$relation_4 = $_POST['relation4'];
    	
    	# storing values into the database
    	$benefits = new Benefit;
    	$user = Auth::user();
    	
    	$benefits->user_id = $user->id;
    	$benefits->health = $health;
    	$benefits->vision = $vision;
    	$benefits->dental = $dental;
    	$benefits->life = $life;
    	$benefits->retirement = $retirement;
    	$benefits->first_1 = $first_1;
    	$benefits->last_1 = $last_1;
    	$benefits->relation_1 = $relation_1;
    	$benefits->first_2 = $first_2;
    	$benefits->last_2 = $last_2;
    	$benefits->relation_2 = $relation_2;
    	$benefits->first_3 = $first_3;
    	$benefits->last_3 = $last_3;
    	$benefits->relation_3 = $relation_3;
    	$benefits->first_4 = $first_4;
    	$benefits->last_4 = $last_4;
    	$benefits->relation_4 = $relation_4;
    	$benefits->save();
    	
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

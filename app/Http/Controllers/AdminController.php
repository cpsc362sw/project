<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\CalendarEvent;
use Form;

use App\Http\Requests;

class AdminController extends Controller
{

    /**
     * Make the index into a pure dashboard with just links, we will have a users page etc.
     * user will have a static table with the information which will include basic info.
     * Alternate table row colors, with button hidden, when hover adjust color and show buttons.
     *
     * Add filtering.
     *
     */

    /**
     * @return $this
     */
    public function index() {
        $user = Auth::user();

        return view('admin.index')
            ->with('user', $user);
    }

    /**
     * get all users
     *
     * @return $this
     */
    public function getUsers() {
        $user = Auth::user();
        $users = User::all();

        return view('admin.users.index')
            ->with('user', $user)
            ->with('users', $users);
    }

    /**
     * get user for editting
     *
     * @param $id
     *
     * @return $this
     */
    public function getEditUser($id) {
        $user = User::where('id', '=', $id)->first();
        $role = Role::all()->pluck('name','id');

        return view('admin.users.edit')
            ->with('user', $user)
            ->with('role', $role);
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postEditUser(Request $request, $id) {
        $active_user = Auth::user();
        $user = User::where("id", "=", $id)->first();

        // Prevent admins from manipulating their role
        if ($user->id == $active_user->id &&
            $request->role_id != $active_user->role_id) {
            return redirect('admin')
                ->with('status', 'No changes made. You may not edit your role!');
        } else {
            $user->name = $request->name;
            $user->email = $request->email;
            $user->role_id = $request->role_id;
            $user->save();

            return redirect('admin')
                ->with('status', 'User updated!');
        }
    }

    /**
     * delete user by id, approval
     *
     * @param $id
     *
     * @return $this
     */
    public function getDeleteUser($id) {
        $user = User::where('id', '=', $id)->first();

        return view('admin.users.delete')
            ->with('user', $user);
    }

    /**
     * delete user by id
     *
     * @param Request $request
     * @param $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postDeleteUser(Request $request, $id) {
        $active_user = Auth::user();
        $user = User::where('id', '=', $id)->first();

        // Prevent admins from deleting themselves
        if ($user->id == $active_user->id) {
            return redirect('admin')
                ->with('status', 'No changes made. You may not delete yourself!');
        } else {
            $user->delete();

            return redirect('admin')
                ->with('status', 'User deleted!');
        }
    }

    /**
     * get calendar event creator
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getCalendar() {
        return view('admin.calendar.index');
    }

    /**
     * create calendar event
     *
     * @return $this
     */
    public function postCalendar() {
        $user = Auth::user();
        $event = new calendarEvent;

        $event->user_id = $user->id;
        $event->date = date('Y-m-d', strtotime($_POST['date']));
        $event->title = $_POST['title'];
        $event->description = $_POST['description'];
        $event->save();

        return view('admin.calendar.index')
            ->with('success', 'Calendar Event: '. $_POST['title'] . ' on ' . $_POST['date'] . " created");
    }

    /**
     * ajax request to retrieve events
     */
    public function getEventsAjax() {
        $events = CalendarEvent::getEvents();

        return json_encode($events);
    }


    public function getTimeClock() {
        $users = User::where('role_id', '=', '3')->get();
        return view('admin.timeclock.index')
            ->with('users', $users);
    }

    public function getTimeClockView($id) {
        $user = User::where('id', '=', $id)->first();
        $entries = $user->getTimeEntries();

        return view('admin.timeclock.view')
            ->with('user', $user)
            ->with('entries', $entries);
    }

    public function getTimeClockAudit($id) {
        $user = User::where('id', '=', $id)->first();
        $entries = $user->getTimeAuditEntries();
        $oldEntries = $user->getTimeEntries();

        return view('admin.timeclock.audit')
            ->with('user', $user)
            ->with('entries', $entries);
    }

    public function postTimeClock() {
        $id = ($_POST['id']);

        return redirect('admin/timeclock/audit/' . $id);
    }

    /*
    public function postTimeClock() {
    	# retrieves and stores the action value from the post data
    	$action = ($_POST['action']);
    	
    	# retrieves the current time with the format YYYY-MM-DD HH:MM:SS in 24 hour format
    	$time_stamp = date("Y-m-d H:i:s");
    	
    	# retrieves and stores user id
    	$id = Auth::user()->id;
    	
    	# checks to see if any values are empty
    	if(empty($time_stamp) || empty($action) || empty($id)) {
    		Redirect::back()->withErrors(['msg', 'Missing values']);
    	} 	
    	
    	# NEED TO IMPLEMENT AFTER CLASSES HAVE BEEN MADE: saving to database
    	
    	# $timeclock = new Timeclock();
    	# $timeclock->id = $id;
    	# $timeclock->action = $action;
    	# $timeclock->time_stamp = $time_stamp;
    	# $timeclock->save();
    	
    	return view('admin.timeclock.index')->withSuccess("Time clocked successfully!");
    }
    */
}

<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
use App\Role;

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

    public function getUsers() {
        $user = Auth::user();
        $users = User::all();

        return view('admin.users.index')
            ->with('user', $user)
            ->with('users', $users);
    }

    public function getEditUser($id) {
        $user = User::where('id', '=', $id)->first();

        return view('admin.users.edit')
            ->with('user', $user);
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postEditUser(Request $request, $id) {
        $user = User::where("id", "=", $id)->first();

        $user->name = $request->name;
        $user->email = $request->email;

        if($role_id = Role::$roles[$request->role]) {
            $user->role_id = $role_id;
        }

        $user->save();

        return redirect('admin')->with('status', 'User updated!');
    }

    public function getDeleteUser($id) {
        $user = User::where('id', '=', $id)->first();

        return view('admin.users.delete')
            ->with('user', $user);
    }

    public function postDeleteUser($id) {
        $user = User::where('id', '=', $id)->first();

        return redirect('admin')->with('status', 'User deleted!');
    }

    public function getCalendar() {

        return view('admin.calendar.index');
    }

    public function getTimeClock() {

        return view('admin.timeclock.index');
    }
    
    public function postTimeClock() {
    
    	return view('admin.timeclock.index');
    }
    
    public function getPayroll() {

        return view('admin.payroll.index');
    }
}

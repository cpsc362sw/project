<?php

namespace App;

use App\Role;
use App\Timeclock;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Quick Reference:
 *
 * functions:

 * roles()
 * getRoleTitle()
 *
 * getPermissions()
 * getPermissionTitles()
 *
 * hasPermission()
 *
 * isAdmin()
 * isManager()
 * isUser()
 *
 */
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Return the role attached to a user.
     *
     * Available:
     *  ->id
     *  ->name
     *  ->display_name
     *  ->description
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function roles() {
        return $this->hasOne('App\Role', 'id', 'role_id');
    }

    public function timeEntries() {
        return $this->hasMany('App\Timeclock', 'user_id', 'id');
    }

    /**
     * Returns our display_name
     *
     * @return mixed
     */
    public function getRoleTitle() {
        return $this->roles->name;
    }

    /**
     * Access and return our permission objects.
     *
     * Available:
     *  ->id
     *  ->name
     *  ->display_name
     *  ->description
     *
     * @return mixed
     */
    public function getPermissions() {
        return $this->roles->permissions;
    }

    /**
     * Returns an array of the permission names
     *
     * @return array
     */
    public function getPermissionTitles() {
        foreach ($this->getPermissions() as $permission) {
            $permissions[] = $permission->name;
        }

        return $permissions;
    }

    /**
     * returns true if $challenge (the item to be checked)
     * exists in the users array of permissions.
     *
     * NOTE: this is mostly for future developments
     * if we add more permissions.
     *
     * @param string $challenge
     * @return bool
     */
    public function hasPermission($challenge) {
        if ($this->isAdmin()) {
            return true;
        }

        return (in_array($challenge, $this->getPermissionTitles()));
    }

    /**
     * Wrapper to see if a user is an admin.
     *
     * @return bool
     */
    public function isAdmin() {
        return ($this->roles->name == 'admin');
    }

    /**
     * Wrapper to see if a user is a manager.
     *
     * @return bool
     */
    public function isManager() {
        return ($this->roles->name == 'manager');
    }

    /**
     * Wrapper to see if a user is a general user.
     *
     * @return bool
     */
    public function isUser() {
         return ($this->roles->name == 'user');
     }


    /**
     * Get only todays entries for a user, pluck only what we need in array format.
     *  ['action' => 'timestamp'] for easy iteration.
     *
     * @return mixed
     */
     public function getTodaysEntries() {
         return Timeclock::where('user_id', '=', $this->id)
             ->whereRaw('Date(`time`) = CURDATE()')->pluck('time','action')->toArray();
     }


    /**
     * TODO: return items
     */
     public function getTimeEntries() {
         $entries = $this->timeEntries;

         if ($entries) {
             $time_in = [];
             $time_out = [];
             $lunch_in = [];
             $lunch_out = [];

             foreach ( $entries as $entry ) {
                switch($entry->action) {
                    case 'time_in':
                        $time_in[] = $entry;
                        break;
                    case 'time_out':
                        $time_out[] = $entry;
                        break;
                    case 'lunch_in':
                        $lunch_in[] = $entry;
                        break;
                    case 'lunch_out':
                        $lunch_out[] = $entry;
                        break;
                }
             }
         } else {
             null;
         }
     }
}

<?php

namespace App;

use App\Role;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

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
    public function getRoleTitles() {
        foreach ($this->getPermissions() as $permission) {
            $permissions[] = $permission->name;
        }

        return $permissions;
    }

    /**
     * Simple integer challenge to see if user is admin. (role 1)
     *
     * @return bool
     */
    public function isAdmin() {
        return ($this->role_id == 1);
    }

    /**
     * Returns our display_name
     *
     * @return mixed
     */
    public function getRoleName() {
        return $this->roles->name;
    }
}

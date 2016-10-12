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
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function roles() {
        return $this->hasOne('Role', 'id', 'role_id');
    }

    public function get() {
        return $this;
    }

    public function isAdmin() {
        return ($this->role_id == 1);
    }

    public function getPrettyRole() {
        $this->role_id;
    }
}

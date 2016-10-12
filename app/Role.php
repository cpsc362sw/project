<?php

namespace App;

use App\Role_Permission;
use App\Permission;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public static $roles = ['admin' => 1, 'user' => 2];
    /**
     * Get all permissions
     *
     * need to refactor this badly.  should be using eloquent relations to get the permissions
     *
     * @return mixed
     */
    public function permissions() {
        return $this->belongsToMany('App\Permission', 'role__permissions', 'role_id', 'permission_id');
    }

    public function user() {
        return $this->belongsTo('App\User', 'id', 'id');
    }
}

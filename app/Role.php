<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    /**
     * Get all permissions
     *
     * need to refactor this badly.  should be using eloquent relations to get the permissions
     *
     * @return mixed
     */
    public function permissions() {
        return $this->belongsToMany('Permissions', 'roles_permissions', 'role_id', 'permission_id');
    }

    public function user() {
        return $this->belongsTo('User', 'id', 'id');
    }
}

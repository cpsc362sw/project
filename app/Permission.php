<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function roles() {
        return $this->belongsToMany('Roles', 'roles_permissions', 'permission_id', 'role_id');
    }

    public function users() {
        return $this->belongsToMany('Users', 'id', 'id');
    }
}

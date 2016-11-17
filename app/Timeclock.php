<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Timeclock extends Model
{
    public function users() {
        return $this->belongsToMany('App\User', 'id', 'user_id');
    }
}

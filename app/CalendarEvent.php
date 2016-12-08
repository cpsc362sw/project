<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CalendarEvent extends Model
{
    public static function getEvents() {
        return self::all()->pluck('title', 'date');
    }
}

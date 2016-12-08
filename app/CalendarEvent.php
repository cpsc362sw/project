<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CalendarEvent extends Model
{
    public static function getEventsAjax() {
        return self::all()->pluck('title', 'date');
    }

    public static function getEvents() {
        return self::whereRaw('Date(date) >= CURDATE() LIMIT 5')->get();
    }
}

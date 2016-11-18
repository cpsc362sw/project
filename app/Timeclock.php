<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Timeclock extends Model
{
    public function users() {
        return $this->belongsToMany('App\User', 'id', 'user_id');
    }

    public static function getTimeDiff($group) {
        $timeStart = 0;
        $timeEnd = 0;

        foreach ($group as $entry) {
            if ($entry->action == 'time_in') {
                $timeStart = $entry->time;
            }
            if ($entry->action == 'time_out') {
                $timeEnd = $entry->time;
            }
        }

        if (!$timeStart || !$timeEnd) {
            return "Incomplete.";
        }

        $dateStart = strtotime($timeStart);
        $dateEnd = strtotime($timeEnd);

        $interval = $dateEnd - $dateStart;

        $time = date('h:i:s', $interval);

        return $time;
    }

}

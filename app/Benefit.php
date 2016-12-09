<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Benefit extends Model
{
	public function getHealth() {
             return $this->health;
	}
}

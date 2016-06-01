<?php

class Space extends Eloquent {

	protected $table = 'spaces_ads';

	public function advertise () {
		return $this->hasOne('Advertise', 'uid', 'advertise_uid');
	}

	public function taken () {
		return $this->advertise_uid != '';
	}

	public static function get ($uid) {
		$spaces = Space::where('uid', '=', $uid)->take(1)->get();
		$space = $spaces[0];
		return $space;
	}
}

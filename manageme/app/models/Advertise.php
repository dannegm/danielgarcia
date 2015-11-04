<?php

class Advertise extends Eloquent {

	protected $table = 'advertises';

	public function author () {
		return $this->hasOne('User', 'uid', 'author_uid');
	}

	public function banner () {
		return $this->hasOne('Picture', 'uid', 'picture_uid');
	}
	public function space () {
		return $this->hasOne('Space', 'uid', 'space_uid');
	}
}

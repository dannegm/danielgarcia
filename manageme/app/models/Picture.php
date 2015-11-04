<?php

class Picture extends Eloquent {
	protected $table = 'pictures';

	public function dependences () {
		$notes = $this->hasMany('Note', 'cover_uid', 'uid');
		$advertises = $this->hasMany('Advertise', 'picture_uid', 'uid');
		$users = $this->hasMany('User', 'avatar', 'uid');

		$md5 = $this->md5;
		$inNotes = Note::where('content', 'LIKE', "%{$md5}%");

		$coutn = $notes->count()
			+ $advertises->count()
			+ $users->count()
			+ $inNotes->count();
		return $coutn;
	}
}
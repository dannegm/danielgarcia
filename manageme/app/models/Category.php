<?php

class Category extends Eloquent {

	protected $table = 'categories';

	public function countNotes () {
		$notes = $this->hasMany('Note', 'category_uid', 'uid');
		return $notes->count();
	}

}

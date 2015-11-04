<?php

class Note extends Eloquent {

	protected $table = 'articles';

	public function author () {
		return $this->hasOne('User', 'uid', 'author_uid');
	}

	public function cover () {
		return $this->hasOne('Picture', 'uid', 'cover_uid');
	}

	public function category () {
		return $this->hasOne('Category', 'uid', 'category_uid');
	}

	public function publishHumanDate () {
		$dt = Carbon::parse($this->posted_at);
		return $dt->formatLocalized('%B %e, %Y');
	}

	public function publisFormDate () {
		$dt = Carbon::parse($this->posted_at);
		return $dt->formatLocalized('%m/%d/%Y %l:%M %p');
	}

}

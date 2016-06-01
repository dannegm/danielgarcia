<?php

class Page extends Eloquent {
	protected $table = 'pages';

	public static function get ($uid) {
		$pages = Page::where('uid', '=', $uid)->take(1)->get();
		$page = $pages[0];
		return $page;
	}
}
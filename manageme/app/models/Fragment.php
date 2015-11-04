<?php

class Fragment extends Eloquent {
	protected $table = 'fragments';

	public static function get ($uid) {
		$fragments = Fragment::where('uid', '=', $uid)->take(1)->get();
		$fragment = $fragments[0];
		$fragment->html = str_replace('inputarea', 'textarea', $fragment->html);

		$fragment->html = str_replace('%asset%', URL::asset('/'), $fragment->html);
		$fragment->css = str_replace('%asset%', URL::asset('/'), $fragment->css);
		$fragment->js = str_replace('%asset%', URL::asset('/'), $fragment->js);

		$settings = Settings::orderBy('id', 'desc')->get();
		foreach ($settings as $item) {
			$fragment->html = str_replace('%' . $item->key . '%', $item->value, $fragment->html);
			$fragment->css = str_replace('%' . $item->key . '%', $item->value, $fragment->css);
			$fragment->js = str_replace('%' . $item->key . '%', $item->value, $fragment->js);
		}

		$patterns = '/%route\((?P<uid>.*)\)%/';
		$output = (object) array (
			'html' => array (),
			'css' => array (),
			'js' => array ()
		);
		preg_match_all($patterns, $fragment->html, $output->html, PREG_PATTERN_ORDER);
		preg_match_all($patterns, $fragment->css, $output->css, PREG_PATTERN_ORDER);
		preg_match_all($patterns, $fragment->js, $output->js, PREG_PATTERN_ORDER);
		$uids = (object) array (
			'html' => $output->html['uid'],
			'css' => $output->css['uid'],
			'js' => $output->js['uid']
		);

		for ($x = 0; $x < count($uids->html); $x++) {
			$_uid = str_replace("'", "", $uids->html[$x]);
			$fragment->html = str_replace("%route('{$_uid}')%", route($_uid), $fragment->html);
		}
		for ($x = 0; $x < count($uids->css); $x++) {
			$_uid = str_replace("'", "", $uids->css[$x]);
			$fragment->css = str_replace("%route('{$_uid}')%", route($_uid), $fragment->css);
		}
		for ($x = 0; $x < count($uids->js); $x++) {
			$_uid = str_replace("'", "", $uids->js[$x]);
			$fragment->js = str_replace("%route('{$_uid}')%", route($_uid), $fragment->js);
		}

		return $fragment;
	}
}
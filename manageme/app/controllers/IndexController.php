<?php

class IndexController extends BaseController {
	public function index () {
		$data = array (
			'title' => 'Inicio',
			'section' => 'home'
		);
		return View::make('home/index', $data);
	}

	public function note ($uid) {
		$notes = Note::where('uid', '=', $uid)->get();
		if (Settings::get('route.permalink') == 'permalink') {
			$notes = Note::where('permalink', '=', $uid)->get();
		}

		$note = $notes[0];
		$data = array (
			'title' => $note->title,
			'section' => 'note',
			'note' => $note
		);
		return View::make('home/note', $data);
	}

	public function page ($uid) {
		$page = Page::where('uid', '=', $uid)->get();
		if (Settings::get('route.permalink') == 'permalink') {
			$pages = Page::where('route', '=', $uid)->get();
		}

		$page = $pages[0];
		$page->content = str_replace('inputarea', 'textarea', $page->content);
		$page->content = str_replace('%asset%', URL::asset('/'), $page->content);
		$page->css = str_replace('%asset%', URL::asset('/'), $page->css);
		$page->js = str_replace('%asset%', URL::asset('/'), $page->js);

		// Encontrando fragmentos

		$patterns = '/%fragment\((?P<uid>.*)\)%|%route\((?P<route>.*)\)%/';
		$output = (object) array (
			'html' => array (),
			'css' => array (),
			'js' => array ()
		);
		preg_match_all($patterns, $page->content, $output->html, PREG_PATTERN_ORDER);
		preg_match_all($patterns, $page->css, $output->css, PREG_PATTERN_ORDER);
		preg_match_all($patterns, $page->js, $output->js, PREG_PATTERN_ORDER);
		$uids = (object) array (
			'html' => $output->html['uid'],
			'css' => $output->css['uid'],
			'js' => $output->js['uid']
		);

		
		for ($x = 0; $x < count($uids->html); $x++) {
			$_uid = str_replace("'", "", $uids->html[$x]);
			if ($_uid != '') {
				$fragment = Fragment::get($_uid);
				$page->content = str_replace("%fragment('{$_uid}')%", $fragment->html, $page->content);
			}
		}
		for ($x = 0; $x < count($uids->css); $x++) {
			$_uid = str_replace("'", "", $uids->css[$x]);
			if ($_uid != '') {
				$fragment = Fragment::get($_uid);
				$page->css = str_replace("%fragment('{$_uid}')%", $fragment->css, $page->css);
			}
		}
		for ($x = 0; $x < count($uids->js); $x++) {
			$_uid = str_replace("'", "", $uids->js[$x]);
			if ($_uid != '') {
				$fragment = Fragment::get($_uid);
				$page->js = str_replace("%fragment('{$_uid}')%", $fragment->js, $page->js);
			}
		}
		/**/

		
		$routes = (object) array (
			'html' => $output->html['route'],
			'css' => $output->css['route'],
			'js' => $output->js['route']
		);
		for ($x = 0; $x < count($uids->html); $x++) {
			$_route = str_replace("'", "", $routes->html[$x]);
			if ($_route != '') $page->content = str_replace("%route('{$_route}')%", route($_route), $page->content);
		}
		for ($x = 0; $x < count($uids->css); $x++) {
			$_route = str_replace("'", "", $routes->css[$x]);
			if ($_route != '') $page->css = str_replace("%route('{$_route}')%", route($_route), $page->css);
		}
		for ($x = 0; $x < count($uids->js); $x++) {
			$_route = str_replace("'", "", $routes->js[$x]);
			if ($_route != '') $page->js = str_replace("%route('{$_route}')%", route($_route), $page->js);
		}
		/**/

		// END

		$settings = Settings::orderBy('id', 'desc')->get();
		foreach ($settings as $item) {
			$page->content = str_replace('%' . $item->key . '%', $item->value, $page->content);
			$page->css = str_replace('%' . $item->key . '%', $item->value, $page->css);
			$page->js = str_replace('%' . $item->key . '%', $item->value, $page->js);
		}

		$data = array (
			'title' => $page->title,
			'section' => 'page',
			'page' => $page
		);
		return View::make('home/page', $data);
	}
}

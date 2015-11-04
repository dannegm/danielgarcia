<?php

class PageController extends \BaseController {

	public function index () {
		$pages = Page::where('listed', '=', '1')->orderBy('created_at', 'desc')->paginate(12);
		$data = array(
			'title' => 'Páginas',
			'section' => 'pages',
			'pages' => $pages
		);
		return View::make('appanel/pages/index', $data);
	}

	public function preview ($uid) {
		$pages = Page::where('uid', '=', $uid)->take(1)->get();
		$page = $pages[0];

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

		$data = array(
			'section' => 'pages',
			'page' => $page
		);
		return View::make('appanel/pages/preview', $data);
	}

	public function create () {
		$selfuser = Auth::user();
		$permissions = $selfuser->permissions();
		//if ($permissions->pages->create) {
			$data = array(
				'title' => 'Nueva página',
				'section' => 'pages'
			);
			return View::make('appanel/pages/create', $data);
		//} else {
		//	return Redirect::to(route('appanel.pages.index'));
		//}
	}

	public function edit ($uid) {
		$page = Page::where('uid', '=', $uid)->take(1)->get();
		$data = array(
			'title' => "Editar página",
			'section' => 'pages',
			'page' => $page[0]
		);
		return View::make('appanel/pages/edit', $data);
	}

	public function store () {
		$selfuser = Auth::user();
		$permissions = $selfuser->permissions();
		//if ($permissions->pages->create) {
			$rules = array(
				'title' => 'required|max:140'
			);
			$messages = array (
				'title.required' => 'El título es necesario',
				'title.max' => 'El título es demaciado largo'
			);
			$validator = Validator::make(Input::all(), $rules, $messages);

			if ($validator->fails()) {
				$messages = $validator->messages();
				return Redirect::route('appanel.pages.create')
					->withErrors($validator)
					->withInput();
			} else {
				$page = new Page;
				$page->uid = uniqid();

				$page->title = Input::get('title');
				function hyphenize($string) { return strtolower( preg_replace( array('#[\\s-]+#', '#[^A-Za-z0-9\-]+#'), array('-', ''), urldecode($string) ) ); }
				$page->route = hyphenize(Input::get('title'));

				$page->header = '' . Input::get('header');
				$page->content = '' . str_replace('textarea', 'inputarea', Input::get('content'));
				$page->footer = '' . Input::get('footer');

				$page->css = '' . Input::get('css');
				$page->js = '' . Input::get('js');

				$page->description = Input::get('description');
				$page->keywords = Input::get('keywords');

				$page->save();

				$data = array(
					'title' => "Editar página",
					'section' => 'pages',
					'page' => $page
				);
				return View::make('appanel/pages/edit', $data);
			}
		//} else {
		//	return Redirect::to(route('appanel.pages.index'));
		//}
	}

	public function update ($uid) {
		$selfuser = Auth::user();
		$permissions = $selfuser->permissions();
		//if ($permissions->notes->edit) {
			$rules = array(
				'title' => 'required|max:140'
			);
			$messages = array (
				'title.required' => 'El título es necesario',
				'title.max' => 'El título es demaciado largo'
			);
			$validator = Validator::make(Input::all(), $rules, $messages);

			$pages = Page::where('uid', '=', $uid)->take(1)->get();
			$page = $pages[0];
			if ($validator->fails()) {
				$messages = $validator->messages();
				return Redirect::route('appanel.pages.edit', array('id' => $page->uid))
					->withErrors($validator)
					->withInput();
			} else {
				$pages = Page::where('uid', '=', $uid)->take(1)->get();
				$page = $pages[0];

				$page->title = Input::get('title');
				function hyphenize($string) { return strtolower( preg_replace( array('#[\\s-]+#', '#[^A-Za-z0-9\-]+#'), array('-', ''), urldecode($string) ) ); }
				$route = hyphenize(Input::get('route'));
				$page->route = $page->route != $route ? $route : $page->route;

				$page->header = '' . Input::get('header');
				$page->content = '' . str_replace('textarea', 'inputarea', Input::get('content'));
				$page->footer = '' . Input::get('footer');

				$page->css = '' . Input::get('css');
				$page->js = '' . Input::get('js');

				$page->description = Input::get('description');
				$page->keywords = Input::get('keywords');

				$page->save();

				$data = array(
					'title' => "Editar página",
					'section' => 'pages',
					'page' => $page
				);
				return View::make('appanel/pages/edit', $data);
			}
		//} else {
		//	return Redirect::to(route('appanel.pages.index'));
		//}
	}

	public function destroy ($uid) {
		$selfuser = Auth::user();
		$permissions = $selfuser->permissions();
		//if ($permissions->pages->delete) {
			$pages = Page::where('uid', '=', $uid)->take(1)->get();
			$page = $pages[0];
			$page->delete();
		//}
		return Redirect::route('appanel.pages.index');
	}
}
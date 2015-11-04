<?php

class AppController extends Controller {

	public function checklogin () {
		if (Auth::check()) {
			return Redirect::to('appanel/index');
		} else {
			$data = array (
				'title' => 'Login',
				'subtitle' => 'Inicia sesión',
				'section' => 'login',
			);
			return View::make('appanel/login', $data);
		}
	}

	public function login () {
		$username = Input::get('username');
		$password = Input::get('password');
		$_token = Input::get('_token');

		$attempt = Auth::attempt(array(
			'username' => $username,
			'password' => md5($password)
		));
		if ($attempt) {
			return Redirect::to('appanel/index');
		} else {
			return Redirect::route('appanel')
				->withErrors(array('La contraseña o el password son incorrectos'))
				->withInput();
		}
	}

	public function logout () {
		Auth::logout();
		return Redirect::to('appanel');
	}

	public function index () {
		$status = Settings::get('page.status');
		if ($status == 'public') { return Redirect::to(route('page.home')); }
		else if ($status == 'soon') { return Redirect::to(route('app.soon')); }
		else if ($status == 'maintenance') { return Redirect::to(route('app.maintenance')); }
		else { return Redirect::to(route('app.e404')); }
		/**/	
	}

	public function home () {
		if (Auth::check()) {
			$data = array (
				'title' => 'Inicio',
				'subtitle' => 'Bienvenido <strong>' . Auth::user()->name . '</strong>.',
				'section' => 'index'
			);
			return View::make('appanel/index', $data);
		} else {
			return Redirect::to('appanel');
		}
	}

	// Responses

	public function soon () {
		$page = Page::get('soon');
		$data = array (
			'title' => $page->title,
			'header' => $page->header,
			'content' => $page->content
		);
		return View::make('errors/soon', $data);
	}

	public function maintenance () {
		$page = Page::get('maintenance');
		$data = array (
			'title' => $page->title,
			'header' => $page->header,
			'content' => $page->content
		);
		return View::make('errors/maintenance', $data);
	}

	public function e404 () {
		$page = Page::get('e404');
		$data = array (
			'title' => $page->title,
			'header' => $page->header,
			'content' => $page->content
		);
		return View::make('errors/e404', $data);
	}

	public function e500 () {
		$page = Page::get('e500');
		$data = array (
			'title' => $page->title,
			'header' => $page->header,
			'content' => $page->content
		);
		return View::make('errors/e500', $data);
	}
}
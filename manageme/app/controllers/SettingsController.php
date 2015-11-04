<?php

class SettingsController extends \BaseController {
	public function index () {
		$settings =  array(
			'page' => array(
				'title' => Settings::get('page.title'),
				'status' => Settings::get('page.status'),
			),
			'social' => array(
				'facebook' => Settings::get('social.facebook'),
				'twitter' => Settings::get('social.twitter'),
				'instagram' => Settings::get('social.instagram'),
				'youtube' => Settings::get('social.youtube'),
				'github' => Settings::get('social.github'),
				'linkedin' => Settings::get('social.linkedin'),
			),
			'pages' => array(
				'soon' => Page::get('soon'),
				'maintenance' => Page::get('maintenance'),
				'e404' => Page::get('e404'),
				'e500' => Page::get('e500'),
			),
			'contact' => array(
				'email' => Settings::get('contact.email'),
			),
			'third' => array(
				'google' => array(
					'analytics' => Settings::get('third.google.analytics'),
				),
			),
		);

		$data = array(
			'title' => 'Configuración',
			'section' => 'settings',
			'settings' => $settings
		);
		return View::make('appanel/settings', $data);
	}

	// API
	public function putPageTitle () {
		$newTitle = Input::get('title');
		Settings::set('page.title', $newTitle);

		$status = array(
			'status' => 'success',
			'time'=> array(
				'time' => time()
			)
		);
		return Response::json($status);
	}
	public function putPageStatus () {
		$newStatus = Input::get('status');
		Settings::set('page.status', $newStatus);

		$status = array(
			'status' => 'success',
			'time'=> array(
				'time' => time()
			)
		);
		return Response::json($status);
	}

	public function putSocialData () {
		$newFacebook = Input::get('facebook');
		$newTwitter = Input::get('twitter');
		$newInstagram = Input::get('instagram');
		$newYoutube = Input::get('youtube');
		$newGithub = Input::get('github');
		$newLinkedin = Input::get('linkedin');

		Settings::set('social.facebook', $newFacebook);
		Settings::set('social.twitter', $newTwitter);
		Settings::set('social.instagram', $newInstagram);
		Settings::set('social.youtube', $newYoutube);
		Settings::set('social.github', $newGithub);
		Settings::set('social.linkedin', $newLinkedin);

		$status = array(
			'status' => 'success',
			'time'=> array(
				'time' => time()
			)
		);
		return Response::json($status);
	}

	public function putContactData () {
		$newEmail = Input::get('email');

		Settings::set('contact.email', $newEmail);

		$status = array(
			'status' => 'success',
			'time'=> array(
				'time' => time()
			)
		);
		return Response::json($status);
	}

	public function putThirdData () {
		$newGoogle = array(
			'analytics' => Input::get('google_analytics')
		);

		Settings::set('third.google.analytics', $newGoogle['analytics']);

		$status = array(
			'status' => 'success',
			'time'=> array(
				'time' => time()
			)
		);
		return Response::json($status);
	}

	public function putPagesContent () {
		$contents = json_decode(Input::get('contents'));

		$soon = Page::get('soon');
		$maintenance = Page::get('maintenance');
		$e404 = Page::get('e404');
		$e500 = Page::get('e500');

		$soon->title = $contents->soon->title;
		$soon->header = $contents->soon->header;
		$soon->content = $contents->soon->content;
		$soon->save();

		$maintenance->title = $contents->maintenance->title;
		$maintenance->header = $contents->maintenance->header;
		$maintenance->content = $contents->maintenance->content;
		$maintenance->save();

		$e404->title = $contents->e404->title;
		$e404->content = $contents->e404->content;
		$e404->save();

		$e500->title = $contents->e500->title;
		$e500->content = $contents->e500->content;
		$e500->save();

		$status = array(
			'status' => 'success',
			'time'=> array(
				'time' => time()
			)
		);
		return Response::json($status);
	}
}
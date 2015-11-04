<?php

class EmailController extends BaseController {
	public function contact () {
		$msg = (Object) array (
			'name' => Input::get('name'),
			'email' => Input::get('email'),
			'content' => Input::get('content'),
		);
		$data = array (
			'message' => $msg,
			'name' => Input::get('name'),
			'email' => Input::get('email'),
			'content' => Input::get('content'),
			'contact' => Settings::get('contact.email')
		);
		Mail::send('emails.contact', $data, function ($message) use ($msg) {
			$message
				->from($msg->email, $msg->name);
			$message
				->to(Settings::get('contact.email'))
				->subject("{$msg->name} ha tratado de contactarte");
		});

		// Guardar en subscriptores
		$subscribers = Subscriber::where('email', '=', $msg->email);
		if ($subscribers->count() < 1) {
			$subscriber = new Subscriber;
			$subscriber->uid = uniqid();
			$subscriber->name = $msg->name;
			$subscriber->email = $msg->email;
			$subscriber->save();
		}

		return Redirect::to(route('app.index'));
	}
}

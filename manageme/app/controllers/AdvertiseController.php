<?php

class AdvertiseController extends \BaseController {

	public function index () {
		$advertises = Advertise::orderBy('id', 'desc')->paginate(12);
		$data = array(
			'title' => 'Anuncios',
			'section' => 'advertises',
			'advertises' => $advertises
		);
		return View::make('appanel/advertises/index', $data);
	}

	public function create () {
		$spaces = Space::orderBy('id', 'desc')->get();
		$data = array(
			'title' => 'Nuevo anuncio',
			'section' => 'advertises',
			'spaces' => $spaces
		);
		return View::make('appanel/advertises/create', $data);
	}

	public function view ($uid) {
		$advertises = Advertise::where('uid', '=', $uid)->take(1)->get();
		$data = array(
			'title' => "Vista previa",
			'section' => 'advertises',
			'advertise' => $advertises[0]
		);
		return View::make('appanel/advertises/view', $data);
	}

	public function edit ($uid) {
		$advertises = Advertise::where('uid', '=', $uid)->take(1)->get();
		$spaces = Space::orderBy('id', 'desc')->get();
		$data = array(
			'title' => "Editar anuncio",
			'section' => 'advertises',
			'advertise' => $advertises[0],
			'spaces' => $spaces
		);
		return View::make('appanel/advertises/edit', $data);
	}

	public function store () {
		$selfuser = Auth::user();
		$rules = array(
			'name' => 'required|max:140',
			'space' => 'required'
		);

		$messages = array (
			'name.required' => 'El título es necesario',
			'name.max' => 'El título es demaciado largo',
			'space.required' => 'Es necesario sellecionar un espacio'
		);
		$validator = Validator::make(Input::all(), $rules, $messages);

		if ($validator->fails()) {
			$messages = $validator->messages();
			return Redirect::route('appanel.advertises.create')
				->withErrors($validator)
				->withInput();
		} else {
			$advertise = new Advertise;
			$advertise->uid = uniqid();

			$advertise->name = Input::get('name');
			$advertise->description = Input::get('description');
			$advertise->author_uid = $selfuser->uid;

			$advertise->html = '' . str_replace('textarea', 'inputarea', Input::get('html'));
			$advertise->css = '' . Input::get('css');
			$advertise->js = '' . Input::get('js');

			$space = Space::get(Input::get('space'));
			$space->advertise_uid = $advertise->uid;
			$space->save();
			$advertise->space_uid = Input::get('space');

			$advertise->save();

			return Redirect::to(route('appanel.advertises.edit', array('id' => $advertise->uid)));
		}
	}

	public function update ($uid) {
		$rules = array(
			'name' => 'required|max:140',
			'space' => 'required'
		);
		$messages = array (
			'name.required' => 'El título es necesario',
			'name.max' => 'El título es demaciado largo',
			'space.required' => 'Es necesario sellecionar un espacio'
		);
		$validator = Validator::make(Input::all(), $rules, $messages);
		$advertises = Advertise::where('uid', '=', $uid)->take(1)->get();
		$advertise = $advertises[0];

		if ($validator->fails()) {
			$messages = $validator->messages();
			return Redirect::route('appanel.advertises.edit', array('id' => $advertise->uid))
				->withErrors($validator)
				->withInput();
		} else {

			$advertise->name = Input::get('name');
			$advertise->description = Input::get('description');

			$advertise->html = '' . str_replace('textarea', 'inputarea', Input::get('html'));
			$advertise->css = '' . Input::get('css');
			$advertise->js = '' . Input::get('js');

			if ($advertise->space_uid != Input::get('space')) {
				$oldspace = Space::get($advertise->space_uid);
				$oldspace->advertise_uid = '';
				$oldspace->save();

				$space = Space::get(Input::get('space'));
				$space->advertise_uid = $advertise->uid;
				$space->save();

				$advertise->space_uid = Input::get('space');
			}

			$advertise->save();
			return Redirect::to(route('appanel.advertises.edit', array('id' => $advertise->uid)));
		}
	}

	public function destroy ($uid) {
		$advertises = Advertise::where('uid', '=', $uid)->take(1)->get();
		$advertise = $advertises[0];

		$space = Space::get($advertise->space);
		$space->advertise_uid = '';
		$space->save();

		$advertise->delete();
		return Redirect::route('appanel.advertises.index');
	}
}
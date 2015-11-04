<?php

class FragmentController extends \BaseController {

	public function index () {
		$fragments = Fragment::orderBy('id', 'desc')->paginate(12);
		$data = array(
			'title' => 'Fragmentos',
			'section' => 'fragments',
			'fragments' => $fragments
		);
		return View::make('appanel/fragments/index', $data);
	}

	public function create () {
		$spaces = Space::orderBy('id', 'desc')->get();
		$data = array(
			'title' => 'Nuevo fragmento',
			'section' => 'fragments',
			'spaces' => $spaces
		);
		return View::make('appanel/fragments/create', $data);
	}

	public function edit ($uid) {
		$fragments = Fragment::where('uid', '=', $uid)->take(1)->get();
		$data = array(
			'title' => "Editar fragmento",
			'section' => 'fragments',
			'fragment' => $fragments[0]
		);
		return View::make('appanel/fragments/edit', $data);
	}

	public function store () {
		$selfuser = Auth::user();
		$rules = array(
			'uid' => 'required',
		);

		$messages = array (
			'uid.required' => 'El identificador es requerido',
		);
		$validator = Validator::make(Input::all(), $rules, $messages);

		if ($validator->fails()) {
			$messages = $validator->messages();
			return Redirect::route('appanel.fragments.create')
				->withErrors($validator)
				->withInput();
		} else {
			$fragment = new Fragment;
			$fragment->uid = Input::get('uid');
			$fragment->description = Input::get('description');

			$fragment->html = '' . str_replace('textarea', 'inputarea', Input::get('html'));
			$fragment->css = '' . Input::get('css');
			$fragment->js = '' . Input::get('js');

			$fragment->save();
			return Redirect::to(route('appanel.fragments.edit', array('id' => $fragment->uid)));
		}
	}

	public function update ($uid) {
		$rules = array(
			'uid' => 'required',
		);
		$messages = array (
			'uid.required' => 'El identificador es requerido'
		);
		$validator = Validator::make(Input::all(), $rules, $messages);
		$fragments = Fragment::where('uid', '=', $uid)->take(1)->get();
		$fragment = $fragments[0];

		if ($validator->fails()) {
			$messages = $validator->messages();
			return Redirect::route('appanel.fragments.edit', array('id' => $fragment->uid))
				->withErrors($validator)
				->withInput();
		} else {
			$fragment->uid = Input::get('uid');
			$fragment->description = Input::get('description');

			$fragment->html = '' . str_replace('textarea', 'inputarea', Input::get('html'));
			$fragment->css = '' . Input::get('css');
			$fragment->js = '' . Input::get('js');

			$fragment->save();
			return Redirect::to(route('appanel.fragments.edit', array('id' => $fragment->uid)));
		}
	}

	public function destroy ($uid) {
		$fragments = Fragment::where('uid', '=', $uid)->take(1)->get();
		$fragment = $fragments[0];

		$space = Space::get($fragment->space);
		$space->advertise_uid = '';
		$space->save();

		$fragment->delete();
		return Redirect::route('appanel.fragments.index');
	}
}
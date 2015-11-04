<?php

class NoteController extends \BaseController {

	public function index () {
		$notes = Note::orderBy('posted_at', 'desc')->paginate(12);
		$data = array(
			'title' => 'Notas',
			'section' => 'notes',
			'notes' => $notes
		);
		return View::make('appanel/notes/index', $data);
	}

	public function create () {
		$selfuser = Auth::user();
		$permissions = $selfuser->permissions();
		if ($permissions->notes->create) {
			$categories = Category::orderBy('id', 'desc')->get();
			$data = array(
				'title' => 'Nueva nota',
				'section' => 'notes',
				'categories' => $categories
			);
			return View::make('appanel/notes/create', $data);
		} else {
			return Redirect::to(route('appanel.notes.index'));
		}
	}

	public function view ($uid) {
		$note = Note::where('uid', '=', $uid)->take(1)->get();
		$data = array(
			'title' => "Vista previa",
			'section' => 'notes',
			'note' => $note[0]
		);
		return View::make('appanel/notes/view', $data);
	}

	public function edit ($uid) {
		$note = Note::where('uid', '=', $uid)->take(1)->get();
		$categories = Category::orderBy('id', 'desc')->get();
		$data = array(
			'title' => "Editar nota",
			'section' => 'notes',
			'note' => $note[0],
			'categories' => $categories
		);
		return View::make('appanel/notes/edit', $data);
	}

	public function store () {
		$selfuser = Auth::user();
		$permissions = $selfuser->permissions();
		if ($permissions->notes->create) {
			//validation videos
			$rules = array(
				'title' => 'required|max:140',
				'description' => 'max:1024',
				'pic_cover' => 'required',
				'content' => 'required',
				'category_uid' => 'required',
			);

			$messages = array (
				'title.required' => 'El título es necesario',
				'title.max' => 'El título es demaciado largo',
				'description.max' => 'La descripción es demaciado larga',
				'username.required' => 'Debes seleccionar una foto de portada',
				'content.required' => 'Debes escribir un contenido',
				'category_uid.required' => 'Debes seleccionar una categoría'
			);

			//check validation
			$validator = Validator::make(Input::all(), $rules, $messages);

			if ($validator->fails()) {
				$messages = $validator->messages();
				return Redirect::route('appanel.notes.create')
					->withErrors($validator)
					->withInput();
			} else {
				$note = new Note;
				$note->uid = uniqid();

				$note->title = Input::get('title');
				$note->description = Input::get('description');
				$note->content = Input::get('content');

				function hyphenize($string) { return strtolower( preg_replace( array('#[\\s-]+#', '#[^A-Za-z0-9\-]+#'), array('-', ''), urldecode($string) ) ); }
				$note->permalink = hyphenize(Input::get('title'));

				$note->author_uid = $selfuser->uid;
				$note->category_uid = Input::get('category_uid');
				$note->tags = Input::get('tags');
				$note->posted_at = new Carbon(Input::get('posted_at'));

				$pic_cover = Input::get('pic_cover');
				$pic_cover = !empty($pic_cover) ? $pic_cover : 'avatar';
				$note->cover_uid = $pic_cover;

				if (Input::get('youtube_id') != '') {
					$YTresult = array();
					$match = <<<EOPAGE
/^(?:http(?:s)?:\/\/)?(?:www\.)?(?:m\.)?(?:youtu\.be\/|youtube\.com\/(?:(?:watch)?\?(?:.*&)?v(?:i)?=|(?:embed|v|vi|user)\/))([^\?&"'>]+)/
EOPAGE;
					preg_match($match, Input::get('youtube_id'), $YTresult);
					$youtube_id = $YTresult[1];
					$note->youtube_id = $youtube_id;
				} else {
					$note->youtube_id = '';
				}

				function get_check_value ($input) {
					$input = empty($input) ? 'off' : 'on';
					return $input != 'on' ? 0 : 1;
				}

				$note->marker = get_check_value(Input::get('marker'));
				$note->draft = get_check_value(Input::get('draft'));

				$note->save();

				return Redirect::to(route('appanel.notes.view', array('id' => $note->uid)));
			}
		} else {
			return Redirect::to(route('appanel.notes.index'));
		}
	}

	public function update ($uid) {
		$selfuser = Auth::user();
		$permissions = $selfuser->permissions();
		if ($permissions->notes->edit) {
			//validation videos
			$rules = array(
				'title' => 'required|max:140',
				'description' => 'max:1024',
				'pic_cover' => 'required',
				'content' => 'required',
				'category_uid' => 'required',
			);

			$messages = array (
				'title.required' => 'El título es necesario',
				'title.max' => 'El título es demaciado largo',
				'description.max' => 'La descripción es demaciado larga',
				'username.required' => 'Debes seleccionar una foto de portada',
				'content.required' => 'Debes escribir un contenido',
				'category_uid.required' => 'Debes seleccionar una categoría'
			);

			//check validation
			$validator = Validator::make(Input::all(), $rules, $messages);

			$notes = Note::where('uid', '=', $uid)->take(1)->get();
			$note = $notes[0];
			if ($validator->fails()) {
				$messages = $validator->messages();
				return Redirect::route('appanel.notes.edit', array('id' => $note->uid))
					->withErrors($validator)
					->withInput();
			} else {

				$note->title = Input::get('title');
				$note->description = Input::get('description');
				$note->content = Input::get('content');

				function hyphenize($string) { return strtolower( preg_replace( array('#[\\s-]+#', '#[^A-Za-z0-9\-]+#'), array('-', ''), urldecode($string) ) ); }
				$permalink = hyphenize(Input::get('permalink'));
				$note->permalink = $note->permalink != $permalink ? $permalink : $note->permalink;

				$note->category_uid = Input::get('category_uid');
				$note->tags = Input::get('tags');
				$note->posted_at = new Carbon(Input::get('posted_at'));

				$pic_cover = Input::get('pic_cover');
				$pic_cover = !empty($pic_cover) ? $pic_cover : 'avatar';
				$note->cover_uid = $pic_cover;


				if (Input::get('youtube_id') != '') {
					$YTresult = array();
					$match = <<<EOPAGE
/^(?:http(?:s)?:\/\/)?(?:www\.)?(?:m\.)?(?:youtu\.be\/|youtube\.com\/(?:(?:watch)?\?(?:.*&)?v(?:i)?=|(?:embed|v|vi|user)\/))([^\?&"'>]+)/
EOPAGE;
					preg_match($match, Input::get('youtube_id'), $YTresult);
					$youtube_id = $YTresult[1];
					$note->youtube_id = $youtube_id;
				} else {
					$note->youtube_id = '';
				}

				function get_check_value ($input) {
					$input = empty($input) ? 'off' : 'on';
					return $input != 'on' ? 0 : 1;
				}

				$note->marker = get_check_value(Input::get('marker'));
				$note->draft = get_check_value(Input::get('draft'));

				$note->save();

				return Redirect::to(route('appanel.notes.view', array('id' => $note->uid)));
			}
		} else {
			return Redirect::to(route('appanel.notes.index'));
		}
	}

	public function destroy ($uid) {
		$selfuser = Auth::user();
		$permissions = $selfuser->permissions();
		if ($permissions->notes->delete) {
			$notes = Note::where('uid', '=', $uid)->take(1)->get();
			$note = $notes[0];
			$note->delete();
		}
		return Redirect::route('appanel.notes.index');
	}

	public function mark ($uid) {
		$selfuser = Auth::user();
		$permissions = $selfuser->permissions();
		if ($permissions->notes->edit) {
			$notes = Note::where('uid', '=', $uid)->take(1)->get();
			$note = $notes[0];
			$note->marker = 1;
			$note->save();
			return Redirect::to(route('appanel.notes.index'));
		} else {
			return Redirect::to(route('appanel.notes.index'));
		}
	}

	public function umark ($uid) {
		$selfuser = Auth::user();
		$permissions = $selfuser->permissions();
		if ($permissions->notes->edit) {
			$notes = Note::where('uid', '=', $uid)->take(1)->get();
			$note = $notes[0];
			$note->marker = 0;
			$note->save();
			return Redirect::to(route('appanel.notes.index'));
		} else {
			return Redirect::to(route('appanel.notes.index'));
		}
	}
}
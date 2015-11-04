<?php

class CategoryController extends \BaseController {

	public function index () {
		$categories = Category::orderBy('created_at', 'desc')->get();
		$data = array(
			'title' => 'Categorías',
			'section' => 'categories',
			'categories' => $categories
		);
		return View::make('appanel/categories/index', $data);
	}

	public function store () {
		$selfuser = Auth::user();
		$permissions = $selfuser->permissions();
		if ($permissions->categories->create) {

			$category = new Category;

			$uid = uniqid();
			$category->uid = $uid;
			$category->name = Input::get('name');
			$category->save();

			$status = array(
				'status' => 'success',
				'time'=> array(
					'time' => time()
				),
				'category' => array(
					'uid' => $uid,
					'name' => Input::get('name')
				)
			);
			return Response::json($status);
		} else {
			// No hace nada
			$status = array(
				'status' => 'error',
				'time'=> array(
					'time' => time()
				),
				'error' => 'No tienes permisos para crear una categoría'
			);
			return Response::json($status);
		}
	}

	public function update () {
		$selfuser = Auth::user();
		$permissions = $selfuser->permissions();
		if ($permissions->categories->edit) {

			$uid = Input::get('uid');
			$categories = Category::where('uid', '=', $uid)->take(1)->get();
			$category = $categories[0];

			$category->name = Input::get('name');
			$category->save();

			$status = array(
				'status' => 'success',
				'time'=> array(
					'time' => time()
				),
				'category' => array(
					'uid' => $category->uid,
					'name' => Input::get('name')
				)
			);
			return Response::json($status);
		} else {
			// No hace nada
			$status = array(
				'status' => 'error',
				'time'=> array(
					'time' => time()
				),
				'error' => 'No tienes permisos para editar categorías'
			);
			return Response::json($status);
		}
	}

	public function destroy () {
		$selfuser = Auth::user();
		$permissions = $selfuser->permissions();
		if ($permissions->categories->delete) {
			$uid = Input::get('uid');
			$categories = Category::where('uid', '=', $uid)->take(1)->get();
			$category = $categories[0];

			if ($category->countNotes() > 0) {
				$status = array(
					'status' => 'error',
					'time'=> array(
						'time' => time()
					),
					'error' => 'Esta categoría tiene notas que dependen de ella'
				);
				return Response::json($status);
			} else {
				$category->delete();
				$status = array(
					'status' => 'success',
					'time'=> array(
						'time' => time()
					)
				);
				return Response::json($status);
			}
		} else {
			// No hace nada
			$status = array(
				'status' => 'error',
				'time'=> array(
					'time' => time()
				),
				'error' => 'No tienes permisos para eliminar categorías'
			);
			return Response::json($status);
		}
	}
}
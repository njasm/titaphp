<?php namespace App\Http\Site;

use Html;
use Model\User as User;

class DemoController extends \App\Http\BaseController
{

	public function index()
	{
		$users = User::all();
		return $this->View->render('site/demo/index', ['users' => $users]);
	}

	public function edit($id = null)
	{
		$success = false;
		$user = $id !== null ? User::find((int)$id) : new User();
		if (!$user) throw new \Exception('Db record not found');

		if (Html::isPost()) {
			$user->fill(Html::postParam('User'));
			$success = $user->save();
		}

		return $this->View->render('site/demo/edit',
			['user' => $user, 'success' => $success, 'errors' => $user->errors()]
		);
	}

	public function delete($id)
	{
		return User::destroy((int)$id) > 0 ? 1 : 0;
	}

}
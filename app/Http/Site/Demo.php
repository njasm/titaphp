<?php namespace Controller\Site;

use Classes\App;
use Html;
use Model\User as User;

class Demo extends \Controller\BaseController
{

	public function index()
	{
		$users = User::all();
		return $this->View->render('site/demo/index', ['users' => $users]);
	}

	/**
	 * Example for Named and Ordered params injection actions.
	 */
	public function test($id = '', \Classes\Controller $controller)
	{

		return 'var $id: ' . $id . ', $controller: ' . get_class($controller);
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
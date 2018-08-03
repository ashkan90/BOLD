<?php 

/**
 * 
 */
class User extends Controller
{
	
	function __construct($controller, $action)
	{
		parent::__construct($controller, $action);
		$this->load_model('Users');
	}

	public function loginAction(){
		if ($_POST) {
			dd($_POST);
			$validation = true;
			if ($validation === true) {
				$user = $this->UsersModel->findByMail(Input::get('username'));
				if ($user && check_hash(Input::get('password'), $user->password)) {
					$remember = (isset($_POST['remember']) && Input::get('remember')) ? true : false;
					$user->login($remember);

					Router::redirect('');
				}				
			}
		}
		$this->view->render('user/login');
	}

	public function registerAction(){
		$this->view->render('user/register');
	}

	public function indexAction(){
		$this->view->render('user/login');
	}
}
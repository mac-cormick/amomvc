<?php

class UserController
{
	public function actionLogin() {
		if (isset($_POST['submit'])) {
			$email = $_POST['email'];
			$password = $_POST['password'];
			$sub = $_POST['domain'];
			$errors = false;
			$logged = User::checkUserData($email, $password, $sub);
			if ($logged == false) {
				$errors[] = 'Ошибка соединения!';
			} else {
				User::auth($email, $password, $sub);
				header("Location: /front/");
			}
		}
		require_once(ROOT.'/views/site/index.php');
		return true;
	}

	public function actionLogout() {
		unset($_SESSION['email']);
		unset($_SESSION['hash']);
		unset($_SESSION['subdomain']);
		header("Location: /");
	}
}

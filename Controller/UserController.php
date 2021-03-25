<?php

	class UserController extends BaseController {
		
        public function Login() {
			$this->View("login");
		}
		
		public function Authenticate($login, $password) {
			$user = $this->UserManager->getByMail($login);

			if($user->password == $password) {
				$_SESSION['Connected'] = $user->email;
				header("Location: /");
				exit();
			}else {
				var_dump('incorrect');
			}
		}

		public function Registration() {
			$this->View("registration");
		}

		public function RegistrationInBdd($pseudo, $password, $login) {
			$this->UserManager->setUser($pseudo, $password, $login);
			var_dump($this->UserManager->setUser($pseudo, $password, $login));
		}

		public function Logout() {
			unset($_SESSION['Connected']);
			header("Location: /");
		}
	}
<?php

	class UserController extends BaseController {
		
        public function Login() {
			$this->View("login");
		}
		
		public function Authenticate() {
			$login = $this->_httpRequest->getRequest()["login"];
			$password = $this->_httpRequest->getRequest()["password"];
			$user = $this->UserManager->getByMail($login);

			if(password_verify($password, $user->password)) {
				$_SESSION['Connected'] = $user->email;
				header("Location: /");
				exit();
			}else {
				header("Location: /Login");
			}
		}

		public function Registration() {
			$form = new Form();
			$form->add('pseudo', "Pseudo", [
				function($value) {
					return [
						"assertion" => $value !== "",
						"message" => "Votre champ ne doit pas êtres vide." 
					];
			}]);
			$form->add('email', "Adresse Email", [
				function($value) {
					return [
						"assertion" => $value !== "",
						"message" => "Votre champ ne doit pas êtres vide." 
					];
				},
				function($value) {
					return [
						"assertion" => filter_var($value, FILTER_VALIDATE_EMAIL) == true,
						"message" => "Votre email n'est pas valide."
					];
				}
			]);
			$form->add('password', "Mot de passe");
			$form->handle($this->_httpRequest);
			if($form->isSubmitted() && $form->isValid()) {
				$passwordHash = password_hash($_POST['password'], PASSWORD_DEFAULT);
				$this->UserManager->addUser($_POST['pseudo'], $passwordHash, $_POST['email']);
				header("Location: /Login");
				exit();
			}

			$this->addParam("form", $form);
			$this->View("registration");
		}

		public function Logout() {
			unset($_SESSION['Connected']);
			header("Location: /");
		}

		/* Administration user */

        public function UserList() {
            $users = $this->UserManager->getListUsers();
            
            $this->addParam("users", $users);
            $this->View("admin/userlist");
        }

        public function UserValid($id) {
			
			$this->UserManager->validUser($id);

			header("Location: /admin/user/list");
			exit();
		}
	}
<?php

	class UserManager extends BaseManager {

		public function __construct($datasource) {
			parent::__construct("user", "User", $datasource);	
		}

        public function getByMail($mail) {
			$req = $this->_bdd->prepare("SELECT * FROM user WHERE email=?");
			$req->execute(array($mail));
			$req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, "User");
			return $req->fetch();
		}

		public function setUser($pseudo, $password, $login) {
			$roles = "['ROLE_USER']";
			$valid = false;

			$req = $this->_bdd->prepare('INSERT INTO user (pseudo, password, email, roles, valid) VALUES (?, ?, ?, ?, ?)');

			$req->bindParam(1, $pseudo);
			$req->bindParam(2, $password);
			$req->bindParam(3, $login);
			$req->bindParam(4, $roles);
			$req->bindParam(5, $valid);
			
			return $req;
		}
	}
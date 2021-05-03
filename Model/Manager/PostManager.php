<?php

	class PostManager extends BaseManager {

		public function __construct($datasource) {
			parent::__construct("post", "Post", $datasource);	
		}

        public function getPosts() {
			$req = $this->_bdd->prepare("SELECT * FROM post");
			$req->execute();
			return $req->fetchAll(PDO::FETCH_CLASS, 'Post');
		}
	}
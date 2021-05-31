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

		public function getPost($id) {
			$req = $this->_bdd->prepare("SELECT * FROM post WHERE id=?");
			$req->execute(array($id));
			$req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, "Post");
			return $req->fetch();
		}

		public function addPost($title, $chapo, $content) {
			$date = date("Y-m-d H:i:s"); 
			
			$req = $this->_bdd->prepare('INSERT INTO post (title, chapo, content, lastModificationDate) VALUES (:title, :chapo, :content, :lastModificationDate)');

			$req->bindParam(':title', $title);
			$req->bindParam(':chapo', $chapo);
			$req->bindParam(':content', $content);
			$req->bindParam(':lastModificationDate', $date);

			$req->execute();
		}
	}
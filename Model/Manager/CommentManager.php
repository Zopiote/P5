<?php

	class CommentManager extends BaseManager {

		public function __construct($datasource) {
			parent::__construct("comment", "Comment", $datasource);	
		}

        public function getComments($id) {
			$req = $this->_bdd->prepare("SELECT * FROM comment WHERE post_id=?");
			$req->execute(array($id));
			$req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, "Comment");
			return $req->fetchAll();
		}

		public function addComment($content, $id) {
			$valid = 0;
			$date = date("Y-m-d H:i:s");
			
			$req = $this->_bdd->prepare('INSERT INTO comment (publicationDate, content, valid, post_id) VALUES (:publicationDate, :content, :valid, :post_id)');

			$req->bindParam(':publicationDate', $date);
			$req->bindParam(':content', $content);
			$req->bindParam(':valid', $valid);
			$req->bindParam(':post_id', $id);

			$req->execute();
		}
	}
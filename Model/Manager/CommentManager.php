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

	}
<?php

	class Post {
        
		private $id;
		public $title;
		public $chapo;
		public $content;
		public $lastModificationDate;
		
		public function __construct() {
			
		}

		public function getId() {
			return $this->id;
		}

		public function getTitle() {
			return $this->title;
		}

		public function setTitle(string $nom) {
			$this->title = $title;

			return $this;
		}

		public function getChapo() {
			return $this->chapo;
		}

		public function setChapo(string $chapo) {
			$this->chapo = $chapo;

			return $this;
		}

		public function getContent() {
			return $this->content;
		}

		public function setContent(string $content) {
			$this->content = $content;

			return $this;
		}

		public function getLastModificationDate() {
			return $this->lastModificationDate;
		}

		public function setLastModificationDate(string $lastModificationDate) {
			$this->lastModificationDate = $lastModificationDate;

			return $this;
		}
	}
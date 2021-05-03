<?php

	class PostController extends BaseController {
		
        public function ListPost() {
			$posts = $this->PostManager->getPosts();
            
			$this->addParam("posts", $posts);
			$this->View("listpost");
        }

		public function Post($id) {
			var_dump($id);
		}

	}
<?php

	class PostController extends BaseController {
		
        public function ListPost() {
			$posts = $this->PostManager->getPosts();
			var_dump($posts);
            
			$this->addParam("posts", $posts);
			$this->View("listpost");
        }

	}
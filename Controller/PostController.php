<?php

	class PostController extends BaseController {
		
        public function ListPost() {
			$posts = $this->PostManager->getPosts();
            
			$this->addParam("posts", $posts);
			$this->View("listpost");
        }

		public function Post($id) {
			$post = $this->PostManager->getPost($id);
			$comments = $this->CommentManager->getComments($id);
			
			$this->addParam("post", $post);
			$this->addParam("comments", $comments);
			$this->View("post");
		}

	}
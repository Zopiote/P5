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

			$form = new Form();
			$form->add('content', "Content", [
				function($value) {
					return [
						"assertion" => $value !== "",
						"message" => "Votre champ ne doit pas êtres vide."
					];
			}]);
			$form->handle($this->_httpRequest);
			if($form->isSubmitted() && $form->isValid()) {
				$this->CommentManager->addComment($form->fields['content']['value'], $id);
				header("Location: /post?id=". $id);
				exit();
			}

			$this->addParam("form", $form);
			$this->addParam("post", $post);
			$this->addParam("comments", $comments);
			$this->View("post");
		}

	}
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

		/* Administration Post */

		public function PostList() {
			$posts = $this->PostManager->getPosts();
            
			$this->addParam("posts", $posts);
			$this->View("admin/postlist");
        }

		public function PostAdd() {
            
			$form = new Form();
			$form->add('title', "Title", [
				function($value) {
					return [
						"assertion" => $value !== "",
						"message" => "Votre champ ne doit pas êtres vide."
					];
			}]);
			$form->add('chapo', "Chapo", [
				function($value) {
					return [
						"assertion" => $value !== "",
						"message" => "Votre champ ne doit pas êtres vide."
					];
			}]);
			$form->add('content', "Content", [
				function($value) {
					return [
						"assertion" => $value !== "",
						"message" => "Votre champ ne doit pas êtres vide."
					];
			}]);
			$form->handle($this->_httpRequest);
			if($form->isSubmitted() && $form->isValid()) {
				$this->PostManager->addPost($form->fields['title']['value'], $form->fields['chapo']['value'], $form->fields['content']['value']);
				header("Location: /admin/post/list");
				exit();
			}

			$this->addParam("form", $form);
			$this->View("admin/postadd");
        }

		public function PostEdit($id) {
			$post = $this->PostManager->getPost($id);

			$form = new Form();
			$form->add('title', "Title", [
				function($value) {
					return [
						"assertion" => $value !== "",
						"message" => "Votre champ ne doit pas êtres vide."
					];
			}], $post->getTitle());
			$form->add('chapo', "Chapo", [
				function($value) {
					return [
						"assertion" => $value !== "",
						"message" => "Votre champ ne doit pas êtres vide."
					];
			}], $post->getChapo());
			$form->add('content', "Content", [
				function($value) {
					return [
						"assertion" => $value !== "",
						"message" => "Votre champ ne doit pas êtres vide."
					];
			}], $post->getContent());
			$form->handle($this->_httpRequest);
			if($form->isSubmitted() && $form->isValid()) {
				$this->PostManager->editPost($form->fields['title']['value'], $form->fields['chapo']['value'], $form->fields['content']['value']);
				header("Location: /admin/post/list");
				exit();
			}

			$this->addParam("form", $form);
			$this->View("admin/postedit");
        }

		public function PostDelete($id) {

			$this->PostManager->deletePost($id);

			header("Location: /admin/post/list");
			exit();
		}
	}
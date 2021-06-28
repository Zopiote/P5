<?php

	class CommentController extends BaseController {

        /* Administration Comment */

        public function CommentList() {
            $comments = $this->CommentManager->getListComments();
            
            $this->addParam("comments", $comments);
            $this->View("admin/commentlist");
        }

        public function CommentDelete($id) {

			$this->CommentManager->deleteComment($id);

			header("Location: /admin/comment/list");
			exit();
		}

    }
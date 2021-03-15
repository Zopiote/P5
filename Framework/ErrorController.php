<?php

	class ErrorController {

		public function Show($exception) {
			$this->addParam($exception);
			$this->view("error");
		}
	}
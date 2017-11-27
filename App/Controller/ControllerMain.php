<?php
	/**
	* 	Represents a Main Controller.
	*	Year: 2017
	*/

	namespace App\Controllers;

	use App\Models;
	use App\Views;

	class ControllerPasseiRaspando {
		
		public function index() {
			$modelMain = new Models\ModelMain();
			$viewMain  = new Views\ViewMain();
			$viewMain->render('teste de conteúdo');
		}
		
		public function save($data) {
			$modelMain = new Models\ModelMain();
			$modelMain->saveData($data);
		}
		
		public function query($data) {
			$modelMain = new Models\ModelMain();
			$viewMain  = new Views\ViewMain();
			$viewMain->render($modelMain->query($data));
		}
		
	}
?>
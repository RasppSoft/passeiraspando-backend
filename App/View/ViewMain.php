<?php
	/**
	* 	Representes a View.
	*	Year: 2017
	*/

	namespace App\Views;

	class ViewMain {
		public function render($data) {
			// Aqui vai o view do site
			echo '<h3 align="center">PasseiRaspando - Teste</h3>';
			echo '<p><b>Data:</b> '.$data.'</p>';
		}
	}
?>
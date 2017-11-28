<?php
	/**
	* 	Represents a Route Controller.
	*	Year: 2017
	*/

	namespace App\Controllers;
	
	use App\Models;
	use App\Views;

	class Routes {
		
		public function call($controller='', $action='', $data='') {
			
			require_once('Controller' . $controller . '.php');
			
			switch ($controller) {
				case 'Pagina':
					$viewPage = new Views\ViewPage();
					$viewPage->render($action, $data);
				break;
				
				case 'Disciplina':
					switch ($action) {
						case 'mostrar':
							$viewDisciplina = new Views\ViewDisciplina();
							$viewDisciplina->render($data);
						break;
						
						default:
							$modelDisciplina = new Models\ModelDisciplina();
							$modelDisciplina->crud($action, $data);
						break;
					}
				break;
				
				case 'Universidade':
					switch ($action) {
						case 'mostrar':
							$viewUniversidade = new Views\ViewUniversidade();
							$viewUniversidade->render($data);
						break;
						
						default:
							$modelUniversidade = new Models\ModelUniversidade();
							$modelUniversidade->crud($action, $data);
						break;
					}
				break;
				
				case 'Arquivo':
					switch ($action) {
						case 'mostrar':
							$viewArquivo = new Views\ViewArquivo();
							$viewArquivo->render($data);
						break;
						
						default:
							$modelArquivo = new Models\ModelArquivo();
							$modelArquivo->crud($action, $data);
						break;
					}
				break;
				
				case 'Usuario':
					switch ($action) {
						case 'mostrar':
							$viewUsuario = new Views\ViewUsuario();
							$viewUsuario->render($data);
						break;
						
						default:
							$modelUsuario = new Models\ModelUsuario();
							$modelUsuario->crud($action, $data);
						break;
					}
				break;
			}
			
			$controller->{ $action }();
			
			$controllers = array(
				'Pagina'			=> ['inicio', 'disciplina', 'universidades', 'arquivos', 'perfil', 'sair', 'erro'],
				'Disciplina'		=> ['mostrar', 'adicionar', 'editar', 'excluir'],
				'Universidade'	=> ['mostrar', 'adicionar', 'editar', 'excluir'],
				'Arquivo'			=> ['mostrar', 'adicionar', 'editar', 'excluir'],
				'Usuario'			=> ['mostrar', 'adicionar', 'editar', 'excluir']
			);
			
			if (array_key_exists($controller, $controllers)) {
				if (in_array($action, $controllers[$controller])) {
					call($controller, $action, $data);
				} else {
					call('paginas', 'erro');
				}
			} else {
				call('paginas', 'erro');
			}
		}
		
	}
?>
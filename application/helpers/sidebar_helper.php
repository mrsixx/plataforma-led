<?php
/**
*  Helper com funções para renderizar o menu lateral dinâmicamente
*  @author Matheus Antonio
*/
defined('BASEPATH') OR exit('No direct script access allowed');

if(!function_exists('retornaSidebar')){
	function retornaSidebar($tipo, $pagina,$dados = null, $tranca = null){
		switch ($pagina) {
			case 'principal':
				return sidebarPrincipal($tipo,$dados,$tranca);
				break;

			case 'mural':
				return sidebarMural($tipo,$dados);
				break;
			
			case 'chat':
				return sidebarChat($tipo);
				break;
			
			
			case 'tools':
				return sidebarLinks($tipo,$dados);
				break;
			
			default:
				# code...
				break;
		}
	}
}


if(!function_exists('sidebarPrincipal')){
	function sidebarPrincipal($tipo,$dados = null, $tranca = null){
		//aqui eu verifico se existem novas publicações, mensagens, missões, ou eventos para aquele usuário e coloco uma badge
		//passando a quantidade de novas mensagens
		if(!empty($dados['msg'])){
			$badgeMsg = TRUE;
			$qtdMsg = $dados['msg'];
		}else{
			$badgeMsg = FALSE;
			$qtdMsg = null;
		}
		if(!empty($dados['mural'])){
			$badgeMural = TRUE;
			$qtdMural = $dados['mural'];
		}else{
			$badgeMural = FALSE;
			$qtdMural = null;
		}
		switch ($tipo) {
			case 1:
				//exibo os links que os administradores visualizarão
				$links = array(
					'mural' => array(
						'href' => '\mural', 'icon' => 'glyphicon-pushpin', 'title' => 'Mural', 'badge' => $badgeMural, 'qtdbadge' => $qtdMural, 'disabled' => $tranca
					),

					'chat' => array(
						'href' => '\chat', 'icon' => 'glyphicon-comment', 'title' => 'Bate-Papo', 'badge' => $badgeMsg, 'qtdbadge' => $qtdMsg, 'disabled' => $tranca
					),

					'missoes' => array(
						'href' => '\tasks', 'icon' => 'glyphicon-tasks', 'title' => 'Missões', 'badge' => TRUE, 'qtdbadge' => 3, 'disabled' => $tranca
					),

					'biblioteca' => array(
						'href' => '\biblioteca', 'icon' => 'glyphicon-book', 'title' => 'Biblioteca', 'badge' => FALSE, 'qtdbadge' => null, 'disabled' => $tranca
					),

					'calendario' => array(
						'href' => '\calendario', 'icon' => 'glyphicon-calendar', 'title' => 'Calendário', 'badge' => FALSE, 'qtdbadge' => null, 'disabled' => $tranca
					),

					'ferramentas' => array(
						'href' => '\ferramentas', 'icon' => 'glyphicon-wrench', 'title' => 'Ferramentas', 'badge' => FALSE, 'qtdbadge' => null, 'disabled' => $tranca
					),
					
					'relacao' => array(
						'href' => '\users', 'icon' => 'glyphicon-list-alt', 'title' => 'Relação de usuários', 'badge' => FALSE, 'qtdbadge' => null, 'disabled' => $tranca
					),

					'reports' => array(
						'href' => '\denuncias', 'icon' => 'glyphicon-flag', 'title' => 'Publicações denúnciadas', 'badge' => FALSE, 'qtdbadge' => null, 'disabled' => $tranca
					), 

					'ambiente' => array(
						'href' => '\configuracao-ambiente', 'icon' => 'glyphicon-cloud', 'title' => 'Configurar ambiente', 'badge' => FALSE, 'qtdbadge' => null
					)
				);
				break;
			case 2:
				//exibo os links que os funcionários visualizarão
				$links = array(
					'mural' => array(
						'href' => '\mural', 'icon' => 'glyphicon-pushpin', 'title' => 'Mural', 'badge' => $badgeMural, 'qtdbadge' => $qtdMural
					),

					'chat' => array(
						'href' => '\chat', 'icon' => 'glyphicon-comment', 'title' => 'Bate-Papo', 'badge' => $badgeMsg, 'qtdbadge' => $qtdMsg
					),

					'missoes' => array(
						'href' => '\tasks', 'icon' => 'glyphicon-star-empty', 'title' => 'Missões', 'badge' => TRUE, 'qtdbadge' => 3
					),

					'biblioteca' => array(
						'href' => '\biblioteca', 'icon' => 'glyphicon-book', 'title' => 'Biblioteca', 'badge' => FALSE, 'qtdbadge' => null
					),

					'calendario' => array(
						'href' => '\calendario', 'icon' => 'glyphicon-calendar', 'title' => 'Calendário', 'badge' => FALSE, 'qtdbadge' => null
					),

					'ferramentas' => array(
						'href' => '\ferramentas', 'icon' => 'glyphicon-wrench', 'title' => 'Ferramentas', 'badge' => FALSE, 'qtdbadge' => null
					)
				);
				break;
			case 3:
				//exibo os links que os alunos visualizarão
				$links = array(
					'mural' => array(
						'href' => '\mural', 'icon' => 'glyphicon-pushpin', 'title' => 'Mural', 'badge' => $badgeMural, 'qtdbadge' => $qtdMural
					),

					'chat' => array(
						'href' => '\chat', 'icon' => 'glyphicon-comment', 'title' => 'Bate-Papo', 'badge' => $badgeMsg, 'qtdbadge' => $qtdMsg
					),

					'missoes' => array(
						'href' => '\tasks', 'icon' => 'glyphicon-star-empty', 'title' => 'Missões', 'badge' => TRUE, 'qtdbadge' => 3
					),

					'biblioteca' => array(
						'href' => '\biblioteca', 'icon' => 'glyphicon-book', 'title' => 'Biblioteca', 'badge' => FALSE, 'qtdbadge' => null
					),

					'calendario' => array(
						'href' => '\calendario', 'icon' => 'glyphicon-calendar', 'title' => 'Calendário', 'badge' => FALSE, 'qtdbadge' => null
					),

					'ferramentas' => array(
						'href' => '\ferramentas', 'icon' => 'glyphicon-wrench', 'title' => 'Ferramentas', 'badge' => FALSE, 'qtdbadge' => null
					)
				);
				break;
			default:
				//exibo os links default
				$links = array(
					'mural' => array(
						'href' => '', 'icon' => 'glyphicon-pushpin', 'title' => 'Mural', 'badge' => $badgeMural, 'qtdbadge' => $qtdMural
					),

					'chat' => array(
						'href' => '', 'icon' => 'glyphicon-comment', 'title' => 'Bate-Papo', 'badge' => TRUE, 'qtdbadge' => 2
					),

					'missoes' => array(
						'href' => '', 'icon' => 'glyphicon-star-empty', 'title' => 'Missões', 'badge' => TRUE, 'qtdbadge' => 3
					),

					'biblioteca' => array(
						'href' => '', 'icon' => 'glyphicon-book', 'title' => 'Biblioteca', 'badge' => FALSE, 'qtdbadge' => null
					),

					'calendario' => array(
						'href' => '', 'icon' => 'glyphicon-calendar', 'title' => 'Calendário', 'badge' => FALSE, 'qtdbadge' => null
					),

					'ferramentas' => array(
						'href' => '', 'icon' => 'glyphicon-wrench', 'title' => 'Ferramentas', 'badge' => FALSE, 'qtdbadge' => null
					)
				);
				break;
		}
		return $links;
	}
}

if(!function_exists('sidebarMural')){
	function sidebarMural($tipo,$dados){
		// switch ($tipo) {
		// 	case 1:
		// 		$links = array();

		// 		foreach ($dados['dados'] as $ind => $mural) {
		// 			$indice = str_replace(" ", "", $mural->Nome);
		// 			$indice = strtolower($indice);
		// 			$links[utf8_encode($indice)] = array(
		// 				'href' => '#', 'icon' => 'fa fa-paperclip', 'title' => utf8_encode("$mural->Nome"), 'badge' => (isset($dados['qtd'][$ind]) && $dados['qtd'][$ind] != 0)? TRUE : FALSE, 'qtdbadge' => $dados['qtd'][$ind]
		// 			);
		// 		}
		// 		break;
		// 	case 2:
		// 		//exibo os links que os funcionários visualizarão
		// 		$links = array(
		// 			'mural' => array(
		// 				'href' => '', 'icon' => 'glyphicon-pushpin', 'title' => 'Mural', 'badge' => TRUE, 'qtdbadge' => 6
		// 			),

		// 			'chat' => array(
		// 				'href' => '', 'icon' => 'glyphicon-comment', 'title' => 'Bate-Papo', 'badge' => TRUE, 'qtdbadge' => 2
		// 			),

		// 			'missoes' => array(
		// 				'href' => '', 'icon' => 'glyphicon-star-empty', 'title' => 'Missões', 'badge' => TRUE, 'qtdbadge' => 3
		// 			),

		// 			'biblioteca' => array(
		// 				'href' => '', 'icon' => 'glyphicon-book', 'title' => 'Biblioteca', 'badge' => FALSE, 'qtdbadge' => null
		// 			),

		// 			'calendario' => array(
		// 				'href' => '', 'icon' => 'glyphicon-calendar', 'title' => 'Calendário', 'badge' => FALSE, 'qtdbadge' => null
		// 			),

		// 			'ferramentas' => array(
		// 				'href' => '', 'icon' => 'glyphicon-wrench', 'title' => 'Ferramentas', 'badge' => FALSE, 'qtdbadge' => null
		// 			)
		// 		);
		// 		break;
		// 	case 3:
		// 		//exibo os links que os alunos visualizarão
		// 		$links = array(
		// 			'mural' => array(
		// 				'href' => '', 'icon' => 'glyphicon-pushpin', 'title' => 'Mural', 'badge' => TRUE, 'qtdbadge' => 6
		// 			),

		// 			'chat' => array(
		// 				'href' => '', 'icon' => 'glyphicon-comment', 'title' => 'Bate-Papo', 'badge' => TRUE, 'qtdbadge' => 2
		// 			),

		// 			'missoes' => array(
		// 				'href' => '', 'icon' => 'glyphicon-star-empty', 'title' => 'Missões', 'badge' => TRUE, 'qtdbadge' => 3
		// 			),

		// 			'biblioteca' => array(
		// 				'href' => '', 'icon' => 'glyphicon-book', 'title' => 'Biblioteca', 'badge' => FALSE, 'qtdbadge' => null
		// 			),

		// 			'calendario' => array(
		// 				'href' => '', 'icon' => 'glyphicon-calendar', 'title' => 'Calendário', 'badge' => FALSE, 'qtdbadge' => null
		// 			),

		// 			'ferramentas' => array(
		// 				'href' => '', 'icon' => 'glyphicon-wrench', 'title' => 'Ferramentas', 'badge' => FALSE, 'qtdbadge' => null
		// 			)
		// 		);
		// 		break;
		// 	default:
		// 		//exibo os links default
		// 		$links = array(
		// 			'mural' => array(
		// 				'href' => '', 'icon' => 'glyphicon-pushpin', 'title' => 'Mural', 'badge' => TRUE, 'qtdbadge' => 6
		// 			),

		// 			'chat' => array(
		// 				'href' => '', 'icon' => 'glyphicon-comment', 'title' => 'Bate-Papo', 'badge' => TRUE, 'qtdbadge' => 2
		// 			),

		// 			'missoes' => array(
		// 				'href' => '', 'icon' => 'glyphicon-star-empty', 'title' => 'Missões', 'badge' => TRUE, 'qtdbadge' => 3
		// 			),

		// 			'biblioteca' => array(
		// 				'href' => '', 'icon' => 'glyphicon-book', 'title' => 'Biblioteca', 'badge' => FALSE, 'qtdbadge' => null
		// 			),

		// 			'calendario' => array(
		// 				'href' => '', 'icon' => 'glyphicon-calendar', 'title' => 'Calendário', 'badge' => FALSE, 'qtdbadge' => null
		// 			),

		// 			'ferramentas' => array(
		// 				'href' => '', 'icon' => 'glyphicon-wrench', 'title' => 'Ferramentas', 'badge' => FALSE, 'qtdbadge' => null
		// 			)
		// 		);
		// 		break;
		// }
		foreach ($dados['dados'] as $ind => $mural) {
					$indice = str_replace(" ", "", $mural->Nome);
					$indice = strtolower($indice);
					$links[utf8_encode($indice)] = array(
						'href' => "/mural/$mural->CodMural", 'icon' => 'fa fa-paperclip', 'title' => utf8_encode("$mural->Nome"), 'badge' => (isset($dados['qtd'][$ind]) && $dados['qtd'][$ind] != 0)? TRUE : FALSE, 'qtdbadge' => $dados['qtd'][$ind]
					);
				}
		return $links;
	}
}

if(!function_exists('sidebarChat')){
	function sidebarChat($tipo){
		switch ($tipo) {
			case 1:
				//exibo os links que os administradores visualizarão
				$links = array(
					'mural' => array(
						'href' => '\mural', 'icon' => 'glyphicon-pushpin', 'title' => 'Mural', 'badge' => TRUE, 'qtdbadge' => 6
					),

					'chat' => array(
						'href' => '\chat', 'icon' => 'glyphicon-comment', 'title' => 'Bate-Papo', 'badge' => TRUE, 'qtdbadge' => 2
					),

					'missoes' => array(
						'href' => '\tasks', 'icon' => 'glyphicon-tasks', 'title' => 'Missões', 'badge' => TRUE, 'qtdbadge' => 3
					),

					'biblioteca' => array(
						'href' => '\biblioteca', 'icon' => 'glyphicon-book', 'title' => 'Biblioteca', 'badge' => FALSE, 'qtdbadge' => null
					),

					'calendario' => array(
						'href' => '\calendario', 'icon' => 'glyphicon-calendar', 'title' => 'Calendário', 'badge' => FALSE, 'qtdbadge' => null
					),

					'ferramentas' => array(
						'href' => '\ferramentas', 'icon' => 'glyphicon-wrench', 'title' => 'Ferramentas', 'badge' => FALSE, 'qtdbadge' => null
					),
					
					'relacao' => array(
						'href' => '\alunos', 'icon' => 'glyphicon-list-alt', 'title' => 'Relação de alunos', 'badge' => FALSE, 'qtdbadge' => null
					),

					'reports' => array(
						'href' => '\denuncias', 'icon' => 'glyphicon-flag', 'title' => 'Publicações denúnciadas', 'badge' => FALSE, 'qtdbadge' => null
					), 

					'ambiente' => array(
						'href' => '\configuracao-ambiente', 'icon' => 'glyphicon-cloud', 'title' => 'Configurar ambiente', 'badge' => FALSE, 'qtdbadge' => null
					)
				);
				break;
			case 2:
				//exibo os links que os funcionários visualizarão
				$links = array(
					'mural' => array(
						'href' => '', 'icon' => 'glyphicon-pushpin', 'title' => 'Mural', 'badge' => TRUE, 'qtdbadge' => 6
					),

					'chat' => array(
						'href' => '', 'icon' => 'glyphicon-comment', 'title' => 'Bate-Papo', 'badge' => TRUE, 'qtdbadge' => 2
					),

					'missoes' => array(
						'href' => '', 'icon' => 'glyphicon-star-empty', 'title' => 'Missões', 'badge' => TRUE, 'qtdbadge' => 3
					),

					'biblioteca' => array(
						'href' => '', 'icon' => 'glyphicon-book', 'title' => 'Biblioteca', 'badge' => FALSE, 'qtdbadge' => null
					),

					'calendario' => array(
						'href' => '', 'icon' => 'glyphicon-calendar', 'title' => 'Calendário', 'badge' => FALSE, 'qtdbadge' => null
					),

					'ferramentas' => array(
						'href' => '', 'icon' => 'glyphicon-wrench', 'title' => 'Ferramentas', 'badge' => FALSE, 'qtdbadge' => null
					)
				);
				break;
			case 3:
				//exibo os links que os alunos visualizarão
				$links = array(
					'mural' => array(
						'href' => '', 'icon' => 'glyphicon-pushpin', 'title' => 'Mural', 'badge' => TRUE, 'qtdbadge' => 6
					),

					'chat' => array(
						'href' => '', 'icon' => 'glyphicon-comment', 'title' => 'Bate-Papo', 'badge' => TRUE, 'qtdbadge' => 2
					),

					'missoes' => array(
						'href' => '', 'icon' => 'glyphicon-star-empty', 'title' => 'Missões', 'badge' => TRUE, 'qtdbadge' => 3
					),

					'biblioteca' => array(
						'href' => '', 'icon' => 'glyphicon-book', 'title' => 'Biblioteca', 'badge' => FALSE, 'qtdbadge' => null
					),

					'calendario' => array(
						'href' => '', 'icon' => 'glyphicon-calendar', 'title' => 'Calendário', 'badge' => FALSE, 'qtdbadge' => null
					),

					'ferramentas' => array(
						'href' => '', 'icon' => 'glyphicon-wrench', 'title' => 'Ferramentas', 'badge' => FALSE, 'qtdbadge' => null
					)
				);
				break;
			default:
				//exibo os links default
				$links = array(
					'mural' => array(
						'href' => '', 'icon' => 'glyphicon-pushpin', 'title' => 'Mural', 'badge' => TRUE, 'qtdbadge' => 6
					),

					'chat' => array(
						'href' => '', 'icon' => 'glyphicon-comment', 'title' => 'Bate-Papo', 'badge' => TRUE, 'qtdbadge' => 2
					),

					'missoes' => array(
						'href' => '', 'icon' => 'glyphicon-star-empty', 'title' => 'Missões', 'badge' => TRUE, 'qtdbadge' => 3
					),

					'biblioteca' => array(
						'href' => '', 'icon' => 'glyphicon-book', 'title' => 'Biblioteca', 'badge' => FALSE, 'qtdbadge' => null
					),

					'calendario' => array(
						'href' => '', 'icon' => 'glyphicon-calendar', 'title' => 'Calendário', 'badge' => FALSE, 'qtdbadge' => null
					),

					'ferramentas' => array(
						'href' => '', 'icon' => 'glyphicon-wrench', 'title' => 'Ferramentas', 'badge' => FALSE, 'qtdbadge' => null
					)
				);
				break;
		}
		return $links;
	}
}

if(!function_exists('sidebarLinks')){
	function sidebarLinks($tipo,$dados){
		$links = array();
		switch ($tipo) {
			case 1:
				foreach ($dados['dados'] as $ind => $link) {

					$indice = str_replace(" ", "", $link->Nome);
					$indice = strtolower($indice);
					$links[utf8_encode($indice)] = array(
						'href' => "/ferramentas/$link->CodLink", 'icon' => 'glyphicon glyphicon-wrench', 'title' => utf8_encode("$link->Nome"), 'badge' => FALSE, 'qtdbadge' => null, 'codigo' => $link->CodLink
					);
				}
				break;
			default:
				foreach ($dados['dados'] as $ind => $link) {

					$indice = str_replace(" ", "", $link->Nome);
					$indice = strtolower($indice);
					$links[utf8_encode($indice)] = array(
						'href' => "/ferramentas/$link->CodLink", 'icon' => 'glyphicon glyphicon-wrench', 'title' => utf8_encode("$link->Nome"), 'badge' => FALSE, 'qtdbadge' => null
					);
				}
				break;
		}
		return $links;
	}
}
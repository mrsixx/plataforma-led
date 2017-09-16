<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if(!function_exists('retornaSidebar')){
	function retornaSidebar($tipo){
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
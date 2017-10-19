<?php
/**
*  Helper com funções para renderizar o layout dinâmicamente
*  @author Matheus Antonio
*/
defined('BASEPATH') OR exit('No direct script access allowed');

if(!function_exists('preencheInterface')){
	function preencheInterface($dadosSessao, $pagina = null, $tranca = false){
		$CI =& get_instance();
		//pegando informações do usuário para preencher a interface
		$CI->load->model('interface_led');
		$info = $CI->interface_led->pegaInformacoes($dadosSessao);
		//formatando os índices do array da consulta para utilizá-los como variavel nas views
		foreach ($info as $indice => $valor) {
			$indice = strtolower($indice);
			$dados[$indice] = $valor;
		}
		//passando o código do usuário
		$dados['codUsuario'] = $dadosSessao['cod'];
		// verificando notificações
		$dados['qtdnotificacoes'] = notificacao($dadosSessao, "qtd");
		$dados['notificacoes'] = notificacao($dadosSessao);
		//verificando lvl 
		$dados['lvl'] = round($CI->interface_led->retornaLvl($dadosSessao));
		$dados['xp'] = 89;
		//pegando foto do perfil
		if(isset($dados['foto'])){
			$dados['foto'] = base_url('users/profile/'.$dados['foto'].'.jpg');
		}else{
			if($dados['sexo'] == "M"){
				$dados['foto'] = base_url('assets/img/user-m.png');
			}else if($dados['sexo'] == "F"){
				$dados['foto'] = base_url('assets/img/user-f.png');
			}
		}
		//definindo os valores que serão exibidos dinamicamente na sidebar de acordo com o tipo de usuário e de acordo com a sidebar
		$CI->load->helper('sidebar');
		switch ($pagina) {
			case 'principal':
				//puxo a quantidade de publicações novas, mensagens não vistas e eventos próximos para aquele usuário e jogo na sidebar
				$CI->load->model('chat');
				$CI->load->model('mural');
				$badges['msg']  = $CI->chat->msgNvista(array('CodDestino' => $dadosSessao['cod'], 'Status' => 0));
				$badges['mural'] = $CI->mural->retornaBadge($dadosSessao['cod'],'soma');
				$dados['menulateral'] = retornaSidebar($dadosSessao['tipo'],$pagina,$badges,$tranca);
				break;
			
			case 'mural':
				$CI->load->model('mural');
				$mural['dados'] = $CI->mural->retornaMural(array('CodUsuario' => $dadosSessao['cod']));
				foreach ($mural['dados'] as $m) {
					$qtd[] = $CI->mural->retornaBadge($m->CodMural, null);
				}
				$mural['qtd'] = $qtd;
				$dados['menulateral'] = retornaSidebar($dadosSessao['tipo'],$pagina,$mural,$tranca);
				break;
			case 'tools':
				$CI->load->model('link');
				$link['dados'] = $CI->link->retornaLink();
				$dados['menulateral'] = retornaSidebar($dadosSessao['tipo'],$pagina,$link,null);
				break;

			case 'task':
				$CI->load->model('task');
				$link['dados'] = $CI->link->retornaLink();
				$dados['menulateral'] = retornaSidebar($dadosSessao['tipo'],$pagina,$link,null);
				break;

			default:
				# code...
				break;
		}
		
		$dados['tipo'] = $dadosSessao['tipo'];
		return $dados;
	}
}

if(!function_exists('attNotificacao')){
	function attNotificacao(){
		$CI =& get_instance();
		// $data['CodDestinatario'] = $CI->input->post('user');
		// $data['CodNotificacao'] = $CI->input->post('notificacao');
		$data = array('CodNotificacao' => $CI->input->post('notificacao'));
		$CI->load->model('interface_led');
		$result = $CI->interface_led->statusNotificacao($data);
		return $result;
	}
}
if(!function_exists('notificacao')){	
	function notificacao($dados = null,$acao = null){
		$CI =& get_instance();
		if(isset($_GET['dados'])){
			$dados = $CI->input->get('dados');
		}
		if(isset($_GET['acao'])){
			$acao = $CI->input->get('acao');
		}
		if(!is_array($dados)){
			$dados = array('cod' => (int)$dados);
		}
		switch ($acao) {
			case 'qtd':
				$CI->load->model('interface_led');
				return $CI->interface_led->contadorNotificacoes($dados);
			break;
			default:
				$CI->load->model('interface_led');
				return $CI->interface_led->notificacoes($dados);
			break;
		}
	}
}
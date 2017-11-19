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
		$CI->load->model('Interface_led');
		$info = $CI->Interface_led->pegaInformacoes($dadosSessao);
		//formatando os índices do array da consulta para utilizá-los como variavel nas views
		foreach ($info as $indice => $valor) {
			$indice = strtolower($indice);
			$dados[$indice] = $valor;
		}
		//passando o código do usuário
		$dados['codUsuario'] = $dadosSessao['cod'];
		// verificando notificações


		$CI->load->library('session');
		$buscador = $CI->session->login;

		$dados['qtdnotificacoes'] = notificacao($buscador, "qtd");
		$dados['notificacoes'] = notificacao($buscador);


		//verificando lvl - CHAMANDO FUNÇÃO
		$CI->load->helper('xp');
		$dados += calculaLvl($CI->Interface_led->retornaXp($dadosSessao));



		//pegando foto do perfil
		$dados['foto'] = fotoPerfil($dados['foto'],$dados['sexo']);
		//definindo os valores que serão exibidos dinamicamente na sidebar de acordo com o tipo de usuário e de acordo com a sidebar
		$CI->load->helper('sidebar');
		switch ($pagina) {
			case 'principal':
				//puxo a quantidade de publicações novas, mensagens não vistas e eventos próximos para aquele usuário e jogo na sidebar
				$CI->load->model('BatePapo','chat');
				$CI->load->model('Mural');
				$badges['msg']  = $CI->chat->msgNvista(array('CodDestino' => $dadosSessao['cod'], 'Status' => 0));
				$badges['mural'] = $CI->Mural->retornaBadge($dadosSessao['cod'],'soma');
				$dados['menulateral'] = retornaSidebar($dadosSessao['tipo'],$pagina,$badges,$tranca);
				break;

			case 'mural':
				$CI->load->model('Mural');
				$mural['dados'] = $CI->Mural->retornaMural(array('CodUsuario' => $dadosSessao['cod']));
				foreach ($mural['dados'] as $m) {
					$qtd[] = $CI->Mural->retornaBadge($m->CodMural, null);
				}
				$mural['qtd'] = $qtd;
				$dados['menulateral'] = retornaSidebar($dadosSessao['tipo'],$pagina,$mural,$tranca);
				break;
			
			case 'chat':
				$CI->load->model('BatePapo','chat');
				$cod = $dadosSessao['cod'];
				$chat['dados'] = $CI->chat->retornaMsgSidebar("`CodDestino` = $cod OR `CodRemetente` = $cod",TRUE,null);
				$dados['menulateral'] = retornaSidebar($dadosSessao['tipo'],$pagina,$chat);
				break;

			case 'tools':
				$CI->load->model('Link');
				$link['dados'] = $CI->Link->retornaLink();
				$dados['menulateral'] = retornaSidebar($dadosSessao['tipo'],$pagina,$link,null);
				break;

			case 'library':
				$CI->load->model('Library','library');
				$link['dados'] = $CI->library->retornaLivro();
				$dados['menulateral'] = retornaSidebar($dadosSessao['tipo'],$pagina,$link,null);
				break;

			case 'tasks':
				$CI->load->model('Missoes');
				$CI->load->model('Escola');
				$turma = $CI->Escola->getAlunoTurma(array('at.CodUsuario' => $dadosSessao['cod']));	
				foreach ($turma as $t) {
					$codTurma = $t->CodTurma;
				}
				$link['dados'] = ($dadosSessao['tipo'] == 3)? $CI->Missoes->retornaTask(array('turma.CodTurma' => $codTurma, 'Prazo >=' => date('Y-m-d H:i')),null) : $CI->Missoes->retornaTask(array('CodCriador' => $dadosSessao['cod']),null);
				$dados['menulateral'] = retornaSidebar($dadosSessao['tipo'],$pagina,$link,null);
				break;

			case 'compcurricular':
				$CI->load->model('Escola');
				if($dadosSessao['tipo'] == 3){
					$alunoTurma = $CI->Escola->getAlunoTurma(array('CodAluno' => $dadosSessao['cod']),'array');
					$turma = $alunoTurma['CodTurma'];
					$link['dados'] = $CI->Escola->getCompCurricular(array('t.CodTurma' => $turma));
				}
				else if($dadosSessao['tipo'] == 4){
					$link['dados'] = $CI->Escola->getCompCurricular(array('CodProfessor' => $dadosSessao['cod']));
				}
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
		$CI->load->model('Interface_led');
		$result = $CI->Interface_led->statusNotificacao($data);
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
				$CI->load->model('Interface_led');
				return $CI->Interface_led->contadorNotificacoes($dados);
			break;
			default:
				$CI->load->model('Interface_led');
				return $CI->Interface_led->notificacoes($dados);
			break;
		}
	}
}

if(!function_exists('fotoPerfil')){
	function fotoPerfil($nmFoto,$sexo){
		if(isset($nmFoto)){
			$foto = base_url('data/profile/'.$nmFoto)."?".time();
		}else{
			if($sexo == "M"){
				$foto = base_url('assets/img/user-m.png')."?".time();
			}else if($sexo == "F"){
				$foto = base_url('assets/img/user-f.png')."?".time();
			}
		}

		return $foto;
	}
}
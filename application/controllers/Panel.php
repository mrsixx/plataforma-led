<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Panel extends CI_Controller {
	//função index, verifica a situação da plataforma para direcionar o usuário para um destino
	public function index($erro = null){	
		//verificando se a sessão existe, caso exista mando para o painel 
		$this->load->library('session');
		if($this->session->has_userdata('login')){
			$usuario = $this->session->login;
			$cod = $usuario['cod'];
			$tipo = $usuario['tipo'];

			//recebo o array com as informações da interface
			$data = $this->preencheInterface($usuario);

			//carregando a view enquanto passo as informações
			$data['title'] = "Painel";
			$data['content'] = "home";
			$data['sidebar'] = "home";
			//definindo os valores que serão exibidos dinamicamente na sidebar de acordo com o tipo de usuário
			$this->load->helper('sidebar');
			$data['menulateral'] = retornaSidebar($tipo);
			// $data['css'] = array('css'=>'<link href="'.base_url("assets/css/style.css").'" rel="stylesheet">');
			$this->load->view('panel/layout', $data);

		}else{
			//se não houver sessão, então mando de volta pois não existiu um login
			redirect(base_url());
		}
	}

	public function mural(){
		//verificando se a sessão existe, caso exista mando para o painel 
		$this->load->library('session');
		if($this->session->has_userdata('login')){
			$usuario = $this->session->login;
			$cod = $usuario['cod'];
			$tipo = $usuario['tipo'];

			//recebo o array com as informações da interface
			$data = $this->preencheInterface($usuario);

			//carregando a view enquanto passo as informações
			$data['title'] = "Mural";
			$data['content'] = "mural";
			$data['sidebar'] = "mural";
			//definindo os valores que serão exibidos dinamicamente na sidebar de acordo com o tipo de usuário
			$this->load->helper('sidebar');
			$data['menulateral'] = retornaSidebar($tipo);
			$data['css'] = array('chat' => '<link href="'.base_url("assets/css/mural.css").'" rel="stylesheet">');	
			$this->load->view('panel/layout', $data);

		}else{
			//se não houver sessão, então mando de volta pois não existiu um login
			redirect(base_url());
		}
	}

	public function chat(){
		//verificando se a sessão existe, caso exista mando para o painel 
		$this->load->library('session');
		if($this->session->has_userdata('login')){
			$usuario = $this->session->login;
			$cod = $usuario['cod'];
			$tipo = $usuario['tipo'];

			//recebo o array com as informações da interface
			$data = $this->preencheInterface($usuario);

			//carregando a view enquanto passo as informações
			$data['title'] = "Chat";
			$data['content'] = "chat";
			$data['sidebar'] = "chat";
			//definindo os valores que serão exibidos dinamicamente na sidebar de acordo com o tipo de usuário
			$this->load->helper('sidebar');
			$data['menulateral'] = retornaSidebar($tipo);
			$data['css'] = array('chat' => '<link href="'.base_url("assets/css/chat.css").'" rel="stylesheet">');	
			$this->load->view('panel/layout', $data);

		}else{
			//se não houver sessão, então mando de volta pois não existiu um login
			redirect(base_url());
		}
	}

	public function profile(){
		$this->load->library('session');
		if($this->session->has_userdata('login')){
			echo "perfil";
		}else{
			redirect(base_url());
		}
	}

	public function help(){
		$this->load->library('session');
		if($this->session->has_userdata('login')){
			echo "ajuda";
		}else{
			redirect(base_url());
		}
	}

	public function settings(){
		$this->load->library('session');
		if($this->session->has_userdata('login')){
			echo "configurações";
		}else{
			redirect(base_url());
		}
	}

	public function logout(){
		$usuario = $this->input->get('s');
		$this->load->library('session');
		//dar um unset aqui dps
		$this->session->sess_destroy($usuario);
		// $this->session->sess_destroy();
		redirect(base_url());
	}


	public function configEscola(){
		$this->load->model("escola");
		$data['escola'] = $this->escola->getEscola();
		$data['cursos'] = $this->escola->getCursos();
		$this->load->view('panel/contents/configuracao-ambiente', $data);
	}






	public function preencheInterface($dadosSessao){
		//pegando informações do usuário para preencher a interface
		$this->load->model('interface_led');
		$info = $this->interface_led->pegaInformacoes($dadosSessao);
		//formatando os índices do array da consulta para utilizá-los como variavel nas views
		foreach ($info as $indice => $valor) {
			$indice = strtolower($indice);
			$dados[$indice] = $valor;
		}
		// verificando notificações
		$dados['qtdnotificacoes'] = $this->interface_led->contadorNotificacoes($dadosSessao);
		$dados['notificacoes'] = $this->interface_led->notificacoes($dadosSessao);
		//verificando lvl 
		$dados['lvl'] = round($this->interface_led->retornaLvl($dadosSessao));
		$dados['xp'] = 89;
		//pegando foto do perfil
		if(isset($dados['foto'])){
			$dados['foto'] = base_url('users/profile/'.$dados['Foto'].'.jpg');
		}else{
			if($dados['sexo'] == "M"){
				$dados['foto'] = base_url('assets/img/user-m.png');
			}else if($dados['sexo'] == "F"){
				$dados['foto'] = base_url('assets/img/user-f.jpg');
			}
		}
		return $dados;
	}
}

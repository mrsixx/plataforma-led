<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ambiente extends CI_Controller {
	public function index($erro = null){	
		//verificando se a sessão existe, caso exista mando para o painel 
		// $this->load->library('session');
		// if($this->session->has_userdata('login')){
		// 	$usuario = $this->session->login;
		// 	$cod = $usuario['cod'];
		// 	$tipo = $usuario['tipo'];

		// 	//verificando se existem cursos cadastrados
		// 	$this->load->model('escola');
		// 	$curso = $this->escola->getCursos();
		// 	if(!empty($curso)){
		// 		//recebo o array com as informações da interface
		// 		$data = $this->preencheInterface($usuario);

		// 		//carregando a view enquanto passo as informações
		// 		$data['title'] = "Painel";
		// 		$data['content'] = "home";
		// 		$data['sidebar'] = "home";
		// 		// $data['css'] = array('css'=>'<link href="'.base_url("assets/css/style.css").'" rel="stylesheet">');
		// 		$this->load->view('panel/layout', $data);
		// 	}else{
		// 		redirect(base_url('configuracao-ambiente'));
		// 	}
		// }else{
		// 	//se não houver sessão, então mando de volta pois não existiu um login
		// 	redirect(base_url());
		// }
	}

	public function attEscola(){
		//verificando se a sessão existe, caso exista mando para o painel 
		$this->load->library('session');
		if($this->session->has_userdata('login')){
			$usuario = $this->session->login;
			$data['Nome'] = $this->input->post('txtEscola');
			$data['DataFundacao'] = $this->input->post('dtFundacao');
			$data['Rua'] = $this->input->post('txtRua');
			$data['Bairro'] = $this->input->post('txtBairro');
			$data['Cidade'] = $this->input->post('txtCidade');
			$data['Cep'] = $this->input->post('txtCep');
			$data['Estado'] = $this->input->post('cmbEstado');
			$data['Website'] = $this->input->post('txtWebsite');
			$data['CodEscola'] = $this->input->post('cod');

			//carrego a model com o update
			$this->load->model("escola");
			//atualizo
			$retorno = $this->escola->updateEscola($data);
			//passo o retorno 
			return $retorno;
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
		//verificando se a sessão existe
		$this->load->library('session');
		if($this->session->has_userdata('login')){
			$usuario = $this->session->login;
			$cod = $usuario['cod'];
			$tipo = $usuario['tipo'];
			//preencho a interface 
			$data = $this->preencheInterface($usuario);
			//se existir eu mando pra view com as informações

			$this->load->model("escola");
			$data['escola'] = $this->escola->getEscola();
			$data['cursos'] = $this->escola->getCursos();
			$data['turmas'] = $this->escola->getTurma();

			$data['title'] = "Configuração de ambiente";
			$data['content'] = "ambiente";
			$data['sidebar'] = "home";
			$this->load->view('panel/layout', $data);

		}else{
			redirect(base_url());
		}

	}




	public function attNotificacao(){
		$data['usuario'] = $this->input->post('user');
		$data['notificacao'] = $this->input->post('notificacao');
		$this->load->model('interface_led');
		$result = $this->interface_led->statusNotificacao($data);
		return $result;
	}
	public function notificacao($dados = null,$acao = null){
		if(isset($_GET['dados'])){
			$dados = $this->input->get('dados');
		}
		if(isset($_GET['acao'])){
			$acao = $this->input->get('acao');
		}
		if(!is_array($dados)){
			$dados = array('cod' => (int)$dados);
		}
		switch ($acao) {
			case 'qtd':
				$this->load->model('interface_led');
				return $this->interface_led->contadorNotificacoes($dados);
			break;
			default:
				$this->load->model('interface_led');
				return $this->interface_led->notificacoes($dados);
			break;
		}
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
		$dados['qtdnotificacoes'] = $this->notificacao($dadosSessao, "qtd");
		$dados['notificacoes'] = $this->notificacao($dadosSessao);
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
		//definindo os valores que serão exibidos dinamicamente na sidebar de acordo com o tipo de usuário
		$this->load->helper('sidebar');
		$dados['menulateral'] = retornaSidebar($dadosSessao['tipo']);
		return $dados;
	}
}

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
			$data['Nome'] = utf8_decode($this->input->post('txtEscola'));
			$data['DataFundacao'] = utf8_decode($this->input->post('dtFundacao'));
			$data['Rua'] = utf8_decode($this->input->post('txtRua'));
			$data['Bairro'] = utf8_decode($this->input->post('txtBairro'));
			$data['Cidade'] = utf8_decode($this->input->post('txtCidade'));
			$data['Cep'] = utf8_decode($this->input->post('txtCep'));
			$data['Estado'] = utf8_decode($this->input->post('cmbEstado'));
			$data['Website'] = utf8_decode($this->input->post('txtWebsite'));
			$data['CodEscola'] = utf8_decode($this->input->post('cod'));

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

	public function cadCurso(){
		//verificando se a sessão existe, caso exista mando para o painel 
		$this->load->library('session');
		if($this->session->has_userdata('login')){
			$usuario = $this->session->login;
			$data['Nome'] = utf8_decode($this->input->post('txtNome'));
			$data['SerieInicial'] = $this->input->post('nbInicial');
			$data['SerieFinal'] = $this->input->post('nbFinal');
			$data['Status'] = $this->input->post('cmbStatus');
			$data['Descricao'] = utf8_decode($this->input->post('txtDescricao'));

			//carrego a model com o update
			$this->load->model("escola");
			//atualizo
			$retorno = $this->escola->cadastraCurso($data);
			//passo o retorno 
			return $retorno;
		}else{
			//se não houver sessão, então mando de volta pois não existiu um login
			redirect(base_url());
		}
	}

	public function cadTurma(){
		//verificando se a sessão existe, caso exista mando para o painel 
		$this->load->library('session');
		if($this->session->has_userdata('login')){
			$usuario = $this->session->login;

			//verificando se existem cursos
			$this->load->model('escola');
			$cursos = $this->escola->getCursos();
			if(!empty($cursos)){
				$data['NomeTurma'] = utf8_decode($this->input->post('txtNome'));
				$data['Modulo'] = $this->input->post('cmbModulo');
				$data['Periodo'] = utf8_decode($this->input->post('cmbPeriodo'));
				$data['InicioLetivo'] = $this->input->post('dtInicio');
				$data['FimLetivo'] = $this->input->post('dtFinal');
				$data['QtdAlunos'] = $this->input->post('nbQtd');
				$data['CodCurso'] = $this->input->post('cmbCurso');

				//carrego a model com o update
				$this->load->model("escola");
				//atualizo
				$retorno = $this->escola->cadastraTurma($data);
				//passo o retorno 
				return $retorno;
			}else{
				return false;
			}

		}else{
			//se não houver sessão, então mando de volta pois não existiu um login
			redirect(base_url());
		}
	}
}

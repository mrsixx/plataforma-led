<?php
/*
* Controlador criado para gerenciar o módulo com cadastro de links úteis na unidade de ensino
* @author Kaue Reis
*/
defined('BASEPATH') OR exit('No direct script access allowed');

class Ferramenta extends CI_Controller {
	public function index(){
		//verificando se a sessão existe, caso exista mando para o painel 
		$this->load->library('session');
		if($this->session->has_userdata('login')){
			$usuario = $this->session->login;
			$cod = $usuario['cod'];
			$tipo = $usuario['tipo'];

			//verificando se a configuração de ambiente já foi feita
			$this->load->helper('inicia');

			if(verificaAmbiente()){
				//recebo o array com as informações da interface
				$this->load->helper('interface');
				$data = preencheInterface($usuario,'tools',false);

				//carregando a view enquanto passo as informações
				$data['title'] = "Ferramentas";
				$data['content'] = "tools";
				$data['sidebar'] = "tools";
				//definindo os valores que serão exibidos dinamicamente na sidebar de acordo com o tipo de usuário
				$this->load->helper('sidebar');
				// $this->load->helper('smiley');
				$data['files'] = array('textarea' => '<style>#main{overflow-y: hidden !important;}</style>');	
				$data['filesfooter'] = array('comandos para excluir link' => "<script type='text/javascript' src='".base_url('assets/js/scripts/links.js')."'></script>");
				$this->load->view('panel/layout', $data);
			}else{
				redirect(base_url('configuracao-ambiente'));
			}

		}else{
			//se não houver sessão, então mando de volta pois não existiu um login
			redirect(base_url());
		}
	}

	public function cadLink(){
		//verificando se a sessão existe, caso exista mando para o painel
		$this->load->library('session');
		if($this->session->has_userdata('login')){
			$usuario = $this->session->login;
			$data['Nome'] = utf8_decode($this->input->post('txtNome'));
			$data['Descricao'] = utf8_decode($this->input->post('txtDescricao'));
			$data['Link'] = utf8_decode($this->input->post('txtLink'));
			
			//carrego a model 
			$this->load->model('link');
			
			//atualizo
			$retorno = $this->link->cadastraLink($data);
			
			//passo o retorno
			if($retorno){
				echo "<script type='text/javascript'>alert('Ferramenta cadastrada com sucesso :D');</script>";
			}else{
				echo "<script type='text/javascript'>alert('Houve um erro ao cadastrar esta ferramenta :/');</script>";
			}
			$data = array();
				redirect(base_url("/ferramentas"));
		}
		else
		{
			//se não houver sessão, então mando de volta pois não existiu um login
			redirect(base_url());
		}
	}


	public function attlink(){
		$this->load->library('session');
		if($this->session->has_userdata('login')){
			$usuario = $this->session->login;
			$codLink = $this->input->post('codLink');
			$data['Nome'] = utf8_decode($this->input->post('txtNome'));
			$data['Descricao'] = utf8_decode($this->input->post('txtDescricao'));
			$data['Link'] = utf8_decode($this->input->post('txtLink'));
			//carrego a model 
			$this->load->model("link");
			// Recupera os contatos através do model
			$where = array('CodLink'=>$codLink);
			if($this->link->salvarLink($data,$where)){
				echo "<script type='text/javascript'>confirm('Link alterado com sucesso :D'); window.location.replace(".base_url("/ferramentas/$codLink").")</script>";
				// redirect(base_url("/ferramentas/$codLink"));
			}
			else{
				echo "<script type='text/javascript'>alert('Houve um erro ao alterar o link :/');</script>";
			// redirect(base_url("/ferramentas/$codLink"));
			}
			redirect(base_url("/ferramentas/$codLink"));



		}
	}


	public function exclink(){
		$this->load->library('session');
		if($this->session->has_userdata('login')){
			$usuario = $this->session->login;
			// Recupera o ID do registro - através da URL - a ser editado
			$id = $this->uri->segment(3);
			// Se não foi passado um ID, então redireciona para a home
			if(is_null($id))
			redirect();
			// Remove o registro do banco de dados recuperando o status dessa operação
			$this->load->model('link');
			$status = $this->link->deleteLink($id);
			if($status)
				redirect(base_url('/ferramentas'));
			
		}
	}

	public function exibeLink(){
		$link = $this->uri->segment(2);
		//verificando se a sessão existe, caso exista mando para o painel 
		$this->load->library('session');
		if($this->session->has_userdata('login')){
			$usuario = $this->session->login;
			$cod = $usuario['cod'];
			$tipo = $usuario['tipo'];

			//verificando se a configuração de ambiente já foi feita
			$this->load->helper('inicia');

			if(verificaAmbiente()){
				//recebo o array com as informações da interface
				$this->load->helper('interface');
				$data = preencheInterface($usuario,'tools');

				//carregando a view enquanto passo as informações
				$data['title'] = "Ferramentas";
				$data['content'] = "tools";
				$data['sidebar'] = "tools";
				//definindo os valores que serão exibidos dinamicamente na sidebar de acordo com o tipo de usuário
				$this->load->helper('sidebar');
				// $this->load->helper('smiley');
				$data['files'] = array('chat' => '<style>#main{overflow-y: hidden !important;}</style>');		
				$data['filesfooter'] = array('comandos para excluir link' => "<script type='text/javascript' src='".base_url('assets/js/scripts/links.js')."'></script>");
				$this->load->model('link');
				$data['link'] = $this->link->retornaLink(array('CodLink'=> $link));
				$this->load->view('panel/layout', $data);
			}else{
				redirect(base_url('configuracao-ambiente'));
			}

		}else{
			//se não houver sessão, então mando de volta pois não existiu um login
			redirect(base_url());
		}
	}

	public function edtLink(){
		//verificando se a sessão existe, caso exista mando para o painel 
		$this->load->library('session');
		if($this->session->has_userdata('login')){
			$usuario = $this->session->login;
			$cod = $usuario['cod'];
			$tipo = $usuario['tipo'];

			//verificando se existem cursos cadastrados e o quadro de funcionários 
			$this->load->model('escola');
			$curso = $this->escola->getCursos();
			$turma = $this->escola->getTurma();
			$hierarquia = $this->escola->getHierarquia();
			$compcurricular = $this->escola->getCompCurricular();

				if(empty($curso) && empty($hierarquia) && empty($turma) && empty($compcurricular)){
					redirect(base_url('configuracao-ambiente'));
				}
				//recebo o array com as informações da interface
				$this->load->helper('interface');
				$data = preencheInterface($usuario,'tools');

				//carregando a view enquanto passo as informações
				$data['title'] = "Ferramentas";
				$data['content'] = "tools";
				$data['sidebar'] = "tools";
				//definindo os valores que serão exibidos dinamicamente na sidebar de acordo com o tipo de usuário
				$this->load->helper('sidebar');
				// $this->load->helper('smiley');
				$data['filesfooter'] = array('comandos para excluir link' => "<script type='text/javascript' src='".base_url('assets/js/scripts/links.js')."'></script>");


				//pego valor da url e passo pra consulta
				$codLink = $this->uri->segment(3);
				if(!isset($codLink))
					redirect(base_url('/ferramentas'));

				$this->load->model('link');
				$data['infoLink'] = $this->link->retornaLink(array('CodLink' => $codLink));
				$this->load->view('panel/layout', $data);
			}else{
			//se não houver sessão, então mando de volta pois não existiu um login
			redirect(base_url());
		}
	}


}
			

<?php
/**
* Controlador criado para gerenciar as listas de relação de usuários
* @author Matheus Antonio
*/
defined('BASEPATH') OR exit('No direct script access allowed');

class Relacao extends CI_Controller {
	public function index(){
		//verificando se a sessão existe, caso exista mando para o painel 
		$this->load->library('session');
		if($this->session->has_userdata('login')){
			$usuario = $this->session->login;
			$cod = $usuario['cod'];
			$tipo = $usuario['tipo'];

			if($tipo != 1)
				redirect(base_url('panel'));
			
			//verificando se a configuração de ambiente já foi feita
			$this->load->helper('inicia');

			if(verificaAmbiente()){
				//recebo o array com as informações da interface
				$this->load->helper('interface');
				$data = preencheInterface($usuario,'principal',false);

				//carregando a view enquanto passo as informações
				$data['title'] = "Relação de usuários";
				$data['content'] = "relacao";
				$data['sidebar'] = "home";
				$data['lista'] = null;
				//definindo os valores que serão exibidos dinamicamente na sidebar de acordo com o tipo de usuário
				$this->load->helper('sidebar');
				// $this->load->helper('smiley');
				// $data['files'] = array('textarea' => '<style>#main{overflow-y: hidden !important;}</style>');	
				// $data['filesfooter'] = array('comandos para excluir link' => "<script type='text/javascript' src='".base_url('assets/js/scripts/links.js')."'></script>");
				$this->load->view('panel/layout', $data);
			}else{
				redirect(base_url('configuracao-ambiente'));
			}
		}	
	}

	public function listas(){
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
				$data = preencheInterface($usuario,'principal',false);

				//carregando a view enquanto passo as informações
				$data['content'] = "relacao";

				$data['lista'] = $this->uri->segment(2);
				switch ($data['lista']) {
					case 'alunos':
						$this->load->model('escola');
						$data['show'] = $this->escola->getTurma();
						$data['title'] = "Relação de Alunos";
						break;

					case 'professores':
						$this->load->model('usuario');
						$data['show'] = $this->usuario->getUser(array('CodTipoUsuario' => 4), 'obj');
						$data['title'] = "Relação de Professores";
						break;

					case 'funcionarios':
						$this->load->model('escola');
						$data['show'] = $this->escola->getFuncionario(array('CodTipoUsuario' => 2));
						$data['title'] = "Relação de Funcionários";
						break;

					case 'administradores':
						$this->load->model('usuario');
						$data['show'] = $this->usuario->getUser(array('CodTipoUsuario' => 1), 'obj');
						$data['title'] = "Relação de Administradores";
						break;
					
					default:
						# code...
						break;
				}
				$data['sidebar'] = "home";
				//definindo os valores que serão exibidos dinamicamente na sidebar de acordo com o tipo de usuário
				$this->load->helper('sidebar');
				// $this->load->helper('smiley');
				$data['files'] = array('impressão das páginas' => '<link href="'.base_url('assets/css/print.css').'" rel="stylesheet" media="print">');	
				// $data['filesfooter'] = array('comandos para excluir link' => "<script type='text/javascript' src='".base_url('assets/js/scripts/links.js')."'></script>");
				$this->load->view('panel/layout', $data);
			}else{
				redirect(base_url('configuracao-ambiente'));
			}
		}	
	}

	public function turmas(){
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
				$data = preencheInterface($usuario,'principal',false);

				//carregando a view enquanto passo as informações
				$data['title'] = "Relação de Alunos";
				$data['content'] = "relacao";
				$data['sidebar'] = "home";
				//definindo os valores que serão exibidos dinamicamente na sidebar de acordo com o tipo de usuário
				$this->load->helper('sidebar');
				// $this->load->helper('smiley');
				$data['files'] = array('impressão das páginas' => '<link href="'.base_url('assets/css/print.css').'" rel="stylesheet" media="print">');	
				// $data['filesfooter'] = array('comandos para excluir link' => "<script type='text/javascript' src='".base_url('assets/js/scripts/links.js')."'></script>");

				//pego os alunos daquela turma
				$this->load->model('escola');
				//passo algo dentro de lista só pra não cair no empty da view
				$data['lista'] = "*";
				$data['alunos'] = $this->escola->getAlunoTurma(array('CodTurma' => $this->uri->segment(3)));
				$data['turma'] = $this->escola->getTurma(array('CodTurma' => $this->uri->segment(3)));
				$this->load->view('panel/layout', $data);
			}else{
				redirect(base_url('configuracao-ambiente'));
			}
		}	
	}
}
			

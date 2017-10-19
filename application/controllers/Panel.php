<?php
/**
*  Controlador com métodos pertinentes ao acesso do usuário as páginas do painel ao efetuar login
*  @author Matheus Antonio
*/
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

			//verificando se a configuração de ambiente já foi feita
			$this->load->helper('inicia');

			if(verificaAmbiente()){
				//recebo o array com as informações da interface
				$this->load->helper('interface');
				$data = preencheInterface($usuario,'principal');

				//carregando a view enquanto passo as informações
				$data['title'] = "Painel";
				$data['content'] = "home";
				$data['sidebar'] = "home";
				$this->load->view('panel/layout', $data);
			}else{
				redirect(base_url('configuracao-ambiente'));
			}
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

			///verificando se a configuração de ambiente já foi feita
			$this->load->helper('inicia');

			if(verificaAmbiente()){
				//recebo o array com as informações da interface
				$this->load->helper('interface');
				$data = preencheInterface($usuario,'mural');

				//carregando a view enquanto passo as informações
				$data['title'] = "Mural";
				$data['content'] = "mural";
				$data['sidebar'] = "mural";
				//definindo os valores que serão exibidos dinamicamente na sidebar de acordo com o tipo de usuário
				$this->load->helper('sidebar');
				$data['files'] = array('mural' => '<link href="'.base_url("assets/css/mural.css").'" rel="stylesheet">');	


				switch ($tipo) {
					case 1:
						$data['murais'] = array(
							'Seus murais' => $this->mural->retornaMural(array('CodUsuario' => $cod)),
							'Murais existentes' => $this->escola->getMural(null,TRUE)
						);
						break;
					default:
						$data['murais'] = array(
							'Seus murais' => $this->mural->retornaMural(array('CodUsuario' => $cod))
						);
						break;
				}


				$this->load->view('panel/layout', $data);
			}else{
				redirect(base_url('configuracao-ambiente'));
			}

		}else{
			//se não houver sessão, então mando de volta pois não existiu um login
			redirect(base_url());
		}
	}


	public function help(){
		$this->load->library('session');
		if($this->session->has_userdata('login')){
			$usuario = $this->session->login;
			$cod = $usuario['cod'];
			$tipo = $usuario['tipo'];
				//recebo o array com as informações da interface
				$this->load->helper('interface');
				$data = preencheInterface($usuario);

				echo "ajuda";
		}else{
			//se não houver sessão, então mando de volta pois não existiu um login
			redirect(base_url());
		}
	}

	public function settings(){
		$this->load->library('session');
		if($this->session->has_userdata('login')){
			$usuario = $this->session->login;
			$cod = $usuario['cod'];
			$tipo = $usuario['tipo'];


			// if(!empty($curso) && !empty($hierarquia) && !empty($turma) && !empty($compcurricular)){
				// if(!empty($curso) && !empty($turma)){
				//recebo o array com as informações da interface
				$this->load->helper('interface');
				$data = preencheInterface($usuario);
				echo "configurações";
			// }else{
				// redirect(base_url('configuracao-ambiente'));
			// }

		}else{
			//se não houver sessão, então mando de volta pois não existiu um login
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


	



	public function attNotificacao(){
		$this->load->helper('interface');
		attNotificacao();
	}
	
	public function avatar(){
		$token = $this->uri->segment(3);

		$this->load->model('usuario');
		$usuario = $this->usuario->getUser(array('Token' => $token));
		if(!isset($usuario) || empty($usuario))
			return false;

		$data['coduser'] = $usuario['CodUsuario'];
		$data['title'] = "Avatar";
		$data['content'] = "avatar";
		// $data['filesfooter'] = array(
		// 	'modal bem-vindo' => '<script type="text/javascript">
		// 							$(document).ready(function() {
		// 								$("#welcome").modal("show");
		// 							});

		// 						</script>'
		// );
		$this->load->model('avatar');
		$data['avatar'] = $this->avatar->retornaAvatar();
		$data['filesfooter'] = array(
			'avatar' => '<script type="text/javascript" src="'.base_url('assets/js/scripts/cadastro.js').'"></script>'
		);
		$this->load->view('cadastro/layout', $data);
	}

}

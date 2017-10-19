<?php
/**
*  Controlador com métodos pertinentes ao painel de missões
*  @author Matheus Antonio
*/
defined('BASEPATH') OR exit('No direct script access allowed');

class Task extends CI_Controller {
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
				$data = preencheInterface($usuario,'tasks');

				//carregando a view enquanto passo as informações
				$data['title'] = "Tasks";
				$data['content'] = "tasks";
				$data['sidebar'] = "tasks";
				$data['files'] = array('css tasks' => "<link rel='stylesheet' href='".base_url("assets/css/task.css")."' type='text/css'/>");
				$this->load->view('panel/layout', $data);
			}else{
				redirect(base_url('configuracao-ambiente'));
			}
		}else{
			//se não houver sessão, então mando de volta pois não existiu um login
			redirect(base_url());
		}
	}
}

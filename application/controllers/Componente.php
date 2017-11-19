<?php
/**
*  Controlador com métodos pertinentes ao painel de missões
*  @author Matheus Antonio
*/
defined('BASEPATH') OR exit('No direct script access allowed');

class Componente extends CI_Controller {
	//função index, verifica a situação da plataforma para direcionar o usuário para um destino
	public function index($msg = null){	

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
				$data = preencheInterface($usuario,'compcurricular');

				$codTask = $this->uri->segment(2);

				$data['title'] = "Componentes curriculares";
				$data['content'] = "compcurricular";
				$data['sidebar'] = "compcurricular";
				$data['files'] = array('css tasks' => "<link rel='stylesheet' href='".base_url("assets/css/task.css")."' type='text/css'/>");
				$data['pagina'] = 'index';
				$data['pageHeader'] = "Componentes curriculares";
				$data['returnAtt'] = $msg;
				$this->load->view('panel/layout', $data);
			}else{
				redirect(base_url('configuracao-ambiente'));
			}
		}else{
			//se não houver sessão, então mando de volta pois não existiu um login
			redirect(base_url());
		}
	}

	public function alteraCriterio(){

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
				$this->load->model('Escola');
				$set = array('CriteriosAvaliacao' => nl2br(utf8_decode($this->input->post('txtCriterio'))));
				$where = array('CodCompProfessor' => $this->input->post('CodCompProfessor'));
				if($this->Escola->updateComponente($set,$where,'compprof')){
					$msg = '<div class="alert alert-success alert-dismissable">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <strong>Sucesso!</strong> Informações atualizadas com sucesso :D
                            </div>';
				}
				else{
					$msg = '<div class="alert alert-danger alert-dismissable">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <strong>ERRO!</strong> Houve um erro na atualiação dos dados :/
                            </div>';
				}
				redirect(base_url('/componentes'));
				// $this->index($msg);
			}else{
				redirect(base_url('configuracao-ambiente'));
			}
		}else{
			//se não houver sessão, então mando de volta pois não existiu um login
			redirect(base_url());
		}

	}
	public function carregaComponente(){
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
				$data = preencheInterface($usuario,'compcurricular');

				$codComp = $this->uri->segment(2);
				$this->load->model('Escola');
				$data['componente'] = $this->Escola->getCompCurricular(array('comp.CodComponente' => $codComp));
				if(!empty($data['componente'])){
					foreach ($data['componente'] as $comp) {
						$data['title'] = utf8_encode("$comp->Nome")." - $comp->Modulo"."º ".utf8_encode("$comp->NomeTurma");
						$data['content'] = "compcurricular";
						$data['sidebar'] = "compcurricular";
						$data['files'] = array('css tasks' => "<link rel='stylesheet' href='".base_url("assets/css/task.css")."' type='text/css'/>");
						$data['pagina'] = null;
						$data['pageHeader'] = $data['title'];
					}
				}
				else{
					redirect(base_url('componentes'));
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
}

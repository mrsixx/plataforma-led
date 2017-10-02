<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
*	@author Kaue Reis
* Controlador criado para gerenciar o módulo com cadastro de links uteis na unidade de ensino
*/

class Links extends CI_Controller {
	//carregando a home
	
	
	public function cadLink(){
		//verificando se a sessão existe, caso exista mando para o painel
		$this->load->library('session');
		if($this->session->has_userdata('login')){
			$usuario = $this->session->login;
			$data['Nome'] = utf8_decode($this->input->post('txtNome'));
			$data['Descricao'] = utf8_decode($this->input->post('txtDescricao'));
			$data['Link'] = utf8_decode($this->input->post('txtLink'));
			
			//carrego a model 
			$this->load->model("link");
			
			//atualizo
			$retorno = $this->link->cadastraLink($data);
			
			//passo o retorno
			return $retorno;
	}
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
			$codLink = $this->input->post('codUsuario');
			$data['Nome'] = utf8_decode($this->input->post('txtNome'));
			$data['Descricao'] = utf8_decode($this->input->post('txtDescricao'));
			$data['Link'] = utf8_decode($this->input->post('txtLink'));
			//carrego a model 
			$this->load->model("link");
			// Recupera os contatos através do model
			$where = array('CodLink'=>$codLink);
			$retorno = $this->link->salvarLink($data,$where);
			return $retorno;
			}
	}
	public function exclink(){
		$this->load->library('session');
		if($this->session->has_userdata('login')){
			$usuario = $this->session->login;
			// Recupera o ID do registro - através da URL - a ser editado
			$id = $this->uri->segment(2);
			// Se não foi passado um ID, então redireciona para a home
			if(is_null($id))
			redirect();
			// Remove o registro do banco de dados recuperando o status dessa operação
			$status = $this->excluirLink->Excluir($id);
			return $status;
			
		
			
?>
<?php
/**
* Model criada para gerenciar o módulo com cadastro de links uteis na unidade de ensino com métodos de acesso ao banco de dados da plataforma
* @author Kaue Reis
*/

class Evento extends CI_Model
{
	
	function __construct(){
		parent::__construct();
		$db = $this->load->database();
	}

	function cadastra($data){
		try {
			return $this->db->insert('evento',$data);
		} catch (PDOException $e) {
			return $e;
		}
	}
}
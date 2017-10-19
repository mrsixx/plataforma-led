<?php
/**
* Model com métodos de consulta ao banco de dados pertinentes ao chat
* @author Matheus Antonio
*/
class Chat extends CI_Model
{
	
	function __construct(){
		parent::__construct();
		$db = $this->load->database();
	}

	//função para pegar as mensagens que não foram visualizadas
	function msgNvista($where){
		$query = $this->db->get_where('mensagem',$where);
		if($query)
			return $query->num_rows();
		else
			return null;
	}
}
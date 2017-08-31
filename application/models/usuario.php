<?php

/**
* MODELO COM MÉTODOS DO USUÁRIO
* @author Matheus Antonio
*/
class Usuario extends Operacoes
{
	
	function __construct(){
		parent::__construct();
		$this->tabela = "usuario";
	}

	function validaLogin($email, $senha)
	{
		//montando a query
		$this->db->where('Email', $email);
		$this->db->where('Senha', $senha);//arrumar a hash de encriptação
		$this->db->where('Status',1);

		//executando a query
		$query = $this->db->get('usuario')->row_array();
		return $query;
		// if($query->num_rows == 1){
		// 	return true;
		// }
	}

	function verificaOnline(){
		$status = $this->session->userdata('logado');
		if (!isset($status) || $status != true){
			echo "Você não possui permissão para acessar essa página...";
			die();
		}

	}
}
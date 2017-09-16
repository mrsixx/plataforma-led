<?php

/**
* MODELO COM MÉTODOS DO USUÁRIO
* @author Matheus Antonio
*/
class Usuario extends CI_Model
{
	
	function __construct(){
		parent::__construct();
		$this->tabela = "usuario";
		$db = $this->load->database();
	}

	function cadastra($data){
		$cad = array(
			'Email' => $data['email'], 
			'Senha' => $data['senha'], 
			'Nome' => $data['nome'], 
			'Sobrenome' => $data['sobrenome'], 
			'Nickname' => $data['nick'], 
			'DataNascimento' => $data['nascimento'], 
			'DataCadastro' => $data['dtcad'], 
			'Foto' => $data['foto'], 
			'Sexo' => $data['sexo'], 
			'Cidade' => $data['cidade'], 
			'Status' => $data['status'], 
			'Online' => 0, 
			'Token' => $data['token'], 
			'TokenPai' => $data['tokenpai'], 
			'QtdConsultorias' => 0, 
			'UltimoLogin' => null, 
			'CodTipoUsuario' => $data['tipo'], 
			'CodAvatar' => $data['avatar'], 
			'CodHierarquia' => $data['hierarquia'], 
		);
		$this->db->where('Nickname', $data['nick'])->or_where('Email', $data['email']);
		$query = $this->db->get($this->tabela);
	
		if($query->row_array() === null){
			if($this->db->insert($this->tabela,$cad)){
				return true;
			}else{
				return false;
			}
		}else{
			$array = array('Nickname' => $data['nick']);
			$query = $this->db->get_where($this->tabela, $array);
			if($query->row_array() != null)
				$erro = "Nickname já está em uso :/";
			else
				$erro = "Este Email já está cadastrado :/";

			return $erro;
		}
	}

	function getUser($array = null){
		if(isset($array)){	
			$query = $this->db->get_where($this->tabela, $array);
		}else{
			$query = $this->db->get($this->tabela);
		}
		$usuario = $query->row_array();
		return $usuario;
	}
	function apagaUser($data){
		$nome = base64_decode($data['nome']);
		$dtnasc = base64_decode($data['dtnasc']);
			$explode = explode(" ", $dtnasc);
			$dtnasc = $explode[0];
		$dtcad = base64_decode($data['dtcad']);
			$explode = explode(" ", $dtcad);
			$dtcad = $explode[0];
		$array = array(
			'Nome' => $nome, 
			'DataNascimento' => $dtnasc, 
			'DataCadastro' => $dtcad, 
			'Token' => $data['tken']  
		);
		$this->db->where($array);
		$this->db->delete($this->tabela);
	}

	function validaCadastro($data){
		//decriptando os dados e efetuando consulta
		$nome = base64_decode($data['nome']);
		$dtnasc = base64_decode($data['dtnasc']);
			$explode = explode(" ", $dtnasc);
			$dtnasc = $explode[0];
		$dtcad = base64_decode($data['dtcad']);
			$explode = explode(" ", $dtcad);
			$dtcad = $explode[0];
		$array = array(
			'Nome' => $nome, 
			'DataNascimento' => $dtnasc, 
			'DataCadastro' => $dtcad, 
			'Token' => $data['tken']  
		);
		$query = $this->db->get_where($this->tabela,$array);
		if($query->num_rows() === 1){
			$query = $query->row_array();
			$this->db->set('Status', TRUE);
			$this->db->where('CodUsuario', $query['CodUsuario']);
			$update = $this->db->update('usuario'); 
			if($update){
				return true;
			}else{return false;}
		}else{return false;}


	}
	function validaLogin($data)
	{
		//montando a query
		$this->db->where('Email', $data['email']);
		$this->db->where('Status',1);

		//executando a query
		$query = $this->db->get('usuario')->row_array();
		return $query;
		// if($query->num_rows == 1){
		// 	return true;
		// }
	}

	// function verificaOnline(){
	// 	$status = $this->session->userdata('logado');
	// 	if (!isset($status) || $status != true){
	// 		echo "Você não possui permissão para acessar essa página...";
	// 		die();
	// 	}

	// }
};
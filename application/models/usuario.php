<?php
/**
* Model com métodos de consulta ao banco de dados pertinentes ao usuário
* @author Matheus Antonio
*/
class Usuario extends CI_Model
{
	
	function __construct(){
		parent::__construct();
		$this->tabela = "usuario";
		$db = $this->load->database();
	}

	function cadastra($tipo,$data){
		switch($tipo){
			case 1:
				$this->db->where('Nickname', $data['Nickname'])->or_where('Email', $data['Email']);
				$query = $this->db->get($this->tabela);
				if($query->row_array() === null){
					$cad = array(
						'Email' => $data['Email'], 
						'Senha' => $data['Senha'], 
						'Nome' => $data['Nome'], 
						'Sobrenome' => $data['Sobrenome'], 
						'Nickname' => $data['Nickname'], 
						'DataNascimento' => $data['DataNascimento'], 
						'DataCadastro' => $data['DataCadastro'], 
						'Foto' => $data['Foto'], 
						'Sexo' => $data['Sexo'], 
						'Cidade' => $data['Cidade'], 
						'Status' => 0, 
						'HorarioLimite' => null, 
						'Token' => $data['Token'], 
						'TokenPai' => $data['TokenPai'], 
						'QtdConsultorias' => 0, 
						'UltimoLogin' => null, 
						'CodTipoUsuario' => $data['CodTipoUsuario'], 
						'CodAvatar' => $data['CodAvatar'], 
						'CodHierarquia' => $data['CodHierarquia'] 
					);
					if($this->db->insert($this->tabela,$cad)){
						$where = array('CodUsuario' => $this->db->insert_id(), 'CodMural' => 1, 'DataEntrada' => date('Y-m-d'));
						if($this->db->insert('usuario-mural',$where)){
							return true;
						}
					}else{
						return false;
					}
				}else{
					$array = array('Nickname' => $data['Nickname']);
					$query = $this->db->get_where($this->tabela, $array);
					if($query->row_array() != null)
						$erro = "Nickname já está em uso :/";
					else
						$erro = "Este Email já está cadastrado :/";

					return $erro;
				}

				break;

			case 2:
				if($this->db->insert($this->tabela, $data)){
					$codUsuario = $this->db->insert_id();
					$data = array(
						array('CodUsuario' => $codUsuario, 'CodMural' => 1, 'DataEntrada' => date('Y-m-d')),
						array('CodUsuario' => $codUsuario, 'CodMural' => 2, 'DataEntrada' => date('Y-m-d'))
					);
						$retorno = false;
						foreach ($data as $mural) {
							if($this->db->insert('usuario-mural',$mural)){
								$retorno = true;
							}
							else{
								$retorno = false;
							}
						}
						return $retorno;
				}
				break;
			case 3:
				if($this->db->insert($this->tabela,$data)){
					return true;
				}
				break;

			case 4:
				if($this->db->insert($this->tabela, $data)){
					$codUsuario = $this->db->insert_id();
					$data = array(
						array('CodUsuario' => $codUsuario, 'CodMural' => 1, 'DataEntrada' => date('Y-m-d')),
						array('CodUsuario' => $codUsuario, 'CodMural' => 2, 'DataEntrada' => date('Y-m-d'))
					);
						$retorno = false;
						foreach ($data as $mural) {
							if($this->db->insert('usuario-mural',$mural)){
								$retorno = true;
							}
							else{
								$retorno = false;
							}
						}
						return $retorno;
				}
				break;
			//cadastro alternativo para administradores
			case 5:
				if($this->db->insert($this->tabela, $data)){
					$codUsuario = $this->db->insert_id();
					$data = array(
						array('CodUsuario' => $codUsuario, 'CodMural' => 1, 'DataEntrada' => date('Y-m-d')),
						array('CodUsuario' => $codUsuario, 'CodMural' => 2, 'DataEntrada' => date('Y-m-d'))
					);
						$retorno = false;
						foreach ($data as $mural) {
							if($this->db->insert('usuario-mural',$mural)){
								$retorno = true;
							}
							else{
								$retorno = false;
							}
						}
						return $retorno;
				}
				break;
				
		}
	
		
	}

	function atualizaCadastro($data,$where){
		$this->db->set($data);
			$this->db->where($where);
			$update = $this->db->update($this->tabela); 
			if($update) 
				return true;
			else
				return false;
	}

	function getUser($query = null,$retorno = null){
		if(isset($query)){
			if(is_array($query)){
				$query = $this->db->get_where($this->tabela, $query);
			}
			else{
				$this->db->where($query);
				$this->db->order_by('Nome','ASC');
				$query = $this->db->get('usuario');
			}
		}else{
			$query = $this->db->get($this->tabela);
		}
		switch ($retorno) {
			case 'count':
				$usuario = $query->num_rows();
				break;
			case 'obj':
				$usuario = $query->result();
				break;
			
			default:
				$usuario = $query->row_array();
				break;
		}
		return $usuario;
	}
	function apagaUser($data){
		$this->db->where($data);
		$this->db->delete($this->tabela);
	}

	function validaCadastro($data,$where = null,$controle = null){
		switch ($controle) {
			case 'adm':
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
					'Token' => $data['tken']  
				);
				$query = $this->db->get_where($this->tabela,$array);
				if($query->num_rows() === 1){
					$query = $query->row_array();
					$this->db->set(array('Status' => TRUE, 'DataCadastro' => date("Y-m-d H:i:s")));
					$this->db->where('CodUsuario', $query['CodUsuario']);
					$update = $this->db->update('usuario'); 
					if($update){
						return true;
					}else{return false;}
				}else{return false;}
				break;
			
			case 'reset':
				$this->db->set($data);
				$this->db->where($where);
					if($this->db->update($this->tabela))
						return true;
					else
						return false;
					
				break;
			default:
				$this->db->set($data);
				$this->db->where($where);
				$update = $this->db->update($this->tabela);
					if($update)
						return true;
					else
						return false;
					
				break;
		}


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

	function verificaToken($token){
		$where = array('Token' => $token, 'Status' => 0);
		$query = $this->db->get_where($this->tabela,$where);
		if($query->num_rows() == 1){
			return $query->row_array();
		}else{
			return false;
		}
	}

	function verificaEmail($email){
		$like = array('Email' => $email);
		$this->db->like($like);
		$results = $this->db->count_all_results($this->tabela);
		if($results == 0)
			return true;
		else
			return false;
	}

	function contaUser($where){
		$this->db->select('CodUsuario');
		$this->db->from('usuario');
		$this->db->where($where);
		return $this->db->get()->num_rows();
	}
};
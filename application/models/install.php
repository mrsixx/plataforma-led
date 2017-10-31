<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* Model com métodos de consulta ao banco de dados pertinentes a instação da plataforma
* @author Matheus Antonio
*/
class Install extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}
	function verificaDatabase(){
		try{
			$this->load->database();
			$query = $this->db->query("SHOW TABLES");
			return $query->num_rows();
			
		}catch(PDOException $e){
			return $e;
		}
	}

	function verificaConexao($data){
		//aqui testo a conexao com o banco 
		//retorno verdadeiro se conectar e false se não conectar
		$dsnPDO = "mysql:host=".$data['host'].";dbname=".$data['banco'].";port=3306;";
		try{
			$con = new PDO($dsnPDO, $data['usuario'], $data['senha']);
		}catch(PDOException $e){
			$con = null;
		}
		return $con;
	}
	function criaEstrutura($data){
		$con = $this->verificaConexao($data);
		if($con){
			try{
				//carregando helper com funções com os comandos sql do banco de dados
				$this->load->helper('sqlcommand');
				//rodando comandos para criar as tabelas do banco 
				$cmdCria = cria($data['prefixo']);
				foreach ($cmdCria as $tabela => $comando) {
					$stm = $con->prepare($comando);
					if(!$stm->execute()){
						var_dump($stm);
						return false;
					}
				}
				//rodando comandos para criar relacionamentos entre as tabelas do banco 
				$cmdRelaciona = relaciona($data['prefixo']);
				foreach ($cmdRelaciona as $tabela => $comando) {
					$stm = $con->prepare($comando);
					if(!$stm->execute()){
						var_dump($stm);
						return false;
					}
				}
				//rodando comandos para fazer as inserções iniciais no bnaco de dados
				$cmdInsere = insere($data['prefixo']);
				foreach ($cmdInsere as $tabela => $comando) {
					$stm = $con->prepare($comando);
					if(!$stm->execute()){
						var_dump($stm);
						return false;
					}
				}

				//rodando comandos para inserir os avatares no banco
				$cadAvatar = cadAvatar($data['prefixo']);
				foreach ($cadAvatar as $tabela => $comando) {
					$stm = $con->prepare($comando);
					if(!$stm->execute()){
						var_dump($stm);
						return false;
					}
				}

				return true;

			}catch(PDOException $e){
				$e;
			}
		}else{
			return false;
		}
	}
	function verificaAdm(){
		$db = $this->load->database();
		$where = array('CodTipoUsuario' => 1, 'Status' => 1);
		$query = $this->db->get_where("usuario", $where);
		return $query->row_array();
	}

	function verficaEscola(){
		$db = $this->load->database();
		$query = $this->db->get("escola");
		return $query->row_array();
	}
}
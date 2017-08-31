<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Install extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
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
}
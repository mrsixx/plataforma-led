<?php
/**
* Model criada para gerenciar o módulo com cadastro de arquivos e livros uteis na unidade de ensino com métodos de acesso ao banco de dados da plataforma
* @author Kaue Reis
*/

class Library extends CI_Model
{
	
	function __construct(){
		parent::__construct();
		$db = $this->load->database();
	}

	function cadastraLivro($data){
		try{
			if($this->db->insert("arquivo", $data)){
				return true;
			}else{
				return false;
			}
		}
		catch(PDOException $e){
			return $e;
		}
	}

	function salvarLink($data,$where){
		try{
			$this->db->set($data);
			$this->db->where($where);
			if($this->db->update("arquivo"))
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		catch(PDOException $e){
			return $e;
		}
		
	}

	function deleteLivro($id) {
	    if(is_null($id))
	      return false;
	    $this->db->where(array('CodArquivo' => $id));
	    return $this->db->delete("arquivo");
  	}
  
	function retornaLivro($data = null,$num = false){
		try{
			if(isset($data)){
				$this->db->select('arquivo.*,us.Nome NomeUsuario,us.Sobrenome,us.Token');
				$this->db->from('arquivo');
				$this->db->join('usuario us', 'us.CodUsuario = arquivo.CodUsuario');
				$this->db->where($data);
				$this->db->order_by('Nome','ASC');
				$link = $this->db->get();
			}
			else{
				$this->db->order_by('Nome','ASC');
				$link = $this->db->get("arquivo");
			}
			
			if($num)
				return $link->num_rows();

		 	return $link->result();
		}
		catch(PDOException $e){
			return $e;
		}

	}
}
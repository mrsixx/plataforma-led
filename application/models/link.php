<?php
/**
* Model criada para gerenciar o módulo com cadastro de links uteis na unidade de ensino com métodos de acesso ao banco de dados da plataforma
* @author Kaue Reis
*/

class Link extends CI_Model
{
	
	function __construct(){
		parent::__construct();
		$db = $this->load->database();
	}

	function cadastraLink($data){
		try{
			if($this->db->insert("linkexterno", $data)){
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
			if($this->db->update("linkexterno"))
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

	function deleteLink($id) {
	    if(is_null($id))
	      return false;
	    $this->db->where(array('CodLink' => $id));
	    return $this->db->delete("linkexterno");
  	}
  
	function retornaLink($data = null,$num = false){
		try{
			if(isset($data)){
				$link = $this->db->get_where("linkexterno",$data);
			}
			else{
				$link = $this->db->get("linkexterno");
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
<?php
/*
*	@author Kaue Reis
* Model criada para gerenciar o módulo com cadastro de links uteis na unidade de ensino com métodos de acesso ao banco de dados da plataforma
*/
class led extends CI_Model {
	
	function cadastraLink($data){
		try{
			if($this->db->insert("link", $data)){
				return true;
			}else{
				return false;
			}
		}
		catch(PDOException $e){
			$e;
		}
	}
	
	function salvarLink($data,$where){
		try{
			$this->db->set($data);
			$this->db->where($where);
			if($this->db->update("link"))
			{
				return true;
			}
			else
			{
				return false;
			}
			catch(PDOException $e)
			{
			$e;
			}
		
		}
	}
	function Excluir($id) {
    if(is_null($id))
      return false;
    $this->db->where('CodLink', $id);
    return $this->db->delete($this->table);
  }
  
  function retornaLink(){
	  return $this->db->get("link");
  }
}
}
?>
<?php
/**
* Model com métodos de consulta ao banco de dados pertinentes as tasks
* @author Matheus Antonio
*/
class Task extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$db = $this->load->database();
	}
	

	function retornaInteligencia(){
		$retorno = $this->db->get('inteligencia')->result();
		return $retorno;
	}

	function retornaLvl($where){
		try{
			$row = $this->db->get_where('experiencia',$where);
			return $row->result();
		}catch(PDOException $e){
			return $e;
		}
	}
	// function retornaAvatar($where = null){
	// 	try {
	// 		if(isset($where)){
	// 			//verifico qual é o avatar daquele usuário
	// 			// $this->db->select('usuario.CodAvatar, avatar.*');
	// 			// $this->db->join('usuario')

	// 			$this->db->select('usuario.CodAvatar, avatar.*, cabeloavatar.Link cabelo, roupaavatar.Link roupa, itemavatar.Link item, corpoavatar.Link corpo, rostoavatar.Link rosto');
	// 			$this->db->from('usuario');
	// 			$this->db->join('avatar', 'usuario.CodAvatar = avatar.CodAvatar');
	// 			$this->db->join('cabeloavatar', 'cabeloavatar.CodCabelo = avatar.CodCabelo');
	// 			$this->db->join('rostoavatar', 'rostoavatar.CodRosto = avatar.CodRosto');
	// 			$this->db->join('corpoavatar', 'corpoavatar.CodCorpo = avatar.CodCorpo');
	// 			$this->db->join('itemavatar', 'itemavatar.CodItem = avatar.CodItem');
	// 			$this->db->join('roupaavatar', 'roupaavatar.CodRoupa = avatar.CodRoupa');
	// 			$this->db->where($where);
	// 			//retorno todas as informações do avatar daquele usuário
	// 			return $this->db->get()->row_array();
	// 		}else{
	// 			$avatar = array(
	// 				'corpo' => $this->db->get('corpoavatar')->result(),
	// 				'roupa' => $this->db->get('roupaavatar')->result(),
	// 				'cabelo' => $this->db->get('cabeloavatar')->result(),
	// 				'rosto' => $this->db->get('rostoavatar')->result(),
	// 				'item' => $this->db->get('itemavatar')->result()

	// 			);
	// 		}
	// 		return $avatar;

	// 	} catch (PDOException $e) {
	// 		return $e;
	// 	}
	// }

	// function cadastraAvatar($data){
	// 	if($this->db->insert('avatar',$data))
	// 		return true;
	// 	else
	// 		return false;
	// }
}
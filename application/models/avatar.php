<?php
/**
* Model com métodos de consulta ao banco de dados pertinentes aos avatares
* @author Matheus Antonio
*/
class Avatar extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$db = $this->load->database();
	}
	
	function retornaAvatar($where = null){
		try {
			if(isset($where)){
				//verifico qual é o avatar daquele usuário
				$this->db->select("usuario.CodAvatar, avatar.*, cabeloavatar.Link cabelo, roupaavatar.Link roupa, itemavatar.Link item, corpoavatar.Link corpo, rostoavatar.Link rosto");
				$this->db->from('usuario');
				$this->db->join('avatar', 'usuario.CodAvatar = avatar.CodAvatar');
				$this->db->join('cabeloavatar', 'cabeloavatar.CodCabelo = avatar.CodCabelo','left');
				$this->db->join('rostoavatar', 'rostoavatar.CodRosto = avatar.CodRosto','left');
				$this->db->join('corpoavatar', 'corpoavatar.CodCorpo = avatar.CodCorpo','left');
				$this->db->join('itemavatar', 'itemavatar.CodItem = avatar.CodItem','left');
				$this->db->join('roupaavatar', 'roupaavatar.CodRoupa = avatar.CodRoupa','left');
				$this->db->where($where);
				//retorno todas as informações do avatar daquele usuário
				return $this->db->get()->row_array();
			}else{
				$avatar = array(
					'corpo' => $this->db->get('corpoavatar')->result(),
					'roupa' => $this->db->get('roupaavatar')->result(),
					'cabelo' => $this->db->get('cabeloavatar')->result(),
					'rosto' => $this->db->get('rostoavatar')->result(),
					'item' => $this->db->get('itemavatar')->result()

				);
			}
			return $avatar;

		} catch (PDOException $e) {
			return $e;
		}
	}

	function cadastraAvatar($data,$where){
		if($this->db->insert('avatar',$data))
			return $this->db->insert_id();
		else
			return false;
	}

	function updAvatar($data,$where){
		$this->db->set($data);
		$this->db->where($where);
		if($this->db->update('avatar'))
			return true;
		else
			return false;
	}
}
<?php
/**
* Model com métodos de consulta ao banco de dados pertinentes ao mural de postagens
* @author Matheus Antonio
*/
class Mural extends CI_Model
{
	function __construct(){
		parent::__construct();
		$db = $this->load->database();
	}


	//função para retornar os murais em que o usuário está
	function retornaMural($data = null){
		if(isset($data)){
			$usuariomural = $this->db->get_where('usuario-mural',$data)->result();
			foreach ($usuariomural as $obj) {
				$murais[] = $this->db->get_where('mural',array('CodMural' => $obj->CodMural))->row();
				@natcasesort($murais);
			}
			//se der ban é só tirar a linha de código acima
			return $murais;
		}
	}


	//função para pegar as mensagens que não foram visualizadas
	function retornaBadge($cod,$retorno = null){
		$ontem = date('Y-m-d',strtotime("-1 days"));
		$hj = date("Y-m-d");
		switch ($retorno) {
			case 'soma':
				$this->db->select('CodMural');
				$murais = $this->db->get_where('usuario-mural', array('CodUsuario' => $cod));
				foreach ($murais->result() as $obj) {
					$this->db->select('DataHora');
					$this->db->where("(DataHora BETWEEN '$ontem' AND '$hj')",NULL,FALSE);
					$this->db->where(array('CodMural' => $obj->CodMural));
					$query = $this->db->get('postagem');
					$sum[] = $query->num_rows();
				}
				return array_sum($sum);
				break;
			
			default:
				$this->db->where("(DataHora BETWEEN '$ontem' AND '$hj')",NULL,FALSE);
				$query = $this->db->get_where('postagem',array('CodMural'=>$cod));
				return $query->num_rows();
				break;
		}
	}

	function insereMural($where){
		try{
			if($this->db->insert('usuario-mural',$where))
				return true;
			else
				return false;
		}
		catch(PDOException $e){
			return $e;
		}
	}

	function retornaPostagens($data = null){
		if(isset($data)){
			$this->db->select('*');
			$this->db->from('postagem');
			$this->db->join('usuario', 'postagem.CodUsuario = usuario.CodUsuario');
			$this->db->where($data);
			$this->db->order_by('DataHora', 'DESC');
			$retorno = $this->db->get();

			return $retorno->result();
		}
	}

	function retornaUsuarioMural($where = null, $tipo = null){
		if(isset($where)){
			$this->db->select('*');
			$this->db->from('usuario-mural');
			$this->db->join('usuario', 'usuario-mural.CodUsuario = usuario.CodUsuario');
			$this->db->where($where);
			$retorno = $this->db->get();
		}else{
			$this->db->select('*');
			$this->db->from('usuario-mural');
			$this->db->join('usuario', 'usuario-mural.CodUsuario = usuario.CodUsuario');
			$retorno = $this->db->get();
		}
		if(isset($tipo)){
			switch ($tipo) {
				case 'num':
					return $retorno->num_rows();
					break;
				
				default:
					return $retorno->result();
					break;
			}
		}else{
			return $retorno->result();
		}
	}


	function insertPost($data){
		try{
			if($this->db->insert('postagem',$data))
				return true;
			else
				return false;
		}
		catch(PDOException $e){
			return $e;
		}
	}

	function cadComment($data){
		try {
			if($this->db->insert('comentario',$data))
				return true;
			else
				return false;
		} catch (PDOException $e) {
			return $e;
		}
	}

	function getComment($where = null){
		try {
			if(isset($where)){
				$this->db->select('*');
				$this->db->from('comentario');
				$this->db->join('usuario', 'comentario.CodUsuario = usuario.CodUsuario');
				$this->db->where($where);
				$this->db->order_by('CodComentario', 'DESC');
				$retorno = $this->db->get();
				return $retorno->result();
			}
			else{
				$this->db->select('*');
				$this->db->from('comentario');
				$this->db->join('usuario', 'comentario.CodUsuario = usuario.CodUsuario');
				$this->db->order_by('CodComentario', 'DESC');
				$retorno = $this->db->get();
				return $retorno->result();
			}
			
		} catch (PDOException $e) {
			return $e;
		}
	}


	function retornaQtdOp($data = null){
		if(isset($data)){
			$return = $this->db->get_where('opiniao',$data);
		}else{
			$return = $this->db->get('opiniao');
		}
		return $return->num_rows();
	}

	function cadOpiniao($data){
		if($this->db->insert('opiniao',$data))
			return true;
		else
			return false;
	}

	function attOpiniao($set,$where){
		$this->db->set($set);
		$this->db->where($where);
		if($this->db->update('opiniao'))
			return true;
		else 
			return false;
	}

	function retornaOp($where){
		return $this->db->get_where('opiniao',$where)->row_array();
	}


	function delPost($where){
		try{
			$this->db->where($where);
			if($this->db->delete('postagem'))
				return true;
			else
				return false;
			
		}catch(PDOException $e){
			return $e;
		}
	}
	function delComment($where){
		try{
			$this->db->where($where);
			if($this->db->delete('comentario'))
				return true;
			else
				return false;

		}catch(PDOException $e){
			return $e;
		}
	}

}
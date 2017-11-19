<?php
/**
* Model com métodos de consulta ao banco de dados pertinentes ao chat
* @author Matheus Antonio
*/
class BatePapo extends CI_Model
{
	
	function __construct(){
		parent::__construct();
		$db = $this->load->database();
	}

	function retornaMsgSidebar($where = null){
		if(isset($where)){
			$this->db->select('r.Nome NomeR, r.Foto FotoR, r.Sexo SexoR, r.Token TokenR, r.HorarioLimite LimiteR, r.CodUsuario CodR, r.CodTipoUsuario rCodTipoUsuario, d.Nome NomeD, d.Foto FotoD, d.Sexo SexoD, d.Token TokenD, d.HorarioLimite LimiteD, d.CodUsuario CodD,d.CodTipoUsuario, msg.*');
			$this->db->from('mensagem msg');
			$this->db->join('usuario r','msg.CodRemetente = r.CodUsuario');
			$this->db->join('usuario d','msg.CodDestino = d.CodUsuario');
			$this->db->where($where);
			$this->db->order_by('msg.DataHoraEnvio','ASC');
		}
		else{
			$this->db->select('*');
			$this->db->from('usuario');
			// $this->db->join('usuario r','msg.CodRemetente = r.CodUsuario');
			$this->db->where("`Status` != FALSE");
			$this->db->order_by('Nome','ASC');
		}
		return $this->db->get()->result();
	}


	//função para pegar as mensagens que não foram visualizadas
	function msgNvista($where){
		$query = $this->db->get_where('mensagem',$where);
		if($query)
			return $query->num_rows();
		else
			return null;
	}


	function retornaMsgs($where = null,$last = null){
		$this->db->select('r.Nome NomeRemetente, r.CodTipoUsuario,r.HorarioLimite,r.Foto FotoR, r.Sexo SexoR, d.*,msg.*, ug.*');
		$this->db->from('mensagem msg');
		$this->db->join('usuario r','r.CodUsuario = msg.CodRemetente');
		$this->db->join('usuario d','d.CodUsuario = msg.CodDestino');
		// $this->db->join('hierarquia h','h.CodHierarquia = r.CodHierarquia','left');
		$this->db->join('usuario-grupo ug','ug.CodUsuario = r.CodUsuario','left');
		// $this->db->join('turma t','t.CodTurma = at.CodTurma','left');
		
		$this->db->order_by('CodMensagem','ASC');
		if(!empty($where))
			$this->db->where($where);
		
		if(!empty($last)){
			$row = $this->db->get();
			return $row->last_row();
		}
		return $this->db->get()->result();

	}

	function retornaMsgsGrupo($where = null,$last = null){
		$this->db->select('r.Nome NomeRemetente, r.CodTipoUsuario,r.HorarioLimite,r.Foto FotoR, r.Sexo SexoR, msg.*, gp.Nome NomeGrupo');
		$this->db->from('mensagem msg');
		$this->db->join('usuario r','r.CodUsuario = msg.CodRemetente');
		$this->db->join('grupo gp','gp.CodGrupo = msg.CodGrupo');
		
		$this->db->order_by('CodMensagem','ASC');
		if(!empty($where))
			$this->db->where($where);
		
		if(!empty($last)){
			$row = $this->db->get();
			return $row->last_row();
		}
		return $this->db->get()->result();

	}

	function retornaSidebarGrupo($where = null,$last = null){
		$this->db->select('g.*,ug.*');
		$this->db->from('grupo g');
		$this->db->join('usuario-grupo ug','ug.CodGrupo = g.CodGrupo');
		
		$this->db->order_by('g.Nome','ASC');
		if(!empty($where))
			$this->db->where($where);
		
		if(!empty($last)){
			$row = $this->db->get();
			return $row->last_row();
		}
		return $this->db->get()->result();

	}

	function cadastraMsg($data){
		try{
			$this->db->insert('mensagem',$data);
			return $this->db->insert_id();
		}catch(PDOException $e){
			return $e;
		}
	}

	function visualiza($where){
		try {
			$this->db->set('Status',1);
			$this->db->where($where);
			$this->db->update('mensagem');
		} catch (PDOException $e) {
			return $e;
		}
	}

	function contaMsg($where = null){
		$this->db->select('CodMensagem');
		$this->db->from('mensagem');
		if(!empty($where))
			$this->db->where($where);
		return $this->db->get()->num_rows();
	}
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* Model com métodos de consulta ao banco de dados pertinentes ao layout principal
* @author Matheus Antonio
*/
class Interface_led extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$db = $this->load->database();
	}
	
	function pegaInformacoes($data){
		$where = array('CodUsuario' =>  $data['cod']);
		$query = $this->db->get_where("usuario", $where);
		return $query->row_array();
	}

	function contadorNotificacoes($data){
		$this->db->select('DataCadastro');
		$dt = $this->db->get_where('usuario',array('CodUsuario'=>$data['cod']))->row_array();
		$dt = $dt['DataCadastro'];
		$where = array('CodDestinatario' => $data['cod']);

		$this->db->where('CodDestinatario',null)->or_where('CodDestinatario',$data['cod']);
		$status = array('Status' => 0, 'CodDestinatario <>' => null, 'DataHora >' => $dt);
		$query = $this->db->get_where("notificacao", $status);
		
		return $query->num_rows();
	}

	function statusNotificacao($data){
		// $where = array('CodNotificacao' => $data['CodNotificacao']);
		$this->db->set('Status', 1);
		$this->db->where($data);
		if($this->db->update("notificacao")){	
			return true;
		}else{
			return false;
		}
	}

	function notificacoes($data){
		$this->db->select('DataCadastro');
		$dt = $this->db->get_where('usuario',array('CodUsuario'=>$data['cod']))->row_array();
		$dt = $dt['DataCadastro'];
		$where = array('CodDestinatario' => $data['cod']);
		$this->db->where(array('DataHora >=' => $dt));
		$this->db->where($where)->or_where('CodDestinatario', null);
		$this->db->order_by('DataHora', 'DESC');
		$query = $this->db->get("notificacao");
		return $query->result();
	}

	function enviaNotificacao($notificacao){
		try{
			$this->db->insert("notificacao", $notificacao);
		}
		catch(PDOException $e){
			return $e;
		}
	}

	function startRpg($where){
		//pego o usuário com o where que veio como parâmetro
		$usuario = $this->db->get_where("usuario", $where)->row();
		$array = array('CodUsuario' => $usuario->CodUsuario);
		$this->db->insert("experiencia", $array);
	}

	function retornaXp($usuario){
		try{
			$user = $this->db->get_where('experiencia',array('CodUsuario' => $usuario['cod']))->row_array();
			//apagar esta linha
			return $user['PontosXP'];
		}
		catch(PDOException $e){
			return $e;
		}
	}


}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
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
		$this->db->where('CodDestinatario',null)->or_where('CodDestinatario',$data['cod']);
		$status = array('Status' => 0);
		$query = $this->db->get_where("notificacao", $status);
		
		return $query->num_rows();
	}

	function statusNotificacao($data){
		$array = array('CodDestinatario' => $data['usuario'], 'CodNotificacao' => $data['notificacao']);
		$this->db->where($array);
		$this->db->set('Status', 1);
		if($this->db->update("notificacao")){
			return true;
		}
	}

	function notificacoes($data){
		$where = array('CodDestinatario' => $data['cod']);
		$this->db->where($where)->or_where('CodDestinatario', null);
		$query = $this->db->get("notificacao");
		return $query->result();
	}

	function enviaNotificacao($notificacao){
		$titulo = $notificacao['titulo'];
		$texto = $notificacao['texto'];
		$dthr = $notificacao['data'];
		$link = $notificacao['link'];
		$remetente = $notificacao['remetente'];
		$destinatario = $notificacao['destinatario'];
		$array = array(
			'Titulo' => $titulo, 
			'Texto' => $texto,
			'DataHora' => $dthr, 
			'Link' => $link, 
			'CodRemetente' => $remetente, 
			'CodDestinatario' => $destinatario 
		);
		$this->db->insert("notificacao", $array);
	}

	function startRpg($usuario){
		$this->db->insert("experiencia", array('CodUsuario' => $usuario['CodUsuario']));
	}

	function retornaLvl($usuario){
		$cod = $usuario['cod'];
		$where = array('CodUsuario' => $cod);
		$this->db->select('QtdCinestesica, QtdEspacial, QtdExistencial, QtdInterpessoal, QtdIntrapessoal, QtdLinguistica, QtdLogicoMat, QtdMusical, QtdNaturalista, QtdPratica');
		$xp = $this->db->get_where("experiencia", $where);
		$xp = array_sum($xp->row_array());
		$xp = 50 * sqrt($xp);
		return $xp;
		//arrumar aqui
	}
}
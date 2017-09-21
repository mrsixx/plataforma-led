<?php

/**
* MODELO COM MÉTODOS DA ESCOLA
* @author Matheus Antonio
*/
class Escola extends CI_Model
{
	
	function __construct(){
		parent::__construct();
		$db = $this->load->database();
	}

	function getEscola(){
		$this->tabela = "escola";
		$query = $this->db->get($this->tabela);
		$escola = $query->row_array();
		return $escola;
	}
	function getCursos($data = null){
		if(isset($data))
			$query = $this->db->get_where("curso", $data);
		else
			$query = $this->db->get("curso");
		return $query->result();
	}

	function getTurma($data = null){
		if(isset($data)){
			$this->db->select('*');
			$this->db->from('turma');
			$this->db->join('curso', 'curso.CodCurso = turma.CodCurso');
			$this->db->where($data);
			$query = $this->db->get();
		}
		else{
			$this->db->select('*');
			$this->db->from('turma');
			$this->db->join('curso', 'curso.CodCurso = turma.CodCurso');
			$query = $this->db->get();
		}
		return $query->result();
	}
	function getHierarquia($data = null){
		if(isset($data))
			$query = $this->db->get_where("hierarquia", $data);
		else
			$query = $this->db->get("hierarquia");
		return $query->result();
	}

	function cadastraEscola($data){
		try{
			$array = array(
				'Nome' => $data['escola'], 
				'DataFundacao' => $data['dtfundacao'], 
				'Cep' => $data['cep'], 
				'Rua' => $data['rua'], 
				'Bairro' => $data['bairro'],
				'Cidade' => $data['cidade'], 
				'Estado' => $data['estado'], 
				'Website' =>$data['website']
			);
			if($this->db->insert("escola", $array)){
				return true;
			}else{
				return false;
			}
		}
		catch(PDOException $e){
			$e;
		}

	}

	function cadastraCurso($data){
		try{
			if($this->db->insert("curso", $data)){
				return true;
			}else{
				return false;
			}
		}
		catch(PDOException $e){
			$e;
		}

	}

	function cadastraTurma($data){
		try{
			if($this->db->insert("turma", $data)){
				return true;
			}else{
				return false;
			}
		}
		catch(PDOException $e){
			$e;
		}

	}

	function updateEscola($data){
		try{
			$this->db->set($data);
			$this->db->where(array('CodEscola' => $data['CodEscola']));
			if($this->db->update("escola")){
				return true;
			}
			else{
				return false;
			}
		

		}catch(PDOException $e){
			$e;
		}
	}


}
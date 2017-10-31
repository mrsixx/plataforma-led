<?php
/**
* Model com métodos de consulta ao banco de dados pertinentes as tasks
* @author Matheus Antonio
*/
class Missoes extends CI_Model
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
	
	function retornaTask($where,$return = 'array'){
		try{
				$this->db->select("task.*, usuario.CodUsuario, usuario.Nome NomeUser, usuario.Sobrenome, usuario.Sexo, usuario.Foto, tipotask.CodTipoTask, tipotask.Premio, tipotask.Dificuldade,turma-task.*, turma.NomeTurma, turma.Modulo");
				$this->db->from('task');
				$this->db->join('usuario', 'usuario.CodUsuario = task.CodCriador');
				$this->db->join('tipotask', 'tipotask.CodTipoTask = task.CodTipoTask');
				$this->db->join('turma-task', 'turma-task.CodTask = task.CodTask');
				$this->db->join('turma', 'turma.CodTurma = turma-task.CodTurma');
				$this->db->order_by('turma.Modulo, turma.NomeTurma, task.Nome','ASC');
				$this->db->where($where);
				switch ($return) {
					case 'array':
						return $this->db->get()->row_array();
						break;
					
					default:
						return $this->db->get()->result();
						break;
				}
		}catch(PDOException $e){
			return $e;
		}
	}

	function retornaCompTask($where){
		$this->db->select('*');
		$this->db->from('competencia');
		$this->db->join('inteligencia', 'competencia.CodInteligencia = inteligencia.CodInteligencia');
		$this->db->where($where);
		return $this->db->get()->result();
	}

	function retornaCompProfessor($where = null){
		if(isset($where)){
			$this->db->select('*');
			$this->db->from('componente-professor cp');
			$this->db->join('usuario u','cp.CodProfessor = u.CodUsuario');
			$this->db->join('componente-turma ct','ct.CodComponente = c.CodComponentel');
			$this->db->join('turma t','t.CodTurma = ct.CodTurma');
			$this->db->join('compcurricular c','c.CodComponente = cp.CodComponente');
			$this->db->where($where);
			$this->db->order_by('c.Nome','ASC');
			return $this->db->get()->row_array();
		}
		else{
			$this->db->select('*');
			$this->db->from('componente-professor cp');
			$this->db->join('usuario u','cp.CodProfessor = u.CodUsuario');
			$this->db->join('componente-turma ct','ct.CodComponente = c.CodComponentel');
			$this->db->join('turma t','t.CodTurma = ct.CodTurma');
			$this->db->join('compcurricular c','c.CodComponente = cp.CodComponente');
			$this->db->order_by('c.Nome','ASC');
			return $this->db->get()->row_array();
		}
	}


	function retornaDesempenhaTask($where){
		// $this->db->select('dt.*, u.Nome,at.*');
		// $this->db->from('aluno-turma at');
		// $this->db->join('usuario u','at.CodUsuario = u.CodUsuario','right');
		// $this->db->join('desempenha-task dt', 'at.CodUsuario = dt.CodUsuario');
		// $this->db->where($where);
		// $this->db->order_by('u.Nome','ASC');
		return $this->db->get_where('desempenha-task',$where)->result();
	}

	function cadTask($data,$tabela){
		return $this->db->insert($tabela,$data);
	}




	function premiaXp($where,$qtd){
		$this->db->set('PontosXP',"PontosXP + $qtd", FALSE);
		$this->db->where($where);
		return $this->db->update('experiencia');
	}

	function validaDesempenho($set,$where){
		$this->db->set($set);
		$this->db->where($where);
		$this->db->update('desempenha-task');
	}
}
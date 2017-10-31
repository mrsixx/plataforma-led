<?php
/**
* Model com métodos de consulta ao banco de dados pertinentes a escola e configuração de ambiente
* @author Matheus Antonio
*/
class Escola extends CI_Model
{
	
	function __construct(){
		parent::__construct();
		$db = $this->load->database();
	}

//funções com select
	function getEscola(){
		$this->tabela = "escola";
		$query = $this->db->get($this->tabela);
		$escola = $query->row_array();
		return $escola;
	}
	function getCursos($data = null){		
		//verifico se estou passando alguma cláusula where para a consulta, e executo
		if(isset($data))
			$query = $this->db->get_where("curso", $data);
		else
			$query = $this->db->get("curso");

		return $query->result();		
	}

	function getTurma($data = null, $result = null){
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

		switch ($result) {
			case 'array':
				return $query->row_array();
				break;
			
			default:
				return $query->result();
				break;
		}
	}

	function getHierarquia($data = null){
		if(isset($data))
			$query = $this->db->get_where("hierarquia", $data);
		else
			$query = $this->db->get("hierarquia");
		return $query->result();
	}
	
	function getCompCurricular($data = null){
		if(isset($data)){
			$this->db->select('us.Nome NomeUsuario,us.Sobrenome,us.DataNascimento,us.Token,us.Nickname,us.Foto,us.Cidade,us.Sexo, compprof.*,comp.Nome, comp.Sigla, compt.*, t.*');
			$this->db->from('compcurricular comp');
			$this->db->join('componente-turma compt', 'comp.CodComponente = compt.CodComponente');
			$this->db->join('turma t', 'compt.CodTurma = t.CodTurma');
			$this->db->join('componente-professor compprof','compprof.CodComponente = comp.CodComponente');
			$this->db->join('usuario us','us.CodUsuario = compprof.CodProfessor','left');
			$this->db->order_by('comp.Nome, t.Modulo','ASC');
			$this->db->where($data);
			$query = $this->db->get();
			// $query = $this->db->get_where("compcurricular", $data);
		}
		else{
			$this->db->select('us.Nome NomeUsuario,us.Sobrenome,us.DataNascimento,us.Token,us.Nickname,us.Foto,us.Cidade,us.Sexo, compprof.*,comp.Nome, comp.Sigla, compt.*, t.*');
			$this->db->from('compcurricular comp');
			$this->db->join('componente-turma compt', 'comp.CodComponente = compt.CodComponente');
			$this->db->join('turma t', 'compt.CodTurma = t.CodTurma');
			$this->db->join('componente-professor compprof','compprof.CodComponente = comp.CodComponente');
			$this->db->join('usuario us','us.CodUsuario = compprof.CodProfessor','left');
			$this->db->order_by('comp.Nome, t.Modulo','ASC');
			$query = $this->db->get();

		}
		return $query->result();
	}

	function getGrupo($data = null){
		if(isset($data)){
			$query = $this->db->get_where("grupo", $data);
		}else{
			$query = $this->db->get('grupo');
		}
		return $query->row_array();
	}

	function getMural($data = null,$return = null){
		$this->db->order_by('Nome','ASC');
		if(isset($data)){
			$query = $this->db->get_where("mural", $data);
		}else{
			$query = $this->db->get('mural');
		}
		if(!isset($return))
			return $query->row_array();
		else
			return $query->result();
	}


	function getAlunoTurma($where,$return = null){
		$this->db->select('*');
		$this->db->from('usuario u');
		$this->db->join('aluno-turma at', 'at.CodUsuario = u.CodUsuario');
		$this->db->where($where);
		$this->db->order_by('Nome','ASC');
		$query = $this->db->get();

		if(isset($return) && $return = 'array'){
			return $query->row_array();
		}
		return $query->result();
	}

	function getFuncionario($where){
		$this->db->select('hierarquia.Nome` AS `Hierarquia, hierarquia.CodHierarquia, usuario.*');
		$this->db->from('hierarquia');
		$this->db->join('usuario', 'hierarquia.CodHierarquia = usuario.CodHierarquia');
		$this->db->where($where);
		$this->db->order_by('usuario.Nome','ASC');
		$query = $this->db->get();
		return $query->result();
	}


//funções com delete
	function excluir($data){
		try{
			$tabela = $data['tabela'];
			$where = $data['where'];
			if($this->db->delete($tabela,$where))
				return true;
			
		}
		catch(PDOException $e){
			$e;
		}

	}


//funções com insert

	//função para cadastrar a escola
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
				$mural = array(
					'Nome' => $array['Nome'], 
					'Descricao' => utf8_decode('Mural de publicações principal da')." ".$array['Nome']
				);
				if($this->cadMural($mural)){
					return true;
				}
			}else{
				return false;
			}
		}
		catch(PDOException $e){
			return $e;
		}

	}
	//função para cadastrar cursos no banco
	function cadastraCurso($data){
		try{
			//verifico se aquele curso já existe
			$curso = $this->getCursos(array('Nome' => $data['Nome']));
				if(!empty($curso))
					break;
				//tento cadastrar um curso
				if($this->db->insert("curso", $data)){
					//se cadastrar preparo um array com informações para um mural e um grupo no chat relacionado aquele curso
					$mural = array(
						'Nome' => $data['Nome'], 
						'Descricao' => utf8_decode('Mural de publicações principal para o curso "').$data['Nome'].'"', 
						'CodCurso' => $this->db->insert_id()
					);

					$grupo = array(
						'Nome'=>$data['Nome'], 
						'CodCriador' => null, 
						'DataCriacao' => date("Y-m-d"), 
						'CodCurso' => $this->db->insert_id()
					);


					//passo o retorno da tentativa de cadastro do mural e grupo 
					if($this->cadMural($mural) && $this->cadGrupo($grupo))
						return true;
					else
						return false;

				}else return false;
		}catch(PDOException $e){
			return $e;
		}
	}	

	//função para cadastrar turmas no banco
	function cadastraTurma($data){
		try{
			if(!empty($this->getTurma())){
			$turma = $this->getTurma(array('NomeTurma' => $data['NomeTurma'], 'Modulo' => $data['Modulo'], 'turma.CodCurso' => $data['CodCurso'], 'Periodo' => $data['Periodo']));
				if(!empty($turma))
					break;
			}
			//tento cadastrar uma turma
			if($this->db->insert("turma", $data)){
				//se cadastrou eu preparo um array com as informações 
				$mural = array(
					'Nome' => $data['Modulo'].utf8_decode("º ").$data['NomeTurma'], 
					'Descricao' => utf8_decode('Mural de publicações principal da turma ').$data['Modulo'].utf8_decode("º ").$data['NomeTurma'],
					'CodTurma' => $this->db->insert_id()
				);

				$grupo = array(
					'Nome' => $data['Modulo'].utf8_decode("º ").$data['NomeTurma'], 
					'CodCriador' => null, 
					'DataCriacao' => date("Y-m-d"),
					'CodTurma' => $this->db->insert_id()
				);

				//passo o retorno da tentativa de cadastro de tudo
				$id = $this->cadMural($mural,true);
					
				if(!empty($id) && $this->cadGrupo($grupo))
					return array(true,$id);
				else
					return false;
			}
		}
		catch(PDOException $e){
			$e;
		}
	}


	//função para cadastrar grupo
	function cadGrupo($data){
		try{
			if($this->db->insert("grupo",$data))
				return true;
			else
				return false;
		}catch(PDOException $e){
			return $e;
		}
	}

	//função para cadastrar mural
	function cadMural($data,$id = false){
		try{
			if($this->db->insert("mural",$data)){
				if(!$id)
					return true;
				else
					return $this->db->insert_id();
			}
			else
				return false;
		}catch(PDOException $e){
			return $e;
		}
	}

	//função para cadastrar hierarquia
	function cadHierarquia($data){
		try{
			if($data['Nivel'] != 1){
				
				$superior = $this->db->from('hierarquia');
				$this->db->where(array('Nivel' => ($data['Nivel'] - 1)));
				$superior = $this->db->count_all_results();
				if($superior != 0){
					if($this->db->insert("hierarquia",$data))
						return true;
					else
						return false;
				}
				else{
					break;
				}
			}else{
				if($this->db->insert("hierarquia",$data))
						return true;
					else
						return false;
			}
		}catch(PDOException $e){
			return $e;
		}

	}

	//inserindo um aluno na turma e grupo 
	function matricula($user,$modules){
		//preparo arrays de informações das tuplas
		$escola = $this->db->get_where('mural', "CodCurso IS NULL AND CodTurma IS NULL AND CodMural <> 1")->row();
		$turma = array('CodUsuario' => $user, 'CodTurma' => $modules['CodTurma']);
		$grupo = array('CodUsuario' => $user, 'CodGrupo' => $modules['CodGrupo']);
		$muralturma = array('CodUsuario' => $user, 'CodMural' => $modules['muralTurma'], 'DataEntrada' => date('Y-m-d'));
		$muralCurso = array('CodUsuario' => $user, 'CodMural' => $modules['muralCurso'], 'DataEntrada' => date('Y-m-d'));
		$muralEscola = array('CodUsuario' => $user, 'CodMural' => $escola->CodMural, 'DataEntrada' => date('Y-m-d'));
		//retorno a inserção dos arrays
		if($this->alunoTurma($turma) && $this->usuarioGrupo($grupo) && $this->usuarioMural($muralturma) && $this->usuarioMural($muralCurso) && $this->usuarioMural($muralEscola)){
			return true;
		}
		else{
			return false;		
		}
	}



	//função para colocar um usuário numa sala
	function alunoTurma($data){
		try{
			if($this->db->insert('aluno-turma',$data))
				return true;
			else
				return false;
		}
		catch(PDOException $e){
			return $e;
		}
	}
	//função para colocar um usuário num grupo do chat
	function usuarioGrupo($data){
		try{
			if($this->db->insert('usuario-grupo',$data))
				return true;
			else
				return false;
		}
		catch(PDOException $e){
			return $e;
		}
	}

	function usuarioMural($data){
		try{
			if($this->db->insert('usuario-mural',$data))
				return true;
			else
				return false;
		}
		catch(PDOException $e){
			return $e;
		}
	}




//funções com update

	//função para alterar dados da escola
	function updateEscola($data){
		try{
			$this->db->set($data);
			$this->db->where(array('CodEscola' => $data['CodEscola']));
			if($this->db->update("escola")){
				$this->db->where('CodMural', 1);
				$this->db->set(array('Nome' => $data['Nome']));
				if($this->db->update('mural')){
					return true;
				}
				else{
					return false;
				}
			}
			else{
				return false;
			}
		

		}catch(PDOException $e){
			return $e;
		}
	}

	//função para alterar dados do curso
	function updateCurso($data){
		try{
			$this->db->set($data);
			$this->db->where(array('CodCurso' => $data['CodCurso']));
			if($this->db->update("curso")){
				return true;
			}else{
				return false;
			}
		}
		catch(PDOException $e){
			return $e;
		}

	}

	//função para alterar dados da turma
	function updateTurma($data){
		try{
			$this->db->set($data);
			$this->db->where(array('CodTurma' => $data['CodTurma']));
			if($this->db->update("turma")){
				return true;
			}else{
				return false;
			}
		}
		catch(PDOException $e){
			return false;
			$e;
		}

	}


	//função para alterar dados de um componente curricular
	function updateComponente($data,$where,$tabela = 'compcurricular'){
		try{
			if($tabela == 'compcurricular'){
				$this->db->set($data);
				$this->db->where(array('CodComponente' => $data['CodComponente']));
				$comp = $this->db->update("compcurricular");

				$this->db->set(array('CodProfessor'=>$where));
				$this->db->where(array('CodComponente' => $data['CodComponente']));
				$compprof = $this->db->update('componente-professor');

				if($comp && $compprof){
					return true;
				}else{
					return false;
				}
			}
			else if($tabela = 'compprof'){
				$this->db->set($data);
				$this->db->where($where);
				$comp = $this->db->update("componente-professor");
				return $comp;

			}
		}
		catch(PDOException $e){
			return false;
			$e;
		}

	}
	function updateHierarquia($data){
		try{
			$this->db->set($data);
			$this->db->where(array('CodHierarquia' => $data['CodHierarquia']));
			if($this->db->update("hierarquia")){
				return true;
			}else{
				return false;
			}
		}
		catch(PDOException $e){
			return false;
			$e;
		}

	}

	//função para cadastrar cursos no banco
	function cadComponente($data, $turma){
		try{
			$componente = array('Nome' => $data['Nome'],'Sigla'=> $data['Sigla']);
			if($this->db->insert("compcurricular", $componente)){
				$comp = $this->db->insert_id();
				$compturma = array('CodTurma' => $turma, 'CodComponente' => $comp);
				$compprof = array('CodProfessor' => $data['CodProfessor'], 'CodComponente' => $comp);
				if($this->db->insert("componente-turma", $compturma) && $this->db->insert('componente-professor',$compprof))
					return true;
			}else{
				return false;
			}
		}
		catch(PDOException $e){
			return $e;
		}

	}

	// function cadCompProf()


	function updateGrupo($set,$cod){
		$this->db->set($set);
		$this->db->where($cod);
		if($this->db->update('grupo'))
			return true;
		else
			return false;

	}

	function updateMural($set,$cod){
		$this->db->set($set);
		$this->db->where($cod);
		if($this->db->update('mural'))
			return true;
		else
			return false;

	}

}
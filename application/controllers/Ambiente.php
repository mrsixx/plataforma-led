<?php
/**
*  Controlador com métodos pertinentes a configuração de ambiente
*  @author Matheus Antonio
*/
defined('BASEPATH') OR exit('No direct script access allowed');

class Ambiente extends CI_Controller {
	public function index(){	
		//verificando se a sessão existe
		$this->load->library('session');
		if($this->session->has_userdata('login')){
			$usuario = $this->session->login;
			$cod = $usuario['cod'];
			$tipo = $usuario['tipo'];
			
			if($tipo != 1)
				redirect(base_url('panel'));

			//verificando se a configuração de ambiente já foi feita
			$this->load->helper('inicia');


			if(verificaAmbiente())
				$tranca = FALSE;
			else
				$tranca = TRUE;
			
			//preencho a interface 
			$this->load->helper('interface');
				$data = preencheInterface($usuario,'principal', $tranca);
			//se existir eu mando pra view com as informações

			$this->load->model("escola");
			$this->load->model('usuario');
			$data['escola'] = $this->escola->getEscola();
			$data['cursos'] = $this->escola->getCursos();
			$data['cursosativos'] = $this->escola->getCursos(array('Status'=>1));
			$data['turmas'] = $this->escola->getTurma();
			$data['compcurricular'] = $this->escola->getCompCurricular();
			$data['hierarquia'] = $this->escola->getHierarquia();
			$data['teachers'] = $this->usuario->getUser(array('CodTipoUsuario' => 4),'count');
			$data['adm'] = $this->usuario->getUser(array('CodTipoUsuario' => 1),'count');
			$data['maiorNivel'] = $this->escola->getHierarquia();

			$data['title'] = "Configuração de ambiente";
			$data['content'] = "ambiente";
			$data['sidebar'] = "home";
			$data['files'] = array(
				'css textearea'=> '<style>textarea{resize:none;}
										.list-group-item.disabled{background-color:#0a5372;}
										.list-group-item.disabled:hover, .list-group-item.disabled:focus{background-color:#030e1b;}</style>'
    		);
    		$data['filesfooter'] = array(
    			'funções para os modais da página' => '<script type="text/javascript" src="'.base_url('assets/js/scripts/ambiente.js').'"></script>'
    		);
			$this->load->view('panel/layout', $data);

		}else{
			redirect(base_url());
		}
	}

	public function attEscola(){
		//verificando se a sessão existe, caso exista mando para o painel 
		$this->load->library('session');
		if($this->session->has_userdata('login')){
			$usuario = $this->session->login;
			$data['Nome'] = utf8_decode($this->input->post('txtEscola'));
			$data['DataFundacao'] = utf8_decode($this->input->post('dtFundacao'));
			$data['Rua'] = utf8_decode($this->input->post('txtRua'));
			$data['Bairro'] = utf8_decode($this->input->post('txtBairro'));
			$data['Cidade'] = utf8_decode($this->input->post('txtCidade'));
			$data['Cep'] = utf8_decode($this->input->post('txtCep'));
			$data['Estado'] = utf8_decode($this->input->post('cmbEstado'));
			$data['Website'] = utf8_decode($this->input->post('txtWebsite'));
			$data['CodEscola'] = utf8_decode($this->input->post('cod'));

			//carrego a model com o update
			$this->load->model("escola");
			//atualizo
			$retorno = $this->escola->updateEscola($data);

			//passo o retorno
			return $retorno;
		}else{
			//se não houver sessão, então mando de volta pois não existiu um login
			redirect(base_url());
		}
	}


	//função para retornar dados sobre um curso por AJAX (retornando com JSON)
	public function retornaCursosAjax(){
		//verifico se recebi algum valor por get como parametro, se sim ele será o código se não passo nulo
		if(isset($_GET['cod']))
			$data = array('CodCurso' => $this->input->get('cod'));
		else
			$data = null;

		$this->load->model('escola');
		$retorno = $this->escola->getCursos($data);
		foreach ($retorno as $retorno) {
			$return = array(
				'CodCurso' => $retorno->CodCurso,
				'Nome' => utf8_encode($retorno->Nome),
				'Status' => $retorno->Status,
				'SerieInicial' => $retorno->SerieInicial,
				'SerieFinal'=> $retorno->SerieFinal,
				'Descricao' => utf8_encode($retorno->Descricao)
			);
		}
		return $this->output 
        		-> set_content_type('application/json') 
        		-> set_output(json_encode($return));
		// return json_encode($return);
	}

	//função para excluir curso com AJAX
	public function excluirCurso(){
		if(isset($_GET['cod']))
			$where = array('CodCurso' => $this->input->get('cod'));
		else
			$where = null;

		if(isset($_GET['tabela']))
			$tabela = $this->input->get('tabela');
		else
			$tabela = null;

		$this->load->model('escola');
		$data['where'] = $where;
		$data['tabela'] = $tabela;
		if($this->escola->excluir($data))
			return true;
		else
			return false;
	}

	//função para cadastrar curso com AJAX
	public function cadCurso(){
		//verificando se a sessão existe, caso exista mando para o painel 
		$this->load->library('session');
		if($this->session->has_userdata('login')){
			$usuario = $this->session->login;
			$data['Nome'] = utf8_decode($this->input->post('txtNome'));
			$data['SerieInicial'] = $this->input->post('nbInicial');
			$data['SerieFinal'] = $this->input->post('nbFinal');
			$data['Status'] = $this->input->post('cmbStatus');
			$data['Descricao'] = utf8_decode($this->input->post('txtDescricao'));

			//carrego a model com o insert
			$this->load->model("escola");

			//cadastro o curso com as informações inseridas
			return $this->escola->cadastraCurso($data);
		}else{
			//se não houver sessão, então mando de volta pois não existiu um login
			redirect(base_url());
		}
	}

	//função para controlar update do curso com AJAX
	public function alteraCurso(){
		//verificando se a sessão existe, caso exista mando para o painel 
		$this->load->library('session');
		if($this->session->has_userdata('login')){
			$usuario = $this->session->login;
			$data['CodCurso'] = $this->input->post('hiddenCod');
			$data['Nome'] = utf8_decode($this->input->post('txtNome'));
			$data['SerieInicial'] = $this->input->post('nbInicial');
			$data['SerieFinal'] = $this->input->post('nbFinal');
			$data['Status'] = (bool)$this->input->post('cmbStatus');
			$data['Descricao'] = utf8_decode($this->input->post('txtDescricao'));

			//carrego a model com o update
			$this->load->model("escola");
			//atualizo
			$retorno = $this->escola->updateCurso($data);
			if($retorno){
				$attmural = $this->escola->updateMural(array('Nome' => $data['Nome']),array('CodCurso' => $data['CodCurso']));
				$attgrupo = $this->escola->updateGrupo(array('Nome' => $data['Nome']),array('CodCurso' => $data['CodCurso']));
				if($attgrupo && $attmural)
					return true;
				else
					return false;
			}
		}else{
			//se não houver sessão, então mando de volta pois não existiu um login
			redirect(base_url());
		}
	}



	//função para cadastrar turma
	public function cadTurma(){
		//verificando se a sessão existe, caso exista mando para o painel 
		$this->load->library('session');
		if($this->session->has_userdata('login')){
			$usuario = $this->session->login;

			//verificando se existem cursos
			$this->load->model('escola');
			$cursos = $this->escola->getCursos();
			if(!empty($cursos)){
				$data['NomeTurma'] = utf8_decode($this->input->post('txtNome'));
				$data['Modulo'] = $this->input->post('cmbModulo');
				$data['Periodo'] = utf8_decode($this->input->post('cmbPeriodo'));
				$data['InicioLetivo'] = $this->input->post('dtInicio');
				$data['FimLetivo'] = $this->input->post('dtFinal');
				$data['QtdAlunos'] = $this->input->post('nbQtd');
				$data['CodCurso'] = $this->input->post('cmbCurso');
				$qtd = $data['QtdAlunos'];
				//carrego a model com o insert
				$this->load->model("escola");
				$t = $this->escola->cadastraTurma($data);
				if($t[0]){
					//ao cadastrar uma turma, irei reservar registros no banco para cada um dos alunos dela
					$turma = $this->escola->getTurma(array('NomeTurma '=> $data['NomeTurma'], 'Modulo' => $data['Modulo']),'array');
					$grupo = $this->escola->getGrupo(array('CodTurma' => $turma['CodTurma']));

					//pego o mural correspondente ao curso daquele usuário
					$mCurso = $this->escola->getMural(array('CodCurso' => $data['CodCurso']));

				
					$modules = array(
						'CodTurma' => $turma['CodTurma'],
						'CodGrupo' => $grupo['CodGrupo'],
						'muralTurma' => $t[1],
						'muralCurso' => $mCurso['CodMural']
					);
					if($this->cadastraUsuario(3,null,$qtd,$modules))
						return true;
				}
			}else{
				return false;
			}

		}else{
			//se não houver sessão, então mando de volta pois não existiu um login
			redirect(base_url());
		}
	}

	//função para retornar dados sobre uma turma por AJAX (retornando com JSON)
	public function retornaTurmaAjax(){
		//verifico se recebi algum valor por get como parametro, se sim ele será o código se não passo nulo
		if(isset($_GET['cod']))
			$data = array('CodTurma' => $this->input->get('cod'));
		else
			$data = null;

		$this->load->model('escola');
		$retorno = $this->escola->getTurma($data);
		foreach ($retorno as $retorno) {
			$return = array(
				'CodTurma' => $retorno->CodTurma,
				'NomeTurma' => utf8_encode($retorno->NomeTurma),
				'Modulo' => $retorno->Modulo,
				'InicioLetivo' => $retorno->InicioLetivo,
				'FimLetivo'=> $retorno->FimLetivo,
				'Periodo' => utf8_encode($retorno->Periodo),
				'QtdAlunos' => utf8_encode($retorno->QtdAlunos),
				'CodCurso' => utf8_encode($retorno->CodCurso),
				'SerieInicial' => $retorno->SerieInicial,
				'SerieFinal' => $retorno->SerieFinal
			);
		}
		return $this->output 
        		-> set_content_type('application/json') 
        		-> set_output(json_encode($return));
		// return json_encode($return);
	}

	//função para excluir turma com AJAX
	public function excluirTurma(){
		if(isset($_GET['cod']))
			$where = array('CodTurma' => $this->input->get('cod'));
		else
			$where = null;

		if(isset($_GET['tabela']))
			$tabela = $this->input->get('tabela');
		else
			$tabela = null;

		$this->load->model('escola');
		$data['where'] = $where;
		$data['tabela'] = $tabela;
		if($this->escola->excluir($data))
			return true;
		else
			return false;
	}

	//função para controlar update da turma com AJAX
	public function alteraTurma(){
		//verificando se a sessão existe, caso exista mando para o painel 
		$this->load->library('session');
		if($this->session->has_userdata('login')){
			$usuario = $this->session->login;
			$data['CodTurma'] = $this->input->post('hiddenCod');
			$data['NomeTurma'] = utf8_decode($this->input->post('txtNome'));
				$data['Modulo'] = $this->input->post('cmbModulo');
				$data['Periodo'] = utf8_decode($this->input->post('cmbPeriodo'));
				$data['InicioLetivo'] = $this->input->post('dtInicio');
				$data['FimLetivo'] = $this->input->post('dtFinal');
				$data['QtdAlunos'] = $this->input->post('nbQtd');
				$data['CodCurso'] = $this->input->post('cmbCurso');



			//carrego a model com o update
			$this->load->model("escola");
			//atualizo
			$retorno = $this->escola->updateTurma($data);
			//passo o retorno 
			return $retorno;
		}else{
			//se não houver sessão, então mando de volta pois não existiu um login
			redirect(base_url());
		}
	}



	//função para controlar update da turma com AJAX
	public function alteraComp(){
		//verificando se a sessão existe, caso exista mando para o painel 
		$this->load->library('session');
		//carrego a model com o update
			$this->load->model("escola");
		if($this->session->has_userdata('login')){
			$usuario = $this->session->login;

			$compturma = $this->input->post('cod');
			$componente = $this->escola->getCompCurricular(array('CodCompTurma' => $compturma));
			foreach ($componente as $comp) {
				$cod = $comp->CodComponente;
			}
			$data['CodComponente'] = $cod;
			$data['Nome'] = utf8_decode($this->input->post('txtNome'));
			$data['Sigla'] = utf8_decode($this->input->post('txtSigla'));
			$prof = $this->input->post('cmbProfessor');
			$prof = (isset($prof))? $prof : null;
		

			
			//atualizo
			$retorno = $this->escola->updateComponente($data,$prof);
			//passo o retorno 
			return $retorno;
		}else{
			//se não houver sessão, então mando de volta pois não existiu um login
			redirect(base_url());
		}
	}

	//função para retornar componentes curriculares por AJAX (retornando com JSON)
	public function retornaComponentesCurricularesAjax(){
		//verifico se recebi algum valor por get como parametro, se sim ele será o código se não passo nulo
		if(isset($_GET['cod']))
			$data = array('CodCompTurma' => $this->input->get('cod'));
		else
			$data = null;

		$this->load->model('escola');
		$retorno = $this->escola->getCompCurricular($data);
			foreach ($retorno as $retorno) {
			$array = array(
				'CodCompTurma' => $retorno->CodCompTurma,
				'CodComponente' => $retorno->CodComponente,
				'CodTurma' => $retorno->CodTurma,
				'CodProfessor' => $retorno->CodProfessor,
				'Nome' => utf8_encode($retorno->Nome),
				'Sigla' => utf8_encode($retorno->Sigla)
			);
				$result[] = $array;
			}
		return $this->output 
        		-> set_content_type('application/json') 
        		-> set_output(json_encode($array));

	}
	//função para excluir componente
	public function excluirComp(){
		if(isset($_GET['cod']))
			$where = array('CodComponente' => $this->input->get('cod'));
		else
			$where = null;

		if(isset($_GET['tabela']))
			$tabela = $this->input->get('tabela');
		else
			$tabela = null;

		$this->load->model('escola');
		$data['where'] = $where;
		$data['tabela'] = $tabela;
		if($this->escola->excluir($data))
			return true;
		else
			return false;
	}

	public function cadComp(){
		//verificando se a sessão existe, caso exista mando para o painel 
		$this->load->library('session');
		if($this->session->has_userdata('login')){
			$usuario = $this->session->login;
			$turma = $this->input->post('cod');
			$data['Nome'] = utf8_decode($this->input->post('txtNome'));
			$data['Sigla'] = utf8_decode($this->input->post('txtSigla'));
			$prof = $this->input->post('cmbProfessor');
			$data['CodProfessor'] = (isset($prof)) ? $prof :  null;

			//carrego a model com o update
			$this->load->model("escola");
			//atualizo
			$retorno = $this->escola->cadComponente($data, $turma);
			//passo o retorno 
			return $retorno;
		}else{
			//se não houver sessão, então mando de volta pois não existiu um login
			redirect(base_url());
		}
	}

	public function cadHierarquia(){
		//verificando se a sessão existe, caso exista mando para o painel 
		$this->load->library('session');
		if($this->session->has_userdata('login')){
			$usuario = $this->session->login;
			//chamando a model com cadastro
			$this->load->model('escola');
			
			$data['Nome'] = utf8_decode($this->input->post('txtNome'));
			$data['Nivel'] = $this->input->post('cmbNivel');
			$data['Descricao'] = utf8_decode($this->input->post('txtDescricao'));
			$qtd = $this->input->post('nbFuncionarios');


			
			//cadastrando a hierarquia na tabela
			if($this->escola->cadHierarquia($data)){
				$data['CodHierarquia'] = $this->db->insert_id();
				$this->load->model('usuario');
				$this->cadastraUsuario(2,$data,$qtd,null);
			}
			
		}else{
			//se não houver sessão, então mando de volta pois não existiu um login
			redirect(base_url());
		}
	}

	public function attHierarquia(){
		//verificando se a sessão existe, caso exista mando para o painel 
		$this->load->library('session');
		//carrego a model com o update
			$this->load->model("escola");
		if($this->session->has_userdata('login')){
			$usuario = $this->session->login;

			$data['CodHierarquia'] = $this->input->post('hiddenCod');
			// $componente = $this->escola->getCompCurricular(array('CodCompTurma' => $compturma));
			// foreach ($componente as $comp) {
			// 	$cod = $comp->CodComponente;
			// }
			$data['Nome'] = utf8_decode($this->input->post('txtNome'));
			$data['Nivel'] = $this->input->post('cmbNivel');
			$data['Descricao'] = utf8_decode($this->input->post('txtDescricao'));
			
			//atualizo
			$retorno = $this->escola->updateHierarquia($data);
			//passo o retorno 
			return $retorno;
		}else{
			//se não houver sessão, então mando de volta pois não existiu um login
			redirect(base_url());
		}
	}

	//função para retornar componentes curriculares por AJAX (retornando com JSON)
	public function retornaFunc(){
		//verifico se recebi algum valor por get como parametro, se sim ele será o código se não passo nulo
		if(isset($_GET['cod']))
			$data = array('CodHierarquia' => $this->input->get('cod'));
		else
			$data = null;

		$this->load->model('escola');
		$retorno = $this->escola->getHierarquia($data);
			foreach ($retorno as $retorno) {
			$array = array(
				'CodHierarquia' => $retorno->CodHierarquia,
				'Nome' => utf8_encode($retorno->Nome),
				'Descricao' => utf8_encode($retorno->Descricao),
				'Nivel' => $retorno->Nivel
			);
			}
		return $this->output 
        		-> set_content_type('application/json') 
        		-> set_output(json_encode($array));

	}

	//função para excluir turma com AJAX
	public function excluirFunc(){
		if(isset($_GET['cod']))
			$where = array('CodHierarquia' => $this->input->get('cod'));
		else
			$where = null;

		if(isset($_GET['tabela']))
			$tabela = $this->input->get('tabela');
		else
			$tabela = null;

		$this->load->model('escola');
		$data['where'] = $where;
		$data['tabela'] = $tabela;
		if($this->escola->excluir($data))
			return true;
		else
			return false;
	}


	//função para cadastrar usuários no banco
	public function cadastraUsuario($tipo, $data = null, $qtd = null, $modules = null){
		switch ($tipo) {
			case 2:
				if(isset($qtd)){
					
					//carrego a model do usuário para começar a cadastrar os alunos
					$this->load->model('usuario');
					$this->load->helper('token');
					for ($i=0; $i < $qtd; $i++) { 
						
						$token = strUnique();
						$array = array('Token' => $token, 'CodTipoUsuario' => $tipo, 'CodHierarquia' => $data['CodHierarquia']);
						if($this->usuario->cadastra(2,$array)){
							return true;
						}
						else{
							return false;
						}

					}
				}
				break;
			
			case 3:
				if(isset($qtd)){
					
					//carrego a model do usuário para começar a cadastrar os alunos
					$this->load->model('usuario');
					$this->load->helper('token');
					for ($i = 0; $i < $qtd; $i++) { 
						
						$token = strUnique();
						$array = array('Token' => $token, 'CodTipoUsuario' => 3);
						if($this->usuario->cadastra(3,$array)){
							$this->escola->matricula($this->db->insert_id(), $modules);
						}
						else{
							return false;
						}

					}
				}
				break;
			
			default:
				if(isset($qtd)){
					//carrego a model do usuário para começar a cadastrar os alunos
					$this->load->model('usuario');
					$this->load->helper('token');
					for ($i = 0; $i < $qtd; $i++) { 
						$return = array();
						$token = strUnique();

						if(isset($data))
							$tipo = 1;
						$array = array('Token' => $token, 'CodTipoUsuario' => $tipo);
						//para o cadastro alternativo de admin

						if(isset($data))
							$tipo = 5;

						if($this->usuario->cadastra($tipo,$array)){
							$return[] = true;
						}
						else{
							$return[] = false;
						}

					}
						if(in_array(false, $return))
							return false;
						else
							return true;
				}
				break;
		}
	}


	//função para chamar a página para configurar componentes curriculares de uma turma
	public function configTurma(){
		//verificando se a sessão existe
		$this->load->library('session');
		if($this->session->has_userdata('login')){
			$usuario = $this->session->login;
			$cod = $usuario['cod'];
			$tipo = $usuario['tipo'];
			//preencho a interface 

			if($tipo != 1)
				redirect(base_url('panel'));

			$this->load->helper('inicia');
			if(verificaAmbiente())
				$tranca = FALSE;
			else
				$tranca = TRUE;

			$this->load->helper('interface');
			$data = preencheInterface($usuario,'principal',$tranca);
			//se existir eu mando pra view com as informações

			$this->load->model("escola");
			$this->load->model('usuario');
			$data['cursosativos'] = $this->escola->getCursos(array('Status'=>1));
			if(!empty($this->escola->getTurma())){
				$codTurma = $this->uri->segment(3);
				$data['turmas'] = $this->escola->getTurma(array('turma.CodTurma' => $codTurma));
				if(!empty($data['turmas'])){
					$data['compcurricular'] = $this->escola->getCompCurricular(array('t.CodTurma' => $codTurma));

					$data['professor'] = $this->usuario->getUser(array('Status <> 0 AND CodTipoUsuario =' => 4),'obj');
		    	}
				else{
					$data['msg'] = '<div class="well">Turma inexistente :/</div>';
				}



				$data['title'] = "Configuração de ambiente - Turmas";
				$data['content'] = "turma";
				$data['sidebar'] = "home";
				$data['files'] = array(
				'css textearea'=> '<style>textarea{resize:none;}
										.list-group-item.disabled{background-color:#0a5372;}
										.list-group-item.disabled:hover, .list-group-item.disabled:focus{background-color:#030e1b;}</style>'
    		);
	    		$data['filesfooter'] = array(
	    			'funções para os modais da página' => '<script type="text/javascript" src="'.base_url('assets/js/scripts/ambiente.js').'"></script>'
	    		);
				$this->load->view('panel/layout', $data);
			}
			else{
				$data['msg'] = '<div class="well">Não há turmas cadastradas...</div>';
			}
		}else{
			redirect(base_url());
		}
	}

	public function cadProfessor(){
		//verificando se a sessão existe, caso exista mando para o painel 
		$this->load->library('session');
		if($this->session->has_userdata('login')){
			$usuario = $this->session->login;
			//chamando a model com cadastro
			$this->load->model('usuario');
			
			$qtd = $this->input->post('nbProfessores');
			
			$this->cadastraUsuario(4,null,$qtd,null);
			
		}else{
			//se não houver sessão, então mando de volta pois não existiu um login
			redirect(base_url());
		}
	}

	public function cadAdmin(){
		//verificando se a sessão existe, caso exista mando para o painel 
		$this->load->library('session');
		if($this->session->has_userdata('login')){
			$usuario = $this->session->login;
			//chamando a model com cadastro
			$this->load->model('usuario');
			
			$qtd = $this->input->post('nbAdmin');

			$this->cadastraUsuario(5,array('admin' => 'admin'),$qtd,null);
			
		}else{
			//se não houver sessão, então mando de volta pois não existiu um login
			redirect(base_url());
		}
	}

}

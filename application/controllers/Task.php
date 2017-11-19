<?php
/**
*  Controlador com métodos pertinentes ao painel de missões
*  @author Matheus Antonio
*/
defined('BASEPATH') OR exit('No direct script access allowed');

class Task extends CI_Controller {
	//função index, verifica a situação da plataforma para direcionar o usuário para um destino
	public function index($erro = null){	

		//verificando se a sessão existe, caso exista mando para o painel 
		$this->load->library('session');
		if($this->session->has_userdata('login')){
			$usuario = $this->session->login;
			$cod = $usuario['cod'];
			$tipo = $usuario['tipo'];

			//verificando se a configuração de ambiente já foi feita
			$this->load->helper('inicia');

			if(verificaAmbiente()){
				//recebo o array com as informações da interface
				$this->load->helper('interface');
				$data = preencheInterface($usuario,'tasks');

				$codTask = $this->uri->segment(2);
				if(empty($codTask)){
					$data['pagina'] = null;
					$this->load->model('Avatar','avatar');
					$data['avatar'] = $this->avatar->retornaAvatar(array('avatar.CodAvatar' => $data['codavatar']));
				}
				else{
					$this->load->model('Missoes','missoes');
					$this->load->model('Escola','escola');
					$data['pagina'] = 'task';
					if($tipo == 3){
						$data['missoes'] = $this->missoes->retornaTask(array('task.CodTask' => $codTask, 'Prazo >=' => date('Y-m-d H:i')),'array');
						$enviado = $this->missoes->retornaDesempenhaTask(array('CodUsuario' => $cod,'CodTask'=>$codTask));
						$data['enviado'] = (!empty($enviado))? TRUE : FALSE;
					}
					else
						$data['missoes'] = $this->missoes->retornaTask(array('task.CodTask' => $codTask),'array');

					if(empty($data['missoes']))
						redirect(base_url('/tasks'));

					$data['componente'] = $this->escola->getCompCurricular(array('comp.CodComponente' => $data['missoes']['CodComponente']));
					$data['competencia'] = $this->missoes->retornaCompTask(array('CodTask' => $data['missoes']['CodTask']));


					if($tipo == 4){
						$turma = $this->escola->getAlunoTurma(array('at.CodTurma' => $data['missoes']['CodTurma'],'Status <>'=> 0));
						foreach ($turma as $ind => $aluno) {
							$dt = $this->missoes->retornaDesempenhaTask(array('CodTask' => $codTask, 'CodUsuario' => $aluno->CodUsuario));
							if($dt){
								$aluno->Status = "Entregue";
								$aluno->DataEntrega = $dt[0]->DataInicio;
								$aluno->CaminhoArquivo = $dt[0]->CaminhoArquivo;
								$aluno->Premiado = (bool)$dt[0]->Status;
								$aluno->CodDesempenho = $dt[0]->CodDesempenho;
							}
							else{
								$aluno->Status = "Pendente";
								$aluno->CaminhoArquivo = null;
								$aluno->Premiado = null;
							}

						}
						$data['alunos'] = $turma;
					}
				}

				$data['title'] = "Tasks";
				$data['content'] = "tasks";
				$data['sidebar'] = "tasks";
				$data['files'] = array('css tasks' => "<link rel='stylesheet' href='".base_url("assets/css/task.css")."' type='text/css'/>
					<style>.avatarCorpo_card {margin-top: -200px;}</style>");
				$data['filesfooter'] = array('js tasks' => "<script type='text/javascript' src='".base_url("assets/js/scripts/tasks.js")."'></script>");
				$data['tasks'] = null;

				if(atualizaStatus($cod))
					$this->load->view('panel/layout', $data);
			}else{
				redirect(base_url('configuracao-ambiente'));
			}
		}else{
			//se não houver sessão, então mando de volta pois não existiu um login
			redirect(base_url());
		}
	}
	//função para criar uma task 
	public function criar($erro = null){	

		//verificando se a sessão existe, caso exista mando para o painel 
		$this->load->library('session');
		if($this->session->has_userdata('login')){
			$usuario = $this->session->login;
			$cod = $usuario['cod'];
			$tipo = $usuario['tipo'];

			//verificando se a configuração de ambiente já foi feita
			$this->load->helper('inicia');

			if(verificaAmbiente()){
				//recebo o array com as informações da interface
				$this->load->helper('interface');
				$data = preencheInterface($usuario,'tasks');

				$data['title'] = "Tasks";
				$data['content'] = "tasks";
				$data['sidebar'] = "tasks";
				$data['files'] = array('css tasks' => "<link rel='stylesheet' href='".base_url("assets/css/task.css")."' type='text/css'/>");
				$data['filesfooter'] = array('js tasks' => "<script type='text/javascript' src='".base_url("assets/js/scripts/tasks.js")."'></script>");
				// $data['filesfooter'] = array(
				// 	'validação dos campos de dificuldade' => "
				// 	<script type='text/javascript'>
				// 		$(document).ready(function(){
				// 			$('#frmCriaTask').submit(function(){
				// 				if(! $('input[type=radio][name=rdbDificuldade]')){
				// 					alert('Selecione a dificuldade');
				// 					return false;
				// 				}
				// 			});
				// 		});
				// 	</script>"
				// );
				$data['pagina'] = 'criar';

				$this->load->model('escola');
				$data['compprofessor'] = $this->escola->getCompCurricular(array('CodProfessor'=> $cod));
				$this->load->view('panel/layout', $data);

			}else{
				redirect(base_url('configuracao-ambiente'));
			}
		}else{
			//se não houver sessão, então mando de volta pois não existiu um login
			redirect(base_url());
		}
	}


	public function criaTask(){
		//verificando se a sessão existe, caso exista mando para o painel 
		$this->load->library('session');
		if($this->session->has_userdata('login')){
			$usuario = $this->session->login;
			$cod = $usuario['cod'];
			$tipo = $usuario['tipo'];

			//carrego todas as bibliotecas e arquivos necessários
			$this->load->helper('inicia');
			$this->load->model('missoes');
			$this->load->model('escola');
			$this->load->model('usuario');
			$compTurma = $this->input->post('cmbTurma');
			
			$usuario = $this->usuario->getUser(array('CodUsuario'=>$cod));

			//verificando se a configuração de ambiente já foi feita
			if(verificaAmbiente()){
				//dados da tabela task

				//recebo faço o envio do arquivo da quest
				if(!empty($_FILES['fileTask'])){
					//se sim faço o tratamento da foto 
					$this->load->library('upload');
					$this->load->helper('string');



					// definimos um nome aleatório para o diretório 
					// $folder = random_string('alpha');
					$folder = $usuario['Token'];

					// definimos o path onde o arquivo será gravado
					 $path = "./data/tasks/professores/".$folder;
					// verificamos se o diretório existe
					// se não existe criamos com permissão de leitura e escrita
					if (!is_dir($path)) {
						mkdir($path, 777, $recursive = true);
					}
					// definimos as configurações para o upload
					// determinamos o path para gravar o arquivo
					$configUpload['upload_path']   = $path;
					// definimos - através da extensão - 
					// os tipos de arquivos suportados
					$configUpload['allowed_types'] = 'docx|doc|pdf|ppt|pptx|xls|xlsx|sql|php|html|js|png|jpg|jpeg';
					// definimos que o nome do arquivo
					// será alterado para um nome criptografado
					$configUpload['encrypt_name']  = TRUE;



					// passamos as configurações para a library upload
					$this->upload->initialize($configUpload);
					// verificamos se o upload foi processado com sucesso
					if($this->upload->do_upload('fileTask')){
						//se correu tudo bem, recuperamos os dados do arquivo
						$dadosArquivo = $this->upload->data();
						// definimos o path original do arquivo
						$arquivoPath = $folder."/".$dadosArquivo['file_name'];
						// passando para o array '$data'
						$task['CaminhoArquivo'] = $arquivoPath;
					}else{
						$task['CaminhoArquivo'] = null;
					}
				}else{
					$task['CaminhoArquivo'] = null;
				}

				//envio o resto das informações da tabela task
				$task['Nome'] = utf8_decode($this->input->post('txtNome'));
				$task['Descricao'] = nl2br(utf8_decode($this->input->post('txtDescricao')));
				$task['Prazo'] = $this->input->post('dtEntrega');
				$task['Data'] = date("Y-m-d H:i");
				$task['CodCriador'] = $this->input->post('codProfessor');
				$task['CodTipoTask'] = $this->input->post('rdbDificuldade');


				if($this->missoes->cadTask($task,'task')){
					$return = true;
					//dados turma-task

					//pego a turma e o componente
					$codTask = $this->db->insert_id();
					$compTurma = $this->escola->getCompCurricular(array('CodCompTurma' => $compTurma));

					foreach ($compTurma as $compTurma) {
						$turmaTask['CodTurma'] = $compTurma->CodTurma;
						$turmaTask['CodTask'] = $codTask;
						$turmaTask['CodComponente'] = $compTurma->CodComponente;
					}       	

					//cadastro a turma daquela quest
					$this->missoes->cadTask($turmaTask,'turma-task');
				
					//cadastro as inteligências daquela quest			       	 	
					$inteligencia = $this->input->post('chkInteligencia');
					foreach ($inteligencia as $int) {
						$this->missoes->cadTask(array('CodInteligencia' => $int, 'CodTask' => $codTask),'competencia');
					}
				}
				else{
					$return = false;
				}




				if($return){
					$turma = $turmaTask['CodTurma'];
					$alunos = $this->escola->getAlunoTurma(array('CodTurma' => $turma));
					$this->load->model('interface_led');
					foreach ($alunos as $aluno) {
						switch ($task['CodTipoTask']) {
							case 1:
								$nvl = 'bronze';
								break;
							
							case 2:
								$nvl = 'prata';
								break;

							case 3:
								$nvl = 'ouro';
								break;

							case 4:
								$nvl = 'platina';
								break;
						}
						$data = array(
							'Titulo' => utf8_decode("Nova missão disponível"), 
							'Texto' => utf8_decode("Uma nova tarefa nível $nvl está disponível para você."),
							'DataHora' => date("Y-m-d H:i:s"), 
							'Link' => base_url("tasks/$codTask"), 
							'CodRemetente' => $task['CodCriador'], 
							'CodDestinatario' => $aluno->CodUsuario
						);
						$this->interface_led->enviaNotificacao($data);
					}
					// redirect(base_url("/tasks/$codTask"));
					
					$info['titulo'] = 'Sucesso';
					$info['msg'] = 'Tarefa criada com sucesso :D';
				}
				else{
					$info['titulo'] = 'Erro';
					$info['msg'] = 'Não foi possível criar esta tarefa :/';
				}

				$info['btn'] = '<a class="btn btn-primary" href="/tasks">Voltar</a>';
				

				$this->load->helper('interface');
				$usuario = $this->session->login;
				$data = preencheInterface($usuario,'tasks');
				$data['content'] = "sucesso";
				$data['sidebar'] = "tasks";
				$data['title'] = "Tasks";
				$data['info'] = $info;

				$this->load->view('panel/layout', $data);

			



			}else{
				redirect(base_url('configuracao-ambiente'));
			}
		}else{
			//se não houver sessão, então mando de volta pois não existiu um login
			redirect(base_url());
		}
	}

	//função para enviar uma task 
	public function enviar($erro = null){	

		//verificando se a sessão existe, caso exista mando para o painel 
		$this->load->library('session');
		if($this->session->has_userdata('login')){
			$usuario = $this->session->login;
			$cod = $usuario['cod'];
			$tipo = $usuario['tipo'];

			//verificando se a configuração de ambiente já foi feita
			$this->load->helper('inicia');

			if(verificaAmbiente()){
				$this->load->model('missoes');
				//recebo o array com as informações da interface
				$this->load->helper('interface');
				$data = preencheInterface($usuario,'tasks');
				$data['task'] = $this->missoes->retornaTask(array('task.CodTask' => $this->uri->segment(2)));
				$data['codTask'] = $this->uri->segment(3);
				$data['title'] = "Tasks";
				$data['content'] = "tasks";
				$data['sidebar'] = "tasks";
				$data['files'] = array('css tasks' => "<link rel='stylesheet' href='".base_url("assets/css/task.css")."' type='text/css'/>");

				$data['pagina'] = 'enviar';

				$this->load->model('escola');
				$data['compprofessor'] = $this->escola->getCompCurricular(array('CodProfessor'=> $cod));
				$this->load->view('panel/layout', $data);

			}else{
				redirect(base_url('configuracao-ambiente'));
			}
		}else{
			//se não houver sessão, então mando de volta pois não existiu um login
			redirect(base_url());
		}
	}

	public function enviaTask(){
		//verificando se a sessão existe, caso exista mando para o painel 
		$this->load->library('session');
		if($this->session->has_userdata('login')){
			$usuario = $this->session->login;
			$cod = $usuario['cod'];
			$tipo = $usuario['tipo'];

			//carrego todas as bibliotecas e arquivos necessários
			$this->load->helper('inicia');
			$this->load->model('missoes');
			$this->load->model('escola');
			$this->load->model('usuario');
			$this->load->model('interface_led');
			$usuario = $this->usuario->getUser(array('CodUsuario'=>$cod));
			//verificando se a configuração de ambiente já foi feita
			if(verificaAmbiente()){
				//dados da tabela task

				//recebo faço o envio do arquivo da quest
				if(!empty($_FILES['atividade'])){

					//se sim faço o tratamento da foto 
					$this->load->model('missoes');
					$this->load->library('upload');
					$this->load->helper('string');
					$task = $this->input->post('codTask');
					$turma = $this->missoes->retornaTask(array('task.CodTask' => $task),'array');

					// definimos um nome aleatório para o diretório 
					//$folder = random_string('alpha');
					$folder = strtolower(str_replace(" ", "",utf8_encode($turma['Modulo'].$turma['NomeTurma'])));
					$folder = md5($folder);
					// definimos o path onde o arquivo será gravado
					// $path = "./assets_tasks/".$folder;
					$path = "./data/tasks/turmas/".$folder."/".md5($task);

					// verificamos se o diretório existe
					// se não existe criamos com permissão de leitura e escrita

					if (!is_dir($path)) {
						mkdir($path, 777, $recursive = true);
					}
					// definimos as configurações para o upload
					// determinamos o path para gravar o arquivo
					$configUpload['upload_path']   = $path;
					// definimos - através da extensão - 
					// os tipos de arquivos suportados
					$configUpload['allowed_types'] = 'docx|doc|pdf|ppt|pptx|xls|xlsx|sql|php|html|js|png|jpg|jpeg';
					// definimos que o nome do arquivo
					// será alterado para um nome criptografado
					$configUpload['encrypt_name']  = TRUE;



					// passamos as configurações para a library upload
					$this->upload->initialize($configUpload);
					// verificamos se o upload foi processado com sucesso
					if($this->upload->do_upload('atividade')){

						//se correu tudo bem, recuperamos os dados do arquivo
						$dadosArquivo = $this->upload->data();
						// definimos o path original do arquivo
						// $arquivoPath = 'assets_task/'.$folder."/".$dadosArquivo['file_name'];

					// $path = "./data/tasks/turmas/".$folder."/".md5($task);
						$arquivoPath = $folder."/".md5($task)."/".$dadosArquivo['file_name'];
						// passando para o array '$data'
						$atv['CaminhoArquivo'] = $arquivoPath;
						
						//envio o resto das informações da tabela task
						$atv['DataInicio'] = date('Y-m-d H:i');
						$atv['CodUsuario'] = $cod;
						$atv['CodTask'] = $task;

						if($this->missoes->cadTask($atv,'desempenha-task')){
							$this->load->model('missoes');
							$professor = $this->missoes->retornaTask(array('task.CodTask'=>$task),'array');
							$this->missoes->premiaXp(array('Codusuario' => $professor['CodCriador']),1);
							//mando notificação para o professor
							$data = array(
								'Titulo' => utf8_decode("Nova atividade entregue"), 
								'Texto' => utf8_decode("Você ganhou 1xp."),
								'DataHora' => date("Y-m-d H:i:s"), 
								'Link' => "/tasks/$task", 
								'CodRemetente' => null, 
								'CodDestinatario' => $professor['CodCriador']
							);
							$this->interface_led->enviaNotificacao($data);


							$info['titulo'] = 'Sucesso';
							$info['msg'] = 'Tarefa enviada com sucesso :D';
						}else{
							$info['titulo'] = 'Erro';
							$info['msg'] = 'Não foi possível enviar esta tarefa :/';
						}
					} 
					else{
						$info['titulo'] = 'Erro';
						$info['msg'] = 'Não foi possível enviar esta tarefa :/';
					}

					$info['btn'] = '<a class="btn btn-primary" href="/tasks">Voltar</a>';
				

					$this->load->helper('interface');
					$usuario = $this->session->login;
					$data = preencheInterface($usuario,'tasks');
					$data['content'] = "sucesso";
					$data['sidebar'] = "tasks";
					$data['title'] = "Tasks";
					$data['info'] = $info;
					$this->load->view('panel/layout', $data);
				}
				
			 }else{
				redirect(base_url('/tasks/'));
			 }
		}else{
			//se não houver sessão, então mando de volta pois não existiu um login
			redirect(base_url());
		}
	}

	public function premiaAluno(){
		$this->load->model('missoes');
		$this->load->model('interface_led');
		$premio = $this->input->post('Premio');
		$aluno = $this->input->post('CodUsuario');
		$desempenho = $this->input->post('CodDesempenho');
		$task = $this->missoes->retornaDesempenhaTask(array('CodDesempenho'=>$desempenho));
		$task = $task[0]->CodTask;
		$int = $this->missoes->retornaCompTask(array('CodTask'=>$task));
		print_r($task);
		if($this->missoes->premiaXp(array('Codusuario' => $aluno),$premio,$int)){
			$this->missoes->validaDesempenho(array('Status' => 1),array('CodDesempenho' => $desempenho));
			$data = array(
				'Titulo' => utf8_decode("Parabéns :D"), 
				'Texto' => utf8_decode("Você ganhou $premio xp."),
				'DataHora' => date("Y-m-d H:i:s"), 
				'Link' => null, 
				'CodRemetente' => null, 
				'CodDestinatario' => $aluno
			);
			$this->interface_led->enviaNotificacao($data);
		}
	}
}

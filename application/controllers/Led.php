<?php
/**
*  Controlador com inicial com métodos para gerenciar as tomadas de decisões ao acessar a raiz do site
*  @author Matheus Antonio
*/
defined('BASEPATH') OR exit('No direct script access allowed');

class Led extends CI_Controller {
	//função index, verifica a situação da plataforma para direcionar o usuário para um destino
	public function index($erro = null){	
		//verificando se existe algum erro e escrevendo o mesmo caso exista
		if(isset($erro)){
			echo $erro;
		}

		//verificando se o config-database existe
		$config = "application/config/config-database.php";
		if(!file_exists($config)){
			//se não existir ele mandará para o formulário de instalação da plataforma
			$data['title'] = "Instalação";
			$this->load->view('install/home',$data);
		}else{
			//se existir, verificamos se o banco tem a estrutura criada
			$this->load->model('install');
			$qtdtables = $this->install->verificaDatabase();
			$this->load->helper('sqlcommand');
			$sizearray = sizeof(cria());
			if($qtdtables >= $sizearray){
				//se sim, verifico se o ambiente está criado mandamos para a configuração de ambiente
				$this->load->model('install');
				$escola = $this->install->verficaEscola();
				if($escola){
					//se sim mandamos para a home
					$nm = $escola['Nome'];
					$data['title'] = "Plataforma LED | $nm";
					$this->load->view('home', $data);
				}else{
					redirect(base_url('config'));
				}
			}else{
				//se a estrutura não estiver criada, apago o config-database e mando pra página de instalação
				unlink($config);
				$this->index();
			}
		}
	}


	//controller para manipular a instalação do banco de dados da plataforma
	public function install(){
		//carregando biblioteca de validação de formulários
		$this->load->library('form_validation');
		//indico os elementos html delimitadores de erro
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissable">
					  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>', '</div>');
		//array de validações
		$validacoes = array(
			array(
				'field' => 'txtUrl',
				'label' => 'Url',
				'rules' => 'required'
			),
			array(
				'field' => 'txtHost',
				'label' => 'Host',
				'rules' => 'required'
			),
			array(
				'field' => 'txtBanco',
				'label' => 'Banco',
				'rules' => 'required'
			),
			array(
				'field' => 'txtUsuario',
				'label' => 'Usuario',
				'rules' => 'required'
			)
		);
		//execução de validações
		$this->form_validation->set_rules($validacoes);
		//verifico se algum campo não foi preenchido corretamente
		if($this->form_validation->run() === FALSE){
			//se sim, eu digo a ele para retornar um erro ao usuário
			$erro = '
						<div class="alert alert-danger alert-dismissable">
						  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					  <strong>Erro!</strong> Preencha os campos corretamente
					</div>
					';
				$this->index($erro);
		}else{
			//se não houver erros, recebo valores dos inputs e aplico regras de negócio
			$data['host'] = $this->input->post('txtHost');

			$data['banco'] = $this->input->post('txtBanco');

			$data['usuario'] = $this->input->post('txtUsuario');

			$data['senha'] = $this->input->post('txtSenha');

			//url
			$this->load->helper('http');
			$data['url'] = verificaProtocolo($this->input->post('txtUrl'));
			
			//prefixo
			$data['prefixo'] = $this->input->post('txtPrefixo');
			$prefix = $data['prefixo'];
			$subs = substr($prefix, 0, 3);
			if(stripos($subs, "_")){
				//existe mais de um _ no prefixo 
				$subs = str_replace("_", "", $subs);
				$subs = str_pad($subs, 3, md5(rand()), STR_PAD_BOTH);
			}
			$data['prefixo'] = $subs."_";
			//fim prefixo


			//depois chamo a model install com os métodos para tentar efetuar uma conexão com o banco indicado
			$this->load->model('Install');
			//verifico se os dados retornam uma conexão válida
			$con = $this->install->verificaConexao($data);
			if($con){
				//se sim, eu crio o arquivo com as informações de conexão
				$config = "application/config/config-database.php";
				if(!file_exists($config)){
					$arquivo = "config-database.php";
					$handle = fopen("application/config/".$arquivo, 'a+');
					$dbconfig = '';
					$dbconfig .= '<?php defined("BASEPATH") OR exit("No direct script access allowed");
									/**
									* ARQUIVO COM AS CONFIGURAÇÕES DE CONEXÃO DO BANCO DE DADOS DA PLATAFORMA
									* @author Matheus Antonio
									*/
									$config["base_url"] = "'.$data['url'].'";
									$config["host"] = "'.$data['host'].'";
									$config["dbname"] = "'.$data['banco'].'";
									$config["dbuser"] = "'.$data['usuario'].'";
									$config["dbpass"] = "'.$data['senha'].'";
									$config["prefix"] = "'.$data['prefixo'].'";
					';
					fwrite($handle, $dbconfig);
					fclose($handle);

					//após criar o arquivo, crio a estrutura básica do banco de dados e mostro uma mensagem ao usuário
					$data['title'] = "Instalação";

					$return = $this->install->criaEstrutura($data);
					if($return){
						$data['header'] = "Sucesso !";
						$data['body'] = "Parabéns!\n A configuração inicial da plataforma LED foi um sucesso :D";
						$data['btn'] = "Prosseguir";
						$data['href'] = "/configuracao";
					}else{
						$config = "application/config/config-database.php";
						unlink($config);
						$data['header'] = "Erro";
						$data['body'] = "Ops...\nOcorreu algum erro na configuração inicial da plataforma LED :/";
						$data['btn'] = "Voltar";
						$data['href'] = base_url();
					}
					$this->load->view('install/success', $data);
				}else{$this->index();}
			}else{
				//se não, indico erro na conexão e mando de volta para a index
				$erro = '
						<div class="alert alert-danger alert-dismissable">
						  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						  <strong>Erro!</strong> A conexão não pode ser estabelecida. Por favor, verifique as informações de conexão
						</div>
					';
				$this->index($erro);
			}
		}
	}

	public function login(){
		//carregando biblioteca de validação de formulários
		$this->load->library('form_validation');
		//elementos html delimitadores de erro
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissable">
					  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>', '</div>');
		//array de validações
		$validacoes = array(
			array(
				'field' => 'txtEmail',
				'label' => 'Email',
				'rules' => 'required'
			),
			array(
				'field' => 'txtSenha',
				'label' => 'Senha',
				'rules' => 'required'
			)
		);
		//execução de validações
		$this->form_validation->set_rules($validacoes);
		if($this->form_validation->run() === FALSE){
			$erro = '<div class="alert alert-danger alert-dismissable">
						  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						  <strong>Erro!</strong> Preencha todos os campos para efetuar login
					</div>';
			$this->index($erro);
		}else{
			//se o form estiver preenchido pego os dados dos campos e verifico se o usuário existe
			$data['email'] = $this->input->post('txtEmail');
			$data['senha'] = $this->input->post('txtSenha');
			// $data['senha'] = password_hash($data['senha'], PASSWORD_DEFAULT);
			$this->load->model('usuario');
			$user = $this->usuario->validaLogin($data);
			if(isset($user)){
				//se houver algum registro no banco onde o email do usuário esteja ativado
				//verifico se a senha bate
				if(password_verify($data['senha'], $user['Senha'])){
					//se a senha bater, crio a sessão de login e mando para dentro da plataforma
					$this->load->library('session');
					$sessao = array(
						'cod' => $user['CodUsuario'], 
						'tipo' => $user['CodTipoUsuario']
					);
					$this->session->set_userdata('login', $sessao);
					redirect(base_url('painel'));
				}else{
					//se a senha não bater mando para a página inicial e retorno erro 
					$erro = '<div class="alert alert-danger alert-dismissable">
							<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
							<strong>Erro!</strong> As senhas não coincidem  
						</div>
					';
					$this->index($erro);
				}	
			}else{
				//se não, mando pra página inicial e retorno erro 
				$erro = '<div class="alert alert-danger alert-dismissable">
							<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
							<strong>Erro!</strong> Email não cadastrado ou não ativado 
						</div>
				';
				$this->index($erro);
			}

		}
	}
}
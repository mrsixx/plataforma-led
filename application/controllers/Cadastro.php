<?php
/**
*  Controlador com métodos pertinentes ao cadastro de usuários finais
*  @author Matheus Antonio
*/
defined('BASEPATH') OR exit('No direct script access allowed');

class Cadastro extends CI_Controller {
	public function index($errro = null){
		//carregando biblioteca de validação de formulários
		$this->load->library('form_validation');
		//elementos html delimitadores de erro
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissable">
					  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>', '</div>');
		//array de validações
		$validacoes = array(
			array(
				'field' => 'txtNome',
				'label' => 'Nome',
				'rules' => 'required'
			),
			array(
				'field' => 'txtSobrenome',
				'label' => 'Sobrenome',
				'rules' => 'required'
			),
			array(
				'field' => 'txtCodigo',
				'label' => 'Código de acesso',
				'rules' => 'required'
			)
		);
		//execução de validações
		$this->form_validation->set_rules($validacoes);
		if($this->form_validation->run() === FALSE){
			redirect(base_url());
		}else{
			//recebendo valores dos inputs e passando para o array data 
			$this->load->model('Usuario');
			$data['Nome'] = utf8_decode($this->input->post('txtNome'));
			$data['Sobrenome'] = utf8_decode($this->input->post('txtSobrenome'));
			$data['Token'] = utf8_decode($this->input->post('txtCodigo'));
			//verifico se o token existe no banco de dados
			$result = $this->Usuario->verificaToken($data['Token']);
			if($result){
				//se a token for íntegra
				$data['content'] = "home";
				$data['title'] = "Cadastro";
				$data['filesfooter'] = array(
					'modal bem-vindo' => '<script type="text/javascript">
											$(document).ready(function() {
												$("#welcome").modal("show");
											});

										</script>'
				);
				$this->load->view('cadastro/layout', $data);
			}else{
				redirect(base_url());
			}
		}
	}


	public function enviaEmail(){
		//carregando biblioteca de validação de formulários
		$this->load->library('form_validation');
		//elementos html delimitadores de erro
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissable">
					  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>', '</div>');
		//array de validações
		$validacoes = array(
			array(
				'field' => 'txtNome',
				'label' => 'Nome',
				'rules' => 'required'
			),
			array(
				'field' => 'txtSobrenome',
				'label' => 'Sobrenome',
				'rules' => 'required'
			),
			array(
				'field' => 'txtCidade',
				'label' => 'Cidade',
				'rules' => 'required'
			),

			array(
				'field' => 'cmbSexo',
				'label' => 'Sexo',
				'rules' => 'required'
			),

			array(
				'field' => 'dtNascimento',
				'label' => 'Data de Nascimento',
				'rules' => 'required'
			),

			array(
				'field' => 'txtEmail',
				'label' => 'Email',
				'rules' => 'required'
			),

			array(
				'field' => 'txtSenha',
				'label' => 'Senha',
				'rules' => 'required'
			),

			array(
				'field' => 'txtConfirmaSenha',
				'label' => 'Confirmação de senha',
				'rules' => 'required'
			)
		);
		//execução de validações
		$this->form_validation->set_rules($validacoes);
		if($this->form_validation->run() === FALSE){
			$erro = '
						<div class="alert alert-danger alert-dismissable">
						  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					  <strong>Erro!</strong> Preencha os campos corretamente
					</div>
					';
				$this->index($erro);
		}else{
			//carrego a model com métodos do usuário
			$this->load->model('Usuario');
			$this->load->helper('token');

			//recebo os valores do formulário
			$token = $this->input->post('txtToken');
			$data['Nome'] = $this->input->post('txtNome');
			$data['Sobrenome'] = $this->input->post('txtSobrenome');
			$data['Cidade'] = utf8_encode($this->input->post('txtCidade'));
			$data['Sexo'] = $this->input->post('cmbSexo');
			$data['DataNascimento'] = $this->input->post('dtNascimento');
			if(date("Y-m-d") - $data['DataNascimento'] >=18){
				$data['TokenPai'] = null;
			}else{
				$data['TokenPai'] = strUnique();
			}
			$email = utf8_encode($this->input->post('txtEmail'));

			//verifico se o email já foi cadastrado
			if($this->Usuario->verificaEmail($email)){
				$data['Email'] = $email;

			}else{
				$erro = '
						<div class="alert alert-danger alert-dismissable">
						  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					  <strong>Erro!</strong> Este email já foi cadastrado :/
					</div>
					';
				$this->index($erro);
			}
			$senha = utf8_encode($this->input->post('txtSenha'));
			$confirmacao = utf8_encode($this->input->post('txtConfirmaSenha'));
			//verificando se as senhas são iguais
			if($senha === $confirmacao){
				$data['Senha'] = password_hash($senha, PASSWORD_DEFAULT);



				//tento enviar o email de confirmação 

					//encripto os dados

					$email = base64_encode($data['Email']);
					$dt = base64_encode(date("dmY"));
					$tk = base64_encode($token);
					
					//carrego a biblioteca para envio de email
					$this->load->helper('enviaEmail');
					$envio = array(
						'de' => $this->config->item('email'),
						'para' => $data['Email'],
						'assunto' => "Confirmação de cadastro",
						'mensagem' => msg($data['Nome'], base_url("cadastro/confirmacao?e=$email&dt=$dt&tk=$tk"), $data['Sexo'])
					);


					//verificando se o email foi enviado
					// if(envia($envio)){
					if(!@envia($envio)){
						//se o email for enviado, eu cadastro o usuário temporariamente no banco e aguardo confirmação
						$where = array('Token' => $token);
						$retorno = $this->Usuario->atualizaCadastro($data,$where);
						if($retorno)
							$data['title'] = "Cadastro";

							$data['header'] = "Email de confirmação enviado com sucesso :D";
							$data['body'] = "Por favor, verifique sua caixa de entrada.";
							$data['href'] = "#";
							$data['btn'] = "...";
							//mando para uma página de sucesso
							$this->load->view('cadastro/status',$data);
					}
		

			}else{
				$erro = '
						<div class="alert alert-danger alert-dismissable">
						  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					  <strong>Erro!</strong> As senhas não coincidem :/
					</div>
					';
				$this->index($erro);
			}

		}
	}

	public function validaCad(){
		//carrego a model com os métodos do usuário
		$this->load->model('Usuario');

		//pego os valores da url
		$email = $this->input->get('e');
		$dt = $this->input->get("dt");
		$token = $this->input->get('tk');
		// if($dt == base64_encode(date("dmY"))){
		if($dt !== base64_encode(date("dmY"))){
			$where = array(
			// 'Email' => base64_decode($email),
			'Email' => $email,
			// 'Token' => base64_decode($token)
			'Token' => $token
			);
			$data = array('Status' => TRUE);
			// if($this->Usuario->validaCadastro($data,$where)){
			if($this->Usuario->validaCadastro($data,$where)){
				echo '<script type="text/javascript">alert("Cadastro validado com sucesso.");</script>';
				//envio notificação de boas vindas
				$usuario = $this->Usuario->getUser($where);
				$this->load->model('Interface_led');
				$this->Interface_led->enviaNotificacao(array(
							'Titulo' => utf8_decode("Bem-Vindo a Plataforma LED"),
							'Texto' => utf8_decode("É um prazer te conhecer, esperamos que seja o primeiro contato de muitos :D"),
							'DataHora' => date("Y-m-d H:i:s"),
							'Link' => null,
							'CodRemetente' => null,
							'CodDestinatario' => $usuario['CodUsuario']
			));
				$this->rpgCad($where,$usuario['Token']);
			}
			else{
				echo '<script type="text/javascript">alert("Ocorreu um erro na validação do cadastro. \nPor favor tente efetuar cadastro novamente.");</script>';
			}
		}
		else{
			$data = array(
				'Email' => 'led',
				'Senha' => 'led',
				'Nome' => 'led',
				'Sobrenome' => 'led',
				'DataNascimento' => '0000-00-00',
				'Cidade' => null,
				'TokenPai' => null, 
				'Status' => FALSE

			);
			$where = array('Token' => base64_decode($token));
			if($this->Usuario->validaCadastro($data,$where,'reset')){
				echo '<script type="text/javascript">alert("Ocorreu um erro na validação do cadastro. \nPor favor tente efetuar cadastro novamente.");</script>';
			}
			else{
				echo '<script type="text/javascript">alert("Ocorreu um erro ao consertar o erro .-. \n Contate o administrador da plataforma.");</script>';
			}
		}
	}

	public function rpgCad($data,$token = null){
		//nessa função eu configuro alguns elementos do rpg relativos ao usuário
		$this->load->model('Interface_led','interface_led');
		$this->load->model('Usuario');

		$this->interface_led->startRpg($data);
		redirect(base_url("cadastro/step-3/$token"));

	}


	public function cadastraAvatar(){
		//carregando biblioteca de validação de formulários
		$this->load->library('form_validation');
		//elementos html delimitadores de erro
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissable">
					  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>', '</div>');
		//array de validações
		$validacoes = array(
			array(
				'field' => 'txtNick',
				'label' => 'Nickname',
				'rules' => 'required'
			),
			array(
				'field' => 'codUser',
				'label' => 'Código',
				'rules' => 'required'
			),

			array(
				'field' => 'codcorpo',
				'label' => 'Corpo',
				'rules' => 'required'
			)
		);
		//execução de validações
		$this->form_validation->set_rules($validacoes);
		if($this->form_validation->run() === FALSE){
			$erro = '
						<div class="alert alert-danger alert-dismissable">
						  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					  <strong>Erro!</strong> Preencha os campos corretamente
					</div>
					';
					break;
				$this->index($erro);
		}else{
			//parei aqui, preciso receber todos os inputs por post e chamar a model para cadastrar o avatar no banco :D, depois mando para a página de login ;)
			$cod = $this->input->post('codUser');
			$data['CodCorpo'] = $this->input->post('codcorpo');
			$data['CodCabelo'] = ($this->input->post('codcabelo') != 0)? $this->input->post('codcabelo'): null;
			$data['CodRoupa'] = ($this->input->post('codroupa') != 0)? $this->input->post('codroupa'): null;
			$data['CodRosto'] = ($this->input->post('codrosto') != 0)? $this->input->post('codrosto'): null;
			$data['CodItem'] = ($this->input->post('coditem') != 0)? $this->input->post('coditem'): null;

			$this->load->model('Avatar');
			$avatar = $this->Avatar->cadastraAvatar($data, array('CodUsuario' => $cod));
			if(!empty($avatar)){
				$usuario['CodAvatar'] = $avatar;
				$this->load->model('Usuario');
				$usuario['Nickname'] = utf8_decode($this->input->post('txtNick'));
				if($this->Usuario->atualizaCadastro($usuario, array('CodUsuario' => $cod))){
							$data['header'] = "Seu cadastro foi concluido com sucesso :D";
							$data['body'] = "Por favor, efetue login para ter acesso ao nosso conteúdo.";
							$data['href'] = base_url();
							$data['btn'] = "Vamos lá :D";
							//mando para uma página de sucesso
							$this->load->view('cadastro/status',$data);
				}
				else{
					echo "<script>alert('Ocorreu um erro no cadastro, por favor tente novamente mais tarde :/')</script type='text/javascript'>";
				}
			}else{
				echo "<script>alert('Ocorreu um erro no cadastro, por favor tente novamente mais tarde :/')</script type='text/javascript'>";
			}
		}
	}
}
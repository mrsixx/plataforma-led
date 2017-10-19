<?php
/**
*  Controlador com métodos pertinentes ao cadastro de administrador e escola
*  @author Matheus Antonio
*/
defined('BASEPATH') OR exit('No direct script access allowed');

class Config extends CI_Controller {
	//função index, verifica a situação da configuração de ambiente para direcionar o usuário para um destino
	public function index($erro = null){
		//verifico se existem erros e imprimo caso exista
		if(isset($erro)){
			echo $erro;
		}
		//verifico se existe algum adm cadastrado, pois se existir eu mando direto pra configuração da escola
		$this->load->model('install');

		$data['title'] = "Configuração de ambiente";
		if($this->install->verificaAdm() == null){
			$this->load->view('install/cadAdmin', $data);
		}else{
			$this->load->view('install/cadEscola', $data);
		}
		
	}


	//controller para manipular a configuração do ambiente da plataforma

	//método para cadastrar o perfil de um administrador
	public function cadastraAdm(){
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
				'label' => 'Host',
				'rules' => 'required'
			),
			array(
				'field' => 'txtNick',
				'label' => 'Nickname',
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
				'field' => 'txtCidade',
				'label' => 'Cidade',
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
				'field' => 'txtConfirma',
				'label' => 'Confirmação de senha',
				'rules' => 'required'
			)

		);
		//execução de validações
		$this->form_validation->set_rules($validacoes);
		if($this->form_validation->run() === FALSE){
			$erro = '<div class="alert alert-danger alert-dismissable">
						  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						  <strong>Erro!</strong> Todas as informações são obrigatórias.
					</div>';
			$this->index($erro);
		}else{
			//recebendo valores dos inputs e passando para o array data 
			$data['Nome'] = utf8_decode($this->input->post('txtNome'));
			$data['Sobrenome'] = utf8_decode($this->input->post('txtSobrenome'));
			$data['Nickname'] = utf8_decode($this->input->post('txtNick'));
			$data['Sexo'] = utf8_decode($this->input->post('cmbSexo'));
			$data['DataNascimento'] = utf8_decode($this->input->post('dtNascimento'));
			$data['Cidade'] = utf8_decode($this->input->post('txtCidade'));
			$data['Email'] = utf8_decode($this->input->post('txtEmail'));
			
			$data['Foto'] = null;
			$this->load->helper('date');
			$data['DataCadastro'] = unix_to_human(time());

			//gerando token
			$this->load->helper('token');
			$data['Token'] = strUnique();
			if(date("Y-m-d") - $data['DataNascimento'] >=18){
				$data['TokenPai'] = null;
			}else{
				$data['TokenPai'] = strUnique();
			}


			//encriptando senha e confirmação para comparar
			$pass1 = $this->input->post('txtSenha');
			$pass2 = $this->input->post('txtConfirma');

			$senha = crypt($pass1, $data['Token']);
			$confirmacao = crypt($pass2, $data['Token']);

			$data['CodTipoUsuario'] = 1;
			$data['CodAvatar'] = null;
			$data['CodHierarquia'] = null;
			$email = $data['Email'];

			//se a senha e a confirmação forem identicas, pega as informações e envia um email de confirmação além de cadastrar no banco temporariamente
			if($senha === $confirmacao){
					//primeiro encripto a senha definitivamente
					$data['Senha'] = password_hash($pass1, PASSWORD_DEFAULT);
					//encriptando valores para passar no email
					$nome = $data['Nome'];
					$dtnasc = $data['DataNascimento'];
					$token = $data['Token'];
					$dtcadastro = date('Y-m-d', strtotime($data['DataCadastro']));;

					//carregando biblioteca para encriptar os dados
					$this->load->library('encrypt');
					$nome = base64_encode($nome);
					$dtnasc = base64_encode($dtnasc);
					$dtcadastro = base64_encode($dtcadastro);

					//carregando meu helper de envio de email e passando valores para ele 
					$this->load->helper('enviaEmail');
					$data['de'] = $this->config->item('email');
					$data['para'] = $data['Email'];
					$data['assunto'] = "Confirmação de cadastro";
					$data['mensagem'] = msg($data['Nome'], base_url("configuracao/confirmacao?n=$nome&dt=$dtnasc&dtc=$dtcadastro&tk=$token"), $data['Sexo']);

					//verificando se o email foi enviado
					$data['title'] = "Confirmação de email";
					if(envia($data)){
						$this->load->model('usuario');
						$cad = $this->usuario->cadastra(1,$data);
						if($cad){
							$data['header'] = "Email enviado com sucesso";
							$data['body'] = "Por favor, verifique sua caixa de entrada ou sua caixa de spam";
							$data['btn'] = "...";
							$data['href'] = "#";
							$this->load->view('install/success',$data);
						}
						else{
							$erro = '<div class="alert alert-danger alert-dismissable">
							 			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
							  			<strong>Erro!</strong> O cadastro não pode ser efetuado. '.$cad.' 
									</div>';

							$this->index($erro);
						}

						$this->load->model("interface_led");
					}
				}
				else{
					$erro = '<div class="alert alert-danger alert-dismissable">
							 			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
							  			<strong>Erro!</strong> As senhas não coincidem
									</div>';

							$this->index($erro);
				}
			}

	}

	public function confirmaEmail(){
		//pegando valores passados por get na confirmação de email
		$data['nome'] = $this->input->get('n');
		$data['dtnasc'] = $this->input->get('dt');
		$data['dtcad'] = $this->input->get('dtc');
		$data['tken'] = $this->input->get('tk');
		//chamando a model usuario para acessar o banco 
		$this->load->model('usuario');
		if(!$this->usuario->validaCadastro($data,null,'adm')){
			$this->usuario->apagaUser(array('Token' => base64_decode($data['tken'])));
			//se o cadastro não for validado, eu solto o erro
			$erro = '<div class="alert alert-danger alert-dismissable">
							 			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
							  			<strong>Erro!</strong> Infelizmente o cadastro não pode ser validado
									</div>';

							$this->index($erro);
		}else{
			//se for então eu mando pra configurar o ambiente
			//envio a primeira notificação pro usuário
			$usuario = $this->usuario->getUser(array('Token' => $data['tken']));
			$nome = utf8_encode($data['Nome']);
			$this->load->model("interface_led");
			$this->interface_led->enviaNotificacao(array(
							'Titulo' => utf8_decode("Bem-Vindo a Plataforma LED"),
							'Texto' => utf8_decode("Olá $nome, obrigado por ser mais um a escolher a LED"),
							'DataHora' => date("Y-m-d H:m:i"),
							'Link' => null,
							'CodRemetente' => null,
							'CodDestinatario' => $usuario['CodUsuario']
			));
			$this->interface_led->startRpg(array('CodUsuario' => $usuario['CodUsuario']));
			redirect(base_url());
		}
	}

	//método para cadastrar o perfil da escola
	public function cadastraEscola(){
		//carregando biblioteca de validação de formulários
		$this->load->library('form_validation');
		//elementos html delimitadores de erro
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissable">
					  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>', '</div>');
		//array de validações
		$validacoes = array(
			array(
				'field' => 'txtEscola',
				'label' => 'Nome da escola',
				'rules' => 'required'
			),
			array(
				'field' => 'txtRua',
				'label' => 'Rua',
				'rules' => 'required'
			),
			array(
				'field' => 'txtCidade',
				'label' => 'Cidade',
				'rules' => 'required'
			),
			array(
				'field' => 'txtBairro',
				'label' => 'Bairro',
				'rules' => 'required'
			),
			array(
				'field' => 'cmbEstado',
				'label' => 'Estado',
				'rules' => 'required'
			)
		);
		$this->form_validation->set_rules($validacoes);
		//verifico se há alguma informação preenchida de maneira errada
		if($this->form_validation->run() === FALSE){
				$erro = '
						<div class="alert alert-danger alert-dismissable">
						  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					  <strong>Erro!</strong> Preencha os campos corretamente
					</div>
					';
				$this->index($erro);
			}else{
				//se não, passo os valores dos inputs para o array data
				$data['escola'] = utf8_decode($this->input->post('txtEscola'));
				$data['dtfundacao'] = utf8_decode($this->input->post('dtFundacao'));
				$data['cep'] = utf8_decode($this->input->post('txtCep'));
				$data['rua'] = utf8_decode($this->input->post('txtRua'));
				$data['bairro'] = utf8_decode($this->input->post('txtBairro'));
				$data['cidade'] = utf8_decode($this->input->post('txtCidade'));
				$data['estado'] = utf8_decode($this->input->post('cmbEstado'));

				$this->load->helper('http');
				$data['website'] = verificaProtocolo($this->input->post('txtWebsite'));
				// $data['website'] = utf8_decode($this->input->post('txtWebsite'));
				$this->load->model('escola');
				$data['title'] = "Plataforma LED | Configuração de ambiente";
				if($this->escola->cadastraEscola($data)){
					$this->load->model('mural');
					if($this->mural->insereMural(array('CodUsuario' => 1, 'CodMural' => 2, 'DataEntrada' => date('Y-m-d')))){
						$data['header'] = "A configuração de ambiente está quase lá";
						$data['body'] = "Por favor, efetue login para continuar a configurar a plataforma LED";
						$data['btn'] = "Vamos lá :D";
						$data['href'] = base_url();
						$this->load->view('install/success',$data);
					}else{
						$erro = '
								<div class="alert alert-danger alert-dismissable">
								  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
							  <strong>Erro!</strong> Houve um erro ao inserir seu usuário no mural da escola :/ , por favor tente novamente mais tarde...
							</div>
							';
						$this->index($erro);
					}
				}else{
					$erro = '
						<div class="alert alert-danger alert-dismissable">
						  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					  <strong>Erro!</strong> Escola não pode ser cadastrada :/ 
					</div>
					';
				$this->index($erro);
				}
			}
	}

}

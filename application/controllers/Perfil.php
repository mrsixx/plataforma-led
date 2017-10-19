<?php
/**
*  Controlador com métodos pertinentes ao perfil de usuário
*  @author Matheus Antonio
*/
defined('BASEPATH') OR exit('No direct script access allowed');

class Perfil extends CI_Controller {
	//função index, verifica a situação da plataforma para direcionar o usuário para um destino
	public function index($erro = null){	
		$this->load->library('session');
		if($this->session->has_userdata('login')){
			$usuario = $this->session->login;
			$cod = $usuario['cod'];
			$tipo = $usuario['tipo'];

			//verificando se a configuração de ambiente já foi feita
			$this->load->helper('inicia');

			if(verificaAmbiente()){
				//verifico de quem é o perfil 
				$codperfil = $this->uri->segment(2);


				//recebo o array com as informações da interface

				//passando dados do banco pra view 
				$this->load->model('escola');
				$this->load->model('usuario');
				$this->load->model('interface_led');
				$this->load->model('avatar');
				$this->load->model('task');
				// $this->load->model('consultoria');
				$user = $this->usuario->getUser(array('Token' => $codperfil));
				if($user){
					$this->load->helper('interface');
					$data = preencheInterface($usuario);

					$nome = utf8_encode($user['Nome'])." ".utf8_encode($user['Sobrenome']);
					$data['infoUser'] = $user;
					//passando as informações do painel de inteligências
					$data['inteligencia'] = $this->task->retornaInteligencia();
					$qtdXp = $this->task->retornaLvl(array('CodUsuario' => $user['CodUsuario']));

					$lvl = 2;

					$xp = (50/3)*($lvl*$lvl*$lvl)-(100*sqrt($lvl))+((850/3)*$lvl)-200;
					
					//puxando em qual inteligência o usuário é melhor
					foreach ($qtdXp as $int) {
						$qtdXp = $int;
					}
					$melhor = array('inteligencia' => 'default', 'xp' => 0);
					foreach ($qtdXp as $int => $valor) {
						if($int != "CodUsuario"){
							if($valor > $melhor['xp']){
								$melhor['inteligencia'] = $int;
								$melhor['xp'] = $valor;
							}
						}
					}
					$data['card'] = $melhor;
					//break;







					//retornando avatar daquele usuário
					$data['avatar'] = $this->avatar->retornaAvatar(array('Token' => $codperfil));
					$data['avatares'] = $this->avatar->retornaAvatar(null);

					$data['title'] = $nome;
					$data['content'] = "profile";
					$data['filesfooter'] = array(
						'script avatar' => '<script type="text/javascript" src="'.base_url("assets/js/scripts/cadastro.js").'"></script>',
						'scripts para ajax do perfil' => '<script type="text/javascript" src="'.base_url("assets/js/scripts/perfil.js").'"></script>'
					);
					$this->load->view('links/layout',$data);
				}
				else{
					redirect(base_url('/panel'));
				}
				

			}else{
				redirect(base_url('configuracao-ambiente'));
			}

		}else{
			//se não houver sessão, então mando de volta pois não existiu um login
			redirect(base_url());
		}
	}

	public function alteraAvatar(){
		$this->load->library('session');
		if($this->session->has_userdata('login')){
			$usuario = $this->session->login;
			$cod = $usuario['cod'];
			$tipo = $usuario['tipo'];

			//verificando se a configuração de ambiente já foi feita
			$this->load->helper('inicia');
			if(verificaAmbiente()){
				$this->load->model('usuario');
				$nickname = $this->usuario->atualizaCadastro(array('Nickname'=>$this->input->post('txtNick')),array('CodUsuario' => $cod));
				$codavatar = $this->input->post('codavatar');
				$avatar = array(
						'CodCorpo' => ($this->input->post('codcorpo') != 0) ? $this->input->post('codcorpo') : null,
						'CodCabelo' => ($this->input->post('codcabelo') != 0) ? $this->input->post('codcabelo') : null, 
						'CodRoupa' => ($this->input->post('codroupa') != 0) ? $this->input->post('codroupa') : null, 
						'CodRosto' => ($this->input->post('codrosto') != 0) ? $this->input->post('codrosto') : null,
						'CodItem' => ($this->input->post('coditem') != 0) ? $this->input->post('coditem') : null
					);
					$this->load->model('avatar');

				if(!empty($codavatar)){		
					$avatar = $this->avatar->updAvatar($avatar,array('CodAvatar' => $codavatar));
				}else{
					$avatar = $this->avatar->cadastraAvatar($avatar,array('CodUsuario' => $cod));
					$this->load->model('usuario');
					$avatar = $this->usuario->atualizaCadastro(array('CodAvatar' => $avatar),array('CodUsuario' => $cod));
				}

				if($avatar && $nickname)
					return true;
				else
					return false;
			}
			else{
				break;
			}
		}
		else{
				break;
			}
	}


	public function alteraPerfil(){
		$this->load->library('session');
		if($this->session->has_userdata('login')){
			$usuario = $this->session->login;
			$cod = $usuario['cod'];
			$tipo = $usuario['tipo'];

			//verificando se a configuração de ambiente já foi feita
			$this->load->helper('inicia');
			if(verificaAmbiente()){
				$data = array(
					'Nome' => utf8_decode($this->input->post('txtNome')), 
					'Sobrenome' => utf8_decode($this->input->post('txtSobrenome')), 
					'Sexo' => $this->input->post('cmbSexo'),
					'Cidade' => utf8_decode($this->input->post('txtCidade'))
				);

				//carrego a model 
				$this->load->model('usuario');
				return $this->usuario->atualizaCadastro($data, array('CodUsuario' => $cod));	 
			}
			else{
				return false;
			}
		}
		else{
			return false;
		}
	}

	public function alteraFoto(){
		// processa arquivo
		$imagem	= isset( $_FILES['file'] ) ? $_FILES['file'] : NULL;
		$img = '';
		// verifica se arquivo foi enviado para o servidor
		if( $imagem['tmp_name'] )
		{
			// move arquivo para o servidor
			if( move_uploaded_file( $imagem['tmp_name'], $imagem['name'] ) )
			{
				// include( 'm2brimagem.class.php' );
				$this->load->helper('m2brimagem');
				$oImg = new m2brimagem( $imagem['name'] );
				if( $oImg->valida() == 'OK' )
				{
					$oImg->posicaoCrop( $_POST['x'], $_POST['y'] );
					$oImg->redimensiona( $_POST['w'], $_POST['h'], 'crop' );
					$oImg->grava(base_url("users/profile/$imagem"));
				}
				else
				{
					// imagem inválida, exclui do servidor
					unlink( $imagem['name'] );
				}
			}
		}


	}
}

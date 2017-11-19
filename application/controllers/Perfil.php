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
				$this->load->model('Escola');
				$this->load->model('Usuario');
				$this->load->model('Interface_led');
				$this->load->model('Avatar');
				$this->load->model('Missoes');
				$user = $this->Usuario->getUser(array('Token' => $codperfil));
				if($user){
					$this->load->helper('interface');
					$data = preencheInterface(array('cod'=> $cod, 'tipo'=> $tipo));
					// $data = preencheInterface(array('cod'=> $user['CodUsuario'], 'tipo'=> $user['CodTipoUsuario']));



					$nome = utf8_encode($user['Nome'])." ".utf8_encode($user['Sobrenome']);
					$data['infoUser'] = $user;
					$data['codUsuario'] = $cod;
					//passando as informações do painel de inteligências
					$data['inteligencia'] = $this->Missoes->retornaInteligencia();

					// $this->load->helper('xp');

					$qtdXp =$this->Missoes->retornaLvl(array('CodUsuario'=>$user['CodUsuario']));
					
					//puxando em qual inteligência o usuário é melhor
					foreach ($qtdXp as $int) {
						$qtdXp = $int;
					}
					$melhor = array('inteligencia' => 'default', 'xp' => 0);
					foreach ($qtdXp as $int => $valor) {
						if($int != "CodUsuario" && $int != "PontosXP"){
							if($valor > $melhor['xp']){
								$melhor['inteligencia'] = $int;
								$melhor['xp'] = $valor;
							}
						}
					}
					$data['card'] = $melhor;







					//retornando avatar daquele usuário
					$data['avatar'] = $this->Avatar->retornaAvatar(array('Token' => $codperfil));
					$data['avatares'] = $this->Avatar->retornaAvatar(null);

					$data['title'] = $nome;
					$data['content'] = "profile";
					$data['filesfooter'] = array(
						'script avatar' => '<script type="text/javascript" src="'.base_url("assets/js/scripts/cadastro.js").'"></script>',
						'scripts para ajax do perfil' => '<script type="text/javascript" src="'.base_url("assets/js/scripts/perfil.js").'"></script>'
					);
					if(atualizaStatus($cod))
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
				$this->load->model('Usuario');
				$nickname = $this->Usuario->atualizaCadastro(array('Nickname'=>utf8_decode($this->input->post('txtNick'))),array('CodUsuario' => $cod));
				$codavatar = $this->input->post('codavatar');
				$avatar = array(
						'CodCorpo' => ($this->input->post('codcorpo') != 0) ? $this->input->post('codcorpo') : null,
						'CodCabelo' => ($this->input->post('codcabelo') != 0) ? $this->input->post('codcabelo') : null, 
						'CodRoupa' => ($this->input->post('codroupa') != 0) ? $this->input->post('codroupa') : null, 
						'CodRosto' => ($this->input->post('codrosto') != 0) ? $this->input->post('codrosto') : null,
						'CodItem' => ($this->input->post('coditem') != 0) ? $this->input->post('coditem') : null
					);
					$this->load->model('Avatar');

				if(!empty($codavatar)){		
					$avatar = $this->Avatar->updAvatar($avatar,array('CodAvatar' => $codavatar));
				}else{
					$avatar = $this->Avatar->cadastraAvatar($avatar,array('CodUsuario' => $cod));
					$this->load->model('Usuario');
					$avatar = $this->Usuario->atualizaCadastro(array('CodAvatar' => $avatar),array('CodUsuario' => $cod));
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
				$this->load->model('Usuario');
				return $this->Usuario->atualizaCadastro($data, array('CodUsuario' => $cod));	 
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
		// var_dump($_FILES);
		// var_dump($this->input->post());
        // break;
		if(!empty($_FILES)){
			$this->load->library('session');
			if($this->session->has_userdata('login')){
				$usuario = $this->session->login;
				$cod = $usuario['cod'];
				$tipo = $usuario['tipo'];

				$this->load->library('upload');
				$this->load->model('Usuario','usuario');
				$us = $this->usuario->getUser(array('CodUsuario' => $cod),'array');
				// var_dump($us);
				// break;

				// Configurações para o upload da imagem
		        // Diretório para gravar a imagem
		        $folder = $us['Token'];
		        $path = "./data/profile/".$folder;

		        if(!is_dir($path)) {
		       		mkdir($path, 0777, $recursive = true);
		    	}

		        $configUpload['upload_path']   = $path;
		        // Tipos de imagem permitidos
		        $configUpload['allowed_types'] = 'jpg|png';
		        // Usar nome de arquivo aleatório, ignorando o nome original do arquivo
		        $configUpload['encrypt_name']  = TRUE;

		        // Aplica as configurações para a library upload
		        $this->upload->initialize($configUpload);
				
		        // Verifica se o upload foi efetuado ou não
		        // Em caso de erro carrega a home exibindo as mensagens
		        // Em caso de sucesso faz o processo de recorte
		        if($this->upload->do_upload('imagem')){
		            // Recupera os dados da imagem
		            $dadosImagem = $this->upload->data();
		            
		            // Calcula os tamanhos de ponto de corte e posição
		            // de forma proporcional em relação ao tamanho da
		            // imagem original
		            $tamanhos = $this->CalculaPercetual($this->input->post());

		            // Define as configurações para o recorte da imagem
		            // Biblioteca a ser utilizada
		            $this->load->library('image_lib');
		            $configCrop['image_library'] = 'gd2';
		            //Path da imagem a ser recortada
		            $configCrop['source_image']  = $dadosImagem['full_path'];
		            // Diretório onde a imagem recortada será gravada
		            $configCrop['new_image']     = $path;
		            // Proporção
		            $configCrop['maintain_ratio']= FALSE;
		            // Qualidade da imagem
		            $configCrop['quality']             = 100;
		            // Tamanho do recorte
		            $configCrop['width']         = $tamanhos['wcrop'];
					$configCrop['height']        = $tamanhos['hcrop'];
					// Ponto de corte (eixos x e y)
					$configCrop['x_axis']        = $tamanhos['x'];
					$configCrop['y_axis']        = $tamanhos['y'];

		            // Aplica as configurações para a library image_lib
		            $this->image_lib->initialize($configCrop);

		            // Verifica se o recorte foi efetuado ou não
		            // Em caso de erro carrega a home exibindo as mensagens
		            // Em caso de sucesso envia o usuário para a tela
		            // de visualização do recorte
		            if ($this->image_lib->crop()){
		                // Define a URL da imagem gerada após o recorte
		                $urlImagem = $folder."/".$dadosImagem['file_name'];

		                $this->usuario->atualizaCadastro(array('Foto' => $urlImagem),array('CodUsuario' => $cod));
		                redirect(base_url("/perfil/$folder"));
		            }
		            return false;
		        }
		        return false;
		    }
		    return false;
	    }
	    return false;
    }

    // Método privado responsável por calcular os tamanhos de forma proporcional
	private function CalculaPercetual($dimensoes){
		// Verifica se a largura da imagem original é
		// maior que a da área de recorte, se for calcula o tamanho proporcional
		// if($dimensoes['woriginal'] > $dimensoes['wvisualizacao']){
			// $percentual = $dimensoes['woriginal'] / $dimensoes['wvisualizacao'];
			$percentual = 1;

			$dimensoes['x'] = round($dimensoes['x'] * $percentual);
			$dimensoes['y'] = round($dimensoes['y'] * $percentual);
			$dimensoes['wcrop'] = round($dimensoes['wcrop'] * $percentual);
			$dimensoes['hcrop'] = round($dimensoes['hcrop'] * $percentual);
		// }

		// Retorna os valores a serem utilizados no processo de recorte da imagem
		return $dimensoes;
	}
}

<?php
/**
* Controlador criado para gerenciar o módulo com cadastro de livros na biblioteca virtual da instituição
* @author Kaue Reis
*/
defined('BASEPATH') OR exit('No direct script access allowed');

class Biblioteca extends CI_Controller {
	public function index(){
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
				$data = preencheInterface($usuario,'library',false);

				//carregando a view enquanto passo as informações
				$data['title'] = "Biblioteca";
				$data['content'] = "library";
				$data['sidebar'] = "library";
				//definindo os valores que serão exibidos dinamicamente na sidebar de acordo com o tipo de usuário
				$this->load->helper('sidebar');
				// $this->load->helper('smiley');
				$data['files'] = array('input type file'=>'<link rel="stylesheet" href="'.base_url("/assets/css/file.css").'" type="text/css"/>');	
				$data['filesfooter'] = array('comandos para busca dinâmica' => "<script type='text/javascript' src='".base_url('assets/js/scripts/library.js')."'></script>");
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

	public function cadLivro(){
		//verificando se a sessão existe, caso exista mando para o painel
		$this->load->library('session');
		if($this->session->has_userdata('login')){
			$usuario = $this->session->login;
			if(!empty($_FILES['flLivro'])){
				//se sim faço o tratamento da foto 
				$this->load->library('upload');
				$this->load->helper('string');


				$this->load->model('Usuario','usuario');
				$us = $this->usuario->getUser(array('CodUsuario'=>$usuario['cod']),'array');
				// definimos um nome aleatório para o diretório 
				// $folder = random_string('alpha');
				$folder = $us['Token'];

				// definimos o path onde o arquivo será gravado
				 $path = "./data/library/".$folder;
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
				if($this->upload->do_upload('flLivro')){
					//se correu tudo bem, recuperamos os dados do arquivo
					$dadosArquivo = $this->upload->data();
					// definimos o path original do arquivo
					$arquivoPath = $folder."/".$dadosArquivo['file_name'];
					// passando para o array '$data'

					$data['Nome'] = utf8_decode($this->input->post('txtNome'));
					$data['Descricao'] = utf8_decode($this->input->post('txtDescricao'));
					$data['Link'] = $arquivoPath;
					$data['DataHoraEnvio'] = date('Y-m-d H:i');
					$data['CodUsuario'] = $usuario['cod'];

					//carrego a model 
					$this->load->model('Library','library');
					
					//atualizo
					$retorno = $this->library->cadastraLivro($data);
					
					//passo o retorno
					if($retorno){
						echo "<script type='text/javascript'>alert('Arquivo cadastrado com sucesso :D');</script>";
					}else{
						echo "<script type='text/javascript'>alert('Houve um erro ao cadastrar este arquivo :/');</script>";
					}
					$data = array();
					redirect(base_url("/biblioteca"));
				}
				echo "<script type='text/javascript'>alert('Houve um erro ao cadastrar este arquivo :/');</script>";
				redirect(base_url("/biblioteca"));
			}
			echo "<script type='text/javascript'>alert('Houve um erro ao cadastrar este arquivo :/');</script>";
				redirect(base_url("/biblioteca"));
		}
		else
		{
			//se não houver sessão, então mando de volta pois não existiu um login
			redirect(base_url());
		}
	}

	public function exclivro(){
		$this->load->library('session');
		if($this->session->has_userdata('login')){
			$usuario = $this->session->login;
			// Recupera o ID do registro - através da URL - a ser editado
			$id = $this->uri->segment(3);
			// Se não foi passado um ID, então redireciona para a home
			if(is_null($id))
			redirect();
			// Remove o registro do banco de dados recuperando o status dessa operação
			$this->load->model('Library','library');
			$status = $this->library->deleteLivro($id);
			if($status)
				redirect(base_url('/biblioteca'));
			
		}
	}

	public function exibeLivro(){
		$livro = $this->uri->segment(2);
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
				$data = preencheInterface($usuario,'library');

				//carregando a view enquanto passo as informações
				$data['title'] = "Ferramentas";
				$data['content'] = "library";
				$data['sidebar'] = "library";
				//definindo os valores que serão exibidos dinamicamente na sidebar de acordo com o tipo de usuário
				$this->load->helper('sidebar');
				// $this->load->helper('smiley');
				// $data['files'] = array('chat' => '<style>#main{overflow-y: hidden !important;}</style>');		
				$data['filesfooter'] = array('comandos para excluir link' => "<script type='text/javascript' src='".base_url('assets/js/scripts/links.js')."'></script>",'comandos para busca dinâmica' => "<script type='text/javascript' src='".base_url('assets/js/scripts/library.js')."'></script>");
				$this->load->model('Library','library');
				$this->load->model('Usuario','usuario');
				$data['livro'] = $this->library->retornaLivro(array('CodArquivo'=> $livro));
				$this->load->view('panel/layout', $data);
			}else{
				redirect(base_url('configuracao-ambiente'));
			}

		}else{
			//se não houver sessão, então mando de volta pois não existiu um login
			redirect(base_url());
		}
	}

	
	public function retornaBusca(){
		$this->load->library('session');
		if($this->session->has_userdata('login')){
			$usuario = $this->session->login;

			if(isset($_GET['search'])){
				$search = trim($this->input->get('search'));

				$this->load->model('Library','library');
				if(!empty($search))
					$livros = $this->library->retornaLivro("arquivo.`Nome` LIKE '$search%' ESCAPE '!'");
				else
					$livros = $this->library->retornaLivro();



				if(!empty($livros)){
					$retorno = array();
					foreach ($livros as $livro) {
						$retorno[] = array(
								'Link' => "/biblioteca/$livro->CodArquivo",
								'Icon' => "fa fa-book 2x",
								'Nome' => $livro->Nome
							);
					}
					return $this->output 
	        		-> set_content_type('application/json') 
	        		-> set_output(json_encode($retorno));

	        		unset($retorno);
	        	}else{
	        		return array();
	        	}
	        	
			}
		}
		else{
			return false;
		}
	}


}
			

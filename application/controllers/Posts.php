<?php
/**
*   Controlador criado para gerenciar o mural de postagens
*	@author Matheus Antonio
*/
defined('BASEPATH') OR exit('No direct script access allowed');

class Posts extends CI_Controller {
	public function index(){
		$this->load->library('session');
		if($this->session->has_userdata('login')){
			$usuario = $this->session->login;
			$cod = $usuario['cod'];
			$tipo = $usuario['tipo'];

			$codmural = $this->uri->segment(2);

			//carrego as models mural e escola para puxar as postagens
			$this->load->model('mural');
			$this->load->model('escola');

			//verificarei se o usuário tem acesso aquele mural, se não tiver eu mando ele pra fora ;)
			if($this->mural->retornaUsuarioMural(array('CodMural' => $codmural, 'usuario-mural.CodUsuario' => $cod),'num') == 0 && $tipo != 1){
				redirect(base_url('mural'));
			}

			//se ele passar daqui, ele tem permissão para visualizar esse mural, portanto seguimos em frente pegando as informações 
			$mr = $this->escola->getMural(array('CodMural' => $codmural));
			$post = $this->mural->retornaPostagens(array('CodMural' => $codmural));

			//chamo a helper pra preencher a interface
			$this->load->helper('interface');
			$data = preencheInterface($usuario,'mural');
			//carregando a view enquanto passo as informações
			$data['title'] = utf8_encode($mr['Nome']);
			$data['content'] = "posts";
			$data['sidebar'] = "mural";
			$data['codUsuario'] = $usuario['cod'];

			//definindo os valores que serão exibidos dinamicamente na sidebar de acordo com o tipo de usuário
			$this->load->helper('sidebar');

			//por fim passo as informações importantes para exibir naquele determinado mural
			$data['nomeMural'] = utf8_encode($mr['Nome']);
			$data['descricao'] = utf8_encode($mr['Descricao']);
			$data['codMural'] = $mr['CodMural'];
			$data['publicacao'] = $post;



			//passo os comandos necessários para renderizar os emoticons
			$this->load->helper('smiley');
			$data['files'] = array('mural' => '<link href="'.base_url("assets/css/mural.css").'" rel="stylesheet">', 'js para os smileys' => smiley_js());

			$data['filesfooter'] = array('envio ajax' => '<script type="text/javascript" src="'.base_url("assets/js/scripts/mural.js").'"></script>');
			$this->load->library('table');
            $template = array(
			        'table_open'            => '<table border="0" width="100%" cellpadding="4" cellspacing="0" class="emoticon-lista table-responsive">',

			        'thead_open'            => '<thead>',
			        'thead_close'           => '</thead>',

			        'heading_row_start'     => '<tr>',
			        'heading_row_end'       => '</tr>',
			        'heading_cell_start'    => '<th>',
			        'heading_cell_end'      => '</th>',

			        'tbody_open'            => '<tbody>',
			        'tbody_close'           => '</tbody>',

			        'row_start'             => '<tr>',
			        'row_end'               => '</tr>',
			        'cell_start'            => '<td>',
			        'cell_end'              => '</td>',

			        'row_alt_start'         => '<tr>',
			        'row_alt_end'           => '</tr>',
			        'cell_alt_start'        => '<td>',
			        'cell_alt_end'          => '</td>',

			        'table_close'           => '</table>'
			);

			$this->table->set_template($template);
            $image_array = get_clickable_smileys(base_url('assets/smileys/'), 'txtPost');
            $col_array = $this->table->make_columns($image_array, 4);

            $data['smiley_table'] = $this->table->generate($col_array);

			$this->load->view('panel/layout',$data);

			//parei aqui
		}
		else{
			redirect(base_url('painel'));
		}

	}
	

	public function postCad(){
		$this->load->library('session');
		if($this->session->has_userdata('login')){
			//carrego as models e bibliotecas que irei usar
			$this->load->model("mural");
			$this->load->model('interface_led');
			$this->load->model('usuario');
			$this->load->model('escola');
			$usuario = $this->session->login;


			$conteudo = utf8_decode($this->input->post('txtPost'));
			// $conteudo = strip_tags($conteudo);
			$conteudo = nl2br($conteudo);
			$conteudo = (str_replace(" ", "", $conteudo) == "") ? null : $conteudo;


			$data['Conteudo'] = $conteudo;
			$data['DataHora'] = date('Y-m-d H:i:s');
			$data['Imagem'] = $this->input->post('imgPost');
			$data['CodMural'] = $this->input->post('codMural');
			$data['CodUsuario'] = $usuario['cod'];

			//verifico se aquele usuário tem permissão para efetuar uma postagem naquele mural 

			if($this->mural->retornaUsuarioMural(array('CodMural' => $data['CodMural'], 'usuario-mural.CodUsuario' => $usuario['cod']),'num') == 0 && $usuario['tipo'] != 1)
				return false;

				//caso ele tenha permissão, verifico se ele está postando alguma foto
				if(isset($_FILES['userfile'])){
					//se sim faço o tratamento da foto 
					$this->load->library('upload');
					$this->load->helper('string');



					// definimos um nome aleatório para o diretório 
			        $folder = random_string('alpha');
			        // definimos o path onde o arquivo será gravado
			        $path = "./assets_mural/".$folder;
			        // verificamos se o diretório existe
			        // se não existe criamos com permissão de leitura e escrita
			        if (!is_dir($path)) {
			       		mkdir($path, 0777, $recursive = true);
			    	}


			    	// definimos as configurações para o upload
			        // determinamos o path para gravar o arquivo
			        $configUpload['upload_path']   = $path;
			        // definimos - através da extensão - 
			        // os tipos de arquivos suportados
			        $configUpload['allowed_types'] = 'jpg|png|gif';
			        // definimos que o nome do arquivo
			        // será alterado para um nome criptografado
			        $configUpload['encrypt_name']  = TRUE;


       		        // passamos as configurações para a library upload
		       	 	$this->upload->initialize($configUpload);
		        	// verificamos se o upload foi processado com sucesso

		       	 	if ($this->upload->do_upload('userfile')){
			       	 	//se correu tudo bem, recuperamos os dados do arquivo
			            $dadosArquivo = $this->upload->data();
			            // definimos o path original do arquivo
			            $arquivoPath = 'assets_mural/'.$folder."/".$dadosArquivo['file_name'];
			            // passando para o array '$data'
			            $data['Imagem'] = $arquivoPath;
		       	 	}
		       	 	else{
		       	 		$data['Imagem'] = null;
		       	 	}
			 	}

			 	$mural = $data['CodMural'];
				$postmaker = $data['CodUsuario'];
				$usuarioMural = $this->mural->retornaUsuarioMural("CodMural = $mural AND usuario-mural.CodUsuario <> $postmaker AND Status <> 0");
				$usuario = $this->usuario->getUser(array('CodUsuario' => $postmaker));
				$mural = $this->escola->getMural(array('CodMural' => $mural, "CodUsuario <> $postmaker"));
		 
		        if($this->mural->insertPost($data)){
					$id = $this->db->insert_id();
					$nomeMural = utf8_encode($mural['Nome']);
					$nm = utf8_encode($usuario['Nome']);
					$snm = utf8_encode($usuario['Sobrenome']);
					foreach ($usuarioMural as $key) {
						//para cada usuário envio uma notificação
						$data = array(
							'Titulo' => utf8_decode("Nova publicação no mural $nomeMural"), 
							'Texto' => utf8_decode("$nm $snm fez uma nova publicação"),
							'DataHora' => date("Y-m-d H:i:s"), 
							'Link' => base_url("post/$id"), 
							'CodRemetente' => $postmaker, 
							'CodDestinatario' => $key->CodUsuario
						);
						if($this->interface_led->enviaNotificacao($data))
							$retorno = true;
						else
							$retorno = false;
					}
					if($retorno)
						// redirect(base_url("mural/$mural"));
						return true;
					else
						return false;
		    	}
				return false;
		}else{
			//se não houver sessão, então mando de volta pois não existiu um login
			break;
		}
	}
	//parei aqui, preciso arrumar envio de imagem no post, e dar prosseguimento


	public function retornaComentario(){
		$this->load->library('session');
		if($this->session->has_userdata('login')){
			$usuario = $this->session->login;

			if(isset($_GET['codPost'])){
				$post = $this->input->get('codPost');

				$this->load->model('mural');
				$this->load->helper('smiley');

				$comentarios = $this->mural->getComment(array('CodPostagem' => $post));
				if(isset($comentarios)){
					$retorno = array();
					foreach ($comentarios as $comentario) {
						//faço a verificação da foto 
						if(isset($comentario->Foto)) 
							$foto = base_url("users/profile/$comentario->Foto.jpg");
						else{
							if($comentario->Sexo == 'M')
								$foto = base_url("assets/img/user-m.png");
							else
								$foto = base_url("assets/img/user-f.png");
						}

						//faço a conversão dos emoticons
						$str = utf8_encode($comentario->Comentario);
						$str = parse_smileys($str, base_url('assets/smileys/'));

						//faço a verificação do tempo
						// $agora = date("Y-m-d H:i");
						// $agora = new DateTime(now);
						$tempo = date("d/m/Y à\s H:i", strtotime($comentario->DataHora));
						// $agora = date('Y-m-d H:i');

						// $tempo = $agora - $tempo;
						// if($agora + strtotime('60 seconds') <= $comentario->DataHora)
						// 	$tempo = "Agora mesmo";
						// else
						// 	$tempo = $agora;
						// $ontem = date('Y-m-d',strtotime("-1 days"));
						//passo o array
							$retorno[] = array(
								'CodComentario' => $comentario->CodComentario,
								'Comentario' => $str,
								'DataHora' => $tempo,
								'CodPostagem' => $comentario->CodPostagem,
								'CodUsuario' => $comentario->CodUsuario,
								'Nome' => utf8_encode($comentario->Nome),
								'Sobrenome' => utf8_encode($comentario->Sobrenome),
								'Foto' => utf8_encode($foto),
								'Token' => $comentario->Token
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


	public function enviaComentario(){
		$this->load->library('session');
		if($this->session->has_userdata('login')){
			$usuario = $this->session->login;
			$comentario = utf8_decode($this->input->post('txtComentario'));
			$comentario = nl2br($comentario);

			$postagem = $this->input->post('codPostagem');
			$data = array(
				'Comentario' => $comentario,
				'DataHora' => date("Y-m-d H:i"),
				'CodPostagem' => $postagem,
				'CodUsuario' => $usuario['cod']
			);
			$this->load->model('mural');
			if($this->mural->cadComment($data))
				return true;
			else
				return false;

		}
		else{
			break;
		}
	}

	public function excluiComentario(){
		if(isset($_GET['cod']))
			$where = array('CodComentario' => $this->input->get('cod'));
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




	public function chamaPostagem(){
		$this->load->library('session');
		if($this->session->has_userdata('login')){
			$usuario = $this->session->login;
			$cod = $usuario['cod'];
			$tipo = $usuario['tipo'];

			$codpost = $this->uri->segment(2);

			//carrego as models mural e escola para puxar as postagens
			$this->load->model('mural');
			$this->load->model('escola');

			//verificarei se o usuário tem acesso aquele mural, se não tiver eu mando ele pra fora ;)
			if($this->mural->retornaPostagens(array('CodPost' => $codpost),'num') == 0 && $tipo != 1){
				redirect(base_url('mural'));
			}

			//se ele passar daqui, ele tem permissão para visualizar esse mural, portanto seguimos em frente pegando as informações
			$post = $this->mural->retornaPostagens(array('CodPost' => $codpost));
			

			//chamo a helper pra preencher a interface
			$this->load->helper('interface');
			$data = preencheInterface($usuario,'mural');
			//carregando a view enquanto passo as informações
			$data['title'] = "Post";
			$data['content'] = "postagem";
			$data['sidebar'] = "mural";
			$data['codUsuario'] = $usuario['cod'];

			//definindo os valores que serão exibidos dinamicamente na sidebar de acordo com o tipo de usuário
			$this->load->helper('sidebar');
			$this->load->helper('smiley');
			$data['files'] = array('mural' => '<link href="'.base_url("assets/css/mural.css").'" rel="stylesheet">', 'js para os smileys' => smiley_js());

			$data['filesfooter'] = array('envio ajax' => '<script type="text/javascript" src="'.base_url("assets/js/scripts/mural.js").'"></script>');

			//por fim passo as informações importantes para exibir naquele determinado mural
			$data['publicacao'] = $post;
			if(!empty($post))
				$this->load->view('panel/layout',$data);
			else
				show_404();
		}
	}

	public function converteEmoticon(){
		$this->load->helper('smiley');
		$str = utf8_encode($this->input->get('txtMsg'));

		$str = parse_smileys($str, base_url('assets/smileys/'));
		$str = array('msg' => $str);
		return $this->output 
	        		-> set_content_type('application/json') 
	        		-> set_output(json_encode($str));
	}

	public function opina(){
		$this->load->library('session');
		if($this->session->has_userdata('login')){
			$usuario = $this->session->login;
			$cod = $usuario['cod'];
			$tipo = $usuario['tipo'];
			$this->load->model('mural');

			$post = $this->input->get('post');
			$op = $this->input->get('op');
			//primeiro eu vejo se a opinião já foi dada antes
			$data = array(
				'CodUsuario' => $cod,
				'CodPost' => $post
			);
			$busca = $this->mural->retornaQtdOp($data);
			if($busca == 0){
				if($this->mural->cadOpiniao(array('CodUsuario'=>$cod,'CodPost' => $post, 'CodTipoOpiniao'=>$op)))
					return true;
				else
					return false;
			}
			else{
				if($this->mural->attOpiniao(array('CodTipoOpiniao'=>$op),array('CodUsuario'=>$cod,'CodPost'=>$post)))
					return true;
				else
					return false;
			}
		}else{
			break;
		}
	}

	public function retornaOp(){
		$where = array(
			'CodPost' => $this->input->get('codPost'),
			'CodUsuario' => $this->input->get('codUser')
		);
		$this->load->model('mural');
		$op = $this->mural->retornaOp($where);
		return $this->output 
	        		-> set_content_type('application/json') 
	        		-> set_output(json_encode($op));
	}

	public function deletaPost(){
		$this->load->model('mural');
		if(isset($_GET['codigo'])){
			$where = array('CodPost' => $this->input->get('codigo'));
			return $this->mural->delPost($where);
		}
		return false;
	}

	public function deletaComentario(){
		$this->load->model('mural');
		if(isset($_GET['codigo'])){
			$where = array('CodComentario' => $this->input->get('codigo'));
			return $this->mural->delComment($where);
		}
		return false;
	}


	public function reportaPost(){
		if(isset($_POST)){
			$this->load->model('mural');
			$this->load->model('usuario');
			$this->load->model('interface_led');
			$user = $this->usuario->getUser(array('CodUsuario'=>$this->input->post('codUser')));
			$nome = utf8_encode($user['Nome'])." ".utf8_encode($user['Sobrenome']);
			

			$post = $this->mural->retornaPostagens(array('CodPost'=> $this->input->post('codPost')));

			foreach ($post as $postagem) {
				$codmural = $postagem->CodMural;
			}

			$mural = $this->mural->retornaMural(array('CodMural'=> $codmural));
			foreach ($mural as $mural) {
				$nomeMural = utf8_encode($mural->Nome);
			}


			$adm = $this->usuario->getUser(array('CodTipoUsuario' => 1));
			$notificacao = $this->interface_led->enviaNotificacao(array(
								'Titulo' => utf8_decode("Denúncia!"),
								'Texto' => utf8_decode("$nome reportou uma publicação no mural $nomeMural"),
								'DataHora' => date("Y-m-d H:i:s"),
								'Link' => $this->input->post('txtLink'),
								'CodRemetente' => null,
								'CodDestinatario' => $adm['CodUsuario']
					));
				return $notificao;


			// if(is_array($adm)){
			// 	$return = array();
			// 	foreach ($adm as $admin) {
			// 		$notificacao = $this->interface_led->enviaNotificacao(array(
			// 					'Titulo' => utf8_decode(""),
			// 					'Texto' => utf8_decode("$nome reportou uma publicação no mural $nomeMural"),
			// 					'DataHora' => date("Y-m-d H:i:s"),
			// 					'Link' => $this->input->post('txtLink'),
			// 					'CodRemetente' => null,
			// 					'CodDestinatario' => $admin['CodUsuario']
			// 		));
			// 		$return[] = $notificacao;	
			// 	}
			// 	if(!in_array(FALSE, $return))
			// 		return true;
			// }else{
			// 	$notificacao = $this->interface_led->enviaNotificacao(array(
			// 					'Titulo' => utf8_decode("Denúncia!"),
			// 					'Texto' => utf8_decode("$nome reportou uma publicação no mural $nomeMural"),
			// 					'DataHora' => date("Y-m-d H:i:s"),
			// 					'Link' => $this->input->post('txtLink'),
			// 					'CodRemetente' => null,
			// 					'CodDestinatario' => $adm['CodUsuario']
			// 		));
			// 	return $notificao;
			// }
			// var_dump($notificacao);
			
			// $where = array('CodComentario' => $this->input->get('codigo'));
			// return $this->mural->delComment($where);


			
		}
		return false;
	}


}
		
?>
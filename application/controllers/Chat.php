<?php
/**
*  Controlador com métodos pertinentes ao bate-papo
*  @author Matheus Antonio
*/
defined('BASEPATH') OR exit('No direct script access allowed');

class Chat extends CI_Controller {
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

			if(verificaAmbiente($tipo)){
				//recebo o array com as informações da interface
				$this->load->helper('interface');
				$data = preencheInterface($usuario,'chat');

				//carregando a view enquanto passo as informações
				$data['title'] = "Bate-papo";
				$data['content'] = "chat";
				$data['sidebar'] = "chat";
				$data['home'] = TRUE;
				$data['codUser'] = $cod;
				//definindo os valores que serão exibidos dinamicamente na sidebar de acordo com o tipo de usuário
				$this->load->helper('sidebar');
				$this->load->helper('smiley');
				$data['files'] = array('chat' => '<link href="'.base_url("assets/css/chat.css").'" rel="stylesheet">', 'js para os smileys' => smiley_js());	


				$this->load->library('table');
				$template = array(
					'table_open'            => '<table border="0" cellpadding="4" cellspacing="0" class="table-responsive" width="100%">',

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

	public function iniciaChat(){
		//verificando se a sessão existe, caso exista mando para o painel 
		$this->load->library('session');
		if($this->session->has_userdata('login')){
			$usuario = $this->session->login;
			$cod = $usuario['cod'];
			$tipo = $usuario['tipo'];

			//verificando se a configuração de ambiente já foi feita
			$this->load->helper('inicia');

			if(verificaAmbiente($tipo)){

				$data['interfaceChat'] = array();
				if(!isset($_GET['t']) && !isset($_GET['id'])) redirect('/chat');


				//recebo o array com as informações da interface
				$this->load->helper('interface');
				$data = preencheInterface($usuario,'chat');



				if($this->input->get('t') === 'grp'){
					$this->load->model('Escola','escola');
					$this->load->model('BatePapo','chat');
					$grupo = $this->escola->getGrupo(array('CodGrupo'=> $_GET['id']));
					if(empty($grupo)) redirect(base_url('/chat'));
					// $grupo = $this->chat->retornaMsgsGrupo(array('msg.CodGrupo'=> $_GET['id']));
					// if(!empty($grupo)){
						// var_dump($grupo);
					$data['interfaceChat'] = array(
						'Id' => $_GET['id'],
						'Nome' => utf8_encode($grupo['Nome'])

							// 'Foto' => $grupo['Foto'],
							// 'Sexo' => $grupo['Sexo'],
							// 'Perfil' => "/perfil/".$remetente['Token'],
							// 'Status' => (date('Y-m-d H:i:s') <= $grupo['HorarioLimite']) ? 'online' :'offline'
					);
					// }
					$id = (int)$_GET['id'];
					$data['mensagens'] = $this->chat->retornaMsgsGrupo("msg.CodGrupo = $id");
					$data['last'] = $this->chat->retornaMsgsGrupo("msg.CodGrupo = $id"," ");
					$data['grp'] = TRUE;




				}else if($this->input->get('t') == 'ind'){
					$this->load->model('Usuario','usuario');
					$this->load->model('BatePapo','chat');

					$token = $this->input->get('id');

					$remetente = $this->usuario->getUser(array('Token' => $token),'array');
					$id = $remetente['CodUsuario'];
					$data['interfaceChat'] = array(
						'Id' => $id,
						'Nome' => utf8_encode($remetente['Nome']." ".$remetente['Sobrenome']),
						'Foto' => $remetente['Foto'],
						'Sexo' => $remetente['Sexo'],
						'Perfil' => "/perfil/".$remetente['Token'],
						'Status' => (date('Y-m-d H:i:s') <= $remetente['HorarioLimite']) ? 'online' :'offline'
					);

					$data['mensagens'] = $this->chat->retornaMsgs("(CodRemetente = $id OR CodDestino = $id) AND (CodRemetente = $cod OR CodDestino = $cod)");
					$data['last'] = $this->chat->retornaMsgs("(CodRemetente = $id OR CodDestino = $id) AND (CodRemetente = $cod OR CodDestino = $cod)"," ");
					$data['grp'] = FALSE;
					// break;
				}else{
					redirect('/chat');
				}






				//carregando a view enquanto passo as informações
				$data['title'] = "Chat";
				$data['content'] = "chat";
				$data['sidebar'] = "chat";
				$data['codUser'] = $cod;
				$data['home'] = FALSE;
				//definindo os valores que serão exibidos dinamicamente na sidebar de acordo com o tipo de usuário
				$this->load->helper('sidebar');
				$this->load->helper('smiley');
				$data['files'] = array('chat' => '<link href="'.base_url("assets/css/chat.css").'" rel="stylesheet">', 'js para os smileys' => smiley_js());	


				$this->load->library('table');
				$template = array(
					'table_open'            => '<table border="0" cellpadding="4" cellspacing="0" class="table-responsive" width="100%">',

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
				$image_array = get_clickable_smileys(base_url('assets/img/smileys/'), 'status_message');
				$col_array = $this->table->make_columns($image_array, 4);
				$data['filesfooter'] = array(
					'script chat' => '<script type="text/javascript" src="'.base_url("assets/js/scripts/chat.js").'"></script>'
				);
				$data['smiley_table'] = $this->table->generate($col_array);

				$data['meuCod'] = $cod;

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

	public function retornaMsg(){
		$this->load->library('session');
		if($this->session->has_userdata('login')){
			$usuario = $this->session->login;
			$meuCod = $usuario['cod'];
			
			if(isset($_GET['ult'],$_GET['ele'],$_GET['eu'])){
				$ult = (int)$this->input->get('ult');
				$ele = $this->input->get('ele');
				$eu = $this->input->get('eu');

				$this->load->model('BatePapo','chat');
				$this->load->helper('smiley');
				$g = ($_GET['grp'] == 'false')? FALSE: TRUE;
				
				if(!$g){
					//se não for chat em grupo, retorno uma conversa privada
					$mensagens = (!empty($_GET['ult']))? $this->chat->retornaMsgs("((CodRemetente = $ele OR CodDestino = $ele) AND (CodRemetente = $eu OR CodDestino = $eu)) AND CodMensagem > $ult") : $this->chat->retornaMsgs("((CodRemetente = $ele OR CodDestino = $ele) AND (CodRemetente = $eu OR CodDestino = $eu)) AND CodMensagem != 0");
				}else{
					//se for, retorno uma conversa em grupo
					$mensagens = (!empty($_GET['ult']))? $this->chat->retornaMsgsGrupo("CodMensagem > $ult AND msg.CodGrupo = $ele") : $this->chat->retornaMsgs("CodMensagem != 0 AND msg.CodGrupo = $ele");
				}

				
				if(isset($mensagens)){
					$retorno = array();
					foreach ($mensagens as $msg) {
						$this->load->helper('interface');
						$this->load->library('encrypt');

						$foto = ($msg->CodDestino == $meuCod)? fotoPerfil($msg->FotoR,$msg->SexoR) : fotoPerfil($msg->FotoR,$msg->SexoR);

						//faço a conversão dos emoticons
						$str = $this->encrypt->decode($msg->Texto);
						$str = utf8_encode($str);
						$str = str_replace("<br/>", " <br/> ", $str);
						$str = parse_smileys($str, base_url('assets/img/smileys/'));

						//faço a verificação do tempo
						$tempo = date("d/m/Y à\s H:i", strtotime($msg->DataHoraEnvio));
						$status = $msg->Status;
						//passo o array
						$retorno[] = array(
							'CodMensagem' => $msg->CodMensagem,
							'Texto' => $str,
							'DataHora' => $tempo,
							'Enviada' => ($msg->CodRemetente == $meuCod) ? TRUE : FALSE,
							'Foto' => utf8_encode($foto)
						);
					}
					return $this->output 
					-> set_content_type('application/json') 
					-> set_output(json_encode($retorno));

					unset($retorno);
				}
			}
		}

	}

	public function cadMsg(){
		if(isset($_POST)){
			$msg = $this->input->post('msg');
			$cod = explode(":",$this->input->post('id'));
			$grp = ($_POST['grp'] == 'true')? TRUE: FALSE;

			$destinatario = $cod[0];
			$remetente = $cod[1];
			$msg = utf8_decode($msg);

			$this->load->model('BatePapo','chat');
			$this->load->library('encrypt');

			$data = array(
				'CodRemetente' => $remetente,
				'Texto' => $this->encrypt->encode($msg),
				'DataHoraEnvio' => date('Y-m-d H:i:s')
			);
			if($grp){
				$data['CodGrupo'] = $destinatario;
				$data['Status'] = 1;
			}
			else{
				$data['CodDestino'] = $destinatario;
			}

			$this->load->helper('inicia');
			atualizaStatus($remetente);
			return ($this->chat->cadastraMsg($data))? TRUE : FALSE;



		}
	}


	public function visualizaMsg(){
		if(isset($_POST)){
			$eu = $this->input->post('eu');
			$ele = $this->input->post('ele');

			$this->load->model('BatePapo','chat');
			$this->chat->visualiza(array('CodRemetente'=>$ele,'CodDestino'=>$eu,'Status'=>0));
		}
	}
}

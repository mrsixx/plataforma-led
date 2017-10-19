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

			if(verificaAmbiente()){
				//recebo o array com as informações da interface
				$this->load->helper('interface');
				$data = preencheInterface($usuario,'chat');

				//carregando a view enquanto passo as informações
				$data['title'] = "Chat";
				$data['content'] = "chat";
				$data['sidebar'] = "chat";
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
                $image_array = get_clickable_smileys(base_url('assets/smileys/'), 'status_message');
                $col_array = $this->table->make_columns($image_array, 4);

                $data['smiley_table'] = $this->table->generate($col_array);

				$this->load->view('panel/layout', $data);
			}else{
				redirect(base_url('configuracao-ambiente'));
			}

		}else{
			//se não houver sessão, então mando de volta pois não existiu um login
			redirect(base_url());
		}
	}
}

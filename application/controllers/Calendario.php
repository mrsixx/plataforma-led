<?php
/**
*  Controlador com métodos pertinentes ao calendário
*  @author Matheus Antonio
*/

defined('BASEPATH') OR exit('No direct script access allowed');

class Calendario extends CI_Controller {
	
	public function index(){
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
				$data['title'] = "Calendário";
				$data['content'] = "calendar";
				$data['sidebar'] = "calendar";
				$data['home'] = TRUE;
				$data['codUser'] = $cod;
				//definindo os valores que serão exibidos dinamicamente na sidebar de acordo com o tipo de usuário
				$this->load->helper('sidebar');
				$data['files'] = array('calendário' => '<link href="'.base_url("assets/css/calendar.css").'" rel="stylesheet">');
				$data['filesfooter'] = array(
			'ajax' => '<script type="text/javascript" src="'.base_url('assets/js/scripts/calendar.js').'"></script>'
		);	

				$prefs['show_next_prev'] = TRUE;
				$prefs['next_prev_url']   = base_url('/calendario/');
				$prefs['template'] = '

				{table_open}<table border="*" cellpadding="0" cellspacing="0" class="table table-bordered table-style table-responsive pull-left">{/table_open}

				{heading_row_start}<tr>{/heading_row_start}

				{heading_previous_cell}<th colspan="2"><a href="{previous_url}"><i class="fa fa-chevron-left" aria-hidden="true"></i></a></th>{/heading_previous_cell}
				{heading_title_cell}<th colspan="3">{heading}</th>{/heading_title_cell}
				{heading_next_cell}<th colspan="2"><a href="{next_url}"><i class="fa fa-chevron-right" aria-hidden="true"></i></a></th>{/heading_next_cell}

				{heading_row_end}</tr>{/heading_row_end}

				{week_row_start}<tr>{/week_row_start}
				{week_day_cell}<td class="tdorse">{week_day}</td>{/week_day_cell}
				{week_row_end}</tr>{/week_row_end}

				{cal_row_start}<tr>{/cal_row_start}
				{cal_cell_start}<td>{/cal_cell_start}
				{cal_cell_start_today}<td><div class="today">{/cal_cell_start_today}
				{cal_cell_start_other}<td class="other-month">{/cal_cell_start_other}

				{cal_cell_content}<a href="{content}">{day}</a>{/cal_cell_content}
				{cal_cell_content_today}<div class="highlight"><a href="{content}">{day}</a></div>{/cal_cell_content_today}

				{cal_cell_no_content}{day}{/cal_cell_no_content}
				{cal_cell_no_content_today}<div class="highlight">{day}</div>{/cal_cell_no_content_today}

				{cal_cell_blank}&nbsp;{/cal_cell_blank}

				{cal_cell_other}{day}{/cal_cel_other}

				{cal_cell_end}</td>{/cal_cell_end}
				{cal_cell_end_today}</div></td>{/cal_cell_end_today}
				{cal_cell_end_other}</td>{/cal_cell_end_other}
				{cal_row_end}</tr>{/cal_row_end}

				{table_close}</table>{/table_close}
				';
				$this->load->library('calendar',$prefs);
				$data['calendario'] = $this->calendar->generate($this->uri->segment(4),$this->uri->segment(3));

				
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

	public function cadEvento(){
		$this->load->library('session');
		if($this->session->has_userdata('login')){
			$usuario = $this->session->login;
			$cod = $usuario['cod'];

			var_dump($_GET);

			$this->load->model('Evento','evento');

			$dataHora = $this->input->get('dtEvento');
			$dataHora = explode("T", $dataHora);
			$data = array(
				'Data' => $dataHora[0],
				'Local' => strip_tags(trim(utf8_decode($this->input->get('txtLocal')))),
				'Hora' => $dataHora[1],
				'Descricao' => strip_tags(trim(utf8_decode($this->input->get('txtNome')))),
				'Duracao' => null,
				'CriadoPor' => $cod,
				'CodTipoEvento' => 1
			);
			return $this->evento->cadastra($data);
		}
	}


	

}


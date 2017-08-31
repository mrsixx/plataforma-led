<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Led extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{	
		$config = "application/config/config-database.php";
		if(!file_exists($config)){
			// return $this->install();
			$data['title'] = "Instalação Plataforma LED";
			$this->load->view('install',$data);
		}else{
			// $this->load->library('database');
			// return $this->home();
			//pegar nome da escola do banco de dados
			$data['title'] = "Plataforma LED | alguma coisa que vem do banco";
			$this->load->view('home', $data);
		}
	}

	public function install(){
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<span>', '</span>');
		$validacoes = array(
			array(
				'field' => 'txtUrl',
				'label' => 'txtUrl',
				'rules' => 'required'
			),
			array(
				'field' => 'txtHost',
				'label' => 'txtHost',
				'rules' => 'required'
			),
			array(
				'field' => 'txtBanco',
				'label' => 'txtBanco',
				'rules' => 'required'
			),
			array(
				'field' => 'txtUsuario',
				'label' => 'txtUsuario',
				'rules' => 'required'
			)
		);
		$this->form_validation->set_rules($validacoes);
		if($this->form_validation->run() === FALSE){
			$this->index();
		}else{
			//recebo valores dos inputs
			$data['host'] = $this->input->post('txtHost');
			$data['banco'] = $this->input->post('txtbanco');
			$data['usuario'] = $this->input->post('txtUsuario');
			$data['senha'] = $this->input->post('txtSenha');
			$data['url'] = $this->input->post('txtUrl');
			$http = 'http://';
			if(strpos($data['url'], $http) === FALSE){
				$data['url'] = $http.$data['url'];
			}
			$data['prefixo'] = $this->input->post('txtPrefixo');
			//chamo a model install com os métodos de acesso ao banco
			$this->load->model('install');
			//verifico se os dados retornam uma conexão válida
			if($this->install->verificaConexao($data)){
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
				$config["prefix"] = "'.$data['prefixo'].'";';
				fwrite($handle, $dbconfig);
				fclose($handle);
			}else{
				$this->index();
				?>
					<div class="alert alert-danger alert-dismissable">
					  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					  <strong>Erro!</strong> A conexão não pode ser estabelecida. Por favor, verifique as informações de conexão
					</div>
				<?php
			}
		}
	}

	public function home(){
	}
}

<?php if(!defined('BASEPATH')) exit('No direct script acess lowed');
/**
* 
*/
class Template 
{
	
	function show($view, $data = array())
	{
		//Pega a instancia corrente
		$CI = & get_instance();

		//carrega as views do template;
		$CI->load->view('template/header', $data);
		$CI->load->view($view, $data);
		$CI->load->view('template/footer',$data);
	}

	function menu($view){
	 	$CI = & get_instance();
	 	$CI->load->view('template/menu', array('view' => $view ));
	}
}
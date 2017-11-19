<?php
/**
*  Helper com funções para checar se a configuração de ambiente já foi efetuada
*  @author Matheus Antonio
*/
defined('BASEPATH') OR exit('No direct script access allowed');

if(!function_exists('verificaAmbiente')){
	function verificaAmbiente(){
		//verificando se existem cursos cadastrados e o quadro de funcionários 

			$CI =& get_instance();
			$CI->load->model('Escola');
			$curso = $CI->Escola->getCursos();
			$turma = $CI->Escola->getTurma();
			$hierarquia = $CI->Escola->getHierarquia();
			$compcurricular = $CI->Escola->getCompCurricular();
 // && !empty($hierarquia)
			if(!empty($curso) && !empty($turma) && !empty($compcurricular)){
				return true;
			}
			return false;
	}
}



if(!function_exists('atualizaStatus')){
	function atualizaStatus($codUsuario){
		$CI =& get_instance();

		$CI->load->model('Usuario','usuario');	


		$limite = date('Y-m-d H:i:s', strtotime('+2 min'));

		return $CI->usuario->atualizaCadastro(array('HorarioLimite'=>$limite),array('CodUsuario' => $codUsuario));
	}
}
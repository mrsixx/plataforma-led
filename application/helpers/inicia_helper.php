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
			$CI->load->model('escola');
			$curso = $CI->escola->getCursos();
			$turma = $CI->escola->getTurma();
			$hierarquia = $CI->escola->getHierarquia();
			$compcurricular = $CI->escola->getCompCurricular();

			if(!empty($curso) && !empty($hierarquia) && !empty($turma) && !empty($compcurricular)){
				return true;
			}
			return false;
	}
}
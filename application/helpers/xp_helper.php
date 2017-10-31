<?php
/**
*  Helper com funções para calcular experiência
*  @author Matheus Antonio
*/
defined('BASEPATH') OR exit('No direct script access allowed');

if(!function_exists('experiencia')){
	//esta função calcula quanto de experiência é necessário para chegar ao lvl indicado
	function experiencia($lvl){
		$sum = 0;

		# APLICAÇÃO DA FÓRMULA

		//efetuo o somatório dos valores
		for ($x = 0; $x < $lvl; $x++) { 
			$sum += floor($x + 400 * (2 ** ($x / 4)));
		}	

		$xp = floor($sum / 4);

		# FIM DA APLICAÇÃO DA FÓRMULA
		//retorno do valor
		return $xp;
	}
}

if(!function_exists('calculaLvl')){
	function calculaLvl($xp){
		$control = 1;
		do{
			$max = experiencia($control);
			$control++;
		}
		while($xp >= $max);
		$min = experiencia($control-2);
		return array(
					'xp'=> $xp,
					'lvl' => $control - 1, 
					'max' => $max, 
					'min' => $min, 
					'diferenca' => $max - $xp, 
					'porcentagem' => floor((($xp - $min) * 100) / ($max - $min))
				);

	}
}


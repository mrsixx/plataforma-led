<?php
/**
*  Helper com funções para formatar um link
*  @author Matheus Antonio
*/
defined('BASEPATH') OR exit('No direct script access allowed');

if(!function_exists('verificaProtocolo')){
	function verificaProtocolo($url){
		//esta função pega uma url digitada e verifica se ela possui o protocolo http, caso não tenha ela adiciona
			$subs = substr($url, 0, 8);
			if($subs !== "https://"){
				$subs = substr($subs, 0, 5);
				if($subs !== "http:"){
					$url = "http://".$url;
				}
			}
			if(substr($url, -1) !== "/")
				$url = $url."/";
	
		return $url;
	}
}

if(!function_exists('verificaUrl')){
	function verificaUrl($url){
		//esta função pega uma url digitada e verifica se ela possui o protocolo http, caso não tenha ela adiciona
		$subs = substr($url, 0, 4);
		if($subs === "http"){
			return true;
		}
		return false;
	}
}
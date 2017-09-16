<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if(!function_exists('strUnique')){
	function strUnique($length = 8){
		$salt = md5(rand());
		$len = strlen($salt);
		$pass = '';
		mt_srand(10000000*(double)microtime());
		for ($i = 0; $i < $length; $i++){
			$pass .= $salt[mt_rand(0,$len - 1)];
		}
		return $pass;
	}
}
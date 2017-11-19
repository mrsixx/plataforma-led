<?php
/**
*  Helper com funções para enviar emails
*  @author Matheus Antonio
*/
defined('BASEPATH') OR exit('No direct script access allowed');

if(!function_exists('envia')){
	function envia($data){
		$email =& get_instance();
		$email->load->library('email');

		$email_config = array(
			            'protocol'  => 'smtp',
			            'smtp_host' => 'ssl://smtp.googlemail.com',
			            'smtp_port' => '465',
			            'smtp_user' => 'ketlyn.choice@gmail.com',
			            'smtp_pass' => '',
			            'wordwrap' => TRUE,
			            'validate' => TRUE,
			            'mailtype'  => 'html',
			            'starttls'  => true,
			            'newline'   => "\r\n"
			        );


        $email->email->initialize($email_config);
		$email->email->from($data['de']);
		$email->email->to($data['para']);
		$email->email->subject($data['assunto']);
		$email->email->message($data['mensagem']);
		if($email->email->send()){
			return true;
		}else{
			return false;
		}
	}
if(!function_exists('msg')){
	function msg($nome, $link, $sexo){
		if($sexo === 'Fem'){
			$sexo = "Bem vinda";
		}else{
			$sexo = "Bem vindo";
		}
		$msg = "
			<html>

				<!DOCTYPE html>
				<html lang='en'>

				<head>
				    <meta charset='utf-8'>
				    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
				    <meta name='viewport' content='width=device-width, initial-scale=1'>
				    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
				    <!--[if lt IE 9]>
				        <script src='https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js'></script>
				        <script src='https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js'></script>
				        <![endif]-->
				</head>
				<style>
				    .wrapper {
				        width: 80%;
				        margin: 5% auto;
				        box-shadow: 0 0 2px #aaa;
				        font-family: Hind;
				        padding-bottom: 10px;
				    }
				    
				    .logo_header {
				        height: 50;
				        padding: 10px;
				    }
				    
				    .email_body {
				        padding: 0 15px;
				    }
				    .top-logo{
				        width: 30px;
				    }
				</style>

				<body>

				    <div class='container'>
				        <div class='row'>

				            <div class='wrapper'>
				                <div class='logo_header bg-primary'>
				                    <a href='seedoconline.com'><img class='top-logo' src='https://uploaddeimagens.com.br/imagens/plataformaled1-png' /></a>
				                    
				                </div>
				                <div class='email_body'>
				                    <h1 class='text-center'>Olá, ".$nome."</h1>
				                    <hr/>                    
				                    <p>
				                       ".$sexo." à Plataforma Led©. Esse é um email para confirmação do seu cadastro,<b> por favor, não responda</b>. Você pode confirmar clicando no botão abaixo.
				                    </p>
				                    <center>
				                        <a class='btn btn-primary' href=".$link." target='_blank'>Certo, vamos lá :D</a>
				                    </center>
				                    <hr/>
				                </div>

				            </div>

				        </div>
				    </div>
				</body>

				</html>

		";
		return $msg;
	}
}
}
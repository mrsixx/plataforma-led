<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'led';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//instalação e configuração da plataforma
$route['instalacao'] = 'led/install';
$route['configuracao'] = 'config';
	$route['configuracao/cadastro-admin'] = 'config/cadastraAdm';
	$route['configuracao/cadastro-admin/reenviar'] = 'config/reenviarEmail';
	$route['configuracao/confirmacao'] = 'config/confirmaEmail';
	$route['configuracao/cadastro-escola'] = 'config/cadastraEscola';
$route['login'] = 'led/login';
$route['logout'] = 'panel/logout';
$route['configuracao-ambiente'] = 'ambiente';
$route['configuracao-ambiente/turma/:num'] = 'ambiente/configTurma';

//cadastro
$route['cadastro/step-2'] = 'cadastro/enviaEmail';
$route['cadastro/confirmacao'] = 'cadastro/validaCad';
$route['cadastro/step-3/:any'] = 'panel/avatar';
//links da interface

//links navbar
$route['painel'] = 'panel';
$route['perfil/:any'] = 'perfil';
$route['busca'] = 'panel/busca';
	$route['alteraAvatar'] = 'perfil/alteraAvatar';
	$route['atualizaPerfil'] = 'perfil/alteraPerfil';
	$route['attFoto'] = 'perfil/alteraFoto';
$route['ajuda'] = 'panel/help';
$route['configuracoes'] = 'panel/settings';

//links sidebar
$route['mural'] = 'panel/mural';
	$route['mural/:num'] = 'posts';
	$route['post/:num'] = 'posts/chamaPostagem/:num';
$route['chat'] = 'chat';
$route['tasks'] = 'task';
	$route['tasks/:num'] = 'task';
	$route['tasks/enviar/:num'] = 'task/enviar';

$route['biblioteca'] = 'biblioteca';
$route['relacao'] = 'relacao';
	$route['relacao/:any'] = 'relacao/listas';
	$route['relacao/alunos/:num'] = 'relacao/turmas';
$route['calendario'] = 'calendario';
$route['ferramentas'] = 'ferramenta';
$route['ferramentas/cadastro'] = 'ferramenta/cadLink';
$route['ferramentas/editar/:num'] = 'ferramenta/edtLink';
$route['ferramentas/:num'] = 'ferramenta/exibeLink';
$route['denuncias'] = 'panel/reports';
$route['componentes'] = 'componente';
	$route['componentes/:num'] = 'componente/carregaComponente';
	$componentes = 'componente/attCriterio';
<?php
/**
*  Helper com funções para gerar script SQL de criação do banco de dados da plataforma dinâmicamente
*  @author Matheus Antonio
*/
defined('BASEPATH') OR exit('No direct script access allowed');

if(!function_exists('cria')){
	function cria($prefix = null){
		$commands = array(
			'aluno-turma' => 'CREATE TABLE IF NOT EXISTS `'.$prefix.'aluno-turma` (
										  `CodAluno` bigint(20) NOT NULL PRIMARY KEY AUTO_INCREMENT,
										  `CodUsuario` bigint(20) NOT NULL,
										  `CodTurma` bigint(20) NOT NULL 
										) ENGINE=InnoDB DEFAULT CHARSET=utf8;',
			'arquivo' => 'CREATE TABLE IF NOT EXISTS `'.$prefix.'arquivo` (
						  `CodArquivo` bigint(20) NOT NULL PRIMARY KEY AUTO_INCREMENT,
						  `Nome` varchar(100) NOT NULL,
						  `Descricao` text,
						  `Link` text NOT NULL,
						  `DataHoraEnvio` datetime NOT NULL,
						  `CodUsuario` bigint(20)
						) ENGINE=InnoDB DEFAULT CHARSET=utf8;',
			'avaliacao' => 'CREATE TABLE IF NOT EXISTS `'.$prefix.'avaliacao` (
							`CodAvaliacao` bigint(20) NOT NULL PRIMARY KEY AUTO_INCREMENT,
							`Avaliacao` tinyint(4) NOT NULL,
							`CodConsultor` bigint(20) NOT NULL,
							`CodUsuario` bigint(20) NOT NULL
							)ENGINE=InnoDB DEFAULT CHARSET=utf8;',	
			'avatar' => 'CREATE TABLE IF NOT EXISTS `'.$prefix.'avatar` (
							`CodAvatar` bigint(20) NOT NULL PRIMARY KEY AUTO_INCREMENT,
							`CodCorpo` bigint(20),
							`CodCabelo` bigint(20),
							`CodRoupa` bigint(20),
							`CodRosto` bigint(20),
							`CodItem` bigint(20)
							) ENGINE=InnoDB DEFAULT CHARSET=utf8;',
			'cabeloavatar' => 'CREATE TABLE IF NOT EXISTS `'.$prefix.'cabeloavatar` (
								`CodCabelo` bigint(20) NOT NULL PRIMARY KEY AUTO_INCREMENT,
								`Descricao` text NOT NULL,
								`Link` text NOT NULL
								) ENGINE=InnoDB DEFAULT CHARSET=utf8;',
			// 'campo' => 'CREATE TABLE IF NOT EXISTS `'.$prefix.'campo` (
			// 			`CodCampo` bigint(20) NOT NULL PRIMARY KEY AUTO_INCREMENT,
			// 			`Questao` longtext NOT NULL,
			// 			`RespostaCerta` longtext,
			// 			`Peso` decimal(10,0) NOT NULL DEFAULT 1,
			// 			`CodTipoCampo` int(11) NOT NULL
			// 			 )ENGINE=InnoDB DEFAULT CHARSET=utf8;',
			'comentario' => 'CREATE TABLE IF NOT EXISTS `'.$prefix.'comentario` (
							`CodComentario` bigint(20) NOT NULL PRIMARY KEY AUTO_INCREMENT,
							`Comentario` text NOT NULL,
							`DataHora` datetime NOT NULL,
							`CodPostagem` bigint(20) NOT NULL,
							`CodUsuario` bigint(20) NOT NULL
							) ENGINE=InnoDB DEFAULT CHARSET=utf8;',
			'compcurricular' => 'CREATE TABLE IF NOT EXISTS `'.$prefix.'compcurricular` (
								`CodComponente` bigint(20) NOT NULL PRIMARY KEY AUTO_INCREMENT,
								`Nome` varchar(100) NOT NULL,
								`Sigla` varchar(10) NOT NULL,
								`CriteriosAvaliacao` text
								) ENGINE=InnoDB DEFAULT CHARSET=utf8;',
			'componente-turma' => 'CREATE TABLE IF NOT EXISTS `'.$prefix.'componente-turma` (
									`CodCompTurma` bigint(20) NOT NULL PRIMARY KEY AUTO_INCREMENT,
									`CodTurma` bigint(20) NOT NULL,
									`CodComponente` bigint(20) NOT NULL
									) ENGINE=InnoDB DEFAULT CHARSET=utf8;',
			'componente-professor' => 'CREATE TABLE IF NOT EXISTS `'.$prefix.'componente-professor` (
									`CodCompProfessor` bigint(20) NOT NULL PRIMARY KEY AUTO_INCREMENT,
								    `CodComponente` bigint(20) NOT NULL,
								    `CriteriosAvaliacao` text,
								    `CodProfessor` bigint(20)
									) ENGINE=InnoDB DEFAULT CHARSET=utf8;',
			'competencia' => 'CREATE TABLE IF NOT EXISTS `'.$prefix.'competencia` (
								`CodCompetencia` bigint(20) NOT NULL PRIMARY KEY AUTO_INCREMENT,
								`CodTask` bigint(20) NOT NULL,
								`CodInteligencia` int(11) NOT NULL
								) ENGINE=InnoDB DEFAULT CHARSET=utf8;',
			'componente' => 'CREATE TABLE IF NOT EXISTS `'.$prefix.'componente` (
							`CodComponente` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
							`Nome` varchar(50) NOT NULL,
							`Status` tinyint(1) NOT NULL
							) ENGINE=InnoDB DEFAULT CHARSET=utf8;',
			'configuracao' => 'CREATE TABLE IF NOT EXISTS `'.$prefix.'configuracao` (
								`CodConfig` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
								`Nome` varchar(20) NOT NULL,
								`Valor` text NOT NULL
								) ENGINE=InnoDB DEFAULT CHARSET=utf8;',
			'conquista' => 'CREATE TABLE IF NOT EXISTS `'.$prefix.'conquista` (
							`CodConquista` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
							`DataConquista` date NOT NULL,
							`CodInsignia` int(11) NOT NULL,
							`CodUsuario` bigint(20) NOT NULL
							) ENGINE=InnoDB DEFAULT CHARSET=utf8;',
			'consultoria' => 'CREATE TABLE IF NOT EXISTS `'.$prefix.'consultoria` (
								`CodConsultoria` bigint(20) NOT NULL PRIMARY KEY AUTO_INCREMENT,
								`DataHoraConsultoria` datetime NOT NULL,
								`Resposta` text NOT NULL,
								`CodDuvida` bigint(20) NOT NULL,
								`CodConsultor` bigint(20) NOT NULL
								) ENGINE=InnoDB DEFAULT CHARSET=utf8;',
			'corpoavatar' => 'CREATE TABLE IF NOT EXISTS `'.$prefix.'corpoavatar` (
								`CodCorpo` bigint(20) NOT NULL PRIMARY KEY AUTO_INCREMENT,
								`Descricao` text NOT NULL,
								`Link` text NOT NULL
								) ENGINE=InnoDB DEFAULT CHARSET=utf8;',
			'curso' => 'CREATE TABLE IF NOT EXISTS `'.$prefix.'curso` (
						`CodCurso` bigint(20) NOT NULL PRIMARY KEY AUTO_INCREMENT,
					  	`Nome` varchar(150) NOT NULL,
					  	`Status` tinyint(1) NOT NULL,
					  	`SerieInicial` int(11) NOT NULL,
					  	`SerieFinal` int(11) NOT NULL,
					  	`Descricao` text
						) ENGINE=InnoDB DEFAULT CHARSET=utf8;',
			'desempenha-task' => 'CREATE TABLE IF NOT EXISTS `'.$prefix.'desempenha-task` (
									`CodDesempenho` bigint(20) NOT NULL PRIMARY KEY AUTO_INCREMENT,
									`DataInicio` datetime NOT NULL,
									`CaminhoArquivo` text NOT NULL,
									`Status` tinyint(1) DEFAULT "0",
									`CodTask` bigint(20) NOT NULL,
									`CodUsuario` bigint(20) NOT NULL
									) ENGINE=InnoDB DEFAULT CHARSET=utf8;',
			'dica' => 'CREATE TABLE IF NOT EXISTS `'.$prefix.'dica` (
									`CodDica` bigint(20) NOT NULL PRIMARY KEY AUTO_INCREMENT,
								    `Dica` text NOT NULL,
								    `Painel` text NOT NULL,
								    `TipoUsuario` tinyint(1)
									) ENGINE=InnoDB DEFAULT CHARSET=utf8;',
			'duvida' => 'CREATE TABLE IF NOT EXISTS `'.$prefix.'duvida` (
						`CodDuvida` bigint(20) NOT NULL PRIMARY KEY AUTO_INCREMENT,
						`Titulo` varchar(200) NOT NULL,
						`DataHora` datetime NOT NULL,
						`Conteudo` text,
						`CodCompCurricular` bigint(20) NOT NULL,
						`CodCriador` bigint(20) NOT NULL
						) ENGINE=InnoDB DEFAULT CHARSET=utf8;',
			// 'equipe' => 'CREATE TABLE IF NOT EXISTS `'.$prefix.'equipe` (
			// 			`CodEquipe` bigint(20) NOT NULL PRIMARY KEY AUTO_INCREMENT,
			// 			`Nome` varchar(200) DEFAULT NULL,
			// 			`CaminhoArquivo` text,
			// 			`CodTask` bigint(20) NOT NULL
			// 			) ENGINE=InnoDB DEFAULT CHARSET=utf8;',
			'escola' => 'CREATE TABLE IF NOT EXISTS `'.$prefix.'escola` (
						`CodEscola` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
						`Nome` varchar(50) NOT NULL,
						`DataFundacao` date,
						`Rua` varchar(50) NOT NULL,
						`Bairro` varchar(50) NOT NULL,
						`Cep` varchar(9),
						`Cidade` varchar(50) NOT NULL,
						`Estado` char(2) NOT NULL,
						`Website` text
						) ENGINE=InnoDB DEFAULT CHARSET=utf8;',
			'evento' => 'CREATE TABLE IF NOT EXISTS `'.$prefix.'evento` (
						`CodEvento` bigint(20) NOT NULL PRIMARY KEY AUTO_INCREMENT,
						`Data` date NOT NULL,
						`Local` text,
						`Hora` time,
						`Descricao` text NOT NULL,
						`Duracao` int(11),
						`CriadoPor` bigint(20),
						`CodTipoEvento` int(11) NOT NULL
						) ENGINE=InnoDB DEFAULT CHARSET=utf8;',
			'experiencia' => "CREATE TABLE IF NOT EXISTS `".$prefix."experiencia` (
								`CodUsuario` bigint(20) NOT NULL PRIMARY KEY AUTO_INCREMENT,
								`PontosXP` bigint(20) NOT NULL DEFAULT '0',
								`QtdCinestesica` bigint(20) NOT NULL DEFAULT '0',
								`QtdEspacial` bigint(20) NOT NULL DEFAULT '0',
								`QtdExistencial` bigint(20) NOT NULL DEFAULT '0',
								`QtdInterpessoal` bigint(20) NOT NULL DEFAULT '0',
								`QtdIntrapessoal` bigint(20) NOT NULL DEFAULT '0',
								`QtdLinguistica` bigint(20) NOT NULL DEFAULT '0',
								`QtdLogicoMat` bigint(20) NOT NULL DEFAULT '0',
								`QtdMusical` bigint(20) NOT NULL DEFAULT '0',
								`QtdNaturalista` bigint(20) NOT NULL DEFAULT '0',
								`QtdPratica` bigint(20) NOT NULL DEFAULT '0'
								) ENGINE=InnoDB DEFAULT CHARSET=utf8;",
			// 'form-campo' => 'CREATE TABLE IF NOT EXISTS `'.$prefix.'form-campo` (
			// 				`CodFormCampo` bigint(20) NOT NULL PRIMARY KEY AUTO_INCREMENT,
			// 				`CodForm` bigint(20) NOT NULL,
			// 				`CodCampo` bigint(20) NOT NULL
			// 				) ENGINE=InnoDB DEFAULT CHARSET=utf8;',
			// 'formulario' => 'CREATE TABLE IF NOT EXISTS `'.$prefix.'formulario` (
			// 				`CodForm` bigint(20) NOT NULL PRIMARY KEY AUTO_INCREMENT,
			// 				`Duracao` int(11) DEFAULT NULL
			// 				) ENGINE=InnoDB DEFAULT CHARSET=utf8;',
			'grupo' => 'CREATE TABLE IF NOT EXISTS `'.$prefix.'grupo` (
						`CodGrupo` bigint(20) NOT NULL PRIMARY KEY AUTO_INCREMENT,
						`Nome` varchar(150) NOT NULL,
						`CodCriador` bigint(20),
						`DataCriacao` date NOT NULL,
						`CodCurso` bigint(20),
						`CodTurma` bigint(20)
						) ENGINE=InnoDB DEFAULT CHARSET=utf8;',
			'hierarquia' => "CREATE TABLE IF NOT EXISTS `".$prefix."hierarquia` (
							`CodHierarquia` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
							`Nome` varchar(50) NOT NULL,
							`Descricao` varchar(200),
							`Nivel` int(11) NOT NULL
							) ENGINE=InnoDB DEFAULT CHARSET=utf8;",

			'insignia' => 'CREATE TABLE IF NOT EXISTS `'.$prefix.'insignia` (
						  `CodInsignia` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
						  `Nome` varchar(100) NOT NULL,
						  `Descricao` text NOT NULL,
						  `Link` text NOT NULL
						) ENGINE=InnoDB DEFAULT CHARSET=utf8;',

			'inteligencia' => 'CREATE TABLE IF NOT EXISTS `'.$prefix.'inteligencia` (
								`CodInteligencia` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
								`Nome` varchar(20) NOT NULL,
								`Descricao` text NOT NULL,
								`Icon` varchar(200) NOT NULL,
								`Classe` varchar(200) NOT NULL,
								`ProgressBar` varchar(200) NOT NULL
								) ENGINE=InnoDB DEFAULT CHARSET=utf8;',

			'itemavatar' => 'CREATE TABLE IF NOT EXISTS `'.$prefix.'itemavatar` (
							`CodItem` bigint(20) NOT NULL PRIMARY KEY AUTO_INCREMENT,
							`Descricao` text NOT NULL,
							`Link` text NOT NULL
							) ENGINE=InnoDB DEFAULT CHARSET=utf8;',
			'linkexterno' => 'CREATE TABLE IF NOT EXISTS `'.$prefix.'linkexterno` (
								`CodLink` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
								`Nome` varchar(100) NOT NULL,
								`Descricao` text,
								`Link` text NOT NULL
								) ENGINE=InnoDB DEFAULT CHARSET=utf8;',
			
			'mensagem' => 'CREATE TABLE IF NOT EXISTS `'.$prefix.'mensagem` (
							`CodMensagem` bigint(20) NOT NULL PRIMARY KEY AUTO_INCREMENT,
							`CodRemetente` bigint(20),
							`CodDestino` bigint(20),
							`CodGrupo` bigint(20),
							`DataHoraEnvio` datetime NOT NULL,
							`Status` tinyint(1) NOT NULL,
							`Imagem` text,
							`Texto` longtext
							) ENGINE=InnoDB DEFAULT CHARSET=utf8;',
			'mural' => 'CREATE TABLE IF NOT EXISTS `'.$prefix.'mural` (
						`CodMural` bigint(20) NOT NULL PRIMARY KEY AUTO_INCREMENT,
						`Nome` varchar(150) NOT NULL,
						`Descricao` text NOT NULL,
					    `CodCurso` bigint(20),
					    `CodTurma` bigint(20)
						) ENGINE=InnoDB DEFAULT CHARSET=utf8;',
			'notificacao' => 'CREATE TABLE IF NOT EXISTS `'.$prefix.'notificacao` (
								`CodNotificacao` bigint(20) NOT NULL PRIMARY KEY AUTO_INCREMENT,
								`Titulo` varchar (50) NOT NULL,
								`Texto` varchar(200) NOT NULL,
								`Status` tinyint(1) NOT NULL DEFAULT 0,
								`DataHora` datetime NOT NULL,
								`Link` varchar(200),
								`CodRemetente` bigint(20),
								`CodDestinatario` bigint(20)
								) ENGINE=InnoDB DEFAULT CHARSET=utf8;',
	        'opiniao' => 'CREATE TABLE IF NOT EXISTS `'.$prefix.'opiniao` (
							`CodOpiniao` bigint(20) NOT NULL PRIMARY KEY AUTO_INCREMENT,
							`CodPost` bigint(20) NOT NULL,
							`CodUsuario` bigint(20) NOT NULL,
							`CodTipoOpiniao` bigint(20) NOT NULL
							) ENGINE=InnoDB DEFAULT CHARSET=utf8;',
			'postagem' => 'CREATE TABLE IF NOT EXISTS `'.$prefix.'postagem` (
							`CodPost` bigint(20) NOT NULL PRIMARY KEY AUTO_INCREMENT,
							`Conteudo` text,
							`DataHora` datetime NOT NULL,
							`Imagem` text,
							`CodMural` bigint(20) NOT NULL,
							`CodUsuario` bigint(20)
							) ENGINE=InnoDB DEFAULT CHARSET=utf8;',
			// 'resposta-campo' => 'CREATE TABLE IF NOT EXISTS `'.$prefix.'resposta-campo` (
			// 					`CodResposta` bigint(20) NOT NULL PRIMARY KEY AUTO_INCREMENT,
			// 					`Resposta` longtext NOT NULL,
			// 					`CodCampo` bigint(20) NOT NULL,
			// 					`CodUsuario` bigint(20) DEFAULT NULL,
			// 					`CodGrupo` bigint(20) DEFAULT NULL
			// 					) ENGINE=InnoDB DEFAULT CHARSET=utf8;',
			'rostoavatar' => 'CREATE TABLE IF NOT EXISTS `'.$prefix.'rostoavatar` (
							`CodRosto` bigint(20) NOT NULL PRIMARY KEY AUTO_INCREMENT,
							`Descricao` text NOT NULL,
							`Link` text NOT NULL
							) ENGINE=InnoDB DEFAULT CHARSET=utf8;',
			'roupaavatar' => 'CREATE TABLE IF NOT EXISTS `'.$prefix.'roupaavatar` (
								`CodRoupa` bigint(20) NOT NULL PRIMARY KEY AUTO_INCREMENT,
								`Descricao` text NOT NULL,
								`Link` text NOT NULL
								) ENGINE=InnoDB DEFAULT CHARSET=utf8;',
			'task' => "CREATE TABLE IF NOT EXISTS `".$prefix."task` (
						`CodTask` bigint(20) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    					`Nome` varchar(50) NOT NULL,
						`Descricao` text NOT NULL,
						`CaminhoArquivo` text,
						`Prazo` datetime NOT NULL,
						`Data` datetime NOT NULL,
						`CodCriador` bigint(20),
						`CodTipoTask` bigint(20) NOT NULL
						) ENGINE=InnoDB DEFAULT CHARSET=utf8;",

			// 'tipocampo' => "CREATE TABLE IF NOT EXISTS `".$prefix."tipocampo` (
			// 				`CodTipoCampo` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
			// 				`Nome` varchar(200) NOT NULL,
			// 				`TipoCampo` enum('inputText','optionGroup','textArea','cxSelecao') NOT NULL
			// 				) ENGINE=InnoDB DEFAULT CHARSET=utf8;",
			'tipoevento' => 'CREATE TABLE IF NOT EXISTS `'.$prefix.'tipoevento` (
							`CodTipoEvento` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
							`Nome` varchar(10) NOT NULL,
							`Cor` varchar(7) NOT NULL,
							`Valor` text NOT NULL
							) ENGINE=InnoDB DEFAULT CHARSET=utf8;',
			'tipoopiniao' => 'CREATE TABLE IF NOT EXISTS `'.$prefix.'tipoopiniao` (
								`CodTipoOpiniao` bigint(20) NOT NULL PRIMARY KEY AUTO_INCREMENT,
								`Descricao` text NOT NULL
								) ENGINE=InnoDB DEFAULT CHARSET=utf8;',
			'tipotask' => "CREATE TABLE IF NOT EXISTS `".$prefix."tipotask` (
							`CodTipoTask` bigint(20) NOT NULL PRIMARY KEY AUTO_INCREMENT,
							`Nome` varchar(20) NOT NULL,
							`Premio` decimal(10,0) NOT NULL,
							`Dificuldade` enum('Bronze','Prata','Ouro','Platina') NOT NULL
							) ENGINE=InnoDB DEFAULT CHARSET=utf8;",
			'tipousuario' => 'CREATE TABLE IF NOT EXISTS `'.$prefix.'tipousuario` (
								`CodTipoUsuario` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
								`Nome` varchar(50) NOT NULL,
								`Descricao` text NOT NULL
								) ENGINE=InnoDB DEFAULT CHARSET=utf8;',

			'turma' => "CREATE TABLE IF NOT EXISTS `".$prefix."turma` (
						`CodTurma` bigint(20) NOT NULL PRIMARY KEY AUTO_INCREMENT,
						`Modulo` int(11) NOT NULL,
						`NomeTurma` varchar(20) NOT NULL,
					    `InicioLetivo` date NOT NULL,
					    `FimLetivo` date NOT NULL,
						`Periodo` enum('Integral','Matutino','Vespertino','Noturno') NOT NULL,
						`QtdAlunos` int(11) NOT NULL,
						`CodCurso` bigint(20) NOT NULL
						) ENGINE=InnoDB DEFAULT CHARSET=utf8;",

			'turma-task' => "CREATE TABLE IF NOT EXISTS `".$prefix."turma-task` (
						`CodTurmaTask` bigint(20) NOT NULL PRIMARY KEY AUTO_INCREMENT,
						`CodTurma` bigint(20) NOT NULL,
						`CodTask` bigint(20) NOT NULL,
						`CodComponente` bigint(20) NOT NULL
						) ENGINE=InnoDB DEFAULT CHARSET=utf8;", 

			'usuario' => "CREATE TABLE IF NOT EXISTS `".$prefix."usuario` (
							`CodUsuario` bigint(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
						    `Email` varchar(100) NOT NULL DEFAULT 'led',
						    `Senha` varchar(255) NOT NULL DEFAULT 'led',
						    `Nome` varchar(50) NOT NULL DEFAULT 'led',
						    `Sobrenome` varchar(50) NOT NULL DEFAULT 'led',
						    `Nickname` varchar(10) NOT NULL DEFAULT 'led',
						    `DataNascimento` date NOT NULL DEFAULT '0000-00-00',
						    `DataCadastro` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
						    `Foto` text, 
						    `Sexo` enum('F','M','?') NOT NULL DEFAULT '?',
						    `Cidade` varchar(50),
						    `Status` tinyint(1) NOT NULL DEFAULT '0',
						    `HorarioLimite` datetime, 
						    `Token` varchar(8) NOT NULL,
						    `TokenPai` varchar(8),
						    `QtdConsultorias` int(11) NOT NULL DEFAULT '0',
						    `UltimoLogin` datetime,
						    `CodTipoUsuario` int(11) NOT NULL,
						    `CodAvatar` bigint(20),
						    `CodHierarquia` int(11)
							) ENGINE=InnoDB DEFAULT CHARSET=utf8;",
			// 'usuarioequipe' => 'CREATE TABLE IF NOT EXISTS `'.$prefix.'usuario-equipe` (
			// 					`CodUsuarioEquipe` bigint(20) NOT NULL PRIMARY KEY AUTO_INCREMENT,
			// 					`CodUsuario` bigint(20) NOT NULL,
			// 					`CodEquipe` bigint(20) NOT NULL
			// 					) ENGINE=InnoDB DEFAULT CHARSET=utf8;',
			'usuariogrupo' => 'CREATE TABLE IF NOT EXISTS `'.$prefix.'usuario-grupo` (
								`CodUsuarioGrupo` bigint(20) NOT NULL PRIMARY KEY AUTO_INCREMENT,
								`DataEntrada` date NOT NULL,
								`Admin` tinyint(1) NOT NULL DEFAULT 0,
								`CodUsuario` bigint(20) NOT NULL,
								`CodGrupo` bigint(20) NOT NULL
								) ENGINE=InnoDB DEFAULT CHARSET=utf8;',
			'usuariomural' => 'CREATE TABLE IF NOT EXISTS `'.$prefix.'usuario-mural` (
								`CodUsuarioMural` bigint(20) NOT NULL PRIMARY KEY AUTO_INCREMENT,
								`DataEntrada` date NOT NULL,
								`CodUsuario` bigint(20) NOT NULL,
								`CodMural` bigint(20) NOT NULL
								) ENGINE=InnoDB DEFAULT CHARSET=utf8;'
			);
		return $commands;
	}
}

if(!function_exists('relaciona')){
	function relaciona($prefix){
		$commands = array(
			'aluno-turma' => 'ALTER TABLE `'.$prefix.'aluno-turma`
							  	ADD CONSTRAINT `fk-turma-usuario` FOREIGN KEY (`CodTurma`) REFERENCES `'.$prefix.'turma` (`CodTurma`) ON DELETE CASCADE ON UPDATE CASCADE,
							  	ADD CONSTRAINT `fk-usuario-turma` FOREIGN KEY (`CodUsuario`) REFERENCES `'.$prefix.'usuario` (`CodUsuario`) ON DELETE CASCADE ON UPDATE CASCADE;',

			'arquivo' => 'ALTER TABLE `'.$prefix.'arquivo`
  								ADD CONSTRAINT `fk-usuarioenviou` FOREIGN KEY (`CodUsuario`) REFERENCES `'.$prefix.'usuario` (`CodUsuario`) ON DELETE SET NULL ON UPDATE CASCADE;',

			'avaliacao' => 'ALTER TABLE `'.$prefix.'avaliacao`
								  ADD CONSTRAINT `fk-avaliacao` FOREIGN KEY (`CodUsuario`) REFERENCES `'.$prefix.'usuario` (`CodUsuario`) ON DELETE CASCADE ON UPDATE CASCADE,
								  ADD CONSTRAINT `fk-avaliado` FOREIGN KEY (`CodConsultor`) REFERENCES `'.$prefix.'usuario` (`CodUsuario`) ON DELETE CASCADE ON UPDATE CASCADE;',

			'avatar' => 'ALTER TABLE `'.$prefix.'avatar`
								  ADD CONSTRAINT `fk-cabeloavatar` FOREIGN KEY (`CodCabelo`) REFERENCES `'.$prefix.'cabeloavatar` (`CodCabelo`) ON DELETE SET NULL ON UPDATE CASCADE,
								  ADD CONSTRAINT `fk-corpoavatar` FOREIGN KEY (`CodCorpo`) REFERENCES `'.$prefix.'corpoavatar` (`CodCorpo`) ON DELETE SET NULL ON UPDATE CASCADE,
								  ADD CONSTRAINT `fk-itemavatar` FOREIGN KEY (`CodItem`) REFERENCES `'.$prefix.'itemavatar` (`CodItem`) ON DELETE SET NULL ON UPDATE CASCADE,
								  ADD CONSTRAINT `fk-rostoavatar` FOREIGN KEY (`CodRosto`) REFERENCES `'.$prefix.'rostoavatar` (`CodRosto`) ON DELETE SET NULL ON UPDATE CASCADE,
								  ADD CONSTRAINT `fk-roupaavatar` FOREIGN KEY (`CodRoupa`) REFERENCES `'.$prefix.'roupaavatar` (`CodRoupa`) ON DELETE SET NULL ON UPDATE CASCADE;',

			// 'campo' => 'ALTER TABLE `'.$prefix.'campo`
  	// 							ADD CONSTRAINT `fk-tipocampo` FOREIGN KEY (`CodTipoCampo`) REFERENCES `'.$prefix.'tipocampo` (`CodTipoCampo`) ON DELETE CASCADE ON UPDATE CASCADE;',

			'comentario' => 'ALTER TABLE `'.$prefix.'comentario`
								  ADD CONSTRAINT `fk-postagem` FOREIGN KEY (`CodPostagem`) REFERENCES `'.$prefix.'postagem` (`CodPost`) ON DELETE CASCADE ON UPDATE CASCADE,
								  ADD CONSTRAINT `fk-usuariocomentario` FOREIGN KEY (`CodUsuario`) REFERENCES `'.$prefix.'usuario` (`CodUsuario`) ON DELETE CASCADE ON UPDATE CASCADE;',

			'componente-professor' => 'ALTER TABLE `'.$prefix.'componente-professor`
     							ADD CONSTRAINT `fk-compcurricular` FOREIGN KEY (`CodComponente`) REFERENCES `'.$prefix.'compcurricular` (`CodComponente`) ON DELETE CASCADE ON UPDATE CASCADE,
  								ADD CONSTRAINT `fk-professor` FOREIGN KEY (`CodProfessor`) REFERENCES `'.$prefix.'usuario` (`CodUsuario`) ON DELETE CASCADE ON UPDATE CASCADE;',

			'competencia' => 'ALTER TABLE `'.$prefix.'competencia`
								  ADD CONSTRAINT `fk-inteligencia` FOREIGN KEY (`CodInteligencia`) REFERENCES `'.$prefix.'inteligencia` (`CodInteligencia`),
								  ADD CONSTRAINT `fk-task` FOREIGN KEY (`CodTask`) REFERENCES `'.$prefix.'task` (`CodTask`) ON DELETE CASCADE ON UPDATE CASCADE;',

			'componente-turma' => 'ALTER TABLE `'.$prefix.'componente-turma`
								  ADD CONSTRAINT `fk-componente-turma` FOREIGN KEY (`CodComponente`) REFERENCES `'.$prefix.'compcurricular` (`CodComponente`) ON UPDATE CASCADE ON DELETE CASCADE,
  									ADD CONSTRAINT `fk-turma-componente` FOREIGN KEY (`CodTurma`) REFERENCES `'.$prefix.'turma` (`CodTurma`) ON DELETE CASCADE ON UPDATE CASCADE;',
			
			'conquista' => 'ALTER TABLE `'.$prefix.'conquista`
								  ADD CONSTRAINT `fk-insignia` FOREIGN KEY (`CodInsignia`) REFERENCES `'.$prefix.'insignia` (`CodInsignia`) ON DELETE CASCADE ON UPDATE CASCADE,
								  ADD CONSTRAINT `fk-usuarioconquista` FOREIGN KEY (`CodUsuario`) REFERENCES `'.$prefix.'usuario` (`CodUsuario`) ON DELETE CASCADE ON UPDATE CASCADE;',
			
			'consultoria' => 'ALTER TABLE `'.$prefix.'consultoria`
								  ADD CONSTRAINT `fk-consultor` FOREIGN KEY (`CodConsultor`) REFERENCES `'.$prefix.'usuario` (`CodUsuario`) ON DELETE CASCADE ON UPDATE CASCADE,
								  ADD CONSTRAINT `fk-duvida` FOREIGN KEY (`CodDuvida`) REFERENCES `'.$prefix.'duvida` (`CodDuvida`) ON DELETE CASCADE ON UPDATE CASCADE;',
			
			'desempenha-task' => 'ALTER TABLE `'.$prefix.'desempenha-task`
								  ADD CONSTRAINT `fk-taskdesempenhada` FOREIGN KEY (`CodTask`) REFERENCES `'.$prefix.'task` (`CodTask`) ON DELETE CASCADE ON UPDATE CASCADE,
								  ADD CONSTRAINT `fk-usuariodesempenhou` FOREIGN KEY (`CodUsuario`) REFERENCES `'.$prefix.'usuario` (`CodUsuario`) ON DELETE CASCADE ON UPDATE CASCADE;',
			
			'duvida' => 'ALTER TABLE `'.$prefix.'duvida`
								  ADD CONSTRAINT `fk-compcurricular-duvida` FOREIGN KEY (`CodCompCurricular`) REFERENCES `'.$prefix.'compcurricular` (`CodComponente`) ON DELETE CASCADE ON UPDATE CASCADE,
								  ADD CONSTRAINT `fk-criadorduvida` FOREIGN KEY (`CodCriador`) REFERENCES `'.$prefix.'usuario` (`CodUsuario`) ON DELETE CASCADE ON UPDATE CASCADE;',
											
			// 'equipe' => 'ALTER TABLE `'.$prefix.'equipe`
  	// 							ADD CONSTRAINT `fk-equipetask` FOREIGN KEY (`CodTask`) REFERENCES `'.$prefix.'task` (`CodTask`) ON DELETE CASCADE ON UPDATE CASCADE;',
			
			'evento' => 'ALTER TABLE `'.$prefix.'evento`
							ADD CONSTRAINT `fk-criadorevento` FOREIGN KEY (`CriadoPor`) REFERENCES `'.$prefix.'usuario` (`CodUsuario`) ON DELETE CASCADE ON UPDATE CASCADE,
							ADD CONSTRAINT `fk-tipoevento` FOREIGN KEY (`CodTipoEvento`) REFERENCES `'.$prefix.'tipoevento` (`CodTipoEvento`);',
			
			'experiencia' => 'ALTER TABLE `'.$prefix.'experiencia`
  								ADD CONSTRAINT `fk-xp` FOREIGN KEY (`CodUsuario`) REFERENCES `'.$prefix.'usuario` (`CodUsuario`) ON DELETE CASCADE ON UPDATE CASCADE;',
			
			// 'form-campo' => 'ALTER TABLE `'.$prefix.'form-campo`
			// 					  ADD CONSTRAINT `fk-campoform` FOREIGN KEY (`CodCampo`) REFERENCES `'.$prefix.'campo` (`CodCampo`) ON DELETE CASCADE ON UPDATE CASCADE,
			// 					  ADD CONSTRAINT `fk-formcampo` FOREIGN KEY (`CodForm`) REFERENCES `'.$prefix.'formulario` (`CodForm`) ON DELETE CASCADE ON UPDATE CASCADE;',
			
			'grupo' => 'ALTER TABLE `'.$prefix.'grupo`
  								ADD CONSTRAINT `fk-criadorgrupo` FOREIGN KEY (`CodCriador`) REFERENCES `'.$prefix.'usuario` (`CodUsuario`) ON DELETE SET NULL ON UPDATE CASCADE,
								ADD CONSTRAINT `fk-grupocurso` FOREIGN KEY (`CodCurso`) REFERENCES `'.$prefix.'curso` (`CodCurso`) ON DELETE CASCADE ON UPDATE CASCADE,
								ADD CONSTRAINT `fk-grupoturma` FOREIGN KEY (`CodTurma`) REFERENCES `'.$prefix.'turma` (`CodTurma`) ON DELETE CASCADE ON UPDATE CASCADE;',
			
			'mensagem' => 'ALTER TABLE `'.$prefix.'mensagem`
								  ADD CONSTRAINT `fk-destinomsg` FOREIGN KEY (`CodDestino`) REFERENCES `'.$prefix.'usuario` (`CodUsuario`) ON DELETE CASCADE ON UPDATE CASCADE,
								  ADD CONSTRAINT `fk-grupomsg` FOREIGN KEY (`CodGrupo`) REFERENCES `'.$prefix.'grupo` (`CodGrupo`) ON DELETE CASCADE ON UPDATE CASCADE,
								  ADD CONSTRAINT `fk-remetentemsg` FOREIGN KEY (`CodRemetente`) REFERENCES `'.$prefix.'usuario` (`CodUsuario`) ON DELETE SET NULL ON UPDATE CASCADE;',

			'mural' => 'ALTER TABLE `'.$prefix.'mural`
								ADD CONSTRAINT `fk-muralcurso` FOREIGN KEY (`CodCurso`) REFERENCES `'.$prefix.'curso` (`CodCurso`) ON DELETE CASCADE ON UPDATE CASCADE,
								ADD CONSTRAINT `fk-muralturma` FOREIGN KEY (`CodTurma`) REFERENCES `'.$prefix.'turma` (`CodTurma`) ON DELETE CASCADE ON UPDATE CASCADE;',
			
			'notificacao' => 'ALTER TABLE `'.$prefix.'notificacao`
								  ADD CONSTRAINT `fk-destinatarionotificacao` FOREIGN KEY (`CodDestinatario`) REFERENCES `'.$prefix.'usuario` (`CodUsuario`) ON DELETE CASCADE ON UPDATE CASCADE,
								  ADD CONSTRAINT `fk-remetentenotificacao` FOREIGN KEY (`CodRemetente`) REFERENCES `'.$prefix.'usuario` (`CodUsuario`) ON DELETE CASCADE ON UPDATE CASCADE;',
			
			'opiniao' => 'ALTER TABLE `'.$prefix.'opiniao`
								  ADD CONSTRAINT `fk-post` FOREIGN KEY (`CodPost`) REFERENCES `'.$prefix.'postagem` (`CodPost`) ON DELETE CASCADE ON UPDATE CASCADE,
								  ADD CONSTRAINT `fk-tipoopiniao` FOREIGN KEY (`CodTipoOpiniao`) REFERENCES `'.$prefix.'tipoopiniao` (`CodTipoOpiniao`),
								  ADD CONSTRAINT `fk-usuario` FOREIGN KEY (`CodUsuario`) REFERENCES `'.$prefix.'usuario` (`CodUsuario`) ON DELETE NO ACTION ON UPDATE CASCADE;',
			
			'postagem' => 'ALTER TABLE `'.$prefix.'postagem`
								  ADD CONSTRAINT `fk-criadorpost` FOREIGN KEY (`CodUsuario`) REFERENCES `'.$prefix.'usuario` (`CodUsuario`) ON DELETE SET NULL ON UPDATE CASCADE,
								  ADD CONSTRAINT `fk-mural` FOREIGN KEY (`CodMural`) REFERENCES `'.$prefix.'mural` (`CodMural`) ON DELETE CASCADE ON UPDATE CASCADE;',
			
			// 'resposta-campo' => 'ALTER TABLE `'.$prefix.'resposta-campo`
			// 					  ADD CONSTRAINT `fk-responderamcampo` FOREIGN KEY (`CodGrupo`) REFERENCES `'.$prefix.'equipe` (`CodEquipe`) ON DELETE CASCADE ON UPDATE CASCADE,
			// 					  ADD CONSTRAINT `fk-respondeucampo` FOREIGN KEY (`CodUsuario`) REFERENCES `'.$prefix.'usuario` (`CodUsuario`) ON DELETE CASCADE ON UPDATE CASCADE,
			// 					  ADD CONSTRAINT `fk-respostacampo` FOREIGN KEY (`CodCampo`) REFERENCES `'.$prefix.'campo` (`CodCampo`) ON DELETE CASCADE ON UPDATE CASCADE;',
			
			'task' => 'ALTER TABLE `'.$prefix.'task`
								  ADD CONSTRAINT `fk-criadortask` FOREIGN KEY (`CodCriador`) REFERENCES `'.$prefix.'usuario` (`CodUsuario`) ON DELETE SET NULL ON UPDATE CASCADE,
								  ADD CONSTRAINT `fk-tipotask` FOREIGN KEY (`CodTipoTask`) REFERENCES `'.$prefix.'tipotask` (`CodTipoTask`) ON DELETE CASCADE ON UPDATE CASCADE;',
			
			'turma' => 'ALTER TABLE `'.$prefix.'turma`
  								ADD CONSTRAINT `fk-turma-curso` FOREIGN KEY (`CodCurso`) REFERENCES `'.$prefix.'curso` (`CodCurso`) ON DELETE RESTRICT ON UPDATE CASCADE;',
			
			'usuario' => 'ALTER TABLE `'.$prefix.'usuario`
								  ADD CONSTRAINT `fk-avatar` FOREIGN KEY (`CodAvatar`) REFERENCES `'.$prefix.'avatar` (`CodAvatar`) ON UPDATE CASCADE,
								  ADD CONSTRAINT `fk-hierarquia` FOREIGN KEY (`CodHierarquia`) REFERENCES `'.$prefix.'hierarquia` (`CodHierarquia`) ON DELETE CASCADE,
								  ADD CONSTRAINT `fk-tipousuario` FOREIGN KEY (`CodTipoUsuario`) REFERENCES `'.$prefix.'tipousuario` (`CodTipoUsuario`) ON UPDATE CASCADE;',
			
			// 'usuario-equipe' => 'ALTER TABLE `'.$prefix.'usuario-equipe`
			// 					  ADD CONSTRAINT `fk-equipeusuario` FOREIGN KEY (`CodEquipe`) REFERENCES `'.$prefix.'equipe` (`CodEquipe`) ON DELETE CASCADE ON UPDATE CASCADE,
			// 					  ADD CONSTRAINT `fk-usuarioequipe` FOREIGN KEY (`CodUsuario`) REFERENCES `'.$prefix.'usuario` (`CodUsuario`) ON DELETE CASCADE ON UPDATE CASCADE;',

			'usuario-mural' => 'ALTER TABLE `'.$prefix.'usuario-mural`
								  ADD CONSTRAINT `fk-mural-usuario` FOREIGN KEY (`CodMural`) REFERENCES `'.$prefix.'mural` (`CodMural`) ON DELETE CASCADE ON UPDATE CASCADE,
								  ADD CONSTRAINT `fk-usuario-mural` FOREIGN KEY (`CodUsuario`) REFERENCES `'.$prefix.'usuario` (`CodUsuario`) ON DELETE CASCADE ON UPDATE CASCADE;',

			'turma-task' => 'ALTER TABLE `'.$prefix.'turma-task`
								  ADD CONSTRAINT `fk-turma-task` FOREIGN KEY (`CodTurma`) REFERENCES `'.$prefix.'turma` (`CodTurma`) ON DELETE CASCADE ON UPDATE CASCADE,
								  ADD CONSTRAINT `fk-task-turma` FOREIGN KEY (`CodTask`) REFERENCES `'.$prefix.'task` (`CodTask`) ON DELETE CASCADE ON UPDATE CASCADE,
  								  ADD CONSTRAINT `fk-task-componente` FOREIGN KEY (`CodComponente`) REFERENCES `'.$prefix.'compcurricular` (`CodComponente`) ON DELETE CASCADE ON UPDATE CASCADE;'

		);
		return $commands;
	}	
}

if(!function_exists('insere')){
	function insere($prefix){
		$commands = array(

			'tipousuario' => "INSERT INTO `".$prefix."tipousuario` (`CodTipoUsuario`, `Nome`, `Descricao`) 
					 VALUES (NULL, '".utf8_decode("Administrador")."', '".utf8_decode("Usuário com total privilégio dentro da plataforma. Responsável por configurar a estrutura de acordo com o ambiente.")."'),
					 		(NULL, '".utf8_decode("Funcionário")."', '".utf8_decode("Demais funcionários na escola responsáveis por manter o funcionamento da instituição de ensino.")."'),  
					 		(NULL, '".utf8_decode("Alunos")."', '".utf8_decode("Usuário que terá a maior evolução ao utilizar a plataforma, e estará em constante progresso.")."'),
					 		(NULL, '".utf8_decode("Professor")."', '".utf8_decode("Usuário responsável por elaborar tarefas aos alunos, proporcionando a eles adquirir o máximo de conhecimento possível.")."');",

			'dica' => "INSERT INTO `".$prefix."dica` (`Dica`, `Painel`, `TipoUsuario`) 
					 VALUES ('".utf8_decode("O mural é uma ferramenta poderosa para fixar uma ideia com todos ao seu redor. 
Busque ser gentil e educado em suas publicações e comentários com os outros membros, assim eles estarão propensos a encarar melhor suas ideias :D")."', '".utf8_decode("Mural")."', NULL);",
			 		
			'tipotask' => "INSERT INTO `".$prefix."tipotask` (`Nome`, `Premio`, `Dificuldade`) 
					 VALUES ('".utf8_decode("Nível Bronze")."', 5, '".utf8_decode("Bronze")."'),
					 		('".utf8_decode("Nível Prata")."', 10, '".utf8_decode("Prata")."'),  
					 		('".utf8_decode("Nível Ouro")."', 15, '".utf8_decode("Ouro")."'),
					 		('".utf8_decode("Nível Platina")."', 20, '".utf8_decode("Platina")."');",

			'tipoopiniao' => "INSERT INTO `".$prefix."tipoopiniao` (`CodTipoOpiniao`, `Descricao`) 
					 VALUES (NULL, '".utf8_decode("Boa ideia!")."'), (NULL, 'Nada a ver!');",

			'mural' => "INSERT INTO `".$prefix."mural` (`CodMural`, `Nome`, `Descricao`) 
					 VALUES (1, '".utf8_decode("Funcionários")."', '".utf8_decode("Mural destinado aos funcionários da instituição de ensino")."');",

			'inteligencia' => "INSERT INTO `".$prefix."inteligencia` (`CodInteligencia`, `Nome`, `Descricao`,`Icon`,
								`Classe`,`ProgressBar`)
					 VALUES (NULL, '".utf8_decode("Lógico e/ou matemática")."', '".utf8_decode("É o tipo de inteligência ligada à capacidade de raciocínio lógico e resolução de problemas matemáticos. A velocidade de resolução destes problemas é o indicador que determina quanta inteligência lógico-matemática a pessoa tem. O teste de quociente de inteligência (QI) é baseado neste tipo de inteligência e, em menor proporção, na inteligência linguística. Cientistas, economistas, acadêmicos, engenheiros e matemáticos muitas vezes se destacam neste tipo de inteligência.")."', 'fa fa-superscript fa-2x', 'card-logicoMatematica', 'progress-bar-logicoMatematica'),
					 (NULL, '".utf8_decode("Linguística")."', '".utf8_decode("A capacidade de dominar a linguagem e se comunicar com outros é importante em todas as culturas. A inteligência linguística não só se refere à capacidade de comunicação oral, mas a outras formas de comunicação como a escrita, gestual, etc. Quem domina melhor essa capacidade de comunicação possui uma inteligência linguística superior, além de grande expressividade. Também têm um alto grau de atenção e sensibilidade para entender pontos de vista alheios. É uma inteligência fortemente relacionada ao lado esquerdo do cérebro e uma das mais comuns em profissões dentre políticos, escritores, poetas, jornalistas e etc.")."', 'fa fa-comment-o fa-2x', 'card-linguistica', 'progress-bar-linguistica'),
					 (NULL, '".utf8_decode("Espacial ou Visual")."', '".utf8_decode("Resume-se na capacidade de observar o mundo e objetos em diferentes perspectivas. Pessoas que se destacam nessa inteligência, geralmente têm habilidades que lhes permitem criar imagens mentais, desenhar e identificar detalhes, além de um sentimento pessoal de estética. Destacam-se ao desenvolver essa inteligência os profissionais de xadrez e artes visuais, como pintores, fotógrafos, designers, publicitários, arquitetos, e outras profissões que exigem criatividade.")."', 'fa fa-grav fa-2x', 'card-espacial', 'progress-bar-espacial'),
					 (NULL, '".utf8_decode("Corporal e/ou cinestésica")."', '".utf8_decode("É a capacidade de utilizar as habilidades motoras do corpo para utilizar ferramentas (cinestésica) ou para expressar certas emoções (corporal). Pessoas com esse tipo de inteligência possuem grande noção de espaço, distância e profundidade, além de possuir maior controle o próprio corpo do que as outras pessoas. Logo, são capazes de realizar com precisão movimentos complexos, fortes ou até mesmo movimentos sensíveis aos olhos de quem os vê.
						São notáveis neste tipo de inteligência todos aqueles que carecem de usar racionalmente suas capacidades físicas – provenientes de comandos vindos do cerebelo, o trecho do cérebro responsável por movimentos voluntários – com precisão, como dançarinos, atores, atletas e até mesmo cirurgiões e artistas plásticos.")."', 'fa fa-heartbeat fa-2x', 'card-corporalCinestesica', 'progress-bar-corporalCinestesica'),
					 (NULL, '".utf8_decode("Musical")."', '".utf8_decode("Resume-se a capacidade de interpretar e compreender sons e pausas, principalmente quando combinados em ritmo, melodia e harmonia, organizados de forma temporal. Grandes artistas que vão de Mozart a Jimi Hendrix possuem esse tipo de inteligência desde pequenos e quando praticada, o sujeito tende a tocar instrumentos, ler e compor peças musicais com facilidade e abstrair sons que outras pessoas não conseguiriam.")."', 'fa fa-headphones fa-2x', 'card-musical', 'progress-bar-musical'),
					 (NULL, '".utf8_decode("Naturalista")."', '".utf8_decode("Sensibilidade com a natureza, para o entendimento da mesma e desenvolvimento de habilidades biológicas. Algumas personalidades famosas com esse tipo de inteligência são Charles Darwin e Richard Dawkins, por exemplo.")."', 'fa fa-pagelines fa-2x', 'card-naturalista', 'progress-bar-naturalista'),
					 (NULL, '".utf8_decode("Existencial")."', '".utf8_decode("Capacidades filosóficas, como refletir sobre a existência e a vida. Algumas personalidades famosas com esse tipo de inteligência: Nietzsche, Descartes.")."', 'fa fa-sun-o fa-2x', 'card-existencial', 'progress-bar-existencial'),
					 (NULL, '".utf8_decode("Existencial")."', '".utf8_decode("Capacidades filosóficas, como refletir sobre a existência e a vida. Algumas personalidades famosas com esse tipo de inteligência: Nietzsche, Descartes.")."', 'fa fa-sun-o fa-2x', 'card-existencial', 'progress-bar-existencial'),
					 (NULL, '".utf8_decode("Intrapessoal")."', '".utf8_decode("Capacidade de entender a si mesmo, lidar com seus desejos e sonhos, direcionar a própria vida de forma efetiva. É o correlativo interno da inteligência interpessoal.")."', 'fa fa-heart fa-2x', 'card-intrapessoal', 'progress-bar-intrapessoal'),
					 (NULL, '".utf8_decode("Prática")."', '".utf8_decode("Essa inteligência se refere à pessoa ganhar conhecimento vivendo a situação, acaba apreendendo melhor na práxis do que na teoria, o intelecto vinculado à práxis refere-se à totalidade dos elementos cognitivos conquistados na elaboração das tarefas rotineiras.")."', 'fa fa-flash fa-2x', 'card-pratica', 'progress-bar-pratica');"
		);
		return $commands;
	}
}

if(!function_exists('cadAvatar')){
	function cadAvatar($prefix){
		$qtd = 14;
		$corpoavatar = "INSERT INTO `".$prefix."corpoavatar` (`Descricao`, `Link`) 
						 VALUES";
						 for ($i=1; $i <= $qtd; $i++) { 
						 	$corpoavatar.= ($i != 1) ? ", " : ' ';
							$corpoavatar.= "(".utf8_decode("'Modelo de corpo $i'").", 'corpo/corpo(".$i.")')";
						 	$corpoavatar.= ($i == $qtd) ? ";" : ' ';
						}
		$qtd = 82;
		$cabeloavatar = "INSERT INTO `".$prefix."cabeloavatar` (`Descricao`, `Link`) 
						 VALUES";
						 for ($i=1; $i <= $qtd; $i++) { 
						 	$cabeloavatar.= ($i != 1) ? ", " : ' ';
							$cabeloavatar.= "(".utf8_decode("'Modelo de cabelo $i'").", 'cabelo/cabelo (".$i.")')";
						 	$cabeloavatar.= ($i == $qtd) ? ";" : ' ';
						}
		$qtd = 6;
		$itemavatar = "INSERT INTO `".$prefix."itemavatar` (`Descricao`, `Link`) 
						 VALUES";
						 for ($i=1; $i <= $qtd; $i++) { 
						 	$itemavatar.= ($i != 1) ? ", " : ' ';
							$itemavatar.= "(".utf8_decode("'Item $i'").", 'item/item (".$i.")')";
						 	$itemavatar.= ($i == $qtd) ? ";" : ' ';
						}
		$qtd = 27;
		$rostoavatar = "INSERT INTO `".$prefix."rostoavatar` (`Descricao`, `Link`) 
						 VALUES";
						 for ($i=1; $i <= $qtd; $i++) { 
						 	$rostoavatar.= ($i != 1) ? ", " : ' ';
							$rostoavatar.= "(".utf8_decode("'Modelo de rosto $i'").", 'rosto/rosto (".$i.")')";
						 	$rostoavatar.= ($i == $qtd) ? ";" : ' ';
						}
		$qtd = 83;
		$roupaavatar = "INSERT INTO `".$prefix."roupaavatar` (`Descricao`, `Link`) 
						 VALUES";
						 for ($i=1; $i <= $qtd; $i++) { 
						 	$roupaavatar.= ($i != 1) ? ", " : ' ';
							$roupaavatar.= "(".utf8_decode("'Modelo de roupa $i'").", 'roupa/roupa (".$i.")')";
						 	$roupaavatar.= ($i == $qtd) ? ";" : ' ';
						}


		$commands = array(
			'corpoavatar' => $corpoavatar,
			'cabeloavatar' => $cabeloavatar,
			'itemavatar' => $itemavatar,
			'rostoavatar' => $rostoavatar,
			'roupaavatar' => $roupaavatar
						
		);

		return $commands;
	}
}
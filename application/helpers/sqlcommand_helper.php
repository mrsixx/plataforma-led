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
			'campo' => 'CREATE TABLE IF NOT EXISTS `'.$prefix.'campo` (
						`CodCampo` bigint(20) NOT NULL PRIMARY KEY AUTO_INCREMENT,
						`Questao` longtext NOT NULL,
						`RespostaCerta` longtext,
						`Peso` decimal(10,0) NOT NULL DEFAULT 1,
						`CodTipoCampo` int(11) NOT NULL
						 )ENGINE=InnoDB DEFAULT CHARSET=utf8;',
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
								`CriteriosAvaliacao` text,
								`CodProfessor` bigint(20)
								) ENGINE=InnoDB DEFAULT CHARSET=utf8;',
			'componente-turma' => 'CREATE TABLE IF NOT EXISTS `'.$prefix.'componente-turma` (
									`CodCompTurma` bigint(20) NOT NULL PRIMARY KEY AUTO_INCREMENT,
									`CodTurma` bigint(20) NOT NULL,
									`CodComponente` bigint(20) NOT NULL
									) ENGINE=InnoDB DEFAULT CHARSET=utf8;',
			'componente-professor' => 'CREATE TABLE IF NOT EXISTS `'.$prefix.'componente-professor` (
									`CodCompProfessor` bigint(20) NOT NULL PRIMARY KEY AUTO_INCREMENT,
								    `CodUsuario` bigint(20) NOT NULL,
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
									`CodTask` bigint(20) NOT NULL,
									`CodUsuario` bigint(20) NOT NULL
									) ENGINE=InnoDB DEFAULT CHARSET=utf8;',
			'duvida' => 'CREATE TABLE IF NOT EXISTS `'.$prefix.'duvida` (
						`CodDuvida` bigint(20) NOT NULL PRIMARY KEY AUTO_INCREMENT,
						`Titulo` varchar(200) NOT NULL,
						`DataHora` datetime NOT NULL,
						`Conteudo` text,
						`CodCompCurricular` bigint(20) NOT NULL,
						`CodCriador` bigint(20) NOT NULL
						) ENGINE=InnoDB DEFAULT CHARSET=utf8;',
			'equipe' => 'CREATE TABLE IF NOT EXISTS `'.$prefix.'equipe` (
						`CodEquipe` bigint(20) NOT NULL PRIMARY KEY AUTO_INCREMENT,
						`Nome` varchar(200) DEFAULT NULL,
						`CaminhoArquivo` text,
						`CodTask` bigint(20) NOT NULL
						) ENGINE=InnoDB DEFAULT CHARSET=utf8;',
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
			'form-campo' => 'CREATE TABLE IF NOT EXISTS `'.$prefix.'form-campo` (
							`CodFormCampo` bigint(20) NOT NULL PRIMARY KEY AUTO_INCREMENT,
							`CodForm` bigint(20) NOT NULL,
							`CodCampo` bigint(20) NOT NULL
							) ENGINE=InnoDB DEFAULT CHARSET=utf8;',
			'formulario' => 'CREATE TABLE IF NOT EXISTS `'.$prefix.'formulario` (
							`CodForm` bigint(20) NOT NULL PRIMARY KEY AUTO_INCREMENT,
							`Duracao` int(11) DEFAULT NULL
							) ENGINE=InnoDB DEFAULT CHARSET=utf8;',
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
								`Descricao` text NOT NULL
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
			'resposta-campo' => 'CREATE TABLE IF NOT EXISTS `'.$prefix.'resposta-campo` (
								`CodResposta` bigint(20) NOT NULL PRIMARY KEY AUTO_INCREMENT,
								`Resposta` longtext NOT NULL,
								`CodCampo` bigint(20) NOT NULL,
								`CodUsuario` bigint(20) DEFAULT NULL,
								`CodGrupo` bigint(20) DEFAULT NULL
								) ENGINE=InnoDB DEFAULT CHARSET=utf8;',
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
						`Descricao` text NOT NULL,
						`QtdExperiencia` bigint(20) NOT NULL,
						`Prazo` datetime NOT NULL,
						`Realizada` enum('Individual','Grupo') NOT NULL,
						`CodCriador` bigint(20),
						`CodForm`bigint(20),
						`CodTipoTask` bigint(20) NOT NULL
						) ENGINE=InnoDB DEFAULT CHARSET=utf8;",
			'tipocampo' => "CREATE TABLE IF NOT EXISTS `".$prefix."tipocampo` (
							`CodTipoCampo` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
							`Nome` varchar(200) NOT NULL,
							`TipoCampo` enum('inputText','optionGroup','textArea','cxSelecao') NOT NULL
							) ENGINE=InnoDB DEFAULT CHARSET=utf8;",
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
						    `Sexo` enum('F','M','L') NOT NULL DEFAULT 'L',
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
			'usuarioequipe' => 'CREATE TABLE IF NOT EXISTS `'.$prefix.'usuario-equipe` (
								`CodUsuarioEquipe` bigint(20) NOT NULL PRIMARY KEY AUTO_INCREMENT,
								`CodUsuario` bigint(20) NOT NULL,
								`CodEquipe` bigint(20) NOT NULL
								) ENGINE=InnoDB DEFAULT CHARSET=utf8;',
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

			'campo' => 'ALTER TABLE `'.$prefix.'campo`
  								ADD CONSTRAINT `fk-tipocampo` FOREIGN KEY (`CodTipoCampo`) REFERENCES `'.$prefix.'tipocampo` (`CodTipoCampo`) ON DELETE CASCADE ON UPDATE CASCADE;',

			'comentario' => 'ALTER TABLE `'.$prefix.'comentario`
								  ADD CONSTRAINT `fk-postagem` FOREIGN KEY (`CodPostagem`) REFERENCES `'.$prefix.'postagem` (`CodPost`) ON DELETE CASCADE ON UPDATE CASCADE,
								  ADD CONSTRAINT `fk-usuariocomentario` FOREIGN KEY (`CodUsuario`) REFERENCES `'.$prefix.'usuario` (`CodUsuario`) ON DELETE CASCADE ON UPDATE CASCADE;',

			'componente-professor' => 'ALTER TABLE `'.$prefix.'componente-professor`
     							ADD CONSTRAINT `fk-comp` FOREIGN KEY (`CodComponente`) REFERENCES `'.$prefix.'compcurricular` (`CodComponente`) ON DELETE CASCADE ON UPDATE CASCADE,
  								ADD CONSTRAINT `fk-professor` FOREIGN KEY (`CodProfessor`) REFERENCES `'.$prefix.'usuario` (`CodUsuario`) ON DELETE CASCADE ON UPDATE CASCADE',

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
											
			'equipe' => 'ALTER TABLE `'.$prefix.'equipe`
  								ADD CONSTRAINT `fk-equipetask` FOREIGN KEY (`CodTask`) REFERENCES `'.$prefix.'task` (`CodTask`) ON DELETE CASCADE ON UPDATE CASCADE;',
			
			'evento' => 'ALTER TABLE `'.$prefix.'evento`
							ADD CONSTRAINT `fk-criadorevento` FOREIGN KEY (`CriadoPor`) REFERENCES `'.$prefix.'usuario` (`CodUsuario`) ON DELETE CASCADE ON UPDATE CASCADE,
							ADD CONSTRAINT `fk-tipoevento` FOREIGN KEY (`CodTipoEvento`) REFERENCES `'.$prefix.'tipoevento` (`CodTipoEvento`);',
			
			'experiencia' => 'ALTER TABLE `'.$prefix.'experiencia`
  								ADD CONSTRAINT `fk-xp` FOREIGN KEY (`CodUsuario`) REFERENCES `'.$prefix.'usuario` (`CodUsuario`) ON DELETE CASCADE ON UPDATE CASCADE;',
			
			'form-campo' => 'ALTER TABLE `'.$prefix.'form-campo`
								  ADD CONSTRAINT `fk-campoform` FOREIGN KEY (`CodCampo`) REFERENCES `'.$prefix.'campo` (`CodCampo`) ON DELETE CASCADE ON UPDATE CASCADE,
								  ADD CONSTRAINT `fk-formcampo` FOREIGN KEY (`CodForm`) REFERENCES `'.$prefix.'formulario` (`CodForm`) ON DELETE CASCADE ON UPDATE CASCADE;',
			
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
			
			'resposta-campo' => 'ALTER TABLE `'.$prefix.'resposta-campo`
								  ADD CONSTRAINT `fk-responderamcampo` FOREIGN KEY (`CodGrupo`) REFERENCES `'.$prefix.'equipe` (`CodEquipe`) ON DELETE CASCADE ON UPDATE CASCADE,
								  ADD CONSTRAINT `fk-respondeucampo` FOREIGN KEY (`CodUsuario`) REFERENCES `'.$prefix.'usuario` (`CodUsuario`) ON DELETE CASCADE ON UPDATE CASCADE,
								  ADD CONSTRAINT `fk-respostacampo` FOREIGN KEY (`CodCampo`) REFERENCES `'.$prefix.'campo` (`CodCampo`) ON DELETE CASCADE ON UPDATE CASCADE;',
			
			'task' => 'ALTER TABLE `'.$prefix.'task`
								  ADD CONSTRAINT `fk-criadortask` FOREIGN KEY (`CodCriador`) REFERENCES `'.$prefix.'usuario` (`CodUsuario`) ON DELETE SET NULL ON UPDATE CASCADE,
								  ADD CONSTRAINT `fk-formulario` FOREIGN KEY (`CodForm`) REFERENCES `'.$prefix.'formulario` (`CodForm`) ON DELETE SET NULL ON UPDATE CASCADE,
								  ADD CONSTRAINT `fk-tipotask` FOREIGN KEY (`CodTipoTask`) REFERENCES `'.$prefix.'tipotask` (`CodTipoTask`) ON DELETE CASCADE ON UPDATE CASCADE;',
			
			'turma' => 'ALTER TABLE `'.$prefix.'turma`
  								ADD CONSTRAINT `fk-turma-curso` FOREIGN KEY (`CodCurso`) REFERENCES `'.$prefix.'curso` (`CodCurso`) ON DELETE RESTRICT ON UPDATE CASCADE;',
			
			'usuario' => 'ALTER TABLE `'.$prefix.'usuario`
								  ADD CONSTRAINT `fk-avatar` FOREIGN KEY (`CodAvatar`) REFERENCES `'.$prefix.'avatar` (`CodAvatar`) ON UPDATE CASCADE,
								  ADD CONSTRAINT `fk-hierarquia` FOREIGN KEY (`CodHierarquia`) REFERENCES `'.$prefix.'hierarquia` (`CodHierarquia`),
								  ADD CONSTRAINT `fk-tipousuario` FOREIGN KEY (`CodTipoUsuario`) REFERENCES `'.$prefix.'tipousuario` (`CodTipoUsuario`) ON UPDATE CASCADE;',
			
			'usuario-equipe' => 'ALTER TABLE `'.$prefix.'usuario-equipe`
								  ADD CONSTRAINT `fk-equipeusuario` FOREIGN KEY (`CodEquipe`) REFERENCES `'.$prefix.'equipe` (`CodEquipe`) ON DELETE CASCADE ON UPDATE CASCADE,
								  ADD CONSTRAINT `fk-usuarioequipe` FOREIGN KEY (`CodUsuario`) REFERENCES `'.$prefix.'usuario` (`CodUsuario`) ON DELETE CASCADE ON UPDATE CASCADE;',

			'usuario-mural' => 'ALTER TABLE `'.$prefix.'usuario-mural`
								  ADD CONSTRAINT `fk-mural-usuario` FOREIGN KEY (`CodMural`) REFERENCES `'.$prefix.'mural` (`CodMural`) ON DELETE CASCADE ON UPDATE CASCADE,
								  ADD CONSTRAINT `fk-usuario-mural` FOREIGN KEY (`CodUsuario`) REFERENCES `'.$prefix.'usuario` (`CodUsuario`) ON DELETE CASCADE ON UPDATE CASCADE;'
		);
		return $commands;
	}	
}

if(!function_exists('insere')){
	function insere($prefix){
		$commands = array(

			'tipousuario' => "INSERT INTO `".$prefix."tipousuario` (`CodTipoUsuario`, `Nome`, `Descricao`) 
					 VALUES (NULL, '".utf8_decode("Administrador")."', '".utf8_decode("Usuário com total privilégio dentro da plataforma. Responsável por configurar a estrutura de acordo com o ambiente.")."'),
					 		(NULL, '".utf8_decode("Funcionário")."', '".utf8_decode("Usuário responsável por elaborar tarefas aos alunos, proporcionando a eles adquirir o máximo de conhecimento possível.")."'),  
					 		(NULL, '".utf8_decode("Alunos")."', '".utf8_decode("Usuário que terá a maior evolução ao utilizar a plataforma, e estará em constante progresso.")."');",

			// 'cabeloavatar' => "INSERT INTO `".$prefix."cabeloavatar` (`CodCabelo`, `Descricao`, `Link`) 
			// 		 VALUES (NULL, 'Default', 'avatar/cabelo');",

			// 'corpoavatar' => "INSERT INTO `".$prefix."corpoavatar` (`CodCorpo`, `Descricao`, `Link`) 
			// 		 VALUES (NULL, '".utf8_decode('Amarelo')."', 'corpo/corpoavatar(1)'),
			//    			    (NULL, '".utf8_decode('Azul')."', 'corpo/corpoavatar(2)'),
			//    			    (NULL, '".utf8_decode('Rosa')."', 'corpo/corpoavatar(3)'),
			//    			    (NULL, '".utf8_decode('Brasil')."', 'corpo/corpoavatar(4)'),
			//    			    (NULL, '".utf8_decode('Rainbow')."', 'corpo/corpoavatar(5)'),
			//    			    (NULL, '".utf8_decode('Marrom escuro')."', 'corpo/corpoavatar(6)'),
			//    			    (NULL, '".utf8_decode('Verde-musgo')."', 'corpo/corpoavatar(7)'),
			//    			    (NULL, '".utf8_decode('Marrom claro')."', 'corpo/corpoavatar(8)'),
			//    			    (NULL, '".utf8_decode('Cor de pele')."', 'corpo/corpoavatar(9)'),
			//    			    (NULL, '".utf8_decode('Rosa pink')."', 'corpo/corpoavatar(10)'),
			//    			    (NULL, '".utf8_decode('Lilás')."', 'corpo/corpoavatar(11)'),
			//    			    (NULL, '".utf8_decode('Verde')."', 'corpo/corpoavatar(12)'),
			//    			    (NULL, '".utf8_decode('Vinho')."', 'corpo/corpoavatar(13)');",

			// 'itemavatar' => "INSERT INTO `".$prefix."itemavatar` (`CodItem`, `Descricao`, `Link`) 
			// 		 VALUES (NULL, 'Default', 'avatar/item');",

			// 'rostoavatar' => "INSERT INTO `".$prefix."rostoavatar` (`CodRosto`, `Descricao`, `Link`) 
			// 		 VALUES (NULL, 'Default', 'avatar/rosto');",

			// 'roupaavatar' => "INSERT INTO `".$prefix."roupaavatar` (`CodRoupa`, `Descricao`, `Link`) 
			// 		 VALUES (NULL, 'Default', 'avatar/roupa');",

			// 'avatar' => "INSERT INTO `".$prefix."avatar` (`CodAvatar`, `CodCabelo`, `CodCorpo`, `CodItem`, `CodRosto`, `CodRoupa`) 
			// 		 VALUES (NULL, 1, 1, 1, 1, 1);",

			'tipoopiniao' => "INSERT INTO `".$prefix."tipoopiniao` (`CodTipoOpiniao`, `Descricao`) 
					 VALUES (NULL, '".utf8_decode("Boa idéia!")."'), (NULL, 'Nada a ver!');",

			'mural' => "INSERT INTO `".$prefix."mural` (`CodMural`, `Nome`, `Descricao`) 
					 VALUES (1, '".utf8_decode("Funcionários")."', '".utf8_decode("Mural destinado aos funcionários da instituição de ensino")."');",

			'inteligencia' => "INSERT INTO `".$prefix."inteligencia` (`CodInteligencia`, `Nome`, `Descricao`)
					 VALUES (NULL, '".utf8_decode("Lógico­Matemática")."', '".utf8_decode("A capacidade de confrontar e avaliar objetos e abstrações, discernindo as suas relações e princípios subjacentes. Habilidade para raciocínio dedutivo e para solucionar problemas matemáticos. Cientistas possuem esta característica.")."'),

					 (NULL, '".utf8_decode("Musical")."', '".utf8_decode("Identificável pela habilidade para compor e executar padrões musicais, executando pedaços de ouvido, em termos de ritmo e timbre, mas também escutando­os e discernindo­os. Pode estar associada a outras inteligências, como a linguística, espacial ou corporal­cinestésica. É predominante em compositores, maestros, músicos e críticos de música.")."'),

					 (NULL, '".utf8_decode("Espacial'").", '".utf8_decode("Expressa­se pela capacidade de compreender o mundo visual com precisão, permitindo transformar, modificar percepções e recriar experiências visuais até mesmo sem estímulos físicos. É predominante em arquitetos, artistas, escultores, cartógrafos, geógrafos, navegadores e jogadores de xadrez, por exemplo.")."'),

					 (NULL, '".utf8_decode("Corporal­Cinestésica'").", '".utf8_decode("Traduz­se na maior capacidade de controlar e orquestrar movimentos do corpo. É predominante entre atores e aqueles que praticam a dança ou os esportes.")."'),

					 (NULL, '".utf8_decode("Intrapessoal'").", '".utf8_decode("Expressa na capacidade de se conhecer, é a mais rara inteligência sob domínio do ser humano pois está ligada a capacidade de neutralização dos vícios, entendimento de crenças, limites, preocupações, estilo de vida profissional, autocontrole e domínio dos causadores de estresse.")."'),

					 (NULL, '".utf8_decode("Interpessoal'").", '".utf8_decode("Expressa pela habilidade de entender as intenções, motivações e desejos dos outros. Encontra­se mais desenvolvida em políticos, religiosos e professores.")."'),

					 (NULL, '".utf8_decode("Naturalista'").", '".utf8_decode("Traduz­se na sensibilidade para compreender e organizar os objetos, fenômenos e padrões da natureza, como reconhecer e classificar plantas, animais, minerais. É característica de biólogos e geólogos, por exemplo.")."'),

					 (NULL, '".utf8_decode("Existencial'").", '".utf8_decode("Investigada no terreno ainda do “possível”, carece de maiores evidências. Abrange a capacidade de refletir e ponderar sobre questões fundamentais da existência. Seria característica de líderes espirituais e de pensadores filosóficos.")."'),

					 (NULL, '".utf8_decode("Linguística'").", '".utf8_decode("Caracteriza­se por um domínio e gosto especial pelos idiomas e pelas palavras e por um desejo em os explorar. É predominante em poetas, escritores, e linguistas.")."'), 

					 (NULL, '".utf8_decode("Prática'").", '".utf8_decode("Está ligada à constituição de uma ação ou de um uso repetido que resulta em um conhecimento ou em uma práxis. É o poder de conquistar aprendizado com as vivências, construindo aptidões funcionais. Ela se distingue da acadêmica, mais voltada para a percepção teórica, e nos ajuda a compreender porque algumas pessoas com um QI elevado não obtêm, apesar disso, o êxito na profissão.")."');"
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
<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
// var_dump($tipo);
?>
<div id="main">
	<div class="container-fluid">
		<div class="row">
			<div class="page-header">
				<h3>Olá <?php echo utf8_encode($nome."&nbsp;".$sobrenome);?></h3>
			</div>
		</div>

		<?php 
		switch ($tipo) {
			case 1:
			//aqui vai o conteúdo da home do administrador
			?>

			<div class="row">
				<div class="page-header">
					<h3 align="right">Gadgets</h3>
				</div>
				<div class="col-md-3 col-sm-6">
					<div class="panel panel-primary">
						<div class="panel-heading">
							<h3 class="panel-title">Chat</h3>
						</div>
						<div class="panel-body">
							<center><small><b>Mensagens enviadas</b></small><br/>
								<h1><?php echo (!empty($infoHome['msgEnviadas']))?$infoHome['msgEnviadas']: 0;?></h1></center>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-sm-6">
						<div class="panel panel-primary">
							<div class="panel-heading">
								<h3 class="panel-title">Chat</h3>
							</div>
							<div class="panel-body">
								<center><small><b>Mensagens recebidas</b></small><br/>
									<h1><?php echo (!empty($infoHome['msgRecebidas']))?$infoHome['msgRecebidas']: 0;?></h1></center>
								</div>
							</div>
						</div>
						<div class="col-md-3 col-sm-6">
							<div class="panel panel-primary">
								<div class="panel-heading">
									<h3 class="panel-title">Postagens</h3>
								</div>
								<div class="panel-body">
									<center><small><b>Postagens enviadas</b></small><br/>
										<h1><?php echo (!empty($infoHome['postsFeitos']))?$infoHome['postsFeitos']: 0;?></h1></center>
									</div>
								</div>
							</div>

							<div class="col-md-3 col-sm-6">
								<div class="panel panel-primary">
									<div class="panel-heading">
										<h3 class="panel-title">Biblioteca</h3>
									</div>
									<div class="panel-body">
										<center><small><b>Livros enviados</b></small><br/>
											<h1><?php echo (!empty($infoHome['livrosEnviados']))?$infoHome['livrosEnviados']: 0;?></h1></center>
										</div>
									</div>
								</div>
							</div>
							<hr/>
							<div class="row">
								<div class="page-header">
									<h3>Relatório do sistema</h3>
								</div>
								<div class="col-md-3 col-sm-6">
									<div class="panel panel-primary">
										<div class="panel-heading">
											<h3 class="panel-title">Usuários</h3>
										</div>
										<div class="panel-body">
											<center><small><b>Alunos ativos</b></small><br/>
												<h1><?php echo (!empty($infoHome['qtdAlunos']))?$infoHome['qtdAlunos']: 0;?></h1></center>
											</div>
										</div>
									</div>
									<div class="col-md-3 col-sm-6">
										<div class="panel panel-primary">
											<div class="panel-heading">
												<h3 class="panel-title">Usuários</h3>
											</div>
											<div class="panel-body">
												<center><small><b>Professores ativos</b></small><br/>
													<h1><?php echo (!empty($infoHome['qtdProfessores']))?$infoHome['qtdProfessores']: 0;?></h1></center>
												</div>
											</div>
										</div>
										<div class="col-md-3 col-sm-6">
											<div class="panel panel-primary">
												<div class="panel-heading">
													<h3 class="panel-title">Usuários</h3>
												</div>
												<div class="panel-body">
													<center><small><b>Funcionários ativos</b></small><br/>
														<h1><?php echo (!empty($infoHome['qtdFuncionarios']))?$infoHome['qtdFuncionarios']: 0;?></h1></center>
													</div>
												</div>
											</div>
											<div class="col-md-3 col-sm-6">
												<div class="panel panel-primary">
													<div class="panel-heading">
														<h3 class="panel-title">Usuários</h3>
													</div>
													<div class="panel-body">
														<center><small><b>Administradores ativos</b></small><br/>
															<h1><?php echo (!empty($infoHome['qtdAdmin']))?$infoHome['qtdAdmin']: 0;?></h1></center>
														</div>
													</div>
												</div>
												<div class="col-md-6 col-sm-6">
													<div class="panel panel-primary">
														<div class="panel-heading">
															<h3 class="panel-title">Usuários</h3>
														</div>
														<div class="panel-body">
															<center><small><b>Total de usuários cadastrados</b></small><br/>
																<h1><?php echo (!empty($infoHome['usuariosCadastrados']))?$infoHome['usuariosCadastrados']: 0;?></h1></center>
															</div>
														</div>
													</div>
													<div class="col-md-6 col-sm-6">
														<div class="panel panel-primary">
															<div class="panel-heading">
																<h3 class="panel-title">Usuários</h3>
															</div>
															<div class="panel-body">
																<center><small><b>Usuários ativos</b></small><br/>
																	<h1><?php echo (!empty($infoHome['qtdAlunos']))? $infoHome['usuariosAtivos']: 0;?></h1></center>
																</div>
															</div>
														</div>
														<div class="col-md-6 col-sm-6">
															<div class="panel panel-danger">
																<div class="panel-heading">
																	<h3 class="panel-title">Bate-papo</h3>
																</div>
																<div class="panel-body">
																	<center><small><b>Mensagens armazenadas</b></small><br/>
																		<h3><?php echo (!empty($infoHome['qtdMsg']))? $infoHome['qtdMsg']: 0;?></h3></center>
																	</div>
																</div>
															</div>
															<div class="col-md-6 col-sm-6">
																<div class="panel panel-warning">
																	<div class="panel-heading">
																		<h3 class="panel-title">Mural</h3>
																	</div>
																	<div class="panel-body">
																		<center><small><b>Publicações armazenadas</b></small><br/>
																			<h3><?php echo (!empty($infoHome['qtdPost']))? $infoHome['qtdPost']: 0;?></h3></center>
																		</div>
																	</div>
																</div>
																<div class="col-md-6 col-sm-6">
																	<div class="panel panel-success">
																		<div class="panel-heading">
																			<h3 class="panel-title">Ferramentas</h3>
																		</div>
																		<div class="panel-body">
																			<center><small><b>Ferramentas salvas</b></small><br/>
																				<h1><?php echo (!empty($infoHome['qtdFerramenta']))? $infoHome['qtdFerramenta']: 0;?></h1></center>
																			</div>
																		</div>
																	</div>
																	<div class="col-md-6 col-sm-6">
																		<div class="panel panel-default">
																			<div class="panel-heading">
																				<h3 class="panel-title">Biblioteca</h3>
																			</div>
																			<div class="panel-body">
																				<center><small><b>Livros salvos</b></small><br/>
																					<h1><?php echo (!empty($infoHome['qtdArquivo']))? $infoHome['qtdArquivo']: 0;?></h1></center>
																				</div>
																			</div>
																		</div>
																	</div>
																	<?php
																	break;

																	case 2:
																		//aqui vai o conteúdo da home do funcionario
																	?>

																	<div class="panel panel-primary">
																		<div class="panel-heading">
																			<h3 class="panel-title">Status</h3>
																		</div>
																		<div class="panel-body">
																			Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent eget magna et ante suscipit lacinia. Aenean porttitor velit id pretium blandit. Aenean ut sodales ante. Ut faucibus ornare venenatis. Duis sit amet arcu eros. Mauris volutpat vestibulum congue. Nam volutpat, urna eu varius dapibus, velit nisl bibendum lorem, sit amet dapibus sem dolor eu felis. Nulla tincidunt augue vel dolor convallis lobortis. Nunc nibh dolor, tincidunt elementum lorem id, porta imperdiet neque. Quisque egestas lacus nec magna mattis aliquam. Nunc eget orci odio. Quisque neque odio, lobortis a orci ut, tempus feugiat tortor. Quisque et tincidunt arcu. Sed vel accumsan risus. Quisque enim ipsum, luctus vitae ultrices at, vulputate eu lorem. Curabitur at nibh sagittis, lobortis odio nec, sodales velit. Aenean interdum, magna nec molestie congue, magna nisi sodales dolor, at mattis ipsum nisi at nibh. Aenean quis dictum lacus. Vivamus commodo sit amet nibh eget scelerisque.
																		</div>
																	</div>
																	<?php
																	break;

																	case 3:
																		//aqui vai o conteúdo da home do aluno
																	?>
																	<div class="row">
																		<div class="col-md-12">
																			<div class="panel panel-primary">
																				<div class="panel-heading">
																					<h3 class="panel-title">Status do cadastro</h3>
																				</div>
																				<div class="panel-body">
																					<ul>
																						<li>Curso: <?php echo $infoHome['curso']?>.</li>
																						<li>Turma: <?php echo $infoHome['turma'];?></li>
																					</ul>
																				</div>
																			</div>
																		</div>
																	</div>
																	<!--<div class="row">
																		<div class="col-md-6">
																			<div class="panel panel-danger">
																				<div class="panel-heading">
																					<h3 class="panel-title">Painel de consultoria</h3>
																				</div>
																				<div class="panel-body">
																					<ul>
																						<li>5 dúvidas publicadas</li>
																						<li>10 consultorias</li>
																					</ul>
																				</div>
																			</div>
																		</div>
																		<div class="col-md-6">
																			<div class="panel panel-success">
																				<div class="panel-heading">
																					<h3 class="panel-title">Publicações</h3>
																				</div>
																				<div class="panel-body">
																					<small><b>Postagens</b></small>
																					<h3><?php echo $infoHome['publicacoes'];?></h3>
																				</div>
																			</div>
																		</div>
																	</div>
																	<div class="row">
																		<div class="col-md-4">
																			<div class="panel panel-warning">
																				<div class="panel-heading">
																					<h3 class="panel-title">Biblioteca virtual</h3>
																				</div>
																				<div class="panel-body">
																					<ul>
																						<li>12 livros cadastrados</li>
																					</ul>
																				</div>
																			</div>
																		</div>
																		<div class="col-md-8">
																			<div class="panel panel-default">
																				<div class="panel-heading">
																					<h3 class="panel-title">Painel de missões</h3>
																				</div>
																				<div class="panel-body">
																					<ul>
																						<li>7 atividades executadas</li>
																					</ul>
																				</div>
																			</div>
																		</div>-->
																	</div>
																	<?php
																	break;

																	case 4:
//aqui vai o conteúdo da home do professor
																	?>
																	<div class="panel panel-primary">
																		<div class="panel-heading">
																			<h3 class="panel-title">Panel warning</h3>
																		</div>
																		<div class="panel-body">
																			Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent eget magna et ante suscipit lacinia. Aenean porttitor velit id pretium blandit. Aenean ut sodales ante. Ut faucibus ornare venenatis. Duis sit amet arcu eros. Mauris volutpat vestibulum congue. Nam volutpat, urna eu varius dapibus, velit nisl bibendum lorem, sit amet dapibus sem dolor eu felis. Nulla tincidunt augue vel dolor convallis lobortis. Nunc nibh dolor, tincidunt elementum lorem id, porta imperdiet neque. Quisque egestas lacus nec magna mattis aliquam. Nunc eget orci odio. Quisque neque odio, lobortis a orci ut, tempus feugiat tortor. Quisque et tincidunt arcu. Sed vel accumsan risus. Quisque enim ipsum, luctus vitae ultrices at, vulputate eu lorem. Curabitur at nibh sagittis, lobortis odio nec, sodales velit. Aenean interdum, magna nec molestie congue, magna nisi sodales dolor, at mattis ipsum nisi at nibh. Aenean quis dictum lacus. Vivamus commodo sit amet nibh eget scelerisque.
																		</div>
																	</div>

																	<?php
																	break;

																	default:
																	redirect(base_url());
																	break;
																}


																?>
															</div>
														</div>
													</div>
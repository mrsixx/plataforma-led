<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
	// var_dump($tipo);
?>
<div id="main">
	<div class="container-fluid">
		<div class="row">
			
		<?php if(!$home):?>
			<div class="panel">
				<!-- Início cabeçalho -->
				<div class="panel-heading new_message_head">
				   <div class="pull-left">
						<div class="dropdown">
							<button class="dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="glyphicon glyphicon-option-vertical" aria-hidden="true"></i>
							</button>
							<ul class="dropdown-menu dropdown-menu-left" aria-labelledby="dropdownMenu1">
								<li><a href="#"><i class="glyphicon glyphicon-trash">&nbsp;</i>Limpar conversa</a></li>
								<li><a href="#"><i class="glyphicon glyphicon-folder-open">&nbsp;</i>Imagens compart.</a></li>
								<li><i class="glyphicon glyphicon-user">&nbsp;</i>Ir ao perfil</li>
							</ul>
						</div>
					</div>
					<div class="pull-left"><button><?php if($_GET['t'] == 'ind'){?><span style="vertical-align:middle;font-size:1.3em ;color: <?php echo ($interfaceChat['Status'] == 'online') ? '#00FF00' :'#FF0000'; ?>;">•</span>&nbsp;<?php } echo $interfaceChat['Nome']?></button></div>
				</div>
				<!-- fim cabeçalho-->

				<!-- Início container -->
				<div class="panel-body scroll" id="chat_area">
					<ul class="list-unstyled container-fluid" id="chat" data-id="<?php echo $interfaceChat['Id'].':'.$meuCod;?>" data-ultima="<?php echo (!empty($last->CodMensagem))?(int)$last->CodMensagem:1;?>">
						<?php if(!empty($mensagens)): 
								$CI =& get_instance();
                                $CI->load->library('encrypt');
						?>
								<input type="hidden" id="existeMsg" value="s">
								<?php foreach ($mensagens as $msg): 
									if($msg->CodRemetente == $meuCod): ?>
									   <li class="right clearfix row"  id="<?= $msg->CodMensagem;?>">
											<div class="chat-body2 clearfix col-xs-9 col-xs-offset-2 col-sm-8 col-sm-offset-4 col-md-6 col-md-offset-6">
												<p><?php echo parse_smileys(utf8_encode($CI->encrypt->decode($msg->Texto)), base_url('assets/img/smileys/'))?></p>

												<div class="chat_time pull-left"><!--<i class="fa fa-<?php //echo ($msg->Status)?'eye':'eye-slash';?>" aria-hidden="true"></i>--> <?php echo date("d/m/Y à\s H:i",strtotime($msg->DataHoraEnvio));?></div>
											</div>
										</li>
									<?php else: ?>
										<li class="left clearfix row"  id="<?= $msg->CodMensagem;?>">
											<span class="chat-img1 pul-left col-xs-1">
													<img src="<?php echo fotoPerfil($msg->FotoR,$msg->SexoR);?>" alt="Foto de <?= utf8_encode($msg->NomeRemetente)?>" class="img-circle"/>
											</span>
											<div class="chat-body1 clearfix col-xs-9 col-sm-8 col-md-6">
												<p><?php echo parse_smileys(utf8_encode($CI->encrypt->decode($msg->Texto)), base_url('assets/img/smileys/'))?></p>
												<div class="chat_time pull-right"><?php echo date("d/m/Y à\s H:i",strtotime($msg->DataHoraEnvio));?></div>
											</div>
										</li>
									<?php endif;?>
																	
								<?php endforeach;?>

						<?php else:?>
							<input type="hidden" id="existeMsg" value="n">
							<p class="nd">Vocês ainda não trocaram nenhuma mensagem.<br/> Envie uma agora :D...</p>
						<?php endif;?>
					</ul>
				</div>
				<!-- Fim do container  -->

				<!-- Início footer -->
				<div class="panel-footer message_write fixed-bottom" id="text_area">
					<form method="POST" action="" class="form-group popup-messages-footer row" id="frmMsg" data-id="<?php echo $interfaceChat['Id'].':'.$meuCod;?>">
						<?php echo ($grp)?'<input type="hidden" name="grp" id="grp" value="1">':'';?>

						<!-- Textearea para o envio de mensagem -->
						<textarea class="form-control" id="status_message" placeholder="Escreva uma menssagem..." name="message"></textarea>
						<!-- Fim textarea -->

						<!-- AQUI VAI O CONTAINER COM OS BOTÕES -->
						<div class="botoes">
							<!--aqui vai o botão de anexo de arquivos-->
							<!--<div class="fileUpload btn pull-left">
								<i class="glyphicon glyphicon-picture" aria-hidden="true"></i>
								<input type="file" class="upload" />
							</div>-->
							<!--aqui acaba ao botão de anexo-->

							<!--aqui vai o botão de emoticon-->
							<div class="dropdown-menu drop-up col-xs-12 col-sm-5 col-md-4" style="position: absolute; z-index: 499;">
								<?php echo $smiley_table; ?>
							</div>
							<button class="btn_chat dropdown-toggle" data-toggle="dropdown">
								<i class="fa fa-smile-o" aria-hidden="true"></i>
							</button>

							<!--aqui acaba o botão-->
									
							<!--aqui vai o botão de enviar-->
							<button type="submit" id="enviaMsg" class="btn_chat col-md-1 col-xs-1 col-sm-1 pull-right">
								<i class="glyphicon glyphicon-send" aria-hidden="true"></i>
							</button>
							<!--aqui acaba o botão-->       
						
						</div>                           
					</form>
				</div>
			</div>
		<?php else: ?>     
		<?php endif; ?>
				</div>
		</div>
	</div>
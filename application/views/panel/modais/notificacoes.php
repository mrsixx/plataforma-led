<div class="modal fade" id="modalNotificacoes" role="dialog" data-user="<?php echo $codusuario; ?>">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" class="glyphicon glyphicon-remove"></span>
                                  </button>
                        <h4 class="modal-title" id="exampleModalLabel">Notificações</h4>
                    </div>
                    <div id="container-notificacao" class="modal-body notificacao scroll">
                        <?php
                  foreach ($notificacoes as $notificacao): 
                    //pegando o link da notificação e armazenando numa variável
                    $explode = explode("/", $notificacao->Link);
                    if(isset($explode[3])){
                        $modulo = $explode[3];
                    }else{
                      $modulo = "";
                    }
                    //verificando pra onde a notificação aponta e estipulando uma cor para cada lugar
                    switch ($modulo) {
                      case 'post':
                          $cor = "primary";
                        break;
                      case 'tasks':
                          $cor = "success";
                        break;
                      case 'reports':
                          $cor = "danger";
                        break;
                      case 'consultoria':
                          $cor = "info";
                        break;
                      case 'outracoisa':
                          $cor = "default";
                      default:
                        $cor = "warning";
                        break;
                    }

                    //verificando se a notificação já foi lida para marcá-la como recente
                    if($notificacao->Status == 1){
                      $class = "bg-lida";
                    }else{
                      $class = "";
                    }

                    //verificando se a notifição aponta para algum lugar
                    if(isset($notificacao->Link))
                      $link = $notificacao->Link;
                    else
                      $link = 'javascript:void(0)';
                      ?>
                        <a href="<?php echo $link; ?>">
                          <div class="bs-callout bs-callout-<?php echo $cor.' '.$class;?>" data-status="<?php echo $notificacao->Status;?>" data-cod="<?php echo $notificacao->CodNotificacao; ?>">
                                <?php echo utf8_encode($notificacao->Titulo);?>
                            <div class="content">
                              <h5><?php echo utf8_encode($notificacao->Texto); ?></h5>
                              <h6 class="pull-right"><?php echo date('d/m/Y H:i', strtotime($notificacao->DataHora));?></h6><br/>
                            </div>
                          </div>
                        </a>
                    <?php endforeach;?>
                    </div>
                </div>
              </div>
        </div>
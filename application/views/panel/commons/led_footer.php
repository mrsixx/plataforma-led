</div>
<?php 
    //recebendo qual página o usuário está
    if(isset($content))
      $modal = $content;
    else
      $modal = "";

    //colocando os modais necessários de acordo com a página
    switch ($modal) {
      case 'mural':
        ?>

          <div class="modal fade" id="post" role="dialog">
              <div class="modal-dialog" role="document">
                  <div class="modal-content">
                      <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true" class="glyphicon glyphicon-remove" data-dismiss="close"></span>
                                                    </button>
                          <h4 class="modal-title" id="exampleModalLabel">Criar Postagem</h4>
                      </div>
                      <div class="modal-body">
                          <div class="alert alert-neutro">
                              <form action="">

                                  <div class="form-group container-fluid">
                                      <div class="alert textA row">
                                          <label for="pwd">Escreva seu post</label>
                                          <textarea class="form-control form-neutro col-md-12"></textarea>
                                          <a class="btn_up col-xs-1 col-sm-1 col-md-1">
                                              <span class="glyphicon glyphicon-picture"></span>
                                              <input type="file" id="imgInp" value="" />
                                          </a>

                                          <a class="btn_up dropdown-toggle col-md-1 col-xs-1 col-sm-1" data-toggle="dropdown">
                                              <i class="fa fa-smile-o" aria-hidden="true"></i>
                                          </a>
                                          <div class="dropdown-menu drop-up col-xs-12 col-sm-8 col-md-6" role="menu">

                                              <table class="emoticons-lista table">
                                                  <tbody>
                                                      <tr>
                                                          <td>☺</td>
                                                          <td>☺</td>
                                                          <td>☺</td>
                                                          <td>☺</td>
                                                          <td>☺</td>
                                                          <td>☺</td>
                                                          <td>☺</td>
                                                          <td>☺</td>
                                                          <td>☺</td>
                                                          <td>☺</td>
                                                          <td>☺</td>
                                                      </tr>
                                                      <tr>
                                                          <td>☺</td>
                                                          <td>☺</td>
                                                          <td>☺</td>
                                                          <td>☺</td>
                                                          <td>☺</td>
                                                          <td>☺</td>
                                                          <td>☺</td>
                                                          <td>☺</td>
                                                          <td>☺</td>
                                                          <td>☺</td>
                                                          <td>☺</td>
                                                      </tr>
                                                  </tbody>
                                              </table>

                                          </div>
                                      </div>
                                  </div>
                                  <button type="submit" class="btn btn-neutro ">Publicar</button>
                                  <div class="btn-group">
                                      <button type="button" class="btn btn-neutro dropdown-toggle" data-toggle="dropdown">
                                                                Publicar em...<span class="caret"></span>
                                                              </button>
                                      <ul class="dropdown-menu" role="menu">
                                          <li><a href="#"><i class="fa fa-paperclip" aria-hidden="true">&nbsp;</i>Mural I</a></li>
                                          <li><a href="#"><i class="fa fa-paperclip" aria-hidden="true">&nbsp;</i>Mural II</a></li>
                                          <li><a href="#"><i class="fa fa-paperclip" aria-hidden="true">&nbsp;</i>Mural III</a></li>
                                          <li class="divider"></li>
                                          <li><a href="#"><i class="fa fa-paperclip" aria-hidden="true">&nbsp;</i>Mural da Escola</a></li>
                                          <li><a href="#"><i class="fa fa-paperclip" aria-hidden="true">&nbsp;</i>Mural da Sala</a></li>
                                      </ul>
                                  </div>
                              </form>

                          </div>
                          <div class="alert alert-default">
                              <img id="blah" src="" alt="" class="exemplo_post" />

                          </div>

                      </div>

                  </div>
              </div>
          </div>
          <div class="modal fade" id="comentario" role="dialog">
              <div class="modal-dialog" role="document">
                  <div class="modal-content widget">
                      <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true" class="glyphicon glyphicon-remove"></span>
                                                    </button>
                          <h4 class="modal-title" id="exampleModalLabel">Comentários</h4>
                      </div>
                      <div class="modal-body scroll">
                          <a href="#" class="btn btn-primary btn-sm btn-block" role="button"><span class="glyphicon glyphicon-refresh"></span> Ler comentários anteriores</a>
                          <ul class="list-group">
                              <li class="list-group-item">
                                  <div class="row">
                                      <div class="col-xs-2 col-md-2">
                                          <img src="http://placehold.it/80" class="img img-comentario img-responsive" alt="" /></div>
                                      <div class="col-xs-10 col-md-10">
                                          <div class="comment-text">
                                              Awesome design Awesome design Awesome design Awesome design Awesome design Awesome design Awesome design Awesome design Awesome design Awesome Awesome design Awesome design Awesome design Awesome design Awesome design Awesome design Awesome design Awesome Awesome design Awesome design Awesome design Awesome design Awesome design Awesome design Awesome design Awesome Awesome design Awesome design Awesome design Awesome design Awesome design Awesome design Awesome design Awesome Awesome design Awesome design Awesome design Awesome design Awesome design Awesome design Awesome design Awesome Awesome design Awesome design Awesome designAwesome design Awesome design Awesome design Awesome design Awesome design Awesome design Awesome Awesome design Awesome design Awesome design Awesome design Awesome design Awesome design Awesome design Awesome Awesome design Awesome design Awesome design Awesome design Awesome design Awesome design Awesome design Awesome
                                          </div>
                                          <div>
                                              <div class="mic-info">
                                                  <a href="#"><b>Pessoa Sobrenome</b></a> <i><span class="glyphicon glyphicon-time"></span> Agora mesmo || Há "tantos" dias || Dia"tal" do mês "tal"</i>
                                              </div>
                                          </div>
                                          <div class="action">
                                              <button type="button" class="btn btn-primary btn-xs" title="Editar">
                                                            <span class="glyphicon glyphicon-pencil"></span>
                                                        </button>
                                              <button type="button" class="btn btn-success btn-xs" title="Salvar">
                                                            <span class="glyphicon glyphicon-ok"></span>
                                                        </button>
                                              <button type="button" class="btn btn-danger btn-xs" title="Excluir">
                                                            <span class="glyphicon glyphicon-trash"></span>
                                                        </button>
                                          </div>
                                      </div>
                                  </div>
                              </li>
                          </ul>
                      </div>
                      <div class="modal-footer">
                          <div class="input-group">
                              <input type="text" id="userComment" class="form-control input-sm chat-input" placeholder="Write your message here..." />
                              <span class="input-group-btn" onclick="addComment()">     
                                            <a href="#" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-comment"></span></a>
                              </span>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <div class="modal fade" id="report" role="dialog">
              <div class="modal-dialog" role="document">
                  <div class="modal-dialog modal-sm">
                      <div class="modal-content">
                          <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                              <span aria-hidden="true" class="glyphicon glyphicon-remove"></span>
                                                            </button>
                              <h4 class="modal-title" id="exampleModalLabel">Reportar ao administrador</h4>
                          </div>
                          <div class="modal-body">
                              <p>Você deseja realmente reportar?</p>
                          </div>
                          <div class="modal-footer">
                              <button type="button" class="btn btn-default" data-dismiss="modal" aria-label="Close">Cancelar</button>
                              <button type="button" class="btn btn-danger">Sim, reportar</button>
                          </div>
                      </div>
                  </div>
              </div>
          </div>

        <?php
        break;

      case 'ambiente':
      ?>

        <form class="modal fade" id="escola" role="dialog" method="POST" action="">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true" class="glyphicon glyphicon-remove" data-dismiss="close"></span>
                        </button>
                        <h4 class="modal-title" id="exampleModalLabel">Escola</h4>
                    </div>
                    <div class="modal-body">
                      <div id="msg"></div>
                      <div class="row"> 
                            <div class="form-group col-md-6">
                              <small for="txtEscola" class="control-label pull-left">Nome da escola <span class="required">*</span></small>
                              <input id="txtEscola" name="txtEscola" class="form-control" type="text" placeholder="Insira o nome da unidade de ensino" value="<?php echo $escola['Nome']; ?>" required>
                            </div>
                            
                            <div class="form-group col-md-6">
                              <small for="dtFundacao" class="control-label pull-left">Data de fundação</small>
                              <input id="dtFundacao" name="dtFundacao" class="form-control" type="date"  placeholder="Insira a data em que a  instituição foi fundada" value="<?php echo $escola['DataFundacao']; ?>" max="<?php echo date('Y-m-d');?>" required oninvalid="this.setCustomValidity('Viagens no tempo ainda não são possíveis :D')" oninput="setCustomValidity('')">
                            </div>

                            <div class="form-group col-md-6">
                              <small for="txtWebsite" class="control-label pull-left">Website <span class="required">*</span></small>
                              <input id="txtWebsite" name="txtWebsite" class="form-control" type="text" placeholder="Insira o website da instituição de ensino" value="<?php echo $escola['Website']; ?>">
                            </div>
                  
                            <div class="form-group col-md-6">
                              <small for="txtCep" class="control-label pull-left">Cep </small>
                              <input id="txtCep" name="txtCep" class="form-control" type="text" placeholder="Insira o CEP da instituição" value="<?php echo $escola['Cep']; ?>">
                            </div>

                            <div class="form-group col-md-6">
                              <small for="txtRua" class="control-label pull-left">Rua <span class="required">*</span></small>
                              <input id="txtRua" name="txtRua" class="form-control" type="text"  placeholder="Insira a rua da instituição" value="<?php echo $escola['Rua']; ?>" required>
                            </div>

                            <div class="form-group col-md-6">
                              <small for="txtBairro" class="control-label pull-left">Bairro <span class="required">*</span></small>
                              <input id="txtBairro" name="txtBairro" class="form-control" type="text"  placeholder="Insira o bairro da instituição" value="<?php echo $escola['Bairro']; ?>" required>
                            </div>
                  
                            <div class="form-group col-md-6">
                              <small for="txtCidade" class="control-label pull-left">Cidade <span class="required">*</span></small>
                              <input id="txtCidade" name="txtCidade" class="form-control" type="text" placeholder="Insira a cidade em que a instituição se situa" value="<?php echo $escola['Cidade']; ?>" required>
                            </div>
                                
                            <div class="form-group col-md-6">
                              <small for="cmbEstado" class="control-label pull-left">Estado <span class="required">*</span></small>
                              <select name="cmbEstado" class="form-control" required>
                              <option selected disabled >Selecione um estado</option>
                              <option value="AC">Acre</option>
                              <option value="AL">Alagoas</option>
                              <option value="AP">Amapá</option>
                              <option value="AM">Amazonas</option>
                              <option value="BA">Bahia</option>
                              <option value="CE">Ceará</option>
                              <option value="DF">Distrito Federal</option>
                              <option value="ES">Espírito Santo</option>
                              <option value="GO">Goiás</option>
                              <option value="MA">Maranhão</option>
                              <option value="MT">Mato Grosso</option>
                              <option value="MS">Mato Grosso do Sul</option>
                              <option value="MG">Minas Gerais</option>
                              <option value="PA">Pará</option>
                              <option value="PB">Paraíba</option>
                              <option value="PR">Paraná</option>
                              <option value="PE">Pernambuco</option>
                              <option value="PI">Piauí</option>
                              <option value="RJ">Rio de Janeiro</option>
                              <option value="RN">Rio Grande do Norte</option>
                              <option value="RS">Rio Grande do Sul</option>
                              <option value="RO">Rondônia</option>
                              <option value="RR">Roraima</option>
                              <option value="SC">Santa Catarina</option>
                              <option value="SP">São Paulo</option>
                              <option value="SE">Sergipe</option>
                              <option value="TO">Tocantins</option>
                              </select>
                            </div>
                      </div>
                    </div>
                    <div class="modal-footer">

                        <input type="hidden" name="cod" value="<?php echo $escola['CodEscola']; ?>">
                        <input class="btn btn-primary" type="submit" value="Salvar" />
                    </div>
                </div>
            </div>
        </form>


        <form class="modal fade" id="cursos" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true" class="glyphicon glyphicon-remove" data-dismiss="close"></span>
                        </button>
                        <h4 class="modal-title" id="exampleModalLabel">Cursos</h4>
                    </div>
                    <div class="modal-body">
                        
                    </div>
                    <div class="modal-footer">
                      <input class="btn btn-primary" type="button" value="Salvar" />
                    </div>
                </div>
            </div>
        </form>


    <?php
      break;
      
      default:
        # code...
        break;
    }
  ?>
        <!-- Modal de notificações, mostrando em todas as páginas -->
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
                    if(isset($explode[1])){
                        $modulo = $explode[1];
                    }else{
                      $modulo = "";
                    }
                    //verificando pra onde a notificação aponta e estipulando uma cor para cada lugar
                    switch ($modulo) {
                      case 'mural':
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
                    if($notificacao->Status == 0){
                      $class = "bg-lida";
                    }else{
                      $class = "";
                    }

                    //verificando se a notifição aponta para algum lugar
                    if(isset($notificacao->Link))
                      $link = $notificacao->Link;
                    else
                      $link = "#";
                      ?>
                        <a href="<?php echo $link; ?>">
                          <div class="bs-callout bs-callout-<?php echo $cor.' '.$class;?>" data-status="<?php echo $notificacao->Status;?>" data-cod="<?php echo $notificacao->CodNotificacao; ?>">
                                <?php echo $notificacao->Titulo;?>
                            <div class="content">
                              <h5><?php echo $notificacao->Texto; ?></h5>
                              <h6 class="pull-right"><?php echo $notificacao->DataHora;?></h6><br/>
                            </div>
                          </div>
                        </a>
                    <?php endforeach;?>
                    </div>
                </div>
              </div>
        </div>
      </div>
    </div>
  </div>
  <div id='loader' style="display: hidden;"><img src="<?= base_url('assets/img/ajax-loader.gif'); ?>"/></div>
  <script src="<?= base_url("assets/js/jquery-3.2.1.min.js") ?>"></script>
  <script src="<?= base_url("assets/js/bootstrap.min.js");?>"></script>
  <script type="text/javascript">
            //script para fechar e abrir a sidebar em dispositivos móveis
            $(function() {
                $('#slide-submenu').on('click', function() {         
                    $(this).closest('.list-group').hide('slide', function() {
                        $('.mini-submenu').fadeIn();
                    });
                });

                $('.mini-submenu').on('click', function fechar() {
                    $(this).next('.list-group').toggle('slide');
                    $('.mini-submenu').hide();
                })
            });

            //upload de imagem da postagem
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#blah').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }
            $("#imgInp").change(function() {
                readURL(this);
            });
            //fim upload imagem

            //opinião FAZER PESQUISA COM O AJAX DEPOIS 
            $(function() {
                $('.boa').click(function() {
                    $('#opiniao').removeClass();
                    $('#opiniao').addClass('op1');
                });
                $('.nada').click(function() {
                    $('#opiniao').removeClass();
                    $('#opiniao').addClass('op2');
                });
            });

            //script para exibir os tooltips
            $(document).ready(function() {
                $('[data-toggle="tooltip"]').tooltip({
                    container: 'body'
                })
            });

            //ajax para marcar notificação como lida
            $(document).ready(function() {
                $('div').on("click", '#container-notificacao a', function(e) {
                    e.preventDefault();
                    var href = $(this).attr('href');
                    var div = $(this).children('div')
                    var codnotificacao = $(div).attr('data-cod');
                    var status = $(div).attr('data-status');
                    var coduser = $('#modalNotificacoes').attr('data-user');
                    if (status != 1) {
                        $.post('panel/attNotificacao', {
                            user: coduser,
                            notificacao: codnotificacao
                        }, function retorno(result) {
                            if (result == true) {
                                $(div).addClass('bg-lida');
                            }
                        });
                    }
                    if (href != '#') {
                        location.href = href;
                    } else {
                        //achar um jeito de marcar como lido e tirar uma notificacão das badges
                        $('#modalNotificacoes').modal('hide');
                    }
                });
            });
  </script>

  <?php 
     switch ($modal) {
        case 'ambiente':
          ?>
            <script type="text/javascript">
              $(document).ready(function(){
                $('#escola').submit(function(){
                  var dados = jQuery(this).serialize();

                  $.ajax({
                    type: "POST",
                    url: "ambiente/attEscola",
                    data: dados,
                    success: function(data)
                    {
                        var _html = "<div class='alert alert-sucess alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Sucesso!</strong> A atualização foi bem sucedida :) </div>";
                      $('#escola #msg').html(_html);
                    }, 
                    error: function(data)
                    {
                        var _html = "<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Erro!</strong> A atualização não foi bem sucedida :/ </div>";
                      $('#escola #msg').html(_html);
                    }
                  });
                  
                  return false;
                });
              });

            </script>
          <?php
          break;
      }

  ?>
</body>

</html>
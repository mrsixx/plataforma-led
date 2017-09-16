</div>
  <div class="modal fade" id="exampleModal" role="dialog">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" class="glyphicon glyphicon-remove"></span>
                                  </button>
                  <h4 class="modal-title" id="exampleModalLabel">Notificações</h4>
              </div>
              <div class="modal-body notificacao scroll">
                  <?php
                  foreach ($notificacoes as $notificacao) { 
                    if($notificacao->Status == 0){
                      $class = "bg-lida";
                    }else{
                      $class = "";
                    }
                      ?>
                      <div class="bs-callout bs-callout-primary <?php echo $class;?>">
                          <h5>
                              <?php echo $notificacao->Titulo;?>
                          </h5>
                          <div class="content">
                              <?php echo $notificacao->Texto; ?>
                          </div>
                      </div>
                      <?php } ?>



                      <!--
                                    
                                    <div class="bs-callout bs-callout-success">
                                    <h5>Notificação aqui</h5>
                                    <div class="content">
                                          
                                        </div>
                                  </div>
                                    
                                    <div class="bs-callout bs-callout-default bg-lida">
                                    <h5>Notificação aqui</h5>
                                        <div class="content">
                                          
                                        </div>
                                  </div>
                                    
                                    <div class="bs-callout bs-callout-warning">
                                    <h5>Notificação aqui</h5>
                                    <div class="content">
                                          
                                        </div>
                                  </div>
                                    
                                    <div class="bs-callout bs-callout-info">
                                      <h5>Notificação aqui</h5>
                                    <div class="content">
                                          
                                        </div>
                                  </div>
                                    
                                    <div class="bs-callout bs-callout-danger">
                                    <h5>Notificação aqui</h5>
                                    <div class="content">
                                          
                                        </div>
                                  </div>
                                    
                                    <div class="bs-callout bs-callout-primary">
                                    <h5>Notificação aqui</h5>
                                    <div class="content">
                                          
                                        </div>
                                  </div>
                                    
                                    <div class="bs-callout bs-callout-success">
                                    <h5>Notificação aqui</h5>
                                    <div class="content">
                                          
                                        </div>
                                  </div>
                                    
                                    <div class="bs-callout bs-callout-default bg-lida">
                                    <h5>Notificação aqui</h5>
                                        <div class="content">
                                          
                                        </div>
                                  </div>
                                    
                                    <div class="bs-callout bs-callout-warning">
                                    <h5>Notificação aqui</h5>
                                    <div class="content">
                                          
                                        </div>
                                  </div>
                                    
                                    <div class="bs-callout bs-callout-info">
                                    <h5>Notificação aqui</h5>
                                    <div class="content">
                                          
                                        </div>
                                  </div>
                                    
                                    <div class="bs-callout bs-callout-danger">
                                    <h5>Notificação aqui</h5>
                                    <div class="content">
                                          
                                        </div>
                                  </div>
                                    -->
              </div>
          </div>
      </div>
  </div>
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
                         <button type="button" class="btn btn-danger" >Sim, reportar</button>    
                      </div>
                      </div>
                  </div>
              </div>
  </div>
</div>
</div>
</div>
<script src="<?= base_url("assets/js/jquery-3.2.1.min.js") ?>"></script>
<script src="<?= base_url("assets/js/bootstrap.min.js");?>"></script>
<script type="text/javascript">
        $(function() {

            $('#slide-submenu').on('click', function() { //qualquer coisa troque o hide para fadeOut          
                $(this).closest('.list-group').hide('slide', function() {
                    $('.mini-submenu').fadeIn();
                });
            });

            $('.mini-submenu').on('click', function() {
                $(this).next('.list-group').toggle('slide');
                $('.mini-submenu').hide();
            })
        })

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
        //acaba aqui

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

        $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip({
                container: 'body'
            })

        });
    </script>
</body>

</html>


          <div class="modal fade" id="postCad" role="dialog">
            <form name="frmPost" id="frmPost" method="post" action="" enctype="multipart/form-data">
              <div class="modal-dialog" role="document">
                  <div class="modal-content">
                      <div class="modal-header">
                          <button type="button" class="close att" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true" class="glyphicon glyphicon-remove" data-dismiss="close"></span>
                                                    </button>
                          <h4 class="modal-title" id="">Criar Postagem</h4>
                      </div>
                      <div class="modal-body">
                          <div id="msg"></div>
                          <div class="alert alert-neutro">
                                  <div class="form-group container-fluid">
                                      <div class="alert textA row">
                                          <label for="pwd">Escreva seu post</label>
                                          <input type="hidden" name="codMural" id="codMural" value="<?php echo $codMural;?>">
                                          <textarea class="form-control form-neutro col-md-12" id="txtPost" name="txtPost" required="false"></textarea>
                                              <div class="alert alert-default">
                                                <center>
                                                  <img id="blah" src="" alt="" class="exemplo_post" />
                                                </center>
                                              </div>
                                          <a type="button" class="btn_up col-xs-1 col-sm-1 col-md-1" onClick='return $("#userfile").click();'>
                                              <span class="glyphicon glyphicon-picture"></span>
                                          </a>
                                            <input type="file" id="userfile" name="userfile" style="visibility: hidden; display: none;" accept="
                                            image/*">
                                            <!-- <input type="file" name="imagem" id="imagem" /> -->
                                              <input type="hidden" name="MAX_FILE_SIZE" id="MAX_FILE_SIZE" value="30000" />
                                              

                                          <a type="button" class="btn_up dropdown-toggle col-md-1 col-xs-1 col-sm-1" data-toggle="dropdown">
                                              <i class="fa fa-smile-o" aria-hidden="true"></i>
                                          </a>
                                          <div class="dropdown-menu drop-up col-xs-12 col-sm-8 col-md-6" role="menu">
                                             <?php echo $smiley_table; ?>
                                          </div>
                                      </div>
                                  </div>
                                  <input type="submit" class="btn btn-neutro" id="btnPublicar" name="btnPublicar" value="Publicar" />
                                  <!-- <div class="btn-group">
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
                                  </div> -->
                          </div>
                      </div>

                  </div>
              </div>
          </form>
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
                      <div class="modal-body scroll" id="comentarioScroll">
                          <!-- <a href="#" class="btn btn-primary btn-sm btn-block" role="button"><span class="glyphicon glyphicon-refresh"></span> Ler comentários anteriores</a> -->
                          <ul class="list-group" id="containerComentario" data-well="">
                              
                          </ul>
                      </div>
                        <form class="modal-footer" id="enviarComentario" method="POST">
                          <input type="hidden" id="codUsuario" value="<?php echo $codUsuario; ?>">
                          <input type="hidden" id="foto" value="<?php echo $foto; ?>">
                          <input type="hidden" id="nome" value="<?php echo $nome; ?>">
                          <input type="hidden" id="sobrenome" value="<?php echo $sobrenome; ?>">
                          <input type="hidden" name="codPostagem" id="codPostagem" value="">
                          <div class="input-group">
                              <textarea id="cmt" name="txtComentario" class="form-control input-sm chat-input" placeholder="Escreva seu comentário aqui..." required style="resize:none; height: 30px;"></textarea>
                              <span class="input-group-btn">     
                                  <button type="submit" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-comment"></span></button>
                              </span>
                          </div>
                      </form>
                  </div>
              </div>
          </div>



          <form class="modal fade" method="POST" id="report" role="dialog">
              <div class="modal-dialog" role="document">
                <input type="hidden" id="codPost" name="codPost"/>
                <input type="hidden" name="codUser" id="codUser" value="<?php echo $codUsuario;?>">
                <input type="hidden" name="txtLink" id="txtLink">
                  <div class="modal-dialog modal-sm">
                      <div class="modal-content">
                          <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                              <span aria-hidden="true" class="glyphicon glyphicon-remove"></span>
                                                            </button>
                              <h4 class="modal-title" id="exampleModalLabel">Reportar ao administrador</h4>
                          </div>
                          <div class="modal-body">
                              <p>Você deseja realmente reportar esta publicação?</p>
                          </div>
                          <div class="modal-footer">
                              <button type="button" class="btn btn-default" data-dismiss="modal" aria-label="Close">Cancelar</button>
                              <input type="submit" class="btn btn-danger" value="Sim, reportar"/>
                          </div>
                      </div>
                  </div>
              </div>
          </form>


           <div class="modal fade" method="POST" id="sucesso" role="dialog">
              <div class="modal-dialog" role="document">
                <input type="hidden" id="codPost" name="codPost"/>
                <input type="hidden" name="codUser" id="codUser" value="<?php echo $codUsuario;?>">
                <input type="hidden" name="txtLink" id="txtLink">
                  <div class="modal-dialog modal-sm">
                      <div class="modal-content">
                          <div class="modal-body">
                              <p>Feito !</p>
                          </div>
                          <div class="modal-footer">
                              <button type="button" class="btn btn-sucess" data-dismiss="modal" aria-label="Close">Ok</button>
                          </div>
                      </div>
                  </div>
              </div>
          </div>

          <div class="modal fade" method="POST" id="erro" role="dialog">
              <div class="modal-dialog" role="document">
                <input type="hidden" id="codPost" name="codPost"/>
                <input type="hidden" name="codUser" id="codUser" value="<?php echo $codUsuario;?>">
                <input type="hidden" name="txtLink" id="txtLink">
                  <div class="modal-dialog modal-sm">
                      <div class="modal-content">
                          <div class="modal-body">
                              <p>Ops :/&nbsp; Houve um erro.</p>
                          </div>
                          <div class="modal-footer">
                              <button type="button" class="btn btn-sucess" data-dismiss="modal" aria-label="Close">Ok :/</button>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
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

        <form class="modal fade modalform" id="escola" role="dialog" method="POST" action="" data-controller="ambiente/attEscola">
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
                            <div class="form-group col-sm-6 col-md-6">
                              <small for="txtEscola" class="control-label pull-left">Nome da escola <span class="required">*</span></small>
                              <input id="txtEscola" name="txtEscola" class="form-control" type="text" placeholder="Insira o nome da unidade de ensino" value="<?php echo utf8_encode($escola['Nome']); ?>" required>
                            </div>
                            
                            <div class="form-group col-sm-6 col-md-6">
                              <small for="dtFundacao" class="control-label pull-left">Data de fundação</small>
                              <input id="dtFundacao" name="dtFundacao" class="form-control" type="date"  placeholder="Insira a data em que a  instituição foi fundada" value="<?php echo $escola['DataFundacao']; ?>" max="<?php echo date('Y-m-d');?>" required oninvalid="this.setCustomValidity('Viagens no tempo ainda não são possíveis :D')" oninput="setCustomValidity('')">
                            </div>

                            <div class="form-group col-sm-6 col-md-6">
                              <small for="txtWebsite" class="control-label pull-left">Website <span class="required">*</span></small>
                              <input id="txtWebsite" name="txtWebsite" class="form-control" type="text" placeholder="Insira o website da instituição de ensino" value="<?php echo ($escola['Website']); ?>">
                            </div>
                  
                            <div class="form-group col-sm-6 col-md-6">
                              <small for="txtCep" class="control-label pull-left">Cep </small>
                              <input id="txtCep" name="txtCep" class="form-control" type="text" placeholder="Insira o CEP da instituição" value="<?php echo $escola['Cep']; ?>">
                            </div>

                            <div class="form-group col-sm-6 col-md-6">
                              <small for="txtRua" class="control-label pull-left">Rua <span class="required">*</span></small>
                              <input id="txtRua" name="txtRua" class="form-control" type="text"  placeholder="Insira a rua da instituição" value="<?php echo utf8_encode($escola['Rua']); ?>" required>
                            </div>

                            <div class="form-group col-sm-6 col-md-6">
                              <small for="txtBairro" class="control-label pull-left">Bairro <span class="required">*</span></small>
                              <input id="txtBairro" name="txtBairro" class="form-control" type="text"  placeholder="Insira o bairro da instituição" value="<?php echo utf8_encode($escola['Bairro']); ?>" required>
                            </div>
                  
                            <div class="form-group col-sm-6 col-md-6">
                              <small for="txtCidade" class="control-label pull-left">Cidade <span class="required">*</span></small>
                              <input id="txtCidade" name="txtCidade" class="form-control" type="text" placeholder="Insira a cidade em que a instituição se situa" value="<?php echo utf8_encode($escola['Cidade']); ?>" required>
                            </div>
                                
                            <div class="form-group col-sm-6 col-md-6">
                              <small for="cmbEstado" class="control-label pull-left">Estado <span class="required">*</span></small>
                              <select name="cmbEstado" class="form-control" required>
                              <option selected value="<?php echo utf8_encode($escola['Estado']);?>"><?php echo utf8_encode($escola['Estado']);?></option>
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

        <form class="modal fade" id="funcionarios" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true" class="glyphicon glyphicon-remove" data-dismiss="close"></span>
                        </button>
                        <h4 class="modal-title" id="exampleModalLabel">Quadro de funcionários</h4>
                    </div>
                    <div class="modal-body">
                        <!-- <ul id="organisation">
                <li data-actor="Christian Bale"><em>Batman</em>
                    <ul>
                        <li>Batman Begins<br/>
                            <img class="star" src="star-one.png">
                            <img class="star" src="star-one.png">
                            <img class="star" src="star-one.png">
                            <img class="star" src="star-one.png">
                            <ul>
                                <li data-actor="Liam Neeson">Ra's Al Ghul</li>
                                <li data-actor="Tom Wilkinson">Carmine Falconi</li>
                            </ul>
                        </li>
                        <li>The Dark Knight<br/>
                            <img class="star" src="star-one.png">
                            <img class="star" src="star-one.png">
                            <img class="star" src="star-one.png">
                            <img class="star" src="star-one.png">
                            <img class="star" src="star-one.png">
                            <ul>
                                <li data-actor="Heath Ledger">Joker</li>
                                <li data-actor="Aaron Eckhart">Harvey Dent</li>
                            </ul>
                        </li>
                        <li>The Dark Knight Rises<br/>
                            <img class="star" src="star-one.png">
                            <img class="star" src="star-one.png">
                            <img class="star" src="star-one.png">
                            <img class="star" src="star-one.png">
                            <img class="star" src="star-half.png">
                            <ul>
                                <li data-actor="Tom Hardy">Bane</li>
                                <li data-actor="Marion Cotillard">Talia Al Ghul</li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul> -->
                    </div>
                    <div class="modal-footer">
                      <input class="btn btn-primary" type="button" value="Salvar" />
                    </div>
                </div>
            </div>
        </form>

        <form class="modal fade modalform" id="cursosCad" role="dialog" method="POST" action="" data-controller="ambiente/cadCurso">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true" class="glyphicon glyphicon-remove" data-dismiss="close"></span>
                        </button>
                        <h4 class="modal-title">Cursos</h4>
                    </div>
                    <div class="modal-body">
                      <div id="msg"></div>
                      <div class="row"> 
                            <div class="form-group col-md-12">
                              <small for="txtNome" class="control-label pull-left">Nome <span class="required">*</span></small>
                              <input id="txtNome" name="txtNome" class="form-control" type="text" placeholder="Insira o nome do curso" required />
                            </div>
                            

                            <div class="form-group col-md-3">
                              <small for="nbInicial" class="control-label pull-left">Módulo inicial <span class="required">*</span></small>
                              <input id="nbInicial" name="nbInicial" class="form-control" type="number" placeholder="Insira o número em módulo da série inicial. Ex.: 1º = 1" min="1" value="1" required />                              
                            </div>
                  
                            <div class="form-group col-md-3">
                              <small for="nbFinal" class="control-label pull-left">Módulo final <span class="required">*</span></small>
                              <input id="nbFinal" name="nbFinal" class="form-control" type="number" min="1" value="3" placeholder="Insira o número em módulo da série final. Ex.: 3º = 3" required />
                            </div>

                            <div class="form-group col-md-6">
                              <small for="cmbStatus" class="control-label">Status do curso <span class="required">*</span></small>
                              <select name="cmbStatus" id="cmbStatus" class="form-control" required>
                                <option selected value="">Selecione o status do curso</option>
                                <option value="1">Ativo</option>
                                <option value="0">Desativo</option>
                              </select>
                            </div>

                            <div class="form-group col-md-12">
                              <small for="txtDescricao" class="control-label pull-left">Descrição</small>
                              <textarea id="txtDescricao" name="txtDescricao" class="form-control" type="text" placeholder="Insira a descrição do curso"></textarea>
                            </div>
                          </div>
                      </div>
                    <div class="modal-footer">
                      <input class="btn btn-primary" type="reset" value="Limpar" />
                        <input class="btn btn-primary" type="submit" value="Salvar" />
                    </div>
                </div>
            </div>
        </form>

        <form class="modal fade modalform" id="turmasCad" role="dialog" method="POST" action="" data-controller="ambiente/cadTurma">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true" class="glyphicon glyphicon-remove" data-dismiss="close"></span>
                        </button>
                        <h4 class="modal-title" id="exampleModalLabel">Turmas</h4>
                    </div>
                    <div class="modal-body">
                      <div id="msg"></div>
                      <div class="row"> 
                      <?php if(!empty($cursosativos)): ?>
                            <div class="form-group col-sm-6 col-md-6">
                              <small for="txtNome" class="control-label pull-left">Identificação da turma <span class="required">*</span></small>
                              <input id="txtNome" name="txtNome" class="form-control" type="text" placeholder="Insira o nome da turma" required />
                            </div>
                            
                            <div class="form-group col-sm-6 col-md-6">
                                  <small for="cmbCurso" class="control-label pull-left">Curso<span class="required">*</span></small>
                                    <select name="cmbCurso" id="cmbCurso" class="form-control" required>
                                      <option value="" data-serie="">Selecione o curso correspondente</option>
                                      <?php  foreach ($cursosativos as $coluna): ?>
                                        <option value="<?php echo utf8_encode($coluna->CodCurso); ?>">
                                          <?php echo utf8_encode($coluna->Nome);?>
                                          </option>
                                      <?php endforeach; ?>
                                    </select>
                            </div>

                            <div class="form-group col-sm-6 col-md-6">
                              <small for="cmbModulo" class="control-label pull-left">Módulo <span class="required">*</span></small>
                              <select name="cmbModulo" id="cmbModulo" class="form-control" required>
                                <option selected value="">Selecione o período do curso</option>
                                <?php 
                                  $fim = 1;
                                  foreach ($cursosativos as $curso) :
                                    if((int)$curso->SerieFinal > $fim)
                                      $fim = (int)$curso->SerieFinal;
                                  endforeach;
                                  for ($i=1; $i <= $fim; $i++): ?>
                                      <option value="<?php echo $i;?>"><?php echo $i;?>º módulo</option>
                                    <?php endfor;
                                ?>
                              </select>                             
                            </div>
                            
                            <div class="form-group col-sm-6 col-md-6">
                              <small for="cmbPeriodo" class="control-label pull-left">Período <span class="required">*</span></small>
                              <select name="cmbPeriodo" class="form-control" required>
                                <option selected value="">Selecione o período do curso</option>
                                <option value="Integral">Integral</option>
                                <option value="Matutino">Matutino</option>
                                <option value="Vespertino">Vespertino</option>
                                <option value="Noturno">Noturno</option>
                              </select>
                            </div>
                  
                            <div class="form-group col-sm-6 col-md-6">
                              <small for="dtInicio" class="control-label pull-left">Início do período letivo</small>
                              <input id="dtInicio" name="dtInicio" class="form-control" type="date"  placeholder="Insira a data em que o período letivo irá começar" required oninvalid="this.setCustomValidity('Viagens no tempo ainda não são possíveis :D')" oninput="setCustomValidity('')">
                            </div>

                            <div class="form-group col-sm-6 col-md-6">
                              <small for="dtFinal" class="control-label pull-left">Final do período letivo</small>
                              <input id="dtFinal" name="dtFinal" class="form-control" type="date"  placeholder="Insira a data em que o período letivo irá terminar" required oninvalid="this.setCustomValidity('Viagens no tempo ainda não são possíveis :D')" oninput="setCustomValidity('')">
                            </div>

                            <div class="form-group col-sm-6 col-md-6">
                              <small for="nbQtd" class="control-label pull-left">Número de alunos <span class="required">*</span></small>
                              <input id="nbQtd" name="nbQtd" class="form-control" type="number" placeholder="Insira quantos alunos estão matriculados nessa turma" min="1" required />                              
                            </div>
                  
                      <?php endif; ?>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <input class="btn btn-primary" type="reset" value="Limpar" />
                      <input class="btn btn-primary" type="submit" value="Salvar" />
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
                    if($notificacao->Status == 1){
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
                              <h6 class="pull-right"><?php echo date('d/m/Y H:m', strtotime($notificacao->DataHora));?></h6><br/>
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
  <script type="text/javascript" src="<?= base_url("assets/js/scripts/commons.js");?>"></script>
  <script type="text/javascript">
  
  </script>
  <?php if(isset($filesfooter)){
        foreach ($filesfooter as $key => $value) {
            echo '<!-- script com '.$key.' -->';
            echo "\n";
            echo $value;
            echo "\n";
          }
        }
  ?>
</body>

</html>
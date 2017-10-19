<?php defined('BASEPATH') OR exit('No direct script access allowed');
?>

                    <div id="main">
                        <div class="container-fluid">
                            <div class="row">
                               <!--  <div class="page-header">
                                    <h3>Missão <i class="fa fa-puzzle-piece" aria-hidden="true"></i></h3>
                                </div> -->
                                <div class="page-header">
                                    <h3>Missões</h3>
                                </div>
                                <div class="page-body">
                                    <!--
                                     painel missões exibição para o aluno
                                <div class="panel-group" id="accordion">
                                  <div class="panel panel-primary">
                                    <div class="panel-heading">
                                            <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                          Nome da Missão
                                        </a>
                                      </h4>
                                        
                                    </div>
                                    <div id="collapseOne" class="panel-collapse collapse">
                                      <div class="panel-body">
                                        <div class="col-md-3 col-sm-12   col-lg-3 " align="center"> 
                                            <img alt="Professor fulano de tal" src="https://www.atomix.com.au/media/2015/06/atomix_user31.png" class="img-circle img-responsive"> 
                                          </div>
                                        <div class="col-md-9 col-lg-9 col-sm-12 "> 
                                          <table class="table table-user-information">
                                            <tbody>
                                              <tr>
                                                <td>Professor:</td>
                                                <td>*********</td>
                                              </tr>
                                              <tr>
                                                <td>Data de Entrega:</td>
                                                <td>***/***/***</td>
                                              </tr>
                                              <tr>
                                                <td>Descrição:</td>
                                                <td>
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal7">Ver Descrição</button>
                                                </td>
                                              </tr>
                                                <tr>
                                                <td>Conato do professor:</td>
                                                <td>
                                                    "email" ou "telefone"
                                                </td>
                                                </tr>
                                              </tbody>
                                            </table>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="panel panel-primary">
                                    <div class="panel-heading">
                                      <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                          informações
                                        </a>
                                      </h4>
                                    </div>
                                    <div id="collapseTwo" class="panel-collapse collapse">
                                      <div class="panel-body">
                                        <div class="container-fluid my-container">

                                    <div class="highlight">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <h2>
                                                    Apresentação seminário de Biologia
                                                    <img src="img/medalhas/bronze.gif" class="medalha"/>
                                                    <img src="img/medalhas/prata.gif" class="medalha"/>
                                                    <img src="img/medalhas/ouro.gif" class="medalha"/>
                                                    <img src="img/medalhas/platina.gif" class=" medalha"/>
                                                </h2>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-2 col-sm-2 col-xs-2">
                                            <i class="fa fa-5x fa-bolt" aria-hidden="true"></i>
                                            </div>
                                            <div class="col-md-10 col-sm-10 col-xs-10">
                                            <ul>
                                                <li>Atividade nível ouro prata bronze platina</li>
                                                <li>5 pontos em inteligência "alguma"</li>
                                                <li>Alguma outra recompensa aqui</li>
                                            </ul>
                                            </div>
                                            </div>
                                        <br/>
                                            <div class="row">
                                                <div class="col-md-5 pull-left">
                                                <button class="btn btn-sm btn-warning btn-missao" data-toggle="modal" data-target="#exampleModal9">Realizar missão</button>
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
-->
                                    <div class="panel-group" id="accordion">
                                        <div class="panel panel-primary">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                                        Criar missão
                                                    </a>
                                                </h4>

                                            </div>
                                            <div id="collapseOne" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                    
                                                    <div class="adjoined-bottom">
                                                        <div class="grid-container">
                                                            <div class="grid-width-100">
                                                                <form method="get">
                                                                    <textarea id="editor">
                                                                        <h1>Crie aqui sua atividade</h1>
                                                                        <p>Aqui você pode criar atividades diversas. Exemplos de atividades: formulário prova escrita atividade com vídeos</p>
                                                                    </textarea>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr/>
                                                    <form>
                                                    <div class="container-fluid">
                                                        <h4>Carregar arquivos</h4>
                                                        <div class="row">
                                                            <div class="col-xs-12 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                                                                <!-- image-preview-filename input [CUT FROM HERE]-->
                                                                <div class="input-group form-group image-preview">
                                                                    <input type="text" class="form-control image-preview-filename" disabled="disabled">
                                                                    <!-- don't give a name === doesn't send on POST/GET -->
                                                                    <span class="input-group-btn">
                                                                    <!-- image-preview-input -->
                                                                    <div class="btn btn-default image-preview-input">
                                                                        <span class="glyphicon glyphicon-folder-open"></span>
                                                                        <span class="image-preview-input-title">Buscar</span>
                                                                        <input type="file" accept="image/png, image/jpeg, image/gif" name="input-file-preview" />
                                                                        <!-- rename it -->
                                                                    </div>
                                                                    </span>
                                                                </div>
                                                                <!-- /input-group image-preview [TO HERE]-->
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr/>
                                                    <div class="container-fluid">
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                <div class="funkyradio">
                                                                    <h4>Nível da missão <i data-toggle="tooltip" data-placement="top" class="fa fa-question-circle-o" aria-hidden="true" data-html="true" title="<p>Recompense o aluno de acordo com o nível da atividade proposta. <br/> Nível bronze é ... <br/> Nível prata é... <br/> Nível ouro é... <br/> O nível platina é...</p>"></i></h4>
                                                                    <div class="funkyradio-info">
                                                                        <input type="radio" name="radio" id="radio1" />
                                                                        <label for="radio1">
                                                                <img src="img/medalhas/bronze.gif" class="medalha2">
                                                                Nível bronze
                                                            </label>
                                                                    </div>
                                                                    <div class="funkyradio-primary">
                                                                        <input type="radio" name="radio" id="radio2" />
                                                                        <label for="radio2"><img src="img/medalhas/prata.gif" class="medalha2">
                                                                Nível prata
                                                            </label>
                                                                    </div>
                                                                    <div class="funkyradio-success">
                                                                        <input type="radio" name="radio" id="radio3" />
                                                                        <label for="radio3">
                                                                <img src="img/medalhas/ouro.gif" class="medalha2">
                                                                Nível ouro
                                                            </label>
                                                                    </div>
                                                                    <div class="funkyradio-danger">
                                                                        <input type="radio" name="radio" id="radio4" />
                                                                        <label for="radio4">
                                                                <img src="img/medalhas/platina.gif" class="medalha2">
                                                                Nível platina 
                                                            </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <h4>
                                                                Inteligências que abrange <i data-toggle="tooltip" data-placement="top" class="fa fa-question-circle-o" aria-hidden="true" data-html="true" title="<p>Marque uma ou mais inteligências que essa atividade estimulará aos alunos.</p>"></i>
                                                            </h4>
                                                            <div class="col-md-5">
                                                                <div class="funkyradio">
                                                                    <div class="funkyradio-default">
                                                                        <input type="checkbox" name="checkbox" id="checkbox1" />
                                                                        <label for="checkbox1">Inteligencia lingüística</label>
                                                                    </div>
                                                                    <div class="funkyradio-primary">
                                                                        <input type="checkbox" name="checkbox" id="checkbox2" />
                                                                        <label for="checkbox2">Inteligencia lógico Matemática </label>
                                                                    </div>
                                                                    <div class="funkyradio-success">
                                                                        <input type="checkbox" name="checkbox" id="checkbox3" />
                                                                        <label for="checkbox3">Inteligencia espacial</label>
                                                                    </div>
                                                                    <div class="funkyradio-danger">
                                                                        <input type="checkbox" name="checkbox" id="checkbox4" />
                                                                        <label for="checkbox4">Inteligencia corporal cinestésica</label>
                                                                    </div>
                                                                    <div class="funkyradio-warning">
                                                                        <input type="checkbox" name="checkbox" id="checkbox5" />
                                                                        <label for="checkbox5">Inteligencia musical</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="funkyradio">
                                                                    <div class="funkyradio-secondary">
                                                                        <input type="checkbox" name="checkbox" id="checkbox6"/>
                                                                        <label for="checkbox6">Inteligencia intrapessoal</label>
                                                                    </div>
                                                                    <div class="funkyradio-quintly">
                                                                        <input type="checkbox" name="checkbox" id="checkbox7"/>
                                                                        <label for="checkbox7">Inteligencia interpessoal</label>
                                                                    </div>
                                                                    <div class="funkyradio-tertiary">
                                                                        <input type="checkbox" name="checkbox" id="checkbox8" />
                                                                        <label for="checkbox8">Inteligencia naturalista</label>
                                                                    </div>
                                                                    <div class="funkyradio-quarterly">
                                                                        <input type="checkbox" name="checkbox" id="checkbox9" />
                                                                        <label for="checkbox9">Inteligencia existencial</label>
                                                                    </div>
                                                                    <div class="funkyradio-info">
                                                                        <input type="checkbox" name="checkbox" id="checkbox10" />
                                                                        <label for="checkbox10">Inteligencia prática</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr/>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <input id="txtData" name="data" type="date" class="form-control" required>
                                                                    <label for="txtData">Data de entrega</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <textarea id="message" name="phone" class="form-control" required></textarea>
                                                                    <label for="message">Descrição</label>
                                                                </div>
                                                            </div>
                                                            <div class="btn-group col-md-12">
                                                                <button type="submit"  class="btn btn-success">Salvar e enviar missão</button>
                                                                <button type="reset"  class="btn btn-danger">limpar</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-primary">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                                        Missões completas
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapseTwo" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                    <div class="container-fluid">
                                                       <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="panel panel-default">
                                                                    <div class="panel-body">
                                                                        <div class="pull-right">
                                                                            <div class="btn-group">
                                                                                <button type="button" class="btn btn-success btn-filter" data-target="entregue">Entregues</button>
                                                                                <button type="button" class="btn btn-warning btn-filter" data-target="pendente">Pendentes</button>
                                                                                <button type="button" class="btn btn-danger btn-filter" data-target="cancelado">Cancelado</button>
                                                                                <button type="button" class="btn btn-default btn-filter" data-target="todos">Todos</button>
                                                                            </div>
                                                                        </div>
                                                                        <div class="table-container">
                                                                            <table class="table table-filter">
                                                                                <tbody>
                                                                                    <tr data-status="entregue">
                                                                                        <td>
                                                                                            <a href="#" class="dropdown-toggle" data-toggle="modal" data-target="#exampleModal10">
                                                                                                <button class="btn btn-default">
                                                                                                    <i class="fa fa-eye fa-1x"></i>
                                                                                                    <i class="fa fa-eye-slash" aria-hidden="true"></i>
                                                                                                </button>
                                                                                            </a> 
                                                                                        </td>
                                                                                        <td>
                                                                                            <a href="javascript:;" class="star">
                                                                                                <i class="glyphicon glyphicon-star"></i>
                                                                                            </a>
                                                                                        </td>
                                                                                        <td>
                                                                                            <div class="media">
                                                                                                <a href="#" class="pull-left">
                                                                                                    <img src="https://s3.amazonaws.com/uifaces/faces/twitter/fffabs/128.jpg" class="media-photo">
                                                                                                </a>
                                                                                                <div class="media-body">
                                                                                                    <span class="media-meta pull-right">Febrero 13, 2016</span>
                                                                                                    <h4 class="title">
                                                                                                        Lorem Impsum
                                                                                                        <span class="pull-right pagado">ENTREGUE</span>
                                                                                                    </h4>
                                                                                                    <p class="summary">Ut enim ad minim veniam, quis nostrud exercitation...</p>
                                                                                                </div>
                                                                                            </div>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr data-status="pendente">
                                                                                        <td>
                                                                                            <a href="#" class="dropdown-toggle" data-toggle="modal" data-target="#exampleModal10">
                                                                                                <button class="btn btn-default">
                                                                                                    <i class="fa fa-eye fa-1x"></i>
                                                                                                    <i class="fa fa-eye-slash" aria-hidden="true"></i>
                                                                                                </button>
                                                                                            </a> 
                                                                                        </td>
                                                                                        <td>
                                                                                            <a href="javascript:;" class="star">
                                                                                                <i class="glyphicon glyphicon-star"></i>
                                                                                            </a>
                                                                                        </td>
                                                                                        <td>
                                                                                            <div class="media">
                                                                                                <a href="#" class="pull-left">
                                                                                                    <img src="https://s3.amazonaws.com/uifaces/faces/twitter/fffabs/128.jpg" class="media-photo">
                                                                                                </a>
                                                                                                <div class="media-body">
                                                                                                    <span class="media-meta pull-right">Febrero 13, 2016</span>
                                                                                                    <h4 class="title">
                                                                                                        Lorem Impsum
                                                                                                        <span class="pull-right pendiente">PENDENTE</span>
                                                                                                    </h4>
                                                                                                    <p class="summary">Ut enim ad minim veniam, quis nostrud exercitation...</p>
                                                                                                </div>
                                                                                            </div>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr data-status="cancelado">
                                                                                        <td>
                                                                                            <a href="#" class="dropdown-toggle" data-toggle="modal" data-target="#exampleModal10">
                                                                                                <button class="btn btn-default">
                                                                                                    <i class="fa fa-eye fa-1x"></i>
                                                                                                    <i class="fa fa-eye-slash" aria-hidden="true"></i>
                                                                                                </button>
                                                                                            </a> 
                                                                                        </td>
                                                                                        <td>
                                                                                            <a href="javascript:;" class="star">
                                                                                                <i class="glyphicon glyphicon-star"></i>
                                                                                            </a>
                                                                                        </td>
                                                                                        <td>
                                                                                            <div class="media">
                                                                                                <a href="#" class="pull-left">
                                                                                                    <img src="https://s3.amazonaws.com/uifaces/faces/twitter/fffabs/128.jpg" class="media-photo">
                                                                                                </a>
                                                                                                <div class="media-body">
                                                                                                    <span class="media-meta pull-right">Febrero 13, 2016</span>
                                                                                                    <h4 class="title">
                                                                                                        Lorem Impsum
                                                                                                        <span class="pull-right cancelado">CANCELADO</span>
                                                                                                    </h4>
                                                                                                    <p class="summary">Ut enim ad minim veniam, quis nostrud exercitation...</p>
                                                                                                </div>
                                                                                            </div>
                                                                                        </td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


<?php 
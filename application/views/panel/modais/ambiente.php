        
        <!-- ESCOLA -->

        <!-- ALTERAR -->
        <form class="modal fade modalupd" id="escola" role="dialog" method="POST" action="" data-controller="ambiente/attEscola">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close att" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true" class="glyphicon glyphicon-remove" data-dismiss="close"></span>
                        </button>
                        <h4 class="modal-title" id="exampleModalLabel">Escola</h4>
                    </div>
                    <div class="modal-body">
                      <div id="msg"></div>
                      <div class="row"> 
                            <div class="form-group col-sm-6 col-md-6">
                              <small for="txtEscola" class="control-label pull-left">Nome da escola <span class="required">*</span></small>
                              <input id="txtEscola" name="txtEscola" class="form-control" type="text" placeholder="Insira o nome da unidade de ensino" value="<?php echo $escola['Nome'];?>" required>
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

        <!--FUNCIONÁRIOS -->

        <!-- CADASTRAR -->
        <form class="modal fade modalcad" id="funcCad" role="dialog" data-controller="ambiente/cadHierarquia">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close att" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true" class="glyphicon glyphicon-remove" data-dismiss="close"></span>
                        </button>
                        <h4 class="modal-title" id="exampleModalLabel">Quadro de funcionários</h4>
                    </div>
                    <div class="modal-body wrapper">
                      <div id="msg"></div>
                      <div class="row"> 
                            <div class="form-group col-md-5">
                              <small for="txtNome" class="control-label pull-left">Cargo <span class="required">*</span></small><br/>
                              <input id="txtNome" name="txtNome" class="form-control" type="text" placeholder="Ex.: Diretor, Coordenador, etc." maxlength="150" required />
                            </div>
                            

                            <div class="form-group col-md-3">
                              <small for="nbFuncionarios" class="control-label pull-left">Nº funcionários <span class="required">*</span></small><br/>
                              <input id="nbFuncionarios" name="nbFuncionarios" class="form-control" type="number" placeholder="Insira o número de funcionários neste cargo" min="1" value="1" required />                              
                            </div>

                            <div class="form-group col-md-3">
                              <small for="cmbNivel" class="control-label">Nível <span class="required">*</span></small>
                              <select name="cmbNivel" id="cmbNivel" class="form-control" required>
                                <option selected value="">Selecione o nível de hierarquia</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                              </select>
                            </div>
                            <div class="form-group col-md-12">
                              <small for="txtDescricao" class="control-label pull-left">Descrição</small>
                              <textarea id="txtDescricao" name="txtDescricao" class="form-control" type="text" placeholder="Insira a descrição deste cargo" maxlength="200"></textarea>
                            </div>
                          </div>
                      </div>
                    <div class="modal-footer">
                      <!-- <input class="btn btn-primary pull-left" id="addField" type="button" value="Adicionar categoria" /> -->  
                      <input class="btn btn-primary" type="submit" value="Salvar" />
                    </div>
                </div>
            </div>
        </form>

        <!-- ALTERAR -->
        <form class="modal fade modalupd" id="funcUpd" role="dialog" data-controller="ambiente/attHierarquia">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close att" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true" class="glyphicon glyphicon-remove" data-dismiss="close"></span>
                        </button>
                        <h4 class="modal-title" id="exampleModalLabel">Quadro de funcionários</h4>
                    </div>
                    <div class="modal-body wrapper">
                      <div id="msg"></div>
                      <div class="row"> 
                             <input type="hidden" id="hiddenCod" name="hiddenCod">                     
                            <div class="form-group col-md-5">
                              <small for="txtNome" class="control-label pull-left">Cargo <span class="required">*</span></small><br/>
                              <input id="txtNome" name="txtNome" class="form-control" type="text" placeholder="Ex.: Diretor, Coordenador, etc." maxlength="150" required />
                            </div>
                            

                            <div class="form-group col-md-3">
                              <small for="cmbNivel" class="control-label">Nível <span class="required">*</span></small>
                              <select name="cmbNivel" id="cmbNivel" class="form-control" required>
                                <option value="">Selecione o nível de hierarquia</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                              </select>
                            </div>
                            <div class="form-group col-md-12">
                              <small for="txtDescricao" class="control-label pull-left">Descrição</small>
                              <textarea id="txtDescricao" name="txtDescricao" class="form-control" type="text" placeholder="Insira a descrição deste cargo" maxlength="200"></textarea>
                            </div>
                          </div>
                      </div>
                    <div class="modal-footer">
                      <!-- <input class="btn btn-primary pull-left" id="addField" type="button" value="Adicionar categoria" /> -->  
                      <input class="btn btn-primary" type="submit" value="Salvar" />
                    </div>
                </div>
            </div>
        </form>



        <!-- CURSOS -->

        <!-- CADASTRAR -->
        <form class="modal fade modalcad" id="cursosCad" role="dialog" method="POST" action="" data-controller="ambiente/cadCurso">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close att" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true" class="glyphicon glyphicon-remove" data-dismiss="close"></span>
                        </button>
                        <h4 class="modal-title">Cursos</h4>
                    </div>
                    <div class="modal-body">
                      <div id="msg"></div>
                      <div class="row"> 
                            <div class="form-group col-md-12">
                              <small for="txtNome" class="control-label pull-left">Nome <span class="required">*</span></small>
                              <input id="txtNome" name="txtNome" class="form-control" type="text" placeholder="Insira o nome do curso" maxlength="150" required />
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

        <!-- ALTERAR -->
        <form class="modal fade modalupd" id="cursosUpd" role="dialog" method="POST" action="" data-controller="ambiente/alteraCurso">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close att" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true" class="glyphicon glyphicon-remove" data-dismiss="close"></span>
                        </button>
                        <h4 class="modal-title">Alterar curso</h4>
                    </div>
                    <div class="modal-body">
                      <div id="msg"></div>
                      <div class="row"> 
                            <input type="hidden" id="hiddenCod" name="hiddenCod">
                            <div class="form-group col-md-12">
                              <small for="txtNome" class="control-label pull-left">Nome <span class="required">*</span></small>
                              <input id="txtNome" name="txtNome" class="form-control" type="text" placeholder="Insira o nome do curso" maxlength="150" required />
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
                                <option value="">Selecione o status do curso</option>
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


        <!--TURMAS -->

        <!-- CADASTRAR -->
        <form class="modal fade modalcad" id="turmasCad" role="dialog" method="POST" action="" data-controller="ambiente/cadTurma">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close att" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true" class="glyphicon glyphicon-remove" data-dismiss="close"></span>
                        </button>
                        <h4 class="modal-title" id="">Turmas</h4>
                    </div>
                    <div class="modal-body">
                      <div id="msg"></div>
                      <div class="row"> 
                      <?php if(!empty($cursosativos)): ?>
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

                              <div class="form-group col-sm-6 col-md-6 ">
                                  <div class="form-control">
                                    <input type="text" id="txtModulo" disabled class=" disabled" style="background-color:transparent;border:transparent;margin:0;width: 1em;">
                                  <!-- </div>
                                   <div class="form-group col-sm-3 col-md-3"> -->
                                    <input type="text" id="txtIdn" disabled class="disabled" style="background-color:transparent;border:transparent;margin:0;width: auto;">
                                  </div>
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

        <!-- ALTERAR -->
        <form class="modal fade modalupd" id="turmasUpd" role="dialog" method="POST" action="" data-controller="ambiente/alteraTurma">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close att" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true" class="glyphicon glyphicon-remove" data-dismiss="close"></span>
                        </button>
                        <h4 class="modal-title" id="exampleModalLabel">Alterar turmas</h4>
                    </div>
                    <div class="modal-body">
                      <div id="msg"></div>
                      <div class="row"> 
                      <?php if(!empty($cursosativos)): ?>
                            <input type="hidden" id="hiddenCod" name="hiddenCod"><div class="form-group col-sm-6 col-md-6">
                              <small for="cmbModulo" class="control-label pull-left">Módulo <span class="required">*</span></small>
                              <select name="cmbModulo" id="cmbModulo" class="form-control" required>
                                <option value="">Selecione o período do curso</option>
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
                              <small for="cmbPeriodo" class="control-label pull-left">Período <span class="required">*</span></small>
                              <select name="cmbPeriodo" id="cmbPeriodo" class="form-control" required>
                                <option value="">Selecione o período do curso</option>
                                <option value="Integral" id="integral">Integral</option>
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

                            <div class="form-group col-sm-6 col-md-6 ">
                              <!-- <small for="nbQtd" class="control-label pull-left">Visualização</small> -->
                                  <div class="form-control">
                                    <input type="text" id="txtModulo" disabled class="disabled" style="background-color:transparent;border:transparent;margin:0;width: 1.5em;">
                                  <!-- </div>
                                   <div class="form-group col-sm-3 col-md-3"> -->
                                    <input type="text" id="txtIdn" disabled class="disabled" style="background-color:transparent;border:transparent;margin:0;width: auto;">
                                  </div>
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
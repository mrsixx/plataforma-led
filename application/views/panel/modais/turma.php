        <!-- COMPONENTES CURRICULARES -->
        <form class="modal fade modalcad" id="compAdd" role="dialog" method="POST" action="" data-controller="<?= base_url('ambiente/cadComp') ?>">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close att" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true" class="glyphicon glyphicon-remove" data-dismiss="close"></span>
                        </button>
                        <h4 class="modal-title">Componentes curriculares</h4>
                    </div>
                    <div class="modal-body">
                      <div id="msg"></div>
                      <div class="row"> 
                            <input type="hidden" name="cod" id="cod" />
                            <div id="campos">
                              <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                <small for="txtNome" class="control-label pull-left">Nome <span class="required">*</span></small>
                                <input id="txtNome" name="txtNome" class="form-control" type="text" placeholder="Insira o nome do componente" required />
                              </div>
                              <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                <small for="txtSigla" class="control-label pull-left">Sigla <span class="required">*</span></small>
                                  <input id="txtSigla" name="txtSigla" class="form-control" type="text" placeholder="Insira a sigla do componente" required />
                              </div>
                              <?php if(!empty($professor)):?>
                              <div class="form-group col-sm-12 col-md-12">
                              <small for="cmbProfessor" class="control-label pull-left">Professor</small>
                              <select name="cmbProfessor" id="cmbProfessor" class="form-control">
                              <option selected value="" disabled>Selecione o ministrante desse componente</option>
                              <option value="1">Aguardando cadastro...</option>
                              <?php foreach($professor as $prof):?>
                                <option value="<?php echo $prof->CodUsuario;?>"><?php echo utf8_encode($prof->Nome." ".$prof->Sobrenome);?></option>
                              <?php endforeach;?>
                              </select>
                            </div>
                            <?php endif;?>
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

        <form class="modal fade modalupd" id="compUpd" role="dialog" method="POST" action="" data-controller="<?= base_url('ambiente/alteraComp')?>">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close att" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true" class="glyphicon glyphicon-remove" data-dismiss="close"></span>
                        </button>
                        <h4 class="modal-title">Componentes curriculares</h4>
                    </div>
                    <div class="modal-body">
                      <div id="msg"></div>
                      <div class="row"> 
                            <input type="hidden" name="cod" id="cod" />
                            <div id="campos">
                              <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                <small for="txtNome" class="control-label pull-left">Nome <span class="required">*</span></small>
                                <input id="txtNome" name="txtNome" class="form-control" type="text" placeholder="Insira o nome do componente" required />
                              </div>
                              <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                <small for="txtSigla" class="control-label pull-left">Sigla <span class="required">*</span></small>
                                  <input id="txtSigla" name="txtSigla" class="form-control" type="text" placeholder="Insira a sigla do componente" required />
                              </div>
                              <?php if(!empty($professor)):?>
                              <div class="form-group col-sm-12 col-md-12">
                              <small for="cmbProfessor" class="control-label pull-left">Professor</small>
                              <select name="cmbProfessor"  id="cmbProfessor" class="form-control">
                                <!-- <option value="">Selecione o ministrante desse componente</option> -->
                              <option value="" disabled>Selecione o ministrante desse componente</option>
                              <option value="1">Aguardando cadastro...</option>
                              <?php foreach($professor as $prof):?>
                                <option value="<?php echo $prof->CodUsuario;?>"><?php echo utf8_encode($prof->Nome." ".$prof->Sobrenome);?></option>
                              <?php endforeach;?>
                              </select>
                            </div>
                            <?php endif;?>
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
 <div class="modal fade" id="descricao" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true" class="glyphicon glyphicon-remove"></span>
                                </button>
                                <h4 class="modal-title" id="exampleModalLabel">Descrição</h4>
                            </div>
                            <div class="modal-body">
                                <p><?php echo utf8_encode($missoes['Descricao']);?></p>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- <div class="modal fade" id="download" name="download" role="dialog">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true" class="glyphicon glyphicon-remove"></span>
                                </button>
                                <h4 class="modal-title" id="exampleModalLabel">"Nome da Missão"</h4>
                            </div>
                            <div class="modal-body">
                                se for feito no nosso editor coloca aqui o html da página que o arquivinho do professor gerou<br/>
                                <div class="embed-responsive embed-responsive-4by3">
                                    <iframe class="embed-responsive-item" src="https://ckeditor.com/ckeditor-5-builds/#classic"></iframe>
                                </div>
                                <hr/> se não coloca o endereço do arquivo que o professor upou<br/>

                                <div class="container-fluid">
                                    <div class="row">

                                        <div class="col-xs-12 col-md-6 col-sm-2">
                                            <h3>Faça download da missão aqui</h3>
                                            <button type="button" class="btn dMissao">
                                                  <a href="#" download="#"><span class="glyphicon glyphicon-cloud-download"></span> Fazer download da missão</a>
                                                </button>
                                        </div>

                                        <div class="col-xs-12 col-md-6 col-sm-8">
                                            <h3>Completar Missão</h3>
                                            <div class="input-group image-preview">
                                                <input type="text" placeholder="Escolher arquivo" class="form-control image-preview-filename" disabled="disabled">
                                                <span class="input-group-btn">
                                                            <button type="button" class="btn btn-default image-preview-clear" style="display:none;">
                                                                <span class="glyphicon glyphicon-remove"></span> Limpar
                                                </button>
                                                <button type="button" class="btn btn-success image-preview-clear" style="display:none;">
                                                                <span class="glyphicon glyphicon-ok"></span> Enviar
                                                            </button>
                                                <div class="btn btn-default image-preview-input">
                                                    <span class="glyphicon glyphicon-folder-open"></span>
                                                    <span class="image-preview-input-title">Buscar</span>
                                                    <input type="file" accept="image/png, image/jpeg, image/gif" name="input-file-preview" />
                                                </div>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->

                <form class="modal fade" id="confirmXp" name="confirmXp" role="dialog" method="post">
                    <div class="modal-dialog modal-xs" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true" class="glyphicon glyphicon-remove"></span>
                                </button>
                                <h4 class="modal-title" id="exampleModalLabel">Confirmação</h4>
                            </div>
                            <div class="modal-body">
                                <p>Este aluno receberá <?php echo $missoes['Premio']." pontos de experiência."; ?></p>
                            </div>
                            <div class="modal-footer">
                                <input type="hidden" name="CodUsuario" id="CodUsuario">
                                <input type="hidden" name="CodDesempenho" id="CodDesempenho">
                                <input type="hidden" name="Premio" id="Premio">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                <input type="submit" class="btn btn-success" class="premiaXP" value="Ok, continuar" />
                            </div>
                        </div>
                    </div>
                </form>




                <div class="modal fade" id="exampleModal10" role="dialog">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true" class="glyphicon glyphicon-remove"></span>
                                </button>
                                <h4 class="modal-title" id="exampleModalLabel">"Nome da Missão"</h4>
                            </div>
                            <div class="modal-body">
                                <hr/>coloca o endereço do arquivo que o Aluno upou<br/>

                                <div class="container-fluid">
                                    <div class="row">

                                        <div class="col-xs-12 col-md-6 col-sm-2">
                                            <h3>Atividade pronta</h3>
                                            <button type="button" class="btn dMissao">
                                                  <a href="#" download="#"><span class="glyphicon glyphicon-cloud-download"></span> Fazer download da missão</a>
                                                </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    $this->load->view('install/commons/header_install');
?>

                    <div class="col-md-8 col-md-offset-2">
                        <span>Preencha os campos abaixo com as informações da sua escola.<br/> Campos sinalizados com <span class="required">*</span> são obrigatórios.</span>
                        <!--FORMULARIO-->
                        <form class="form-validate form-vertical" id="formExemplo" data-toggle="validator" role="form" method="POST" action="<?php echo base_url('configuracao/cadastro-escola'); ?>">
                            <br/>
                            <div class="form-group">
                                <label for="txtEscola" class="control-label pull-left">Nome da escola <span class="required">*</span></label>
                                <input id="txtEscola" name="txtEscola" class="form-control" type="text" placeholder="Insira o nome da unidade de ensino" required>
                            </div>
                            <div class="form-group">
                                <label for="dtFundacao" class="control-label pull-left">Data de fundação</label>
                                <input id="dtFundacao" name="dtFundacao" class="form-control" type="date"  placeholder="Insira a data em que a instituição foi fundada" required>
                            </div>
							
							<div class="form-group">
                                <label for="txtCep" class="control-label pull-left">Cep </label>
                                <input id="txtCep" name="txtCep" class="form-control" type="text" placeholder="Insira o CEP da instituição">
                            </div>

                            <div class="form-group">
                                <label for="txtRua" class="control-label pull-left">Rua <span class="required">*</span></label>
                                <input id="txtRua" name="txtRua" class="form-control" type="text"  placeholder="Insira a rua da instituição" required>
                            </div>
							
                            <div class="form-group">
                                <label for="txtCidade" class="control-label pull-left">Cidade <span class="required">*</span></label>
                                <input id="txtCidade" name="txtCidade" class="form-control" type="text" placeholder="Insira a cidade em que a instituição se situa" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="cmbEstado" class="control-label pull-left">Estado <span class="required">*</span></label>
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
                            <button type="submit" id="btnEnviar" class="btn btn-primary pull-right">Próximo</button>
                            <br/>
                        </form>
                        <!--\FORMULARIO-->
                    </div>
                     <!--<div class="modal fade" id="bemVindo">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header bg-primary">
                                    <h4 class="modal-title">Bem-vindo(a) ao LED</h4>
                                </div>
                                <div class="modal-body">
                                    <p>O Led é um LMS &#40;Sistema de Gerenciamento de Aprendizagem&#41; idealizado no intuito de aproximar toda a comunidade escolar. Cada passo na criação dessa plataforma foi tomado com carinho para que os alunos e funcionários desta instituição de ensino passem a se organizar e interagir melhor, enquanto se divertem e adquirem inúmeras conquistas e experiências.</p>
                                    <p>Antes de prosseguir com a instalação, certifique-se que possui as seguintes informações:</p>
                                    <ol>
                                        <li>Servidor do banco de dados;</li>
                                        <li>Nome de usuario do banco de dados;</li>
                                        <li>Senha do banco de dados;</li>
                                        <li>Nome do banco de dados.</li>
                                    </ol>
                                    <p>Essas informações serão utilizadas para criação de um arquivo de configuração. Se de alguma forma esse arquivo não for gerado automaticamente, abra o arquivo <code>config-reserva.php</code> em um editor de textos e siga as instruções. Caso qualquer imprevisto venha a surgir, <a href="#">teremos prazer em ajudar</a>.</p>
                                    <p>Geralmente essas informações são fornecidas pelo seu serviço de hospedagem.</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-warning" data-dismiss="modal">Instalar LED</button>
                                </div>
                            </div>
                        </div>
                    </div>-->
                </div>
            </div>
        </div>
        <!--<script>
            $(function() {
                $(function modal() {
                    $("body").ready(function modal() {
                        $("#bemVindo").modal();
                    });
                });
            });
        </script>-->
<?php $this->load->view('install/commons/footer_install'); 
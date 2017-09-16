<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    $this->load->view('install/commons/header_install');
?>

                    <div class="col-md-8 col-md-offset-2">
                        <span>Já que você quem fará tudo acontecer vamos começar a configuração a partir de seu cadastro \0/.<br/><br/>Preencha todos os campos, pois eles são obrigatórios :) </span>
                        <!--FORMULARIO-->
                        <form class="form-validate form-vertical" id="formExemplo" data-toggle="validator" role="form" method="POST" action="<?php echo base_url('configuracao/cadastro-admin'); ?>">
                            <br/>
                            <div class="row">
                                <div class="form-group col-md-6 col-xs-12">
                                    <label for="txtNome">Nome</label>
                                    <input type="text" class="form-control" id="txtNome" name="txtNome" placeholder="Insira seu nome" maxlength="50" required>
                                </div>
                                <div class="form-group col-md-6 col-xs-12">
                                    <label for="txtSobrenome">Sobrenome</label>
                                    <input type="text" class="form-control" id="txtSobrenome" name="txtSobrenome" placeholder="Insira seu sobrenome" maxlength="50" required>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="form-group col-md-6 col-xs-12">
                                    <label for="txtNick">Nickname</label>
                                    <input type="text" class="form-control" id="txtNick" name="txtNick" placeholder="Seu nome no mundo LED" maxlength="10" required>
                                </div>
                                <div class="form-group col-md-6 col-xs-12">
                                    <label for="cmbSexo">Sexo</label>
				                    <select name="cmbSexo" id="cmbSexo" class="form-control" required>
									<option selected disabled >Selecione seu sexo</option>
									<option value="M">Masculino</option>
									<option value="F">Feminino</option>
								</select>						
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="dtNascimento" class="control-label pull-left">Data de nascimento</label>
                                <input id="dtNascimento" name="dtNascimento" class="form-control" type="date"  placeholder="Insira a data em que a instituição foi fundada" max="<?php echo date('Y-m-d');?>" required oninvalid="this.setCustomValidity('Viagens no tempo ainda não são possíveis :D')" oninput="setCustomValidity('')">
                            </div>
                            
                            <div class="form-group">
                                <label for="txtCidade" class="control-label pull-left">Cidade</label>
                                <input id="txtCidade" name="txtCidade" class="form-control" type="text" placeholder="Insira o nome de sua cidade" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="txtEmail" class="control-label pull-left">Email</label>
                                <input id="txtEmail" name="txtEmail" class="form-control" type="text" placeholder="Insira seu email"  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="txtSenha" class="control-label pull-left">Senha</label>
                                <input id="txtSenha" name="txtSenha" class="form-control" type="password" placeholder="Insira sua senha" required />
                            </div>
                            
                            <div class="form-group">
                                <label for="txtSenha" class="control-label pull-left">Confirmação de senha</label>
                                <input id="txtSenha" name="txtConfirma" class="form-control" type="password" placeholder="Confirme sua senha" required>
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
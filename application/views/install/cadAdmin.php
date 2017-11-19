<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    $this->load->view('install/commons/header_install');
?>

                    <div class="col-md-8 col-md-offset-2">
                        <span>Já que você quem fará tudo acontecer vamos começar a configuração a partir de seu cadastro \0/.<br/><br/>Preencha todos os campos, pois eles são obrigatórios :) </span>
                        <!--FORMULARIO-->
                        <form class="form-validate form-vertical" id="formExemplo" data-toggle="validator" role="form" method="POST" action="/configuracao/cadastro-admin">
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
                        <br/>
<?php $this->load->view('install/commons/footer_install'); 
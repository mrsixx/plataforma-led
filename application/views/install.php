<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    $this->load->view('commons/header_install');
?>

                    <div class="col-md-8 col-md-offset-2">
                        <span>Preencha os campos abaixo com as informações de conexão com a base de dados.</span>
                        <!--FORMULARIO-->
                        <form class="form-validate form-vertical" id="formExemplo" data-toggle="validator" role="form" method="POST" action="<?php echo base_url('instalacao'); ?>">
                            <br/>
                            <div class="form-group">
                                <label for="textUrl" class="control-label pull-left">Url de hospedagem</label>
                                <input id="txtUrl" name="txtUrl" class="form-control" type="text" value="" placeholder="Insira o link URL de acesso a plataforma" required>
                            </div>
                            <div class="form-group">
                                <label for="txtHost" class="control-label pull-left">Servidor do banco de dados</label>
                                <input id="txtHost" name="txtHost" class="form-control" type="text" value="localhost" placeholder="Insira o host fornecido pelo serviço de hospedagem" required>
                            </div>
                            <div class="form-group">
                                <label for="txtBanco" class="control-label pull-left">Nome do banco de dados</label>
                                <input id="txtBanco" name="txtBanco" class="form-control" type="text" value="plataformaLed" placeholder="Insira o nome fornecido pelo serviço de hospedagem" required>
                            </div>

                            <div class="form-group">
                                <label for="txtUsuario" class="control-label pull-left">Nome de usuário do banco de dados</label>
                                <input id="txtUsuario" name="txtUsuario" class="form-control" type="text" value="root" placeholder="Insira o nome de usuário fornecido pelo serviço de hospedagem" required>
                            </div>

                            <div class="form-group">
                                <label for="txtSenha" class="control-label pull-left">Senha do banco de dados</label>
                                <input id="txtSenha" name="txtSenha" class="form-control" type="password" value="" placeholder="Insira a senha fornecido pelo serviço de hospedagem">
                            </div>

                            <div class="form-group">
                                <label for="txtPrefixo" class="control-label pull-left">Prefixo das tabelas</label>
                                <input id="txtPrefixo" name="txtPrefixo" class="form-control" type="text" value="led_" placeholder="Insira caso queira rodar várias instalações da Plataforma LED no mesmo banco">
                            </div>

                            <button type="submit" id="btnEnviar" class="btn btn-primary pull-right">Prosseguir instalação</button>
                            <br/>
                        </form>
                        <!--\FORMULARIO-->
                    </div>
                    <div class="modal fade" id="bemVindo">
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
                    </div>
                </div>
            </div>
        </div>
        <script>
            $(function() {
                $(function modal() {
                    $("body").ready(function modal() {
                        $("#bemVindo").modal();
                    });
                });
            });
        </script>
<?php $this->load->view('commons/footer_install'); 
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>
            <?php echo $title;?>
        </title>
        <link rel="shortcut icon" href="<?= base_url("assets/img/favicon.ico ");?>">
        <!-- Incluindo o CSS do Bootstrap -->
        <link href="<?= base_url("assets/css/bootstrap.min.css "); ?>" rel="stylesheet" media="screen">
        <!-- Incluindo o CSS do Bootstrap -->
        <link href="<?= base_url("assets/css/home.css "); ?>" rel="stylesheet" media="screen">
        <!-- Incluindo o jQuery que é requisito do JavaScript do Bootstrap -->
        <script src="<?= base_url("assets/js/jquery-3.2.1.min.js "); ?>"></script>
        <!-- Incluindo o JavaScript do Bootstrap -->
        <script src="<?= base_url("assets/js/bootstrap.min.js "); ?>"></script>
    </head>

    <body>
        <div class="container-fluid">
            <div class="carousel slide carousel-fade" data-ride="carousel">
                <!-- SLIDER -->
                <div class="carousel-inner" role="listbox">
                    <div class="item active">
                    </div>
                    <div class="item">
                    </div>
                    <div class="item">
                    </div>
                </div>
            </div>
            <!-- Modal -->
            <div class="modal-dialog modal-lg" role="container">
                <div class="modal-content">
                    <div class="modal-header">
                        <center>
                            <h5 class="modal-title" id="exampleModalLabel"><img src="<?= base_url("assets/img/logo.png ") ?>" class="img img-responsive logo"></h5>
                        </center>
                    </div>
                    <div class="modal-body">
                        <div class="row vdivide">
                            <div class="col-xs-12 col-md-6">
                                <h2 align="center">Login</h2>
                                <hr class="some">
                                <form method="post" action="<?php echo base_url('login');?>" name="login_form" class="form">
                                    <div class="form-group">
                                        <label for="txtEmail">Email</label>
                                        <input type="email" class="form-control login" id="txtEmail" name="txtEmail" placeholder="Insira seu endereço de Email" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="txtSenha">Senha</label>
                                        <input type="password" class="form-control login" id="txtSenha" name="txtSenha" placeholder="Insira sua senha" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Entrar</button>
                                </form>
                            </div>
                            <div class="col-xs-12 col-md-6">
                                <div class="hidden-md hidden-lg">
                                    <hr />
                                </div>
                                <form method="post" action="<?= base_url('cadastro')?>" name="cadastro_form" class="form">
                                    <h2 align="center">Cadastro</h2>
                                    <hr class="some">
                                    <div class="row wvdivide form-group">
                                        <div class="col-md-6">
                                            <label for="txtNome">Nome</label>
                                            <input type="text" class="form-control" name="txtNome" id="txtNome" placeholder="Insira seu nome" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="txtSobrenome">Sobrenome</label>
                                            <input type="text" class="form-control" name="txtSobrenome" id="txtSobrenome" placeholder="Insira seu sobrenome" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="txtCodigo" data-original-title="Para maiores informações, contate o responsável pela instalação do sistema na instituição." data-toggle="tooltip" data-placement="right">Código de acesso *</label>
                                        <input type="password" class="form-control" name="txtCodigo" id="txtCodigo" placeholder="Insira o código de acesso fornecido pelo administrador" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer" align="center">
                        <footer align="center">
                            <small><b>Led</b>&copy;  é um software gratuito distribuido sob a <b>licença GNU/GPL</b>.</small>
                        </footer>
                    </div>
                </div>
            </div>
        </div>
        <script>
            //carousel
            $('.carousel').carousel();
            $(document).ready(function() {   
                $('[data-toggle="tooltip"]').tooltip();
            });
        </script>
    </body>

    </html>
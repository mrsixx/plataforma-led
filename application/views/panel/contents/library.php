<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
            <div id="main">
                <?php if(!isset($livro)): ?>
                    <div class="page-header">
                                    <h3>Biblioteca virtual</h3>
                                </div>
                                <div class="page-body">
                                    <div class="well">
                                            Envie arquivos no formato pdf de até 2KB.
                                        </div>
                                        <blockquote>
                                        <p>
                                        “   Haverá uma tendência para centralizar informações, de modo que uma requisição de determinados itens pode usufruir dos recursos de todas as bibliotecas de uma região, ou de uma nação e, quem sabe, do mundo. Finalmente, haverá o equivalente de uma Biblioteca Computada Global, na qual todo o conhecimento da humanidade será armazenado e de onde qualquer item desse total poderá ser retirado por requisição.    ”<br/>
                                        <p align="right">Isaac Asimov no livro "Escolha a Catástrofe".</p>
                                        </p>
                                        </blockquote>


                                    <div class="form-wrap">
                                        <form role="form" action="/biblioteca/cadastro" method="post" autocomplete="off" enctype="multipart/form-data">
                                        
                                            <div class="form-group">
                                                <h5>Nome <span class="label label-default"></span></h5>
                                                <input type="text" name="txtNome" id="txtNome" class="form-control" required maxlength="100">
                                            
                                                <h5>Descrição <span class="label label-default"></span></h5>
                                                <textarea name="txtDescricao" id="txtDescricao" class="form-control"></textarea> 
                                                <br/>
                                                <div class="form-group">
                                                            <div class="form-group files color">
                                                                <input type="file" name="flLivro" id="flLivro" accept=".pdf" />
                                                                <input type="hidden" name="MAX_FILE_SIZE" id="MAX_FILE_SIZE" value="30000" />
                                                            </div>    
                                                        </div>
                                            </div>
                                            <input type="submit" id="btn-login" class="btn btn-primary btn-md btn-block" value="Enviar"><br/>
                                        </form>
                                    </div>
                                </div>
                <?php else: ?>
                    <div class="container-fluid">
                        <?php foreach ($livro as $arquivo):
                        $file = base_url("data/library/$arquivo->Link");?>
                        <?php endforeach; ?>
                            <div class="row">
                                <div class="page-header">
                                    <h3><?php echo utf8_encode($arquivo->Nome); ?></h3>
                                    <p id="desc" class="collapse"><small><?php 
                                    echo "<b>Enviado por: </b><a href='/perfil/".$arquivo->Token."'>".utf8_encode($arquivo->NomeUsuario." ".$arquivo->Sobrenome)."</a><br/>"; 
                                    echo "<b>Data de envio: </b>".utf8_encode($arquivo->Descricao)."<br/>"; 
                                    echo "<b>Descrição: </b>".date('d/m/Y H:i', strtotime($arquivo->DataHoraEnvio))."<br/>"; 
                                    ?></small></p>
                                    <a type="button" style="cursor: pointer;" data-toggle="collapse" data-target="#desc">Abrir/fechar informações</a>

                                    <?php if($codUsuario == $arquivo->CodUsuario):?>
                                        <div class="btn-group pull-right">
                                            <a type="button" href="<?php echo base_url("/biblioteca/exclivro/").$arquivo->CodArquivo; ?>" class="btn btn-danger btn-xs excluir">
                                                <span class="glyphicon glyphicon-trash">
                                                </span>
                                            </a>
                                        </div>
                                    <?php endif;?>
                                </div>
                                <div class="page-body">
                                    <!-- 16:9 aspect ratio -->
                                    <div class="embed-responsive embed-responsive-16by9">
                                        <iframe class="embed-responsive-item" src="<?= $file;?>"></iframe>
                                    </div>
                                    <br/>
                                </div>
                            </div>
                        </div>
                <?php endif; ?>  
                     
            </div>
        </div>
    </div>
</div>
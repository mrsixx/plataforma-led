<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
            <div id="main">
                <?php 
                if(!isset($link)){
                    switch ($tipo) {
                        case 1: 
                            if(!isset($infoLink)):
                        ?>
                            
                            <div class="page-header">
                                    <h3>Cadastro de ferramenta online</h3>
                                </div>
                                <div class="page-body">
                                    <div class="form-wrap">
                                        <form role="form" action="/ferramentas/cadastro" method="post" id="login-form" autocomplete="off">
                                        
                                            <div class="form-group">
                                                <h5>Nome <span class="label label-default"></span></h5>
                                                <input type="text" name="txtNome" id="txtNome" class="form-control" required maxlength="100">
                                                
                                                <h5>URL <span class="label label-default"></span></h5>
                                                <input type="url" name="txtLink" id="txtLink" class="form-control" required>
                                            
                                                <h5>Descrição <span class="label label-default"></span></h5>
                                                <textarea name="txtDescricao" id="txtDescricao" class="form-control"></textarea> 
                                            </div>
                                            <input type="submit" id="btn-login" class="btn btn-primary btn-md btn-block" value="Enviar">
                                        </form>
                                    </div>
                                    
                                </div>



                            <?php 
                                else: 
                                    foreach ($infoLink as $link): ?>
                                <div class="page-header">
                                    <h3>Editar "<?php echo utf8_encode($link->Nome);?>"</h3>
                                </div>
                                <div class="page-body">
                                    <div class="form-wrap">
                                        <form role="form" action="/ferramenta/attlink" method="post" id="login-form" autocomplete="off">
                                            <input type="hidden" name="codLink" value="<?php echo $link->CodLink;?>">
                                            <div class="form-group">
                                                <h5>Nome <span class="label label-default"></span></h5>
                                                <input type="text" name="txtNome" id="txtNome" class="form-control" required maxlength="100" value="<?php echo utf8_encode($link->Nome);?>">
                                                
                                                <h5>URL <span class="label label-default"></span></h5>
                                                <input type="url" name="txtLink" id="txtLink" class="form-control" required value="<?php echo utf8_encode($link->Link);?>">
                                            
                                                <h5>Descrição <span class="label label-default"></span></h5>
                                                <textarea name="txtDescricao" id="txtDescricao" class="form-control"><?php echo utf8_encode($link->Descricao); ?></textarea> 
                                            </div>
                                            <input type="submit" id="btn-login" class="btn btn-primary btn-md btn-block" value="Salvar">
                                        </form>
                                    </div>
                                    
                                </div>

                                <?php 
                                endforeach;
                                endif;
                                break;
                        
                        default: ?>

                            <div class="page-header">
                                    <h3>Ferramentas</h3>
                                </div>
                                <div class="page-body well">
                                    As ferramentas são serviços na web que irão facilitar seu trabalho no dia-a-dia escolar. 
                                </div>
                            <?php break;
                    }
                }else{
                    foreach ($link as $link) :?>
                    <div class="page-header">
                        <h3><?php echo utf8_encode($link->Nome); ?></h3>
                         <p id="desc" class="collapse"><small><?php echo utf8_encode($link->Descricao); ?></small></p>
                         <a type="button" style="cursor: pointer;" data-toggle="collapse" data-target="#desc">Mostrar/Esconder Descrição</a>
                         <?php
                            if($tipo == 1):?>
                            <div class="btn-group pull-right">
                                 <a type="button" href="<?php echo base_url("/ferramentas/editar/").$link->CodLink; ?>" class="btn btn-default btn-xs">
                                    <span class="glyphicon glyphicon-pencil">
                                    </span>
                                </a>
                                <a type="button" href="<?php echo base_url("/ferramenta/exclink/").$link->CodLink; ?>" class="btn btn-danger btn-xs excluir">
                                    <span class="glyphicon glyphicon-trash">
                                    </span>
                                </a>
                            </div>
                        <?php endif;?>
                    </div>
                    <div class="page-body">
                        <div class="embed-responsive page-toda embed-responsive-4by3">
                            <iframe class="embed-responsive-item" src="<?php echo $link->Link;?>" style="height: 450px;"></iframe>
                        </div>
                    </div>
                <?php 
                endforeach;
                } ?>                         
            </div>
        </div>
    </div>
</div>
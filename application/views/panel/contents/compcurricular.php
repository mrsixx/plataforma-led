<?php defined('BASEPATH') OR exit('No direct script access allowed');
$visualizar = true;
?>

    <div id="main">
        <div class="container-fluid">
            <div class="row">
                <div class="page-header">
                    <h3><?php echo $pageHeader; ?></h3>
                </div>
            </div>
            <!-- INICIO PAGE BODY -->
            <div class="page-body">
                <?php 
                    switch ($pagina) {
                        case 'index': ?>
                            <div class="alert alert-warning alert-dismissable">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <strong>Dica LED:</strong> <?php echo ($tipo == 3)? "": "Procure manter seu plano de aulas atualizado, para que seus alunos tenham ciência de como você trabalha em aula :D"; ?>
                            </div>

                            <?php echo (isset($returnAtt))? $returnAtt : null; ?>
                            <div class="well">
                                Um componente curricular é a matéria ou disciplina que compõe a grade curricular de um determinado curso. É obrigatória sua inclusão e ministração com a carga horária determinada na grade, a fim de que o curso tenha eficiência e validade.
                            </div>







                            
                            <?php break;
                        
                        default:?>
                            <?php foreach ($componente as $comp):
                                if(!empty($comp) && $comp->CodProfessor != 1):
                                    if($tipo == 3):
                                // var_dump($comp);
                            ?>
                                    <div class="panel panel-primary">
                    <div class="panel-body">
                         <div class="well well-sm">
                            <div class="row">
                                <div class="col-xs-12 col-sm-3 col-md-3" align="center">
                                    <?php 
                                        $CI =& get_instance();
                                        $CI->load->helper('interface');
                                        $foto = fotoPerfil($comp->Foto,$comp->Sexo);

                                        $perfil = base_url("/perfil/$comp->Token");
                                    ?>
                                    <img src="<?php echo $foto;?>" alt="Foto de <?php echo utf8_encode($comp->NomeUsuario); ?>" class="img img-circle img-responsive thumbnail" />
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-8">
                                    <h4><?php echo ($comp->Sexo == 'M')? "Profº " : "Profª ";echo utf8_encode($comp->NomeUsuario." ".$comp->Sobrenome); ?></h4>
                                    <small style="display: block; line-height: 1.428571429; color: #999;">
                                        <cite title="<?php echo utf8_encode($comp->Cidade);?>">
                                            <?php 
                                                echo  utf8_encode($comp->Cidade); 
                                            ?>&nbsp;<i class="glyphicon glyphicon-map-marker"></i>
                                        </cite>
                                    </small><br/>
                                    <p>
                                        <a class="btn btn-primary" href="<?php echo $perfil; ?>">
                                        <i class="glyphicon glyphicon-user"></i>&nbsp;Visitar perfil
                                        </a>
                                        <a class="btn btn-primary" href="/chat/messages?t=ind&id=<?php echo $comp->Token;?>">
                                        <i class="glyphicon glyphicon-comment"></i>&nbsp;Enviar mensagem
                                        </a><br/>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <?php if(isset($comp->CriteriosAvaliacao)): ?>
                    <div class="col-md-12">
                        <hr/>
                        <h4>Plano docente e critérios de avaliação</h4>
                        <div align="right"><a type="button" href="#" data-toggle="collapse" data-target="#plano">Mostrar/Esconder</a></div>
                        <p id="plano" class="well collapse"><?php echo utf8_encode($comp->CriteriosAvaliacao);?></p>
                    </div>
                    </div>
                </div>
                <?php endif; ?>
                            <?php else: ?>
                                <form action="/componente/alteraCriterio" method="POST">
                                    <input type="hidden" name="CodCompProfessor" id="CodCompProfessor" value="<?php echo $comp->CodCompProfessor;?>" />
                                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                            <label for="txtCriterio"><small>Plano de aulas e critérios de avaliação<span class="required" >*</span></small></label>
                                        <textarea id="txtCriterio" name="txtCriterio" class="form-control" type="text" placeholder="Insira o nome do componente" required rows="10" style="font-size: 1em;resize: none;"><?php
                                            if(isset($comp->CriteriosAvaliacao)): 
                                                echo strip_tags(utf8_encode($comp->CriteriosAvaliacao));
                                            endif;
                                            ?></textarea>
                                    </div>
                                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                        <input class="btn btn-primary" type="submit" value="Salvar" />
                                        <input class="btn btn-primary" type="reset" value="Limpar" />
                                    </div>
                                </form>
                            <?php endif;?>
                                <?php else:?>
                                <p class="well">Este componente ainda não possui um professor cadastrado :/</p>
                                <?php 
                                    endif;
                                endforeach;
                            ?>
                           <?php break;
                    }
                ?>
            </div> 
            <!--FIM PAGE BODY  -->
               
        </div>
    </div>
</div>
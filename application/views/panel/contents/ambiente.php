<?php defined('BASEPATH') OR exit('No direct script access allowed'); 

?>
            <div id="main">
                <div class="page-header">
                    <h3>Configuração de Ambiente</h3>
                </div>
                <!-- Modal escola -->
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Escola</h3>
                    </div>
                    <div class="panel-body">
                         <div class="well well-sm">
                            <div class="row">
                                <div class="col-xs-12 col-sm-3 col-md-3" align="center">
                                    <img src="<?= base_url('assets/img/escola.png');?>" alt="<?php echo $escola['Nome']; ?>" class="img-circle img-responsive thumbnail" />
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-8">
                                    <h4><?php echo $escola['Nome']; ?></h4>
                                    <small style="display: block; line-height: 1.428571429; color: #999;">
                                        <cite title="San Francisco, USA">
                                            <?php 
                                                echo  $escola['Rua'].", ".$escola['Bairro']."<br/>".$escola['Cidade']." - ".$escola['Estado'].", ".$escola['Cep']; 
                                            ?>&nbsp;<i class="glyphicon glyphicon-map-marker"></i>
                                        </cite>
                                    </small><br/>
                                    <p>
                                        <i class="glyphicon glyphicon-globe"></i>&nbsp;
                                        <a href="http://<?php echo $escola['Website']; ?>" target="_blank">
                                            <?php echo $escola['Website'];?>
                                        </a><br/>
                                        <i class="glyphicon glyphicon-gift"></i>&nbsp;
                                            <?php echo date('d/m/Y', strtotime($escola['DataFundacao'])); ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer" align="right">
                        <input class="btn btn-primary" type="button" data-toggle="modal" data-target="#escola" value="Editar" />
                    </div>
                </div>
                <!--Modal cursos  -->
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Cursos</h3>
                    </div>
                    <div class="panel-body">
                        <?php 
                            if(!empty($cursos)){ ?>
                            <table class="table table-striped table-hover ">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Descrição</th>
                                    <th>Duração</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($cursos as $coluna): ?>
                                    <tr>
                                        <td>
                                            <?php echo utf8_encode($coluna->Nome); ?>
                                        </td>
                                        <td>
                                            <?php echo utf8_encode($coluna->Descricao); ?>
                                        </td>
                                        <td>
                                            <?php echo utf8_encode($coluna->DuracaoAulas)."min"; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                            <?php 
                                $valuebtn = "Editar";
                            }else{
                                echo '<div class="well">Nenhum curso foi cadastrado ainda :/</div>';
                                $valuebtn = "Cadastrar";
                            } ?>
                            </div>
                            <div class="panel-footer" align="right">
                                <input class="btn btn-primary" data-toggle="modal" data-target="#cursos" type="button" value="<?php echo $valuebtn; ?>">
                            </div>
                    </div>

                <!-- Modal Turmas -->
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Turmas</h3>
                    </div>
                    <div class="panel-body">
                        <?php 
                            if(!empty($turmas)){ ?>
                            <table class="table table-striped table-hover ">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Módulo</th>
                                    <th>Curso</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($turmas as $coluna): ?>
                                    <tr>
                                        <td>
                                            <?php echo utf8_encode($coluna->NomeTurma); ?>
                                        </td>
                                        <td>
                                            <?php echo utf8_encode($coluna->Modulo); ?>
                                        </td>
                                        <td>
                                            <?php echo utf8_encode($coluna->CodCurso)."min"; ?>
                                        </td>
                                    </tr>

                                <?php endforeach; ?>
                                </tbody>
                            </table>
                            <?php 
                                $valuebtn = "Editar";
                            }else{
                                echo '<div class="well">Nenhuma turma foi cadastrada ainda :/</div>';
                                $valuebtn = "Cadastrar";
                            } ?>
                            </div>
                            <div class="panel-footer" align="right">
                                <input class="btn btn-primary" type="button" data-toggle="modal" data-target="#turmas" value="<?php echo $valuebtn; ?>">
                            </div>                
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
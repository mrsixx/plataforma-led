<?php defined('BASEPATH') OR exit('No direct script access allowed'); 

?>
            <div id="main">
                <div class="page-header">
                    <h3>Configuração de Ambiente</h3>
                </div>
                <!-- Painel escola -->
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Escola</h3>
                    </div>
                    <div class="panel-body">
                         <div class="well well-sm">
                            <div class="row">
                                <div class="col-xs-12 col-sm-3 col-md-3" align="center">
                                    <img src="<?= base_url('assets/img/escola.png');?>" alt="<?php echo utf8_encode($escola['Nome']); ?>" class="img-circle img-responsive thumbnail" />
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-8">
                                    <h4><?php echo utf8_encode($escola['Nome']); ?></h4>
                                    <small style="display: block; line-height: 1.428571429; color: #999;">
                                        <cite title="<?php echo utf8_encode($escola['Cidade']).' / '.utf8_encode($escola['Estado'])?>">
                                            <?php 
                                                echo  utf8_encode($escola['Rua']).", ".utf8_encode($escola['Bairro'])."<br/>".utf8_encode($escola['Cidade'])." - ".utf8_encode($escola['Estado']).", ".utf8_encode($escola['Cep']); 
                                            ?>&nbsp;<i class="glyphicon glyphicon-map-marker"></i>
                                        </cite>
                                    </small><br/>
                                    <p>
                                        <i class="glyphicon glyphicon-globe"></i>&nbsp;
                                        <a href="http://<?php echo utf8_encode($escola['Website']); ?>" target="_blank">
                                            <?php echo utf8_encode($escola['Website']);?>
                                        </a><br/>
                                        <i class="glyphicon glyphicon-gift"></i>&nbsp;
                                            <?php echo utf8_encode(date('d/m/Y', strtotime($escola['DataFundacao']))); ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer" align="right">
                        <input class="btn btn-primary" type="button" data-toggle="modal" data-target="#escola" value="Editar" />
                    </div>
                </div>
                <!-- Painel funcionarios -->
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Quadro de funcionários</h3>
                    </div>
                    <div class="panel-body">
                        <?php 
                            if(!empty($hierarquia)){ ?>
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
                            }
                            else{
                                echo '<div class="well">O quadro de funcionários da instituição não foi cadastrado ainda :/</div>';
                                $valuebtn = "Cadastrar";
                            } ?>
                    </div>
                    <div class="panel-footer" align="right">
                        <input class="btn btn-primary" data-toggle="modal" data-target="#funcionarios" type="button" value="<?php echo $valuebtn; ?>">
                    </div>
                </div>

                <!--Painel cursos  -->
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Cursos</h3>
                    </div>
                    <div class="panel-body table-responsive">
                        <?php 
                            if(!empty($cursos)){ ?>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th>Status</th>
                                        <th>Descrição</th>
                                        <th>Intervalo de séries/módulos</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($cursos as $coluna): ?>
                                        <tr>
                                            <td>
                                                <?php echo utf8_encode($coluna->Nome); ?>
                                            </td>
                                            <td>
                                                <?php
                                                $status = (boolean) $coluna->Status;
                                                 if($status)
                                                        echo "Ativo";
                                                    else
                                                        echo "Desativo";

                                                 ?>
                                            </td>
                                            <td>
                                               <?php echo utf8_encode($coluna->Descricao); ?>
                                            </td>
                                            <td>
                                                <?php echo $coluna->SerieInicial."º a ".$coluna->SerieFinal."º módulo"; ?>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-default btn-xs" data-toogle="tooltip" title="Editar">
                                                  <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                                </button>
                                                <button type="button" class="btn btn-default btn-xs" data-toogle="tooltip" title="Excluir">
                                                  <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                                </button>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                            </table>

                            <?php 
                                $valuebtn = "Adicionar";
                            }else{
                                echo '<div class="well">Nenhum curso foi cadastrado ainda :/</div>';
                                $valuebtn = "Cadastrar";
                            } ?>
                    </div>
                    <div class="panel-footer" align="right">
                        <input class="btn btn-primary" data-toggle="modal" data-target="#cursosCad" type="button" value="<?php echo $valuebtn; ?>">
                    </div>
                    </div>

                 <!--Painel Componentes curriculares  -->

                <!-- Painel Turmas -->
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Turmas</h3>
                    </div>
                    <div class="panel-body table-responsive">
                        <?php 
                            if(!empty($turmas)){ 
                                ?>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Turma</th>
                                            <th>Curso</th>
                                            <th>Alunos</th>
                                            <th>Período</th>
                                            <th>Período letivo</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($turmas as $coluna): ?>
                                            <tr>
                                                <td>
                                                    <?php echo $coluna->Modulo."º ".utf8_encode($coluna->NomeTurma); ?>
                                                </td>
                                                <td>
                                                    <?php echo utf8_encode($coluna->Nome); ?>
                                                </td>
                                                <td>
                                                    <?php echo utf8_encode($coluna->QtdAlunos)." alunos "; ?>
                                                </td>
                                                <td>
                                                    <?php echo utf8_encode($coluna->Periodo); ?>
                                                </td>
                                                <td>
                                                    <?php echo date('d/m/Y', strtotime($coluna->InicioLetivo))." a ".date('d/m/Y', strtotime($coluna->FimLetivo)); ?>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-default btn-xs" data-toogle="tooltip" title="Editar">
                                                      <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                                    </button>
                                                    <button type="button" class="btn btn-default btn-xs" data-toogle="tooltip" title="Adicionar componentes curriculares">
                                                      <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                                                    </button>
                                                    <button type="button" class="btn btn-default btn-xs" data-toogle="tooltip" title="Excluir">
                                                      <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                                    </button>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                        </tbody>
                                </table>

                            <?php 
                                $valuebtn = "Adicionar";
                            }else{
                                echo '<div class="well">Nenhum curso foi cadastrado ainda :/</div>';
                                $valuebtn = "Cadastrar";
                            } 

                                if(empty($cursos))
                                    $disabled = "disabled";
                                 else
                                    $disabled = '';
                            ?>
                    </div>
                    <div class="panel-footer" align="right">
                        <input class="btn btn-primary" data-toggle="modal" <?php echo $disabled;?> data-target="#turmasCad" type="button" value="<?php echo $valuebtn; ?>">
                    </div>
                </div>

                 <!--Painel Componentes curriculares  -->

            </div>
        </div>
    </div>
</div>
<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
    
        foreach ($turmas as $turma) {
        }
?>
            <div id="main">
                <?php 
                    if(isset($msg)):
                        echo "<br/>";
                        echo $msg;

                    else:

                ?>
                <div class="page-header">
                    <h3><?php echo $turma->Modulo."º ".$turma->NomeTurma;?></h3>
                </div>

                <?php
                    if(!empty($compcurricular)):
                ?>
                    <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Componentes curriculares</h3>
                    </div>
                    <div class="panel-body table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Sigla</th>
                                    <th>Professor</th>
                                    <th>
                                        
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php  foreach ($compcurricular as $coluna): ?>
                                    <tr>
                                        <td>
                                            <?php echo utf8_encode($coluna->Nome); ?>
                                        </td>
                                        <td>
                                            <?php echo utf8_encode($coluna->Sigla); ?>
                                        </td>
                                        <td>
                                            <?php 
                                                echo isset($coluna->NomeProfessor) ? utf8_encode($coluna->NomeProfessor)." ".utf8_encode($coluna->SobrenomeProfessor): "Não cadastrado";
                                             ?>
                                        </td>
                                        <td>
                                            <!-- btn para editar turma -->
                                            <button type="button" class="btn btn-default btn-xs editarcomp" data-toogle="tooltip" title="Editar" id="<?php echo $coluna->CodCompTurma; ?>" data-url="<?= base_url('ambiente/retornaComponentesCurricularesAjax') ?>">
                                              <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                            </button>
                                            <!-- btn para excluir -->
                                            <button type="button" class="btn btn-default btn-xs excluir" data-table="turma" data-toogle="tooltip" data-controller="<?=base_url('ambiente/excluirComp');?>?cod=<?php echo $coluna->CodComponente;?>&tabela=<?php echo 'compcurricular';?>" title="Excluir">
                                              <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                            </button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                        </table>
                    </div>
                    <div class="panel-footer" align="right">
                            <button class="btn btn-primary addComp" type="button" title="Adicionar componentes curriculares" data-target="#comAdd" data-toogle="modal" id="<?php echo $turma->CodTurma;?>">
                              <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            </button>
                    </div>                   
                <?php
                    else:
                        echo '<div class="well" align="center">
                        Nenhum componente curricular cadastrado para essa turma :/ <br/>
                            <button class="btn btn-primary btn-xs addComp" type="button" title="Adicionar componentes curriculares" data-target="#comAdd" data-toogle="modal" id="'."$turma->CodTurma".'">
                              <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            </button> 
                        </div>';
                endif;
                ?>
                <!-- Painel componentes curriculares 
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Componentes curriculares</h3>
                    </div>
                    <div class="panel-body table-responsive">
                    <?php 
                        var_dump($compcurricular);
                    ?>
                    </div>

                    </div>
                </div>
                -->
            </div>
        </div>
    </div>
</div>
<?php
    endif;
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
                                        <a href="<?php echo utf8_encode($escola['Website']); ?>" target="_blank">
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
                    <div class="panel-body table-responsive">
                        <?php 
                            if(!empty($hierarquia)){
                                
                                foreach ($hierarquia as $cargo):
                                    switch ($cargo->Nivel) {
                                        case 1:
                                            $nivel1[] = $cargo ;
                                            break;
                                        
                                        case 2:
                                            $nivel2[] = $cargo;
                                            break;
                                        
                                        case 3:
                                            $nivel3[] = $cargo;
                                            break;
                                        
                                        case 4:
                                            $nivel4[] = $cargo;
                                            break;
                                        
                                        case 5:
                                            $nivel5[] = $cargo;
                                            break;
                                    }
                                endforeach;
                                // var_dump($nivel2);
                                if(!empty($nivel1)){
                                    foreach ($nivel1 as $cargo) :?>
                                        <div class="media">
                                            <div class="media-left">
                                              <img src="<?= base_url('assets/img/lvl1.png');?>" />
                                            </div>
                                            <div class="media-body">
                                              <h4 class="media-heading"><?php echo utf8_encode($cargo->Nome);?> <button type="button" class="btn btn-default btn-xs editarhierarquia" data-toogle="tooltip" title="Editar" id="<?php echo $cargo->CodHierarquia;?>" data-url="ambiente/retornaFunc">
                                                      <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                                    </button><button type="button" class="btn btn-default btn-xs excluir" data-controller="ambiente/excluirFunc?cod=<?php echo $cargo->CodHierarquia;?>&tabela=<?php echo 'hierarquia';?>" data-toogle="tooltip" title="Excluir" data-table="curso">
                                                      <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                                    </button></h4>
                                              <p><?php echo utf8_encode($cargo->Descricao);?></p>
                                                      <?php
                                                        if(!empty($nivel2)){
                                                            foreach ($nivel2 as $cargo) :?>
                                                            <!-- Nested media object -->
                                                              <div class="media">
                                                                <div class="media-left">
                                                                  <img src="<?= base_url('assets/img/lvl2.png');?>" />
                                                                </div>
                                                                <div class="media-body">
                                                                  <h4 class="media-heading"><?php echo utf8_encode($cargo->Nome);?> <button type="button" class="btn btn-default btn-xs editarhierarquia" data-toogle="tooltip" title="Editar" id="<?php echo $cargo->CodHierarquia;?>" data-url="ambiente/retornaFunc">
                                                      <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                                    </button><button type="button" class="btn btn-default btn-xs excluir" data-controller="ambiente/excluirFunc?cod=<?php echo $cargo->CodHierarquia;?>&tabela=<?php echo 'hierarquia';?>" data-toogle="tooltip" title="Excluir" data-table="curso">
                                                      <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                                    </button></h4>
                                                                  <p><?php echo utf8_encode($cargo->Descricao);?></p>
                                                                    <?php 
                                                                        if(!empty($nivel3)){
                                                                            foreach ($nivel3 as $cargo): ?>
                                                                                <!-- Nested media object -->
                                                                                  <div class="media">
                                                                                    <div class="media-left">
                                                                                      <img src="<?= base_url('assets/img/lvl3.png');?>" />
                                                                                    </div>
                                                                                    <div class="media-body">
                                                                                      <h4 class="media-heading"><?php echo utf8_encode($cargo->Nome);?> <button type="button" class="btn btn-default btn-xs editarhierarquia" data-toogle="tooltip" title="Editar" id="<?php echo $cargo->CodHierarquia;?>" data-url="ambiente/retornaFunc">
                                                      <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                                    </button><button type="button" class="btn btn-default btn-xs excluir" data-controller="ambiente/excluirFunc?cod=<?php echo $cargo->CodHierarquia;?>&tabela=<?php echo 'hierarquia';?>" data-toogle="tooltip" title="Excluir" data-table="curso">
                                                      <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                                    </button></h4>
                                                                                      <p><?php echo utf8_encode($cargo->Descricao);?></p>
                                                                                        <?php
                                                                                            if(!empty($nivel4)){
                                                                                                foreach ($nivel4 as $cargo) :?>
                                                                                                <!-- Nested media object -->
                                                                                                  <div class="media">
                                                                                                    <div class="media-left">
                                                                                                      <img src="<?= base_url('assets/img/lvl4.png');?>" />
                                                                                                    </div>
                                                                                                    <div class="media-body">
                                                                                                      <h4 class="media-heading"><?php echo utf8_encode($cargo->Nome);?> <button type="button" class="btn btn-default btn-xs editarhierarquia" data-toogle="tooltip" title="Editar" id="<?php echo $cargo->CodHierarquia;?>" data-url="ambiente/retornaFunc">
                                                      <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                                    </button><button type="button" class="btn btn-default btn-xs excluir" data-controller="ambiente/excluirFunc?cod=<?php echo $cargo->CodHierarquia;?>&tabela=<?php echo 'hierarquia';?>" data-toogle="tooltip" title="Excluir" data-table="curso">
                                                      <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                                    </button></h4>
                                                                                                      <p><?php echo utf8_encode($cargo->Descricao);?></p>
                                                                                                        <?php 
                                                                                                            if(!empty($nivel5)){
                                                                                                                foreach ($nivel5 as $cargo): ?>
                                                                                                                    <!-- Nested media object -->
                                                                                                                      <div class="media">
                                                                                                                        <div class="media-left">
                                                                                                                          <img src="<?= base_url('assets/img/lvl5.png');?>" />
                                                                                                                        </div>
                                                                                                                        <div class="media-body">
                                                                                                                          <h4 class="media-heading"><?php echo utf8_encode($cargo->Nome);?> <button type="button" class="btn btn-default btn-xs editarhierarquia" data-toogle="tooltip" title="Editar" id="<?php echo $cargo->CodHierarquia;?>" data-url="ambiente/retornaFunc">
                                                      <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                                    </button><button type="button" class="btn btn-default btn-xs excluir" data-controller="ambiente/excluirFunc?cod=<?php echo $cargo->CodHierarquia;?>&tabela=<?php echo 'hierarquia';?>" data-toogle="tooltip" title="Excluir" data-table="curso">
                                                      <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                                    </button></h4>
                                                                                                                          <p><?php echo utf8_encode($cargo->Descricao);?></p>
                                                                                                                        </div>
                                                                                                                      </div>
                                                                                                                <?php endforeach; $nivel5 = array();
                                                                                                            }
                                                                                                        ?>
                                                                                                      
                                                                                                    </div>
                                                                                                  </div>
                                                                                                <?php endforeach; $nivel4 = array();
                                                                                            }
                                                                                          ?>
                                                                                    </div>
                                                                                  </div>
                                                                            <?php endforeach; $nivel3 = array();
                                                                        }
                                                                    ?>
                                                                  
                                                                </div>
                                                              </div>
                                                            <?php endforeach; $nivel2 = array();
                                                        }
                                                      ?>
                                            </div>
                                          </div>
                                    <?php endforeach; $nivel1 = array();
                                }else{
                                    echo '<div class="well">Não há nenhuma posição de nível 1 cadastrada :/</div>';
                                }
                            ?>
                            <?php 
                            }
                            else{
                                echo '<div class="well">O quadro de funcionários da instituição não foi cadastrado ainda :/</div>';
                            } ?>
                    </div>
                    <div class="panel-footer" align="right">
                        <input class="btn btn-primary" data-toggle="modal" data-target="#funcCad" type="button" value="Cadastrar">
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
                                        <th>Editar</th>
                                        <th>Excluir</th>
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
                                               <p id="linha<?php echo $coluna->CodCurso;?>" class="collapse"><?php echo utf8_encode($coluna->Descricao); ?></p>
                                                 <a type="button" href="#" data-toggle="collapse" id="" data-target="#linha<?php echo $coluna->CodCurso;?>">Mostrar/Esconder</a>
                                            </td>
                                            <td>
                                                <?php echo $coluna->SerieInicial."º a ".$coluna->SerieFinal."º módulo"; ?>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-default btn-xs editarcurso" data-toogle="tooltip" title="Editar" id="<?php echo $coluna->CodCurso;?>">
                                                  <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                                </button>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-default btn-xs excluir" data-controller="ambiente/excluirCurso?cod=<?php echo $coluna->CodCurso;?>&tabela=<?php echo 'curso';?>" data-toogle="tooltip" title="Excluir" data-table="curso">
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
                                                    <!-- btn para editar turma -->
                                                    <button type="button" class="btn btn-default btn-xs editarturma" data-toogle="tooltip" title="Editar" id="<?php echo $coluna->CodTurma; ?>">
                                                      <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                                    </button>
                                                    <!-- btn para add componente curricular -->
                                                    <a href="configuracao-ambiente/turma/<?php echo $coluna->CodTurma;?>"> 
                                                        <button class="btn btn-default btn-xs" title="Componentes curriculares" id="<?php echo $coluna->CodTurma;?>">
                                                          <span class="glyphicon glyphicon-book" aria-hidden="true"></span>
                                                        </button>
                                                    </a>
                                                    <!-- btn para excluir -->
                                                    <button type="button" class="btn btn-default btn-xs excluir" data-table="turma" data-toogle="tooltip" data-controller="ambiente/excluirTurma?cod=<?php echo $coluna->CodTurma;?>&tabela=<?php echo 'turma';?>" title="Excluir">
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
                                $valuebtn = "Cadastrar";
                                if(empty($cursos)){
                                    echo '<div class="well">Sem cursos, sem turmas :/</div>';
                                    $disabled = "disabled";
                                }
                                else{
                                    echo '<div class="well">Nenhuma turma foi cadastrada ainda :/</div>';
                                    $disabled = '';
                                }
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
            </div>
        </div>
    </div>
</div>
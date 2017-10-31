<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
            <div id="main">
                <?php 
                    if(empty($lista)): ?>
                            
                            <div class="page-header">
                                <h3>Relação de usuários</h3>
                            </div>
                            <div class="page-body">
                                <div class="well">
                                    <a href="<?php echo base_url('relacao/alunos');?>"><i class="glyphicon glyphicon-user"></i> Alunos</a>
                                </div>
                                <div class="well">
                                    <a href="<?php echo base_url('relacao/professores');?>"><i class="glyphicon glyphicon-user"></i> Professores</a>
                                </div>
                                <div class="well">
                                    <a href="<?php echo base_url('relacao/funcionarios');?>"><i class="glyphicon glyphicon-user"></i> Funcionários</a>
                                </div>
                                <div class="well">
                                    <a href="<?php echo base_url('relacao/administradores');?>"><i class="glyphicon glyphicon-user"></i> Administradores</a>
                                </div>
                            </div>
                    <?php else: 
                        if(!empty($alunos)): ?>
                            <div class="page-header">
                                <button class="btn btn-primary pull-right" id="btnImpressao" onclick="window.print()">Imprimir</button>
                                <h3><?php 
                                    foreach ($turma as $turma) {
                                        echo $turma->Modulo."º ".$turma->NomeTurma;
                                        echo "</h3></div><p class='well'>";
                                        echo "<small><b>Período:</b> ".utf8_encode($turma->Periodo)."</small><br/>";
                                        echo "<small><b>Curso:</b> ".utf8_encode($turma->Nome)."</small><br/>";
                                        echo "<small><b>Início do período letivo:</b> ".date("d/m/Y", strtotime($turma->InicioLetivo))."</small><br/>";
                                        echo "<small><b>Fim do período letivo:</b> ".date("d/m/Y", strtotime($turma->FimLetivo))."</small><br/>";
                                        echo "</p>";
                                    }
                                ?>
                            <div class="panel-body table-responsive">
                                <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Nº</th>
                                                    <th>Nome</th>
                                                    <th>Email</th>
                                                    <th>Nickname</th>
                                                    <th>Token</th>
                                                    <th>Assinatura</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                $i = 1;
                                                foreach ($alunos as $aluno): ?>
                                                    <tr>
                                                        <td><?php echo $i;?></td>
                                                        <td>
                                                            <?php echo ($aluno->Status != 0)? utf8_encode($aluno->Nome." ".$aluno->Sobrenome) : "Não cadastrado"; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo ($aluno->Status != 0) ? utf8_encode($aluno->Email) : "Não cadastrado"; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo ($aluno->Status != 0) ? utf8_encode($aluno->Nickname) : "Não cadastrado"; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo utf8_encode($aluno->Token); ?>
                                                        </td>
                                                        <td>
                                                            &nbsp;
                                                        </td>
                                                    </tr></a>
                                                <?php 
                                                $i++;
                                                endforeach; ?>
                                                </tbody>
                                </table>
                            </div>
                        <?php 
                        else:
                            switch ($lista) {
                            case 'alunos': ?>
                                <div class="page-header">
                                    <h3>Relação de alunos</h3>
                                </div>
                                <div class="page-body">
                                    <?php 
                                    if(!empty($show)): ?>
                                    <div class="panel-body table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Turma</th>
                                                    <th>Curso</th>
                                                    <th>Nº de alunos</th>
                                                    <th>Período</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($show as $turma): ?>
                                                    <tr>
                                                        <td>
                                                            <a href="/relacao/alunos/<?php echo $turma->CodTurma; ?>"><?php echo $turma->Modulo."º ".utf8_encode($turma->NomeTurma); ?></a>
                                                        </td>
                                                        <td>
                                                            <a href="/relacao/alunos/<?php echo $turma->CodTurma; ?>"><?php echo utf8_encode($turma->Nome); ?></a>
                                                        </td>
                                                        <td>
                                                            <a href="/relacao/alunos/<?php echo $turma->CodTurma; ?>"><?php echo utf8_encode($turma->QtdAlunos); ?></a>
                                                        </td>
                                                        <td>
                                                            <a href="/relacao/alunos/<?php echo $turma->CodTurma; ?>"><?php echo utf8_encode($turma->Periodo); ?></a>
                                                        </td>
                                                    </tr></a>
                                                <?php endforeach; ?>
                                                </tbody>
                                        </table>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            <?php break;

                            case 'professores': ?>
                                <div class="page-header">
                                    <button class="btn btn-primary pull-right" id="btnImpressao" onclick="window.print()">Imprimir</button>
                                    <h3>Relação de professores</h3>
                                </div>
                                <div class="page-body">
                                    <?php 
                                    if(!empty($show)): ?>
                                    <div class="panel-body table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Nº</th>
                                                    <th>Nome</th>
                                                    <th>Email</th>
                                                    <th>Nickname</th>
                                                    <th>Token</th>
                                                    <th>Assinatura</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                $i = 1;
                                                foreach ($show as $professor): ?>
                                                    <tr>
                                                        <td><?php echo $i;?></td>
                                                        <td>
                                                            <?php echo ($professor->Status != 0)? utf8_encode($professor->Nome." ".$professor->Sobrenome) : "Não cadastrado"; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo ($professor->Status != 0) ? utf8_encode($professor->Email) : "Não cadastrado"; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo ($professor->Status != 0) ? utf8_encode($professor->Nickname) : "Não cadastrado"; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo utf8_encode($professor->Token); ?>
                                                        </td>
                                                        <td>
                                                            &nbsp;
                                                        </td>
                                                    </tr></a>
                                                <?php 
                                                $i++;
                                                endforeach; ?>
                                                </tbody>
                                        </table>
                                    </div>
                                    <?php endif; ?>
                                </div>
                                <div class="page-body">

                                </div>
                            <?php break;

                            case 'funcionarios': ?>
                                <div class="page-header">
                                    <button class="btn btn-primary pull-right" id="btnImpressao" onclick="window.print()">Imprimir</button>
                                    <h3>Relação de funcionários</h3>
                                </div>
                                <div class="page-body">
                                    <?php 
                                    if(!empty($show)): ?>
                                    <div class="panel-body table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Nº</th>
                                                    <th>Nome</th>
                                                    <th>Email</th>
                                                    <th>Cargo</th>
                                                    <th>Token</th>
                                                    <th>Assinatura</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                $i = 1;
                                                foreach ($show as $funcionario): ?>
                                                    <tr>
                                                        <td><?php echo $i;?></td>
                                                        <td>
                                                            <?php echo ($funcionario->Status != 0)? utf8_encode($funcionario->Nome." ".$funcionario->Sobrenome) : "Não cadastrado"; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo ($funcionario->Status != 0) ? utf8_encode($funcionario->Email) : "Não cadastrado"; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo ($funcionario->Status != 0) ? utf8_encode($funcionario->Hierarquia) : "Não cadastrado"; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo utf8_encode($funcionario->Token); ?>
                                                        </td>
                                                        <td>
                                                            &nbsp;
                                                        </td>
                                                    </tr></a>
                                                <?php 
                                                $i++;
                                                endforeach; ?>
                                                </tbody>
                                        </table>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            <?php break;

                            case 'administradores': ?>
                                <div class="page-header">
                                    <button class="btn btn-primary pull-right" id="btnImpressao" onclick="window.print()">Imprimir</button>
                                    <h3>Relação de administradores</h3>
                                </div>
                                <div class="page-body">
                                    <?php 
                                    if(!empty($show)): ?>
                                    <div class="panel-body table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Nº</th>
                                                    <th>Nome</th>
                                                    <th>Email</th>
                                                    <th>Nickname</th>
                                                    <th>Token</th>
                                                    <th>Assinatura</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                $i = 1;
                                                foreach ($show as $admin): ?>
                                                    <tr>
                                                        <td><?php echo $i;?></td>
                                                        <td>
                                                            <?php echo ($admin->Status != 0)? utf8_encode($admin->Nome." ".$admin->Sobrenome) : "Não cadastrado"; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo ($admin->Status != 0) ? utf8_encode($admin->Email) : "Não cadastrado"; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo ($admin->Status != 0) ? utf8_encode($admin->Nickname) : "Não cadastrado"; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo utf8_encode($admin->Token); ?>
                                                        </td>
                                                        <td>
                                                            &nbsp;
                                                        </td>
                                                    </tr></a>
                                                <?php 
                                                $i++;
                                                endforeach; ?>
                                                </tbody>
                                        </table>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            <?php break;
                            
                            default:
                                # code...
                                break;
                            }
                        endif;
                    endif;
                ?>
            
            </div>
        </div>
    </div>
</div>
<?php defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="page-header">
    <h3>Configuração de Ambiente</h3>
</div>

<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">Escola</h3>
    </div>
    <div class="panel-body">
        <?php 
            var_dump($escola);
        ?>
        <table class="table table-striped table-hover ">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Column heading</th>
                    <th>Column heading</th>
                    <th>Column heading</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Column content</td>
                    <td>Column content</td>
                    <td>Column content</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Column content</td>
                    <td>Column content</td>
                    <td>Column content</td>
                </tr>
                <tr class="info">
                    <td>3</td>
                    <td>Column content</td>
                    <td>Column content</td>
                    <td>Column content</td>
                </tr>
                <tr class="success">
                    <td>4</td>
                    <td>Column content</td>
                    <td>Column content</td>
                    <td>Column content</td>
                </tr>
                <tr class="danger">
                    <td>5</td>
                    <td>Column content</td>
                    <td>Column content</td>
                    <td>Column content</td>
                </tr>
                <tr class="warning">
                    <td>6</td>
                    <td>Column content</td>
                    <td>Column content</td>
                    <td>Column content</td>
                </tr>
                <tr class="active">
                    <td>7</td>
                    <td>Column content</td>
                    <td>Column content</td>
                    <td>Column content</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="panel-footer" align="right">
        <input class="btn btn-primary" type="button" value="Alterar" />
    </div>
</div>

<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">Cursos</h3>
    </div>
    <div class="panel-body">
        <?php 
        ?>
        <table class="table table-striped table-hover ">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Duração</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    foreach ($cursos as $coluna): ?>
                            <tr>
                                <td><?php echo utf8_encode($coluna->Nome); ?></td>
                                <td><?php echo utf8_encode($coluna->Descricao); ?></td>
                                <td><?php echo utf8_encode($coluna->DuracaoAulas)."min"; ?></td>
                            </tr>
                        
                <?php endforeach; ?>
                <!-- <tr>
                    <td>1</td>
                    <td>Column content</td>
                    <td>Column content</td>
                    <td>Column content</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Column content</td>
                    <td>Column content</td>
                    <td>Column content</td>
                </tr>
                <tr class="info">
                    <td>3</td>
                    <td>Column content</td>
                    <td>Column content</td>
                    <td>Column content</td>
                </tr>
                <tr class="success">
                    <td>4</td>
                    <td>Column content</td>
                    <td>Column content</td>
                    <td>Column content</td>
                </tr>
                <tr class="danger">
                    <td>5</td>
                    <td>Column content</td>
                    <td>Column content</td>
                    <td>Column content</td>
                </tr>
                <tr class="warning">
                    <td>6</td>
                    <td>Column content</td>
                    <td>Column content</td>
                    <td>Column content</td>
                </tr>
                <tr class="active">
                    <td>7</td>
                    <td>Column content</td>
                    <td>Column content</td>
                    <td>Column content</td>
                </tr> -->
            </tbody>
        </table>
    </div>
    <div class="panel-footer" align="right">
        <input class="btn btn-primary" type="button" value="Editar">
    </div>
</div>

<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">Turmas</h3>
    </div>
    <div class="panel-body">
        <table class="table table-striped table-hover ">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Column heading</th>
                    <th>Column heading</th>
                    <th>Column heading</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Column content</td>
                    <td>Column content</td>
                    <td>Column content</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Column content</td>
                    <td>Column content</td>
                    <td>Column content</td>
                </tr>
                <tr class="info">
                    <td>3</td>
                    <td>Column content</td>
                    <td>Column content</td>
                    <td>Column content</td>
                </tr>
                <tr class="success">
                    <td>4</td>
                    <td>Column content</td>
                    <td>Column content</td>
                    <td>Column content</td>
                </tr>
                <tr class="danger">
                    <td>5</td>
                    <td>Column content</td>
                    <td>Column content</td>
                    <td>Column content</td>
                </tr>
                <tr class="warning">
                    <td>6</td>
                    <td>Column content</td>
                    <td>Column content</td>
                    <td>Column content</td>
                </tr>
                <tr class="active">
                    <td>7</td>
                    <td>Column content</td>
                    <td>Column content</td>
                    <td>Column content</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
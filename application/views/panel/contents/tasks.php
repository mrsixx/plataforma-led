<?php defined('BASEPATH') OR exit('No direct script access allowed');
$visualizar = true;
?>

    <div id="main">
        <div class="container-fluid">
            <div class="row">
                <div class="page-header">
                    <?php 
                        switch ($pagina) {
                            case 'criar':
                                $pageHeader = "Criar missão";
                                break;
                            case 'task':
                                $pageHeader = utf8_encode($missoes['Nome']);
                                $pageHeader .= ($missoes['Prazo'] < date('Y-m-d H:i'))? ' - Encerrada': null;
                                break;
                            default:
                                $pageHeader = "Missões";
                                break;
                        }
                    ?>
                     <?php if($tipo != 3 && $pagina != 'task' && $pagina != 'criar'): ?>
                    <a class="add-post pull-right dropdown-toggle" href="/task/criar" style="cursor:pointer;">
                                        <i class="glyphicon glyphicon-plus" aria-hidden="true"></i>
                                        <span class="tooltiptext">Criar Task</span>
                                    </a><br/>

                    <?php endif; ?> 
                    <h3><?php echo $pageHeader; ?></h3>
                </div>
            </div>
            <!-- INICIO PAGE BODY -->
            <div class="page-body">
                <?php 
                    switch ($pagina) {
                        case 'criar': ?>



                            <form method="POST" name="frmCriaTask" id="frmCriaTask" action="/task/criaTask" enctype="multipart/form-data">
                                <div class="container-fluid">
                                    <!-- Dados task -->
                                    <div class="row">
                                        <h4>Dados <i data-toggle="tooltip" data-placement="top" class="fa fa-question-circle-o" aria-hidden="true" data-html="true" title="<p>Este tópico requer o enunciado da atividade e o prazo máximo de entrega da tarefa.</p>"></i></h4>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="txtNome"><small>Nome</small></label>
                                                <input id="txtNome" name="txtNome" type="text" class="form-control" placeholder="Insira um título para esta atividade" maxlength="50" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="cmbTurma"><small>Componente - Turma</small></label>
                                                <select class="form-control" id="cmbTurma" name="cmbTurma" required>
                                                    <option value="" selected>Selecione uma turma</option>
                                                    <?php 
                                                        foreach ($compprofessor as $componente):?>
                                                            <option value="<?php echo $componente->CodCompTurma;?>">
                                                                <?php 
                                                                    echo utf8_encode("$componente->Nome");
                                                                    echo " - ";
                                                                    echo utf8_encode("$componente->Modulo");
                                                                    echo "º ";
                                                                    echo utf8_encode("$componente->NomeTurma");
                                                                    // var_dump($componente->NomeTurma);
                                                                ?>
                                                            </option>

                                                    <?php
                                                        endforeach;
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="dtEntrega"><small>Data de entrega</small></label>
                                                <input id="dtEntrega" name="dtEntrega" type="datetime-local" class="form-control" min="<?php echo date('Y-m-d H:i');?>" oninvalid="this.setCustomValidity('Viagens no tempo ainda não são possíveis...')" oninput="setCustomValidity('')" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="txtDescricao"><small>Descrição</small></label>
                                                <textarea id="txtDescricao" name="txtDescricao" class="form-control" placeholder="Insira aqui o enunciado desta tarefa" style="resize: none;" rows="5" required></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Fim dados task -->
                                    <hr/>
                                    <!-- Panel tipo atividade -->
                                    <div class="row">
                                        <h4>Tarefa <i data-toggle="tooltip" data-placement="top" class="fa fa-question-circle-o" aria-hidden="true" data-html="true" title="<p>Aqui você pode criar ou efetuar o upload de uma atividade.</p>"></i></h4><br/>
                                        <div class="panel with-nav-tabs card-danger row" style="min-height: 387px;">
                                            <div class="panel-heading">
                                                <ul class="nav nav-tabs">
                                                    <li class="active"><a href="#enviar" data-toggle="tab"><i class="glyphicon glyphicon-cloud-upload" aria-hidden="true"></i> Upload</a></li>
                                                    <li><a href="#criar" data-toggle="tab"><i class="glyphicon glyphicon-file" aria-hidden="true"></i> Criar novo arquivo</a></li>
                                                </ul>
                                            </div>
                                            <div class="panel-body">
                                                <div class="tab-content">
                                                    <!-- Pane upload -->
                                                    <div class="tab-pane active" id="enviar">
                                                        <div class="row">
                                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                                <div class="container-fluid">
                                                                    <div class="row">
                                                                       <div class="col-md-12">
                                                                            <div class="form-group files color">
                                                                                <label>Faça upload de seu arquivo </label>
                                                                                <input type="file" name="fileTask" id="fileTask" accept="docx,doc,pdf,ppt,pptx,xls,xlsx,sql,php,html,js,png,jpg,jpeg" />
                                                                                <input type="hidden" name="MAX_FILE_SIZE" id="MAX_FILE_SIZE" value="30000" />
                                                                            </div>    
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Fim pane upload -->
                                                    <!-- Pane Criar -->
                                                    <div class="tab-pane fade" id="criar">
                                                        <div class="row">
                                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                                <div class="adjoined-bottom">
                                                                    <div class="grid-container">
                                                                        <div class="grid-width-100">
                                                                            <form method="get">
                                                                                <textarea id="editor">
                                                                                    <h1>Crie aqui sua atividade</h1>
                                                                                    <p>Aqui você pode criar atividades diversas. Exemplos de atividades: formulário prova escrita atividade com vídeos</p>
                                                                                </textarea>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Fim pane criar -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Fim panel tipo atividade -->
                                    <hr/>
                                    <!-- Nível task -->
                                    <div class="row">
                                        <h4>Nível da missão <i data-toggle="tooltip" data-placement="top" class="fa fa-question-circle-o" aria-hidden="true" data-html="true" title="<p>Este tópico representa a dificuldade desta tarefa.<br/> Opte por recompensar os alunos de acordo com o nível de dificuldade de sua atividade proposta. <br/> Bronze - 5xp;<br/>Prata - 10xp;<br/> Ouro - 15xp; <br/> Platina - 20xp.</p>"></i></h4><br/>
                                            <div class="funkyradio">
                                                <div class="funkyradio-info col-md-6 col-sm-6">
                                                    <input type="radio" name="rdbDificuldade" id="radio1" value="1" />
                                                    <label for="radio1">
                                                        <img src="/assets/img/medalhas/bronze.gif" class="medalha2">Bronze
                                                    </label>
                                                </div>
                                                <div class="funkyradio-primary col-md-6 col-sm-6">
                                                    <input type="radio" name="rdbDificuldade" id="radio2" value="2" />
                                                    <label for="radio2">
                                                        <img src="/assets/img/medalhas/prata.gif" class="medalha2">Prata
                                                    </label>
                                                </div>
                                                <div class="funkyradio-success col-md-6 col-sm-6">
                                                    <input type="radio" name="rdbDificuldade" id="radio3" value="3" />
                                                    <label for="radio3">
                                                        <img src="/assets/img/medalhas/ouro.gif" class="medalha2">Ouro
                                                    </label>
                                                </div>
                                                <div class="funkyradio-danger col-md-6 col-sm-6">
                                                    <input type="radio" name="rdbDificuldade" id="radio4" value="4" />
                                                    <label for="radio4">
                                                        <img src="/assets/img/medalhas/platina.gif" class="medalha2">Platina 
                                                    </label>
                                                </div>
                                            </div>
                                    </div>
                                    <!-- Fim nível task -->
                                    <hr/>
                                    <!-- Inteligências task -->
                                    <div class="row">
                                        <h4>Competências <i data-toggle="tooltip" data-placement="top" class="fa fa-question-circle-o" aria-hidden="true" data-html="true" title="<p>Selecione as capacidades desenvolvidas ao realizar esta atividade. <a href='#'>Saiba mais</a></p>"></i></h4>
                                        <div class="col-md-6 col-sm-12 col-xs-12">
                                            <div class="funkyradio">
                                                <div class="funkyradio-default">
                                                    <input type="checkbox" name="chkInteligencia[]" value="9" id="checkbox1" />
                                                    <label for="checkbox1">Inteligencia linguistica</label>
                                                </div>
                                                <div class="funkyradio-primary">
                                                    <input type="checkbox" name="chkInteligencia[]" value="1" id="checkbox2" />
                                                    <label for="checkbox2">Inteligencia lógico Matemática </label>
                                                </div>
                                                <div class="funkyradio-success">
                                                    <input type="checkbox" name="chkInteligencia[]" value="3" id="checkbox3" />
                                                    <label for="checkbox3">Inteligencia espacial</label>
                                                </div>
                                                <div class="funkyradio-danger">
                                                    <input type="checkbox" name="chkInteligencia[]" value="4" id="checkbox4" />
                                                    <label for="checkbox4">Inteligencia corporal cinestésica</label>
                                                </div>
                                                <div class="funkyradio-warning">
                                                    <input type="checkbox" name="chkInteligencia[]" value="2" id="checkbox5" />
                                                    <label for="checkbox5">Inteligencia musical</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12 col-xs-12">
                                            <div class="funkyradio">
                                                <div class="funkyradio-secondary">
                                                    <input type="checkbox" name="chkInteligencia[]" value="5" id="checkbox6" />
                                                    <label for="checkbox6">Inteligencia intrapessoal</label>
                                                </div>
                                                <div class="funkyradio-quintly">
                                                    <input type="checkbox" name="chkInteligencia[]" value="6" id="checkbox7" />
                                                    <label for="checkbox7">Inteligencia interpessoal</label>
                                                </div>
                                                <div class="funkyradio-tertiary">
                                                    <input type="checkbox" name="chkInteligencia[]" value="7" id="checkbox8" />
                                                    <label for="checkbox8">Inteligencia naturalista</label>
                                                </div>
                                                <div class="funkyradio-quarterly">
                                                    <input type="checkbox" name="chkInteligencia[]" value="8" id="checkbox9" />
                                                    <label for="checkbox9">Inteligencia existencial</label>
                                                </div>
                                                <div class="funkyradio-info">
                                                    <input type="checkbox" name="chkInteligencia[]" value="10" id="checkbox10" />
                                                    <label for="checkbox10">Inteligencia prática</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Fim inteligências task -->
                                    <hr/>
                                    <!-- Botões e inputs escondidos -->
                                    <div class="row">
                                        <input type="hidden" name="codProfessor" value="<?php echo $codusuario; ?>">
                                        <div class="btn-group pull-right">
                                            <button type="submit" class="btn btn-success">Salvar e enviar missão</button>
                                            <button type="reset" class="btn btn-danger">limpar</button>
                                        </div>
                                    </div>
                                    <!-- Fim botões -->
                                </div>
                            </form>
                            <p>&nbsp;</p>
                            <p>&nbsp;</p>



                            
                            <?php break;
                        
                        case 'task': 
                            if($tipo == 3):
                                                            
                                switch ($missoes['CodTipoTask']) {
                                    case 1:
                                        $img = '<img src="'.base_url('assets/img/medalhas/bronze.gif').'" class="medalha"/>';
                                        $premio = 5;
                                        break;
                                    case 2:
                                        $img = '<img src="'.base_url('assets/img/medalhas/prata.gif').'" class="medalha"/>';
                                        $premio = 10;
                                        break;
                                    case 3:
                                        $img = '<img src="'.base_url('assets/img/medalhas/ouro.gif').'" class="medalha"/>';
                                        $premio = 15;
                                        break;
                                    case 4:
                                        $img = '<img src="'.base_url('assets/img/medalhas/platina.gif').'" class="medalha"/>';
                                        $premio = 20;
                                        break;
                                }
                                                           
                        ?>  
                                <div class="panel-group" id="accordion">
                                    <div class="panel panel-primary">
                                        <div class="panel-heading">
                                          <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                              <?php echo $img; echo "<b>".utf8_encode($componente[0]->Nome)."</b>"; ?>
                                            </a>
                                          </h4>
                                        </div>  
                                        <div id="collapseTwo" class="panel-collapse active">
                                            <div class="panel-body">
                                                <div class="container-fluid my-container">
                                                    <div class="highlight">
                                                        <div class="row">
                                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                                <h2>
                                                                    <?php
                                                                        echo $pageHeader;
                                                                        echo " - Atividade nível ".$missoes['Dificuldade'];
                                                                        echo "&nbsp;$img";
                                                                    ?>
                                                                </h2><hr/>
                                                                <p><?php echo utf8_encode($missoes['Descricao']); ?></p>
                                                            </div><br/>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-2 col-sm-2 col-xs-2">
                                                                <i class="fa fa-5x fa-bolt" aria-hidden="true"></i>
                                                            </div>
                                                            <div class="col-md-10 col-sm-10 col-xs-10">
                                                                <ul>
                                                                    <li><?php echo $premio;?> pontos de experiência</li>
                                                                    <?php foreach ($competencia as $comp): ?>
                                                                        <li><?php echo $premio;?> pontos de inteligência <?php echo utf8_encode($comp->Nome); ?></li>
                                                                    <?php endforeach; ?>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <br/>
                                                        <div class="row">
                                                            <div class="col-md-5">
                                                                <?php if(!empty($missoes['CaminhoArquivo'])):?>
                                                                    <a class="btn btn-warning" data-toggle="modal" data-target="#download">Download da missão</a>
                                                                <?php endif; ?>
                                                                <?php if($missoes['Prazo'] >= date('Y-m-d H:i')):?>
                                                                <a href="/tasks/enviar/<?php echo $missoes['CodTask'];?>" type="button" class="btn btn-warning">Enviar atividade</a>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-primary">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                                    <b>Detalhes</b>
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseOne" class="panel-collapse collapse">
                                            <div class="panel-body">
                                                <?php 
                                                    $CI =& get_instance();
                                                    $CI->load->helper('interface');
                                                    $foto = fotoPerfil($missoes['Foto'],$missoes['Sexo']);
                                                ?>
                                                <div class="col-md-3 col-sm-12   col-lg-3 " align="center"> 
                                                    <img alt="Professor fulano de tal" src="<?php echo $foto;?>" class="img-circle img-responsive"> 
                                                </div>
                                                <div class="col-md-9 col-lg-9 col-sm-12 "> 
                                                    <table class="table table-user-information">
                                                        <tbody>
                                                            <tr>
                                                                <td>Professor:</td>
                                                                <td><?php echo $missoes['NomeUser']." ".$missoes['Sobrenome'];?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Data de Entrega:</td>
                                                                <td><?php echo date('d/m/Y H:i', strtotime($missoes['Prazo']));?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Contato:</td>
                                                            <td>
                                                                    <a type="button" href="/chat/<?php echo $missoes['CodUsuario'];?>" class="btn btn-primary" >Enviar mensagem</a>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                  </div>
                                </div>
                        <?php 
                            else:
                        ?>
                            <div class="panel-body">
                                <div class="container-fluid">
                                   <div class="row">
                                        <div class="col-md-12">
                                            <div class="panel panel-default">
                                                <div class="panel-body">
                                                    <div class="pull-right">
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-default btn-filter" data-target="todos">Todos</button>
                                                            <button type="button" class="btn btn-success btn-filter" data-target="entregue">Entregues</button>
                                                            <button type="button" class="btn btn-danger btn-filter" data-target="pendente">Pendentes</button>
                                                            <!-- <button type="button" class="btn btn-warning btn-filter" data-target="pendente">Pendentes</button> -->
                                                            <!-- <button type="button" class="btn btn-danger btn-filter" data-target="cancelado">Cancelado</button> -->
                                                        </div>
                                                    </div>
                                                    <div class="table-container">
                                                        <table class="table table-filter">
                                                            <tbody>
                                                                <?php
                                                                    $CI =& get_instance();
                                                                    $CI->load->helper('interface');
                                                                    foreach ($alunos as $aluno) :
                                                                ?>
                                                                    <tr data-status="<?php echo strtolower($aluno->Status)?>">
                                                                    <td>
                                                                    <?php 
                                                                        $atividade = $pageHeader." - ".utf8_encode($aluno->Nome." ".$aluno->Sobrenome."(".$missoes['Modulo'].utf8_decode('º ').utf8_encode($missoes['NomeTurma']).")");

                                                                        

                                                                        if(!empty($aluno->CaminhoArquivo)){
                                                                            
                                                                            $disabled = TRUE; 
                                                                            $download = 'download="'.$atividade.'"';
                                                                        }else{
                                                                            $link = '#';
                                                                            $disabled = FALSE; 
                                                                            $download = '';
                                                                        }
                                                                    ?>
                                                                    <?php
                                                                        if(!empty($aluno->CaminhoArquivo)): 
                                                                        $link = base_url("data/tasks/turmas/$aluno->CaminhoArquivo");
                                                                    ?>
                                                                        <a type="button" href="<?= $link;?>" class="btn btn-default" download="<?= $atividade;?>">
                                                                            <i class="glyphicon glyphicon-cloud-download"></i>
                                                                        </a>
                                                                    <?php else: ?>
                                                                        <a type="button" href="javascript:void(0)" class="btn btn-default disabled">
                                                                            <i class="glyphicon glyphicon-cloud-download"></i>
                                                                        </a>
                                                                    <?php endif; ?>
                                                                    </td>
                                                                    <td>
                                                                    <?php if(!empty($aluno->CaminhoArquivo)): ?>
                                                                        <a href="javascript:void(0);" id="<?php echo "premio".(int)$aluno->CodUsuario; ?>" class="star <?php echo ($aluno->Premiado)? 'star-checked': '';?>" data-desempenho="<?php echo (int)$aluno->CodDesempenho; ?>" data-status="<?php echo (int)$aluno->Premiado; ?>" data-cod="<?php echo (int)$aluno->CodUsuario; ?>" data-premio="<?php echo (int)$missoes['Premio']; ?>">
                                                                            <i class="fa fa-star"></i>
                                                                        </a>
                                                                    <?php else:?>
                                                                            <i class="fa fa-star-o"></i>
                                                                    <?php endif;?>
                                                                    </td>
                                                                    <td>
                                                                        <div class="media">
                                                                            <a href="<?php echo '/perfil/'.$aluno->Token; ?>" class="pull-left">
                                                                                <img src="<?php echo fotoPerfil($aluno->Foto,$aluno->Sexo); ?>" class="media-photo">
                                                                            </a>
                                                                            <div class="media-body">
                                                                            <?php if($aluno->Status == "Entregue"): ?>
                                                                                <span class="media-meta pull-right"><?php echo date('d/m/Y H:i', strtotime($aluno->DataEntrega));?></span>
                                                                            <?php else: ?>
                                                                                <span class="media-meta pull-right">Aguardando...</span>
                                                                            <?php endif; ?>
                                                                                <h4 class="title">
                                                                                    <?php 
                                                                                    echo '<a href="/perfil/'.$aluno->Token.'">';
                                                                                    echo utf8_encode($aluno->Nome." ".$aluno->Sobrenome);
                                                                                    echo '</a>';
                                                                                    echo '<span class="pull-right ';
                                                                                    echo ($aluno->Status == 'Entregue')? 'pagado': 'cancelado';
                                                                                    echo '">'.strtoupper($aluno->Status).'</span>';?>
                                                                                    
                                                                                </h4>
                                                                                <p class="summary">
                                                                                    <?php 
                                                                                        if(!empty($aluno->CaminhoArquivo)){
                                                                                            $premiado = $aluno->Premiado;
                                                                                            if($premiado)
                                                                                                echo "+ ".$missoes['Premio']."xp";
                                                                                            else
                                                                                                echo "Aguardando xp...";
                                                                                        }
                                                                                        else{
                                                                                            echo "Prêmio não disponível.";
                                                                                        }
                                                                                    ?>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <?php endforeach; ?>
                                                                <!-- <tr data-status="entregue">
                                                                    <td>
                                                                        <a href="#" class="dropdown-toggle" data-toggle="modal" data-target="#exampleModal10" data-toggle="modal" data-target="#exampleModal10">
                                                                            <button class="btn btn-default">
                                                                                <i class="fa fa-eye fa-1x"></i>
                                                                                <i class="fa fa-eye-slash" aria-hidden="true"></i>
                                                                            </button>
                                                                        </a> 
                                                                    </td>
                                                                    <td>
                                                                        <a href="javascript:;" class="star">
                                                                            <i class="glyphicon glyphicon-star"></i>
                                                                        </a>
                                                                    </td>
                                                                    <td>
                                                                        <div class="media">
                                                                            <a href="#" class="pull-left">
                                                                                <img src="https://s3.amazonaws.com/uifaces/faces/twitter/fffabs/128.jpg" class="media-photo">
                                                                            </a>
                                                                            <div class="media-body">
                                                                                <span class="media-meta pull-right">Febrero 13, 2016</span>
                                                                                <h4 class="title">
                                                                                    Lorem Impsum
                                                                                    <span class="pull-right pagado">ENTREGUE</span>
                                                                                </h4>
                                                                                <p class="summary">Ut enim ad minim veniam, quis nostrud exercitation...</p>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr data-status="pendente">
                                                                    <td>
                                                                        <a href="#" class="dropdown-toggle" data-toggle="modal" data-target="#exampleModal10">
                                                                            <button class="btn btn-default">
                                                                                <i class="fa fa-eye fa-1x"></i>
                                                                                <i class="fa fa-eye-slash" aria-hidden="true"></i>
                                                                            </button>
                                                                        </a> 
                                                                    </td>
                                                                    <td>
                                                                        <a href="javascript:;" class="star">
                                                                            <i class="glyphicon glyphicon-star"></i>
                                                                        </a>
                                                                    </td>
                                                                    <td>
                                                                        <div class="media">
                                                                            <a href="#" class="pull-left">
                                                                                <img src="https://s3.amazonaws.com/uifaces/faces/twitter/fffabs/128.jpg" class="media-photo">
                                                                            </a>
                                                                            <div class="media-body">
                                                                                <span class="media-meta pull-right">Febrero 13, 2016</span>
                                                                                <h4 class="title">
                                                                                    Lorem Impsum
                                                                                    <span class="pull-right pendiente">PENDENTE</span>
                                                                                </h4>
                                                                                <p class="summary">Ut enim ad minim veniam, quis nostrud exercitation...</p>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr data-status="cancelado">
                                                                    <td>
                                                                        <a href="#" class="dropdown-toggle" data-toggle="modal" data-target="#exampleModal10">
                                                                            <button class="btn btn-default">
                                                                                <i class="fa fa-eye fa-1x"></i>
                                                                                <i class="fa fa-eye-slash" aria-hidden="true"></i>
                                                                            </button>
                                                                        </a> 
                                                                    </td>
                                                                    <td>
                                                                        <a href="javascript:;" class="star">
                                                                            <i class="glyphicon glyphicon-star"></i>
                                                                        </a>
                                                                    </td>
                                                                    <td>
                                                                        <div class="media">
                                                                            <a href="#" class="pull-left">
                                                                                <img src="https://s3.amazonaws.com/uifaces/faces/twitter/fffabs/128.jpg" class="media-photo">
                                                                            </a>
                                                                            <div class="media-body">
                                                                                <span class="media-meta pull-right">Febrero 13, 2016</span>
                                                                                <h4 class="title">
                                                                                    Lorem Impsum
                                                                                    <span class="pull-right cancelado">CANCELADO</span>
                                                                                </h4>
                                                                                <p class="summary">Ut enim ad minim veniam, quis nostrud exercitation...</p>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                </tr> -->
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php 
                            endif;
                            break;

                        case 'enviar': 
                         // var_dump($missoes);
                            if($tipo == 3): ?>  
                                    <div class="panel panel-primary">
                                        <div class="panel-heading">
                                          <h4 class="panel-title">
                                            Enviar atividade
                                          </h4>
                                        </div>
                                        <form method="POST" name="frmEnviaTask" id="frmEnviaTask" class="panel-body" action="/task/enviaTask" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                    <div class="container-fluid">
                                                        <div class="row">
                                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                                <div class="container-fluid">
                                                                    <div class="row">
                                                                       <div class="col-md-12">
                                                                            <div class="form-group files color">
                                                                                <label>Faça upload de seu arquivo </label>
                                                                                <input type="file" name="atividade" id="atividade" accept="docx,doc,pdf,ppt,pptx,xls,xlsx,sql,php,html,js,png,jpg,jpeg" />
                                                                                <input type="hidden" name="MAX_FILE_SIZE" id="MAX_FILE_SIZE" value="30000" />
                                                                            </div>    
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                            <input type="hidden" name="codTask" value="<?php echo $codTask; ?>">
                                            <div class="btn-group col-md-5 pull-right">
                                                <button type="submit" class="btn btn-success">Salvar e enviar missão</button>
                                                <button type="reset" class="btn btn-danger">Limpar</button>
                                            </div>
                                    </div>
                                        </form>
                                    </div>
                        <?php 
                            else:
                                redirect(base_url('/tasks'));
                            endif;
                            break;

                        default:
                            switch ($tipo) {
                                case 3:
                                    echo '<div class="alert alert-warning alert-dismissable">
                                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                            <strong>Dica LED:</strong> Procure realizar o máximo de missões que você conseguir. Além de garantir uma boa nota, você ganha experiência para seu avatar :D
                                        </div>';
                                    break;
                                
                                default:
                                    echo '<div class="alert alert-warning alert-dismissable">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <strong>Dica LED:</strong> Procure utilizar o painel de missões para exercitar o conteúdo passado aos alunos.<br/> Por aqui, além de garantir uma boa nota, eles ganham experiência para seus avatares. Isto estabelece uma relação de proximidade entre o aluno e o aprendizado que somente o lúdico pode proporcionar :D
                                    </div>';
                                    break;
                            }
                        ?>
                            <div class="well" align="center">
                                Missões são tarefas que concedem um quantidade de experiência quando completadas.<br/>
                            </div>
                           <?php break;
                    }
                ?>
            </div> 
            <!--FIM PAGE BODY  -->
               
        </div>
    </div>
</div>;
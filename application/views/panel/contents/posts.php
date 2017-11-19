<?php defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div id="main">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="page-header">
                                    <a class="add-post pull-right dropdown-toggle" data-toggle="modal" data-target="#postCad" style="cursor:pointer;">
                                        <i class="glyphicon glyphicon-edit" aria-hidden="true"></i>
                                        <span class="tooltiptext">Nova postagem</span>
                                    </a><br/>
                                    <h3><?php echo $nomeMural; ?></h3>
                                </div>
                                <div class="well"><?php echo $descricao;?></div>
                                <?php foreach ($publicacao as $post):?>
                                    <div class="panel panel-primary">
                                        <span class="mural-img pull-left">
                                                <?php 
                                                    $CI =& get_instance();
                                                    $CI->load->helper('interface');
                                                    $foto = fotoPerfil($post->Foto,$post->Sexo);
                                                    // $s = ($post->Sexo == 'f') ? 'f' : 'm';
                                                    // $foto = (isset($post->Foto))? "users/profile/$post->Foto.jpg"."?".time() : "assets/img/user-$s.png"."?".time() ;
                                                ?>
                                                <img src="<?= $foto; ?>" class="img-circle">
                                        </span>
                                        <div class="panel-heading">
                                            <h3 class="panel-title"><a href="/perfil/<?php echo $post->Token;?>"><?php echo utf8_encode($post->Nome."&nbsp;".$post->Sobrenome);?></a><small> <?php echo "em ".date("d/m/Y à\s H:i", strtotime($post->DataHora));?></small></h3>

                                        </div>
                                        <div class="panel-body">

                                        <!-- <iframe width="560" height="315" src="https://www.youtube.com/embed/IXdNnw99" frameborder="0" allowfullscreen></iframe> -->
                                            <p> <?php 
                                                    $str = utf8_encode($post->Conteudo);
                                                    $str = parse_smileys($str, base_url('assets/img/smileys/'));

                                                    $pub = explode(" ", $str);

                                                    $this->load->helper('http'); 
                                                    if(verificaUrl($str)){
                                                        $link = explode(".", $str);
                                                        if(in_array("youtube", $link)){
                                                            $video = explode("=", $str);
                                                            $str = '<div class="embed-responsive embed-responsive-16by9"><iframe class="embed-responsive-item" src="https://www.youtube.com/embed/'.$video[1].'" frameborder="0" allowfullscreen></iframe></div>';
                                                        }
                                                        else{
                                                            $str = '<a href="'.$str.'" target="_blank">'.$str.'</a>';
                                                        }
                                                    }
                                                    
                                                    echo $str;
                                                ?>
                                                
                                            </p>
                                            <?php 
                                                if(isset($post->Imagem)):?>
                                                    <center>
                                                        <img src="<?= base_url('data/posts/'); echo "$post->Imagem?".time();?>" class="img img-responsive" style="max-width: 80%;height: auto" >
                                                    </center>
                                                <?php endif;
                                            ?>
                                        </div>
                                        <div class="panel-footer post">
                                            <form id="frmOp<?php echo $post->CodPost;?>" class="frmOp">
                                                <?php 
                                                    switch ($post->CodTipoOpiniao) {
                                                        case 1:
                                                            $class = "op1";
                                                            break;
                                                        case 2:
                                                            $class = "op2";
                                                            break;
                                                        default:
                                                            $class = "fa fa-lightbulb-o fa-2x";
                                                            break;
                                                    }
                                                ?>
                                            <div class="dropup">
                                                <button class="btn-opinar dropdown-toggle pull-left" id="op" type="button" data-toggle="dropdown" onLoad="verificaOp(<?php echo $post->CodPost;?>,<?php echo $codusuario;?>)">
                                                    <div id="opiniao<?php echo $post->CodPost;?>" class="<?= $class; ?>">&nbsp;</div>
                                                </button>

                                                <!-- <input type="hidden" name="codPost" id="codPost" value="<?php echo $post->CodPost;?>" />
                                                <input type="hidden" name="codUser" id="codUser" value="<?php echo $codusuario;?>" /> -->
                                                
                                                <div class="dropdown-menu opiniaoBox">
                                                    <a class="boa mandaOp" data-tipo="1" data-post="<?php echo $post->CodPost; ?>">
                                                        <img class="opiniao img-responsive" data-toggle="tooltip" data-placement="top" src="<?= base_url('assets/img/opiniaoIntS.png'); ?>" aria-hidden="true" title="Boa Ideia!" />
                                                    </a>
                                                    <a class="nada mandaOp" data-tipo="2" data-post="<?php echo $post->CodPost; ?>">
                                                        <img class="opiniao img-responsive" data-toggle="tooltip" data-placement="top" src="<?= base_url('assets/img/opiniaoBrokeS.png'); ?>" aria-hidden="true" title="Nada a ver!" />
                                                    </a>
                                                </div>
                                            </div>
                                            </form>
                                            <button type="button" class="btn btn-default btnComentario" data-toogle="tooltip" title="Comentar" data-post="<?php echo $post->CodPost;?>">
                                                  <span class="fa fa-quote-left"></span>
                                                <span class="fa fa-quote-right"></span>
                                                </button>

                                            <div class="dropup pull-right">
                                                <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <span class="caret"></span>
                                                </button>
                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                                    <?php if($post->CodUsuario === $codusuario || (int)$tipo == 1):?>
                                                    <li><a href="#" class="excluir" data-cod="<?php echo $post->CodPost;?>" data-controller="/posts/deletaPost"><span class="fa fa-trash"></span> Excluir</a></li>
                                                    <li role="separator" class="divider"></li>
                                                    <?php endif;?>
                                                    <?php if((int)$tipo !== 1):?>
                                                    <li><a href="#" class="report" data-post="<?php echo $post->CodPost;?>"><span class="fa fa-flag"></span> Reportar ao administrador</a></li>
                                                    <?php endif;?>
                                                    </ul>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
<?php 
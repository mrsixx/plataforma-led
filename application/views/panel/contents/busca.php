<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
    // var_dump($tipo);
?>
 <div id="main">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="page-header">
                                    <h3><?php echo $pageHeader;?></h3>
                                </div>
                                <div class="page-body">
                                    <ul class="list-group">
                                    <?php 
                                        if(!empty($resultado)):
                                            foreach ($resultado as $result): 
                                                if($result->Status):?>
                                                <a href="/perfil/<?php echo $result->Token;?>"><li class="list-group-item" style="background: transparent;">
                                                    <div class="row">
                                                        <div class="col-xs-4 col-md-2 col-sm-2">
                                                            <?php
                                                                $CI =& get_instance();
                                                                    $CI->load->helper('interface');

                                                                    $foto = fotoPerfil($result->Foto,$result->Sexo);
                                                            ?>
                                                            <img src="<?php echo $foto;?>" class="img img-responsive" alt="Foto de perfil de <?php echo utf8_encode("$result->Nome $result->Sobrenome");?>"> 
                                                        </div>
                                                        <div class="col-xs-8 col-md-10 col-sm-9" style="color: #000;">
                                                            <div>
                                                                <b>Nome:</b> <?php echo utf8_encode("$result->Nome $result->Sobrenome");?><br/>
                                                                <b>Nickname:</b> <?php echo utf8_encode("$result->Nickname");?><br/>
                                                                <b><?php 
                                                                    switch($result->CodTipoUsuario){
                                                                        case 1:
                                                                            echo "Administrador";
                                                                            break;
                                                                        case 2: 
                                                                            echo "Funcionário";
                                                                            break;
                                                                        case 3: 
                                                                            echo "Aluno";
                                                                            break;
                                                                        case 4: 
                                                                            echo "Professor";
                                                                            break;
                                                                        default:
                                                                            echo "";
                                                                            break;
                                                                    } 
                                                                ?></b>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li></a>    
                                        <?php 
                                            endif;
                                            endforeach;
                                        endif;
                                    ?>
                                    </ul>
                                </div>


                            </div>
                        </div>
                </div>;
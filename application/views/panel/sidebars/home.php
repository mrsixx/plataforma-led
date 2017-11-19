<div class="list-group">
    <span href="#" class="list-group-item active">
    <span class="pull-right" id="slide-submenu">
        <i  class="glyphicon glyphicon-remove-circle"></i>
    </span> 
    <!--aqui vai trecho img-perfil-->
    <div class="profile-header-container">
        <div class="profile-header-img">
            <img class="img-circle" src="<?php echo $foto;?>">

            <div class="rank-label-container">



    <?php if($tipo == 3 || $tipo == 4):?>
                <span class="label label-default rank-label">
                    <?php 
                        // echo utf8_encode($nickname);
                        echo utf8_encode("$nome");
                        echo " - Lvl. ".$lvl;
                    ?>
                </span>
            </div>
        </div>
    </div>
    <div class="progress" style="margin-top:-30px;">
        <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="<?php echo $xp;?>" aria-valuemin="<?php echo $min; ?>" aria-valuemax="<?php echo $max; ?>" style="width:<?php echo $porcentagem;?>%;transition-timing-function: step-start;" ></div>
    </div>
    <div align="center" style="margin-top: -22px;font-size:1em;color:#000;"><?php echo $porcentagem;?>%</div>







    <?php else:?>

        <span class="label label-default rank-label">
                    <?php 
                        // echo utf8_encode($nickname);
                        echo utf8_encode("$nome $sobrenome");
                    ?>
                </span>
            </div>
        </div>
    </div>

    <?php endif;?>






    <!--aqui acaba-->
    </span>
    <div id="sidebarled">
    <?php 
        //exibindo dinâmicamente os links da sidebar
        foreach ($menulateral as $link => $valor): 
                if(!isset($valor['disabled']))
                    $valor['disabled'] = FALSE;
            ?>
                    <a class="list-group-item <?php echo $valor['disabled'] == TRUE ? 'disabled': ''; ?>" href="<?php echo $valor['href'];?>" <?php echo $valor['disabled'] == TRUE ? 'onClick="return false;"': ''; ?> >
                        <i class="glyphicon <?php echo $valor['icon'];?>" aria-hidden="true">&nbsp;</i>
                        <?php 
                            echo $valor['title']; 
                            if($valor['badge']){ ?>
                                <span class="badge badge-sidebar">
                                    <?php echo $valor['qtdbadge'] ?>
                                </span> 
                        <?php } ?>
                    </a>
        <?php endforeach; ?>
    </div>
</div>

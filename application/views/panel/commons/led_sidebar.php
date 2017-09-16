<div class="list-group">
    <span href="#" class="list-group-item active">
<!--
                        <span class="pull-left">
                            <i  class="glyphicon glyphicon-chevron-left"></i>
                        </span> -->
    <span class="pull-right" id="slide-submenu">
                            <i  class="glyphicon glyphicon-remove-circle"></i>
                        </span>
    <!--                    <p>Lorem Ipsum</p>-->
    <!--aqui vai trecho img-perfil-->
    <div class="profile-header-container">
        <div class="profile-header-img">
            <img class="img-circle" src="<?php echo $foto;?>">

            <div class="rank-label-container">
                <span class="label label-default rank-label">
                                    <?php 
                                        echo $nome;
                                        echo " - Lvl. ".$lvl;
                                    ?>
                                </span>
            </div>
        </div>
    </div>
    <div class="progress">
        <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:40%;">40%</div>
    </div>
    <!--aqui acaba-->
    </span>
    <div id="sidebarled">
    <?php 
        //exibindo dinâmicamente os links da sidebar
        foreach ($menulateral as $link => $valor): ?>
                    <a class="list-group-item" href="<?php echo $valor['href'];?>">
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
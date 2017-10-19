<!--aqui vai o conteúdo da sidebar que abre e fecha-->            
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
                                    <span class="label label-default rank-label">
                                        <?php 
                                            echo $nickname;
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
                        if(!empty($menulateral)):
                        foreach ($menulateral as $tool): ?>
                                        <a class="list-group-item" href="<?php echo $tool['href'];?>">
                                            <i class="<?php echo $tool['icon'];?>" aria-hidden="true">&nbsp;</i>
                                            <?php echo $tool['title']; ?>
                                        </a>
                        <?php
                            endforeach; 
                            endif; 
                        ?>
                        </div>
                    </div>
<!--aqui vai o conteúdo da sidebar que abre e fecha-->            
                <div class="list-group">
                        <span href="#" class="list-group-item active">
                            <span class="pull-right" id="slide-submenu">
                                <i  class="glyphicon glyphicon-remove-circle"></i>
                            </span>
                        
                            <a class="list-group-item pull-left" href="javascript:window.history.go(-1)">
                                <i class="glyphicon glyphicon-chevron-left"></i> Página anterior
                            </a><br/><br/>
                        <hr/>
                        </span>
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
                        else:
                            echo '<p class="list-group-item" align="center">
                                    Nenhuma ferramenta cadastrada...
                                </p>';
                        endif; 
                        ?>
                        </div>
                    </div>
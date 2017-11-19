<!--aqui vai o conteúdo da sidebar que abre e fecha-->            
                    <div class="list-group">
                        <!--aqui vai o trecho header da sidebar que abre e fecha-->
                        <span href="#" class="list-group-item active">
                            <span class="pull-right" id="slide-submenu">
                                <i  class="glyphicon glyphicon-remove-circle"></i>
                            </span>
                        
                            <?php 
                            $CI =& get_instance();
                            if(!empty($CI->uri->segment(2))): ?>
                            <a class="list-group-item pull-left" href="/tasks">
                            <?php else: ?>
                            <a class="list-group-item pull-left" href="/panel">
                            <?php endif; ?>
                                <i class="glyphicon glyphicon-chevron-left"></i> Página anterior
                            </a><br/><br/>
                        
                        <hr/>
                        <!-- <a class="list-group-item" href="#">Nova Missão 1 </a>
                        <a class="list-group-item" href="#">Nova Missão 2</a>
                        <a class="list-group-item" href="#">Nova Missão 3</a>
                        <a class="list-group-item" href="#">Nova Missão 4</a>
                        <a class="list-group-item" href="#">Nova Missão 5</a> -->

                        <div id="sidebarled">
                        <?php 
                            //exibindo dinâmicamente os links da sidebar
                            foreach ($menulateral as $link => $valor): ?>
                                        <a class="list-group-item" href="<?php echo $valor['href'];?>">
                                            <i class="<?php echo $valor['icon'];?>" aria-hidden="true">&nbsp;</i>
                                            <?php 
                                                echo $valor['title']; 
                                            ?>
                                        </a>
                            <?php endforeach; ?>
                        </div>
                    </div>
<!--aqui vai o conteúdo da sidebar que abre e fecha-->
                    <div class="list-group">
                        <span href="#" class="list-group-item active">
                            <span class="pull-right" id="slide-submenu">
                                <i  class="glyphicon glyphicon-remove-circle"></i>
                            </span>
                        
                            <?php 
                            $CI =& get_instance();
                            if(!empty($CI->uri->segment(2))): ?>
                            <a class="list-group-item pull-left" href="/mural">
                            <?php else: ?>
                            <a class="list-group-item pull-left" href="/panel">
                            <?php endif; ?>
                                <i class="glyphicon glyphicon-chevron-left"></i> Página anterior
                            </a><br/>
                        </span>
                        <div class="list-group-item"><hr/></div>
                        <div id="sidebarled">
                        <?php 
                            //exibindo dinâmicamente os links da sidebar
                            foreach ($menulateral as $link => $valor): ?>
                                        <a class="list-group-item" href="<?php echo $valor['href'];?>">
                                            <i class="<?php echo $valor['icon'];?>" aria-hidden="true">&nbsp;</i>
                                            <!-- Mural da Escola -->
                                            <?php 
                                                echo $valor['title']; 
                                                if($valor['badge']){ ?>
                                                <span class="badge badge-sidebar"><?php echo $valor['qtdbadge'] ?></span>
                                            <?php } ?>
                                        </a>
                            <?php endforeach; ?>
                        </div>
                    </div>
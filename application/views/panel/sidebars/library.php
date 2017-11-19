<!--aqui vai o conteúdo da sidebar que abre e fecha-->            
                <div class="list-group">
                        <span href="#" class="list-group-item active">
                            <span class="pull-right" id="slide-submenu">
                                <i  class="glyphicon glyphicon-remove-circle"></i>
                            </span>
                            <?php 
                            $CI =& get_instance();
                            if(!empty($CI->uri->segment(2))): ?>
                            <a class="list-group-item pull-left" href="/biblioteca">
                            <?php else: ?>
                            <a class="list-group-item pull-left" href="/panel">
                            <?php endif; ?>
                                <i class="glyphicon glyphicon-chevron-left"></i> Página anterior
                            </a><br/><br/>
                        <hr/>
                        </span>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Pesquise documentos" id="searchField" name="searchField" value="" />
                            <div class="input-group-btn">
                                <button type="submit" value="Search" class="btn btn-default btn-pesquisa"><span class="glyphicon glyphicon-search"></span></button>
                            </div>
                        </div>
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
                                    Nenhum arquivo cadastrado...
                                </p>';
                        endif; 
                        ?>
                        </div>
                    </div>
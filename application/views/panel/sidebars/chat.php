                    <div id="sidebarled">
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
                                <a class="list-group-item pull-left" href="/chat">
                                <?php else: ?>
                                    <a class="list-group-item pull-left" href="/panel">
                                    <?php endif; ?>
                                    <i class="glyphicon glyphicon-chevron-left"></i> Página anterior
                                </a><br/><br/>

                                <hr/>

                            </span>
                            <!--aqui vão as opções de conversa-->
                            <div class="caixaA-1">
                                <center>
                                    <a href="#conversas" class="<?php echo (!isset($_GET['t'])||$_GET['t'] == 'ind')?'active':'';?> a-1" data-toggle="tab"><i class="fa fa-comment-o" aria-hidden="true" title="Conversas"></i></a>
                                    <a href="#grupos" class="a-1" data-toggle="tab"><i class="fa fa-users" aria-hidden="true" title="Grupos"></i></a>
                                </center>
                            </div>
                            <!--aqui acabam as opções de conversa-->
                            <!--aqui acaba o trecho-->
                            <div class="tab-content">
                                <div class="tab-pane <?php echo (!isset($_GET['t'])||$_GET['t'] == 'ind')?'active':'fade';?>" id="conversas">
                                    <!--aqui a barra de pesquisa e opções de conversas-->
                                    <!--<div class="input-group">
                                        <input type="text" class="form-control" placeholder="pesquise conversas" id="query" name="query" value="">
                                        <div class="input-group-btn">
                                            <button type="submit" value="Search" class="btn btn-default btn-pesquisa"><span class="glyphicon glyphicon-search"></span></button>
                                        </div>
                                    </div>-->
                                    <div class="member_list">
                                        <ul class="list-unstyled">
                                            <li class="left clearfix">
                                                <?php if(!empty($menulateral[0])):?>
                                                    <center>
                                                        <span style="vertical-align:middle;font-size:1.3em;">
                                                            <strong class="primary-font">Conversas recentes</strong>
                                                        </span>
                                                    </center>
                                                <?php endif; ?>

                                            </li>
                                            <?php //var_dump($menulateral); ?>

                                            <?php if(!empty($menulateral[0])): foreach ($menulateral[0] as $link => $valor): if($valor['id_user'] != $codUser):?>
                                                <li class="left clearfix" onclick="return location.href='<?php echo $valor['href']; ?>'">
                                                    <span class="chat-img pull-left">
                                                        <img src="<?php echo $valor['foto'];?>" class="img-circle">
                                                    </span>
                                                    <div class="chat-body clearfix">
                                                        <div class="header_sec">
                                                            <strong class="primary-font"><span style="vertical-align:middle;font-size:1.3em ;color: <?php echo (date('Y-m-d H:i:s') <= $valor['status']) ? '#00FF00' :'#FF0000'; ?>;">•</span>&nbsp;<?php echo $valor['nome'];?></strong>
                                                            <small class="pull-right">09:45AM</small>
                                                        </div>
                                                        <div class="contact_sec">
                                                            <div  id="side<?php echo $valor['id_user'];?>"><span class="badge badge-navbar pull-right"><?php echo $valor['qtdbadge'];?></span></div>
                                                            <p class="primary-font"><?php echo (!empty($valor['etiqueta']))? "<i>".$valor['etiqueta']."</i>" : $valor['etiqueta'];?></p>
                                                        </div>
                                                    </div>
                                                </li>
                                            <?php endif; endforeach; endif;?>
                                                <!-- <hr style="width:80%;" /> -->
                                            <li class="left clearfix">
                                                <center>
                                                        <span style="vertical-align:middle;font-size:1.3em;">
                                                            <strong class="primary-font">Usuários ativos</strong>
                                                        </span>
                                                </center>
                                            </li>
                                                <?php if(!empty($menulateral[3])): foreach ($menulateral[3] as $link => $valor): if($valor['id_user'] != $codUser):?>
                                                    <li class="left clearfix" onclick="return location.href='<?php echo $valor['href']; ?>'">
                                                        <span class="chat-img pull-left">
                                                            <img src="<?php echo $valor['foto'];?>" class="img-circle">
                                                        </span>
                                                        <div class="chat-body clearfix">
                                                            <div class="header_sec">
                                                                <strong class="primary-font"><span style="vertical-align:middle;font-size:1.3em ;color: <?php echo (date('Y-m-d H:i:s') <= $valor['status']) ? '#00FF00' :'#FF0000'; ?>;">•</span>&nbsp;<?php echo $valor['nome'];?></strong>
                                                                <small class="pull-right">(<?php echo $valor['nickname'];?>)</small>
                                                            </div>
                                                            <div class="contact_sec">
                                                                <span class="badge badge-navbar pull-right"><?php echo $valor['qtdbadge'];?></span>
                                                                <p class="primary-font"><?php echo (!empty($valor['etiqueta']))? "<i>".$valor['etiqueta']."</i>" : $valor['etiqueta'];?></p>
                                                            </div>
                                                        </div>
                                                    </li>
                                                <?php endif; endforeach; endif;?>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="tab-pane <?php echo (isset($_GET['t']) && $_GET['t'] == 'grp')?'active':'fade';?>" id="grupos">
                                        <!--aqui a barra de pesquisa e opções de conversas-->
                                        <!--<div class="input-group">
                                            <input type="text" class="form-control" placeholder="pesquise grupos" id="query" name="query" value="">
                                            <div class="input-group-btn">
                                                <button type="submit" value="Search" class="btn btn-default btn-pesquisa"><span class="glyphicon glyphicon-search"></span></button>
                                            </div>
                                        </div>-->
                                        <!--aqui acaba a barra de pesquisa-->

                                        <!--aqui vai a lista de contatos, grupos ou conversas-->
                                        <div class="member_list">
                                            <ul class="list-unstyled">
                                                <?php if(!empty($menulateral[1])): foreach ($menulateral[1] as $link => $valor): ?>
                                                <li class="left clearfix" onclick="return location.href='<?php echo $valor['href']; ?>'">
                                                    <span class="chat-img pull-left">
                                                        <img src="/assets/img/group.png" class="img-circle">
                                                    </span>
                                                    <div class="chat-body clearfix">
                                                        <div class="header_sec">
                                                            <strong class="primary-font"><?php echo $valor['nome'];?></strong>
                                                            <small class="pull-right">09:45AM</small>
                                                        </div>
                                                        <div class="contact_sec">
                                                            <span class="badge badge-navbar pull-right"><?php echo $valor['qtdbadge'];?></span>
                                                            <p class="primary-font"><?php echo (!empty($valor['etiqueta']))? "<i>".$valor['etiqueta']."</i>" : $valor['etiqueta'];?></p>
                                                        </div>
                                                    </div>
                                                </li>
                                            <?php endforeach; endif;?>
                                            <!-- <li class="left clearfix">
                                                    <span class="chat-img pull-left">
                                                     <img src="<?php echo base_url('assets/img/group.png');?>" alt="Ketlyn" class="img-circle"/>
                                                 </span>
                                                 <div class="chat-body clearfix">
                                                    <div class="header_sec">
                                                        <strong class="primary-font">3º ETIM</strong>
                                                        <small class="pull-right">12:09AM</small>
                                                    </div>
                                                    <div class="contact_sec">
                                                        <span class="badge badge-navbar pull-right">3</span>
                                                        <p class="primary-font">Ana, Ketlyn, Kaue, Marino</p>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="left clearfix">
                                                <span class="chat-img pull-left">
                                                 <img src="<?php echo base_url('assets/img/group.png');?>" alt="Ketlyn" class="img-circle"/>
                                             </span>
                                             <div class="chat-body clearfix">
                                                <div class="header_sec">
                                                    <strong class="primary-font">3º INFO</strong>
                                                    <small class="pull-right">12:09AM</small>
                                                </div>
                                                <div class="contact_sec">
                                                    <span class="badge badge-navbar pull-right">3</span>
                                                    <p class="primary-font">Ketlyn, Kaue, Caique</p>
                                                </div>
                                            </div> 
                                        </li>-->
                                    </ul>
                                </div>
                                <!--aqui acaba a lista-->
                            </div>
                        </div>

                    </div>

                </div> 

                    <!--aqui acaba o coonteúdo que abre e fecha-->
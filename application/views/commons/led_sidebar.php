<?php

    $menu = "mensagens";
    switch($menu){
        case "home":
            ?>
                <div class="list-group">
                    <span href="#" class="list-group-item active">
                        <span class="pull-left">
                            <i  class="glyphicon glyphicon-chevron-left"></i>
                        </span>
                        <span class="pull-right" id="slide-submenu">
                            <i  class="glyphicon glyphicon-remove-circle"></i>
                        </span>
                    <p>Lorem Ipsum</p>
                <!--aqui vai trecho img-perfil-->
                    <div class="profile-header-container">
                        <div class="profile-header-img">
                            <img class="img-circle" src="<?= base_url("assets/img/user1.png");?>">
                            <div class="rank-label-container">
                                <span class="label label-default rank-label">Aluno - Lvl. 2</span>
                            </div>
                        </div>
                    </div>
                    <div class="progress">
                        <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:40%;">40%</div>
                    </div>
                    <!--aqui acaba-->
                    </span>
                    <a class="list-group-item" href="#"><i class="glyphicon glyphicon-pushpin" aria-hidden="true">&nbsp;</i>Mural<span class="badge badge-sidebar">6</span></a>
                    <a class="list-group-item" href="<?= base_url('Led');?>"><i class="glyphicon glyphicon-comment" aria-hidden="true">&nbsp;</i>Bate-Papo<span class="badge badge-sidebar">2</span></a>
                    <a class="list-group-item" href="#"><i class="glyphicon glyphicon-star-empty" aria-hidden="true">&nbsp;</i>Missões<span class="badge badge-sidebar">3</span></a>
                    <a class="list-group-item" href="#"><i class="glyphicon glyphicon-book" aria-hidden="true">&nbsp;</i>Biblioteca</a>
                    <a class="list-group-item" href="#"><i class="glyphicon glyphicon-calendar" aria-hidden="true">&nbsp;</i>Calendário</a>
                    <a class="list-group-item" href="#"><i class="glyphicon glyphicon-wrench" aria-hidden="true">&nbsp;</i>Ferramentas</a>
            </div>
            <?php
            break;
        case "mensagens":
            
            ?>
                <div class="list-group">

                        <!--aqui vai o trecho header da sidebar que abre e fecha-->
                        <span href="#" class="list-group-item active">
                            <span class="pull-left">
                                    <i class="glyphicon glyphicon-chevron-left"></i>
                            </span>
                            <span class="pull-right" id="slide-submenu">
                                <i  class="glyphicon glyphicon-remove-circle"></i>
                            </span>
                            <p>&nbsp;&nbsp;Lugar que clicou</p>
                          
                            
                            <!--aqui vão as opções de conversa-->
                                    <div class="caixaA-1">
                                        <center>
                                        <a href="#conversas" class="active a-1" data-toggle="tab"><i class="fa fa-comment-o" aria-hidden="true" title="Conversas"></i></a>
                                        <a href="#grupos" class="a-1" data-toggle="tab"><i class="fa fa-users" aria-hidden="true" title="Grupos"></i></a>
                                        </center>
                                    </div>                         
                            <!--aqui acabam as opções de conversa-->
                        </span>
                        <!--aqui acaba o trecho-->
                        <div class="tab-content">
                            <div class="tab-pane active" id="conversas"><!--aqui a barra de pesquisa e opções de conversas-->
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="pesquise conversas" id="query" name="query" value="">
                                <div class="input-group-btn">
                                    <button type="submit" value="Search" class="btn btn-default btn-pesquisa"><span class="glyphicon glyphicon-search"></span></button>
                                </div>
                            </div>
                            <!--aqui acaba a barra de pesquisa-->

                        <!--aqui vai a lista de contatos, grupos ou conversas-->
                        <div class="member_list">
                            <ul class="list-unstyled">
                              
                                <li class="left clearfix">
                                    <span class="chat-img pull-left">
                                     <img src="<?= base_url("assets/img/user.png");?>" class="img-circle">
                                    </span>
                                    <div class="chat-body clearfix">
                                        <div class="header_sec">
                                            <strong class="primary-font">CONVERSA</strong> 
                                            <small class="pull-right">09:45AM</small>
                                        </div>
                                        <div class="contact_sec">
                                            <span class="badge badge-navbar pull-right">3</span>
                                            <p class="primary-font">Turma</p> 
                                        </div>
                                    </div>
                                </li>
                                
                                
                                
                            </ul>
                        </div>
                        <!--aqui acaba a lista--></div>
                            
                            <div class="tab-pane fade" id="grupos"><!--aqui a barra de pesquisa e opções de conversas-->
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="pesquise grupos" id="query" name="query" value="">
                                <div class="input-group-btn">
                                    <button type="submit" value="Search" class="btn btn-default btn-pesquisa"><span class="glyphicon glyphicon-search"></span></button>
                                </div>
                            </div>
                            <!--aqui acaba a barra de pesquisa-->

                        <!--aqui vai a lista de contatos, grupos ou conversas-->
                        <div class="member_list">
                            <ul class="list-unstyled">
                              
                                <li class="left clearfix">
                                    <span class="chat-img pull-left">
                                     <img src="<?= base_url("assets/img/user.png");?>" class="img-circle">
                                    </span>
                                    <div class="chat-body clearfix">
                                        <div class="header_sec">
                                            <strong class="primary-font">GRUPO</strong> 
                                            <small class="pull-right">12:09AM</small>
                                        </div>
                                        <div class="contact_sec">
                                            <span class="badge badge-navbar pull-right">3</span>
                                            <p class="primary-font">Participantes</p> 
                                        </div>
                                    </div>
                                </li>                                
                            </ul>
                        </div>
                        <!--aqui acaba a lista--></div>
                        </div>

                    </div>
            <?php
            break;
    }
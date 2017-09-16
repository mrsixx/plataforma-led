<?php defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div id="main">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="page-header">
                                    <a class="add-post pull-right dropdown-toggle" data-toggle="modal" data-target="#post">
                                        <i class="glyphicon glyphicon-edit" aria-hidden="true"></i>
                                        <span class="tooltiptext">Nova postagem</span>
                                    </a><br/>
                                    <h3>"Mural que algum expertinho pode querer fazer"</h3>
                                </div>

                                <div class="panel panel-primary ">
                                    <span class="mural-img pull-left">
                                            <img src="<?= base_url('assets/img/user1.png'); ?>" class="img-circle">
                                    </span>
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Usuario</h3>
                                    </div>
                                    <div class="panel-body">
                                        <p> at nibh sagittis, lobortis odio nec, sodales velit. Aenean interdum, magna nec molestie congue alo alo.</p>
                                        <center>
                                            <img src="<?= base_url('assets/img/user1.png'); ?>" class="img img-responsive">
                                        </center>
                                    </div>
                                    <div class="panel-footer post">

                                        <div class="dropup">
                                            <button class="btn-opinar dropdown-toggle pull-left" id="op" type="button" data-toggle="dropdown">
                                                <div id="opiniao" class="fa fa-lightbulb-o fa-2x">&nbsp;</div>
                                            </button>
                                            <div class="dropdown-menu opiniaoBox">
                                                <a class="boa">
                                                    <img class="opiniao img-responsive" data-toggle="tooltip" data-placement="top" src="<?= base_url('assets/img/opiniaoIntS.png'); ?>" aria-hidden="true" title="Boa Ideia!" />
                                                </a>
                                                <a class="nada">
                                                    <img class="opiniao img-responsive" data-toggle="tooltip" data-placement="top" src="<?= base_url('assets/img/opiniaoBrokeS.png'); ?>" aria-hidden="true" title="Nada a ver!" />
                                                </a>
                                            </div>
                                        </div>

                                        <button class="btn btn-default dropdown-toggle" type="button" data-toggle="modal" data-target="#comentario">
                                            <span class="fa fa-quote-left"></span>
                                            <span class="fa fa-quote-right"></span>
                                        </button>
                                        <button class="btn btn-default pull-right dropdown-toggle" type="button" data-toggle="modal" data-target="#report">
                                            <span class="fa fa-flag"></span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
<?php 
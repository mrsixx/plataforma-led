<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div id="main">
    <div class="container-fluid">
        <div class="row">
            <div class="page-header">
                <h3>
                    Calendário
                </h3>
            </div>
            <div class="page-body">
                <button class="btn btn-circle btn-lg bg-danger btn-calendario" data-toggle="modal" data-target="#exampleModal11">

                    <i class="fa fa-calendar">
                    </i>

                </button>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-8 col-md-offset-2 alert alert-warning collapse" id="criaEvento">
                            <legend><i class="fa fa-calendar-plus-o" aria-hidden="true"></i> Criar Evento</legend>
                            <form action="" method="post" class="form form-group" role="form" id="frmCriaEvento">
                                <input class="form-control" name="txtNome" id="txtNome" placeholder="Nome do evento" type="text" required />
                                <!-- <br>
                                <textarea name="txtDescricao" id="txtDescricao" class="form-control" rows="9" cols="20" required="required" placeholder="Descrição do evento"></textarea> -->
                                <br>
                                <div class="row">
                                    <div class="col-xs-12 col-md-6">
                                        <label for="">Data do evento</label>
                                        <input id="dtEvento" name="dtEvento" type="datetime-local" class="form-control" />
                                    </div>
                                    <div class="col-xs-12 col-md-6">
                                        <label for="">Local do evento</label>
                                        <input class="form-control" name="txtLocal" id="txtLocal" placeholder="Local do evento" type="text" required />
                                    </div>
                                </div>
                                <br/>
                                <div clss="col-md-8 col-md-offset-2">
                                    <button class="btn btn-sm btn-success btn-block form-control" type="submit">Criar evento</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>

                <div class="container-fluid">
                    <div class="row">
                        <?php if($home):
                            echo $calendario;
                        else:?>
                        <ul class="timeline">
                            <li class="timeline-inverted pull-left">
                                <div class="timeline-badge">
                                    <a><i class="fa fa-circle invert" id=""></i></a>
                                </div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <h4>"Nome do evento"</h4>
                                    </div>
                                    <div class="timeline-body">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <p id="descricaoEvento">At last the Gryphon said to the Mock Turtle, 'Drive on, old fellow! Don't be all day about it!' and he went on in these words: 'Yes, we went to school in the sea, though you mayn't believe it—' 'I never said I didn't!' interrupted Alice. 'You did,' said the Mock Turtle.</p>
                                                    <div>
                                                        <span class="badge badge-info"><h6>Data do evento: 2012-08-02 20:47:04</h6></span>
                                                        <span class="badge badge-info"><h6>Local do evento: "aaaaaaaaaaaaaaaa"</h6></span>
                                                    </div>
                                                    <hr>

                                                </div>
                                                <hr>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <?php endif;?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


</div>
</div>
</div>
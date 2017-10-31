<?php defined('BASEPATH') OR exit('No direct script access allowed'); 

?>
<fieldset>
    <legend>Avatar</legend>
    <p class="well">Seu avatar será sua representação no mundo LED, escolha um nome legal para ele e personalize da forma que achar melhor :D</p>
    <form class="form-validate form-vertical" id="formAvatar" data-toggle="validator" role="form" method="POST" action="/cadastro/cadastraAvatar">
        <div class="row">
            <?php if(isset($coduser)):?>
                <input type="hidden" name="codUser" value="<?php echo $coduser; ?>">

            <?php 
            endif;
                $corpo = $avatar['corpo'];
                $cabelo = $avatar['cabelo'];
                $item = $avatar['item'];
                $rosto = $avatar['rosto'];
                $roupa = $avatar['roupa'];
            ?>
            <div class="form-group col-md-12 col-xs-12">
                <label for="txtNick">Nickname</label>
                <input type="text" class="form-control" id="txtNick" name="txtNick" placeholder="Seu nome no mundo LED" maxlength="10" required>
            </div>
        </div>
                <div class="panel panel-primary" role="document">
                        <div class="panel-heading">
                            <h4 class="modal-title">Personalizar Avatar</h4>
                        </div>
                        <div class="panel-body container-fluid modalAvatar">
                            <div class="row">
                                <ul class="nav nav-pills nav-stacked col-md-1 col-sm-1 col-lg-1 col-xs-2">
                                  <li class="active"><a href="#corpoavatar" data-toggle="pill"><i class="fa fa-paint-brush" aria-hidden="true"></i></a></li>
                                  <li><a href="#rostoavatar" data-toggle="pill"><i class="fa fa-smile-o" aria-hidden="true"></i></a></li>
                                  <li><a href="#roupaavatar" data-toggle="pill"><i class="fa fa-street-view" aria-hidden="true"></i></a></li>
                                  <li><a href="#cabeloavatar" data-toggle="pill"><i class="fa fa-scissors" aria-hidden="true"></i></a></li>
                                  <li><a href="#itemavatar" data-toggle="pill"><i class="fa fa-gamepad" aria-hidden="true"></i></a></li>
                                </ul>
                                <div class="tab-content col-md-7 col-sm-6 col-lg-7 col-xs-10">
                                        <div class="tab_con tab-pane active" id="corpoavatar">
                                             
                                            <p>
                                                <?php foreach ($corpo as $corpo): ?>
                                                    <a class="btn btnavatar" data-nome='<?= base_url("assets/img/avatar/$corpo->Link.png"); ?>' data-id='<?php $id = explode("/",$corpo->Link); echo $id[0]; ?>'' data-cod='<?php echo $corpo->CodCorpo; ?>' type="button">
                                                        <img class="corpo"  src='<?= base_url("assets/img/avatar/$corpo->Link.png"); ?>'>
                                                    </a>
                                                <?php endforeach; ?>
                                            </p>
                                        </div>
                                        <div class="tab_con tab-pane" id="rostoavatar">
                                             <p>
                                                <?php foreach ($rosto as $rosto): ?>
                                                    <a class="btn btnavatar" data-nome='<?= base_url("assets/img/avatar/$rosto->Link.png"); ?>' data-id='<?php $id = explode("/",$rosto->Link); echo $id[0]; ?>'' data-cod='<?php echo $rosto->CodRosto; ?>' type="button">
                                                        <img class="rosto"  src='<?= base_url("assets/img/avatar/$rosto->Link.png"); ?>'>
                                                    </a>
                                                <?php endforeach; ?>
                                                <a class="btn btnavatar fa fa-trash fa-2x" data-nome='' data-id='rosto' ' data-cod='' type="button"></a>
                                            </p>
                                        </div>
                                        <div class="tab_con tab-pane" id="roupaavatar">
                                            <p>
                                            <?php foreach ($roupa as $roupa): ?>
                                                    <a class="btn btnavatar" data-nome='<?= base_url("assets/img/avatar/$roupa->Link.png"); ?>' data-id='<?php $id = explode("/",$roupa->Link); echo $id[0]; ?>'' data-cod='<?php echo $roupa->CodRoupa; ?>' type="button">
                                                        <img class="rosto"  src='<?= base_url("assets/img/avatar/$roupa->Link.png"); ?>'>
                                                    </a>
                                                <?php endforeach; ?>

                                                <a class="btn btnavatar fa fa-trash fa-2x" data-nome='' data-id='roupa' ' data-cod='' type="button"></a>
                                            </p>
                                        </div>
                                        <div class="tab_con tab-pane" id="cabeloavatar">
                                            <p>
                                                <?php foreach ($cabelo as $cabelo): ?>
                                                    <a class="btn btnavatar" data-nome='<?= base_url("assets/img/avatar/$cabelo->Link.png"); ?>' data-id='<?php $id = explode("/",$cabelo->Link); echo $id[0]; ?>'' data-cod='<?php echo $cabelo->CodCabelo; ?>' type="button">
                                                        <img class="cabelo"  src='<?= base_url("assets/img/avatar/$cabelo->Link.png"); ?>'>
                                                    </a>
                                                <?php endforeach; ?>

                                                <a class="btn btnavatar fa fa-trash fa-2x" data-nome='' data-id='cabelo' ' data-cod='' type="button"></a>
                                            </p>
                                        </div>
                                        <div class="tab_con tab-pane" id="itemavatar">
                                            <p>
                                                <?php foreach ($item as $item): ?>
                                                    <a class="btn btnavatar" data-nome='<?= base_url("assets/img/avatar/$item->Link.png"); ?>' data-id='<?php $id = explode("/",$item->Link); echo $id[0]; ?>'' data-cod='<?php echo $item->CodItem; ?>' type="button">
                                                        <img src='<?= base_url("assets/img/avatar/$item->Link.png"); ?>'>
                                                    </a>
                                                <?php endforeach; ?>

                                                <a class="btn btnavatar fa fa-trash fa-2x" data-nome='' data-id='item' ' data-cod='' type="button"></a>
                                            </p>
                                        </div>
                                </div>
                                <div class="col-md-4 col-sm-4 col-lg-4 col-xs-12">
                                    <div class="avatar">
                                        <?php $cod = rand(1,5);?>
                                        <img src="<?= base_url("assets/img/avatar/corpo/corpo($cod).png"); ?>" id="corpo">
                                        <input type="hidden" value="<?php echo $cod;?>" name="codcorpo">
                                    </div>
                                    <div class="avatar">
                                        <img src="<?= base_url("assets/img/avatar/roupa/roupa($cod).png"); ?>" id="roupa">
                                        <input type="hidden" value="<?php echo $cod;?>" name="codroupa">
                                    </div>
                                    <div class="avatar">
                                        <?php $cod = rand(1,5);?>
                                        <img src="<?= base_url("assets/img/avatar/item/item($cod).png"); ?>" id="item">
                                        <input type="hidden" value="<?php echo $cod;?>" name="coditem">
                                    </div>
                                    <div class="avatar"> 
                                        <?php $cod = rand(1,5);?>
                                        <img src="<?= base_url("assets/img/avatar/rosto/rosto($cod).png"); ?>" id="rosto">
                                        <input type="hidden" value="<?php echo $cod;?>" name="codrosto">
                                    </div>
                                    <div class="avatar">
                                        <?php $cod = rand(1,5);?>
                                        <img src="<?= base_url("assets/img/avatar/cabelo/cabelo($cod).png"); ?>" id="cabelo">
                                        <input type="hidden" value="<?php echo $cod;?>" name="codcabelo">
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
        
        <button type="submit" id="btnEnviar" class="btn btn-primary pull-right">Próximo</button>
        <br/>
    </form>
</fieldset>
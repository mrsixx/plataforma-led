<?php 
        if(isset($infoUser['Foto'])){
            $foto = $infoUser['Foto'];
            $foto = "/users/profile/$foto.jpg";
            $capa = $foto;
        }else{
            $capa = "/assets/img/capa_led.jpg";
            if($infoUser['Sexo'] == 'M'){
                $foto = "/assets/img/user-m.png";
            }else{
                $foto = "/assets/img/user-f.png";
            }
        }
    //passando as classes para as determinadas inteligências nas cards
    switch ($card['inteligencia']) {
        case 'QtdCinestesica':
                $iconcard = "fa fa-heartbeat fa-2x";
                $classecard = "card-corporalCinestesica";
                $progress = "progress-bar-corporalCinestesica";
            break;
        case 'QtdEspacial':
                $iconcard = "fa fa-grav fa-2x";
                $classecard = "card-espacial";
                $progress = "progress-bar-espacial";
            break;
        case 'QtdExistencial':
                $iconcard = "fa fa-sun-o fa-2x";
                $classecard = "card-existencial";
                $progress = "progress-bar-existencial";
            break;
        case 'QtdInterpessoal':
                $iconcard = "fa fa-thumbs-o-up fa-2x";
                $classecard = "card-interpessoal";
                $progress = "progress-bar-interpessoal";
            break;
        case 'QtdIntrapessoal':
                $iconcard = "fa fa-heart fa-2x";
                $classecard = "card-intrapessoal";
                $progress = "progress-bar-intrapessoal";
            break;
        case 'QtdLinguistica':
                $iconcard = "fa fa-comment-o fa-2x";
                $classecard = "card-linguistica";
                $progress = "progress-bar-linguistica";
            break;
        case 'QtdLogicoMat':
                $iconcard = "fa fa-superscript fa-2x";
                $classecard = "card-logicoMatematica";
                $progress = "progress-bar-logicoMatematica";
            break;
        case 'QtdMusical':
                $iconcard = "fa fa-headphones fa-2x";
                $classecard = "card-musical";
                $progress = "progress-bar-musical";
            break;
        case 'QtdNaturalista':
                $iconcard = "fa fa-pagelines fa-2x";
                $classecard = "card-naturalista";
                $progress = "progress-bar-naturalista";
            break;
        case 'QtdPratica':
                $iconcard = "fa fa-flash fa-2x";
                $classecard = "card-pratica";
                $progress = "progress-bar-pratica";
            break;
        
        default:
            $iconcard = "fa fa-globe fa-2x";
            $classecard = "panel-default";
            $progress = "";
            break;
    }
?>  

<div class="container">
                        <div class="row">
                            <div class="fb-profile">
                                <div class="perfil_capa">
                                    <img align="left" class="fb-image-lg filtro" src="<?php echo base_url($capa);?>" alt="Capa" />
                                </div>
                                <div class="filtro1">
                                    <img align="left" class="fb-image-profile img-circle thumbnail" src="<?php echo base_url($foto);?>" alt="Foto de perfil" />
                                </div>
                            </div>

                            <div class="fb-profile-text ">
                                <h3><?php echo utf8_encode($infoUser['Nome'])." ".utf8_encode($infoUser['Sobrenome']);?></h3> 
                                <?php if($infoUser['CodUsuario'] == $codUsuario):?>
                                <div class="pull-right">
                                    <a data-toggle="modal" data-target="#fotoPerfil" class="btn"><i class="glyphicon glyphicon-camera"></i> <strong>Foto de perfil</strong></a>
                                    <a data-toggle="modal" data-target="#alteraPerfil" class="btn"><i class="glyphicon glyphicon-pencil"></i> <strong>Editar perfil</strong></a>
                                </div>
                                <?php 
                                    else:?>
                                    <div class="pull-right">
                                        <a data-toggle="modal" data-target="#visualizaPerfil" class="btn"><i class="glyphicon glyphicon-edit"></i> <strong>Visualizar perfil</strong></a>
                                    </div>
                                <?php endif;
                                ?>
                            </div>
                        </div>
                        <div class="panel panel-default row">
                            <div class="perfil-style">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="col-xs-12 col-sm-12 col-md-4">
                                            <div class="panel <?php echo $classecard; ?>">
                                                <div class="panel-heading">
                                                    <p title="<?php echo utf8_encode($infoUser['Nickname']); ?> card"><i class="fa fa-smile-o fa-lg"></i>
                                                        <i><?php echo utf8_encode($infoUser['Nickname']); ?></i><i class="<?php echo $iconcard; ?> pull-right"></i></p>
                                                    <p></p>
                                                </div>
                                                <div class="panel-body">
                                                    <?php if(empty($infoUser['CodAvatar'])):?>  
                                                        <div class="well">Nenhum avatar por aqui :/</div>
                                                    <?php endif; ?>
                                                    <center><div style="min-height: 220px;">
                                                    <div class="avatar_card">
                                                    <div>
                                                        <img src="<?= base_url('assets/avatar/'.$avatar['corpo'].".png");?>" id="corpo">
                                                    </div>
                                                    <?php if(!empty($avatar['roupa'])): ?>
                                                    <div class="avatarCorpo_card">
                                                        <img src="<?= base_url('assets/avatar/'.$avatar['roupa'].".png");?>" id="roupa">
                                                    </div>
                                                    <?php endif; ?>
                                                    <?php if(!empty($avatar['item'])): ?>
                                                    <div class="avatarCorpo_card">
                                                        <img src="<?= base_url('assets/avatar/'.$avatar['item'].".png");?>" id="item">
                                                    </div> 
                                                    <?php endif; ?>
                                                    <?php if(!empty($avatar['rosto'])): ?>
                                                    <div class="avatarCorpo_card"> 
                                                        <img src="<?= base_url('assets/avatar/'.$avatar['rosto'].".png");?>" id="rosto">
                                                    </div>
                                                    <?php endif; ?>
                                                    <?php if(!empty($avatar['cabelo'])): ?>
                                                    <div class="avatarCorpo_card">
                                                        <img src="<?= base_url('assets/avatar/'.$avatar['cabelo'].".png");?>" id="cabelo">
                                                    </div>
                                                    <?php endif; ?>
                                                    </div></center>
                                                    <p class="text"><b><?php echo ($infoUser['QtdConsultorias']); ?></b> <?php echo ($infoUser['QtdConsultorias'] == 1)? "consultoria" : "consultorias";?>
                                                        <span title="Rating">
                                                            <i class="fa fa-star-half-empty fa-lg pull-right"></i>
                                                            <i class="fa fa-star fa-lg pull-right"></i>
                                                            <i class="fa fa-star fa-lg pull-right"></i>
                                                            <i class="fa fa-star fa-lg pull-right"></i>
                                                            <i class="fa fa-star fa-lg pull-right"></i>
                                                        </span>
                                                    </p>
                                                </div>
                                                <div class="panel-heading">

                                                    <div style="text-align:center;">Lvl ? - 50%</div>
                                                    <div class="progress">
                                                        <div class="progress-bar <?php echo $progress;?> progress-bar-striped" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:50%">
                                                        </div>
                                                    </div>
                                                            
                                                    <br/>
                                                        <?php if($infoUser['CodUsuario'] == $codUsuario):?>
                                                    <div class="dropdown">
                                                        <a class="btn btn-block btn3d dropdown-toggle" data-toggle="modal" data-target="#edtAvatar"><b><?php echo (empty($infoUser['CodAvatar']))? "Criar Avatar" : "Personalizar Avatar"; ?></b></a>
                                                    </div>
                                                    <?php endif;?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12  col-md-8">
                                            <div class="panel with-nav-tabs card-danger" style="min-height: 387px;">
                                                <div class="panel-heading">
                                                    <ul class="nav nav-tabs">
                                                        <li class="active"><a href="#totaldefault" data-toggle="tab"><i class="fa fa-globe" aria-hidden="true"></i></a></li>
                                                        <?php
                                                         foreach ($inteligencia as $int):
                                                                $href = utf8_encode($int->Nome);
                                                                $href = str_replace(" ", "", $href);
                                                                $href = strtolower($href);

                                                                switch ($int->CodInteligencia) {
                                                                    case 1:
                                                                        $icon = "fa fa-superscript";
                                                                        break;
                                                                    
                                                                    case 2:
                                                                        $icon = "fa fa-headphones";
                                                                        break;

                                                                    case 3:
                                                                        $icon = "fa fa-grav";
                                                                        break;

                                                                    case 4:
                                                                        $icon = "fa fa-heartbeat";
                                                                        break;

                                                                    case 5:
                                                                        $icon = "fa fa-heart";
                                                                        break;

                                                                    case 6:
                                                                        $icon = "fa fa-thumbs-o-up";
                                                                        break;

                                                                    case 7:
                                                                        $icon = "fa fa-pagelines";
                                                                        break;

                                                                    case 8:
                                                                        $icon = "fa fa-sun-o";
                                                                        break;

                                                                    case 9:
                                                                        $icon = "fa fa-comment-o";
                                                                        break;

                                                                    case 10:
                                                                        $icon = "fa fa-flash";
                                                                        break;
                                                                }
                                                        ?>
                                                                <li><a href="#<?php echo $href; ?>" data-toggle="tab"><i class="<?php echo $icon;?>" aria-hidden="true"></i></a></li>
                                                            <?php endforeach; ?>
                                                        
                                                    </ul>
                                                </div>
                                                <div class="panel-body">
                                                    <div class="tab-content">
                                                        <div class="tab-pane active" id="totaldefault">
                                                            <div class="row">
                                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                                    <h1>Visão geral</h1>
                                                                    <p>
                                                                        A teoria das múltiplas inteligências foi idealizada pelo psicólogo Howard Gardner, em oposição a ideia de que a inteligência é uma capacidade inata, única e geral.  Gardner estabeleceu que a dita inteligência acadêmica (adquirida através de qualificações e méritos educacionais) não deve ser fator decisivo para determinar a inteligência de uma pessoa.
                                                                    </p><br/>
                                                                    <center><h4>Experiência atual</h4></center><br/>
                                                                    <div class="progress">
                                                                        <div class="progress-bar progress-bar progress-bar-striped" style="width: 10%">
                                                                            <span class="sr-only">porcentagem% XP (nomeInteligencia)</span>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                            <?php foreach ($inteligencia as $int):
                                                                $href = utf8_encode($int->Nome);
                                                                $href = str_replace(" ", "", $href);
                                                                $href = strtolower($href);
                                                            ?>
                                                                <div class="tab-pane fade" id="<?php echo $href; ?>">
                                                                    <div class="row">
                                                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                                                            <h1><?php echo "Inteligência ".utf8_encode($int->Nome);?></h1>
                                                                            <p><?php echo utf8_encode($int->Descricao);?></p><br/>
                                                                            <center><h4>Experiência atual</h4></center><br/>
                                                                            <p>Esta inteligência atualmente corresponde a <?php echo $qtd = "50%";?> da sua experiência total</p>
                                                                            <div class="progress">
                                                                                <div class="progress-bar progress-bar-striped" style="width: <?php echo $qtd; ?>">
                                                                                    <span class="sr-only"><?php echo $qtd; ?></span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            <?php endforeach; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="bs-callout bs-callout-primary">
                                <h4>Conquistas</h4><br/>
                                    <i class="fa fa-smile-o fa-2x"></i>
                                    <i class="fa fa-smile-o fa-2x"></i>
                                    <i class="fa fa-smile-o fa-2x"></i>
                                    <i class="fa fa-smile-o fa-2x"></i>
                                    <i class="fa fa-smile-o fa-2x"></i>
                            </div>
                        </div>
                        <div class="row">
                        </div>
                    </div>
<?php if($infoUser['CodUsuario'] == $codUsuario):?>
<!--Modal para alterar dados perfil-->
<form method="POST" class="modal fade" id="alteraPerfil" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true" class="glyphicon glyphicon-remove"></span>
                                </button>
                <h4 class="modal-title">Alterar perfil</h4>
            </div>
            <div class="modal-body">
                <div id="msg"></div>
                <div class="container-fluid">

                    <div class="row">

                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <label>Nome</label>
                            <input type="text" name="txtNome" class="form-control" placeholder="Nome" value="<?php echo utf8_encode($infoUser['Nome']); ?>" required>
                        </div>

                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <label>Sobrenome</label>
                            <input type="text" name="txtSobrenome" class="form-control" placeholder="Sobrenome" value="<?php echo utf8_encode($infoUser['Sobrenome']); ?>" required>
                        </div>
                    </div>
                    <br/>
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <label>Sexo</label>
                            <select class="form-control" name="cmbSexo" required>
                                                <option selected disabled>selecione o sexo</option>
                                                <?php 
                                                    if($infoUser['Sexo'] == 'M'){
                                                        echo '<option value="F">Feminino</option>';
                                                        echo '<option selected value="M">Masculino</option>';
                                                    }
                                                    else{
                                                        echo '<option selected value="F">Feminino</option>';
                                                        echo '<option value="M">Masculino</option>';
                                                    }
                                                ?>
                                                
                                            </select>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <label>Cidade</label>
                            <input type="text" name="txtCidade" class="form-control" placeholder="Cidade" value="<?php echo utf8_encode($infoUser['Cidade']);?>">
                        </div>
                    </div>
                </div>
                <br/>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                <input type="submit" class="btn btn-success" value="Salvar" /></div>
        </div>
    </div>
</form>

<!--Modal para alterar foto perfil-->
<div class="modal fade" id="fotoPerfil" name="fotoPerfil" role="dialog">
<form name="frm-jcrop" id="frm-jcrop" method="POST" action="/attFoto" enctype="multipart/form-data">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true" class="glyphicon glyphicon-remove"></span>
                </button>
                <h4 class="modal-title">Foto de perfil</h4>
            </div>
            <div class="modal-body">
                <!--Créditos para http://fengyuanchen.github.io/cropper-->
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="img-container">
                                <img src="<?php echo $foto;echo "?".time();?>" width="100%" alt="Foto" id="visualizacao_imagem"/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h4>Visualização</h4>
                            <hr/>
                            <div class="docs-preview clearfix">
                                <center>
                                    <div class="img-preview preview-lg"></div>
                                </center>
                            </div>
                        </div>
                        <!-- <div class="col-md-3">
                            <div class="docs-data">
                                <div class="input-group">
                                    <label class="input-group-addon" for="dataX">X</label> -->
                                    <input class="form-control" id="dataX" name="x" type="hidden">
                                    <input class="form-control" id="dataY" name="y" type="hidden">
                                    <input class="form-control" id="dataWidth" name="wcrop" type="hidden">
                                    <input class="form-control" id="dataHeight" name="hcrop" type="hidden">
                                    <input class="form-control" id="dataRotate" placeholder="rotate" type="hidden">
                                   <!--  <input class="sr-only form-control" id="inputImage" name="inputImage" type="file" accept="image/*"/> -->


                                   <input type="file" name="imagem" class="sr-only form-control" id="inputImage" accept="image/*"/>
                                    <input type="hidden" name="MAX_FILE_SIZE" id="MAX_FILE_SIZE" value="30000" />
                                    <!-- <input class="form-control" id="dataRotate" type="text" placeholder="rotate"> -->
                                   <!-- <span class="input-group-addon">px</span>
                                </div>
                                <div class="input-group">
                                    <label class="input-group-addon" for="dataY">Y</label>
                                    <span class="input-group-addon">px</span>
                                </div>
                                <div class="input-group">
                                    <label class="input-group-addon" for="dataWidth">Width</label>
                                    <span class="input-group-addon">px</span>
                                </div>
                                <div class="input-group">
                                    <label class="input-group-addon" for="dataHeight">Height</label>
                                    <span class="input-group-addon">px</span>
                                </div>
                                <div class="input-group">
                                    <label class="input-group-addon" for="dataRotate">Rotate</label>
                                    <span class="input-group-addon">deg</span>
                                </div>
                            </div>
                        </div> -->
                        <div class="col-md-6 docs-buttons">
                            <h4>Ferramentas</h4>
                            <hr/>
                            <div class="btn-group">
                                <button class="btn btn-primary" data-method="setDragMode" data-option="move" type="button" title="Move">
                                        <span class="docs-tooltip" data-toggle="tooltip" title="MOVER">
                                          <span class="glyphicon glyphicon-move"></span>
                                        </span>
                                      </button>
                                <button class="btn btn-primary" data-method="setDragMode" data-option="crop" type="button" title="Crop">
                                        <span class="docs-tooltip" data-toggle="tooltip" title="CORTAR">
                                          <span class="fa fa-crop"></span>
                                        </span>
                                      </button>
                                <button class="btn btn-primary" data-method="zoom" data-option="0.1" type="button" title="Zoom In">
                                        <span class="docs-tooltip" data-toggle="tooltip" title="APROXIMAR">
                                          <span class="glyphicon glyphicon-zoom-in"></span>
                                        </span>
                                      </button>
                                <button class="btn btn-primary" data-method="zoom" data-option="-0.1" type="button" title="Zoom Out">
                                        <span class="docs-tooltip" data-toggle="tooltip" title="AFASTAR">
                                          <span class="glyphicon glyphicon-zoom-out"></span>
                                        </span>
                                      </button>
                                <button class="btn btn-primary" data-method="rotate" data-option="-45" type="button" title="Rotate Left">
                                        <span class="docs-tooltip" data-toggle="tooltip" title="GIRAR -45°">
                                          <span class="glyphicon glyphicon-rotate-left">
                                              <span class="fa fa-undo" aria-hidden="true"></span>
                                            </span>
                                        </span>
                                      </button>
                                <button class="btn btn-primary" data-method="rotate" data-option="45" type="button" title="Rotate Right">
                                        <span class="docs-tooltip" data-toggle="tooltip" title="GIRAR 45°">
                                          <span class="glyphicon glyphicon-rotate-right">
                                              <span class="fa fa-repeat" aria-hidden="true"></span>
                                            </span>
                                        </span>
                                      </button>
                            </div>

                            <div class="btn-group">
                                <button class="btn btn-warning" data-method="crop" type="button" title="Crop">
                                        <span class="docs-tooltip" data-toggle="tooltip" title="CORTAR">
                                          <span class="glyphicon glyphicon-ok"></span>
                                        </span>
                                      </button>
                                <button class="btn btn-warning" data-method="clear" type="button" title="Clear">
                                        <span class="docs-tooltip" data-toggle="tooltip" title="LIMPAR">
                                          <span class="glyphicon glyphicon-remove"></span>
                                        </span>
                                      </button>
                                <button class="btn btn-warning" data-method="disable" type="button" title="Disable">
                                        <span class="docs-tooltip" data-toggle="tooltip" title="BLOQUEAR">
                                          <span class="glyphicon glyphicon-lock"></span>
                                        </span>
                                      </button>
                                <button class="btn btn-warning" data-method="enable" type="button" title="Enable">
                                        <span class="docs-tooltip" data-toggle="tooltip" title="DESBLOQUEAR">
                                          <span class="fa fa-unlock" aria-hidden="true"></span>
                                        </span>
                                      </button>
                                <button class="btn btn-warning" data-method="reset" type="button" title="Reset">
                                        <span class="docs-tooltip" data-toggle="tooltip" title="VOLTAR TUDO">
                                          <span class="glyphicon glyphicon-refresh"></span>
                                        </span>
                                      </button>

                                <label class="btn btn-warning btn-upload" for="inputImage" title="Envie a imagem">
                                        <span class="docs-tooltip" data-toggle="tooltip" title="ESCOLHER IMAGEM">
                                          <span class="fa fa-folder-open"></span>
                                        </span>
                                      </label>
                                <!-- <button class="btn btn-warning" data-method="destroy" type="button" title="Destroy">
                                        <span class="docs-tooltip" data-toggle="tooltip" title="DESCARTAR IMAGEM">
                                          <span class="glyphicon glyphicon-trash"></span>
                                        </span>
                                      </button> -->
                            </div>

                            <!--
                                    <div class="btn-group">
                                      <button class="btn btn-primary"  type="button">
                                        <span class="docs-tooltip" data-toggle="tooltip" title="$().cropper('getCroppedCanvas')">
                                          Visualizar Alterações
                                        </span>
                                      </button>
                                    </div>
                            -->

                            <!-- Show the cropped image in modal -->
                            <!-- <div class="modal fade docs-cropped" id="getCroppedCanvasModal" aria-hidden="true" aria-labelledby="getCroppedCanvasTitle" role="dialog" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button class="pull-right btn btn-danger" data-dismiss="modal" type="button" aria-hidden="true">Não clica aqui!</button>
                                            <h4 class="modal-title" id="getCroppedCanvasTitle">Cropped</h4>
                                        </div>
                                        <div class="modal-body"></div>
                                         <div class="modal-footer">
                                            <button class="btn btn-primary" data-dismiss="modal" type="button">Close</button>
                                          </div> 
                                    </div>
                                </div>
                            </div>-->
                            <!-- /.modal -->

                            <!--
                                    <button class="btn btn-primary" data-method="getData" data-option="" data-target="#putData" type="button">
                                      <span class="docs-tooltip" data-toggle="tooltip" title="$().cropper('getData')">
                                        Get Data
                                      </span>
                                    </button>
                                    <button class="btn btn-primary" data-method="setData" data-target="#putData" type="button">
                                      <span class="docs-tooltip" data-toggle="tooltip" title="$().cropper('setData', data)">
                                        Set Data
                                      </span>
                                    </button>
                                    <button class="btn btn-primary" data-method="getContainerData" data-option="" data-target="#putData" type="button">
                                      <span class="docs-tooltip" data-toggle="tooltip" title="$().cropper('getContainerData')">
                                        Get Container Data
                                      </span>
                                    </button>
                                    <button class="btn btn-primary" data-method="getImageData" data-option="" data-target="#putData" type="button">
                                      <span class="docs-tooltip" data-toggle="tooltip" title="$().cropper('getImageData')">
                                        Get Image Data
                                      </span>
                                    </button>
                                    <button class="btn btn-primary" data-method="getCanvasData" data-option="" data-target="#putData" type="button">
                                      <span class="docs-tooltip" data-toggle="tooltip" title="$().cropper('getCanvasData')">
                                        Get Canvas Data
                                      </span>
                                    </button>
                                    <button class="btn btn-primary" data-method="setCanvasData" data-target="#putData" type="button">
                                      <span class="docs-tooltip" data-toggle="tooltip" title="$().cropper('setCanvasData', data)">
                                        Set Canvas Data
                                      </span>
                                    </button>
                                    <button class="btn btn-primary" data-method="getCropBoxData" data-option="" data-target="#putData" type="button">
                                      <span class="docs-tooltip" data-toggle="tooltip" title="$().cropper('getCropBoxData')">
                                        Get Crop Box Data
                                      </span>
                                    </button>
                                    <button class="btn btn-primary" data-method="setCropBoxData" data-target="#putData" type="button">
                                      <span class="docs-tooltip" data-toggle="tooltip" title="$().cropper('setCropBoxData', data)">
                                        Set Crop Box Data
                                      </span>
                                    </button>
                                    <input class="form-control" id="putData" type="text" placeholder="Get data to here or set data with this value">

                                  </div> /.docs-buttons 
                            -->

                            <!--      <div class="col-md-8 docs-toggles">-->
                            <!-- <h3 class="page-header">Toggles:</h3> -->
                            <!--
                                    <div class="btn-group btn-group-justified" data-toggle="buttons">
                                      <label class="btn btn-primary active" data-method="setAspectRatio" data-option="1.7777777777777777" title="Set Aspect Ratio">
                                        <input class="sr-only" id="aspestRatio1" name="aspestRatio" value="1.7777777777777777" type="radio">
                                        <span class="docs-tooltip" data-toggle="tooltip" title="$().cropper('setAspectRatio', 16 / 9)">
                                          16:9
                                        </span>
                                      </label>
                                      <label class="btn btn-primary" data-method="setAspectRatio" data-option="1.3333333333333333" title="Set Aspect Ratio">
                                        <input class="sr-only" id="aspestRatio2" name="aspestRatio" value="1.3333333333333333" type="radio">
                                        <span class="docs-tooltip" data-toggle="tooltip" title="$().cropper('setAspectRatio', 4 / 3)">
                                          4:3
                                        </span>
                                      </label>
                                      <label class="btn btn-primary" data-method="setAspectRatio" data-option="1" title="Set Aspect Ratio">
                                        <input class="sr-only" id="aspestRatio3" name="aspestRatio" value="1" type="radio">
                                        <span class="docs-tooltip" data-toggle="tooltip" title="$().cropper('setAspectRatio', 1 / 1)">
                                          1:1
                                        </span>
                                      </label>
                                      <label class="btn btn-primary" data-method="setAspectRatio" data-option="0.6666666666666666" title="Set Aspect Ratio">
                                        <input class="sr-only" id="aspestRatio4" name="aspestRatio" value="0.6666666666666666" type="radio">
                                        <span class="docs-tooltip" data-toggle="tooltip" title="$().cropper('setAspectRatio', 2 / 3)">
                                          2:3
                                        </span>
                                      </label>
                                      <label class="btn btn-primary" data-method="setAspectRatio" data-option="NaN" title="Set Aspect Ratio">
                                        <input class="sr-only" id="aspestRatio5" name="aspestRatio" value="NaN" type="radio">
                                        <span class="docs-tooltip" data-toggle="tooltip" title="$().cropper('setAspectRatio', NaN)">
                                          Free
                                        </span>
                                      </label>
                                    </div>
                            -->

                            <!--
                                    <div class="dropdown dropup docs-options">
                                      <button class="btn btn-primary btn-block dropdown-toggle" id="toggleOptions" type="button" data-toggle="dropdown" aria-expanded="true">
                                        Toggle Options
                                        <span class="caret"></span>
                                      </button>
                                      <ul class="dropdown-menu" role="menu" aria-labelledby="toggleOptions">
                                        <li role="presentation">
                                          <label class="checkbox-inline">
                                            <input type="checkbox" name="option" value="strict" checked>
                                            strict
                                          </label>
                                        </li>
                                        <li role="presentation">
                                          <label class="checkbox-inline">
                                            <input type="checkbox" name="option" value="responsive" checked>
                                            responsive
                                          </label>
                                        </li>
                                        <li role="presentation">
                                          <label class="checkbox-inline">
                                            <input type="checkbox" name="option" value="checkImageOrigin" checked>
                                            checkImageOrigin
                                          </label>
                                        </li>

                                        <li role="presentation">
                                          <label class="checkbox-inline">
                                            <input type="checkbox" name="option" value="modal" checked>
                                            modal
                                          </label>
                                        </li>
                                        <li role="presentation">
                                          <label class="checkbox-inline">
                                            <input type="checkbox" name="option" value="guides" checked>
                                            guides
                                          </label>
                                        </li>
                                        <li role="presentation">
                                          <label class="checkbox-inline">
                                            <input type="checkbox" name="option" value="highlight" checked>
                                            highlight
                                          </label>
                                        </li>
                                        <li role="presentation">
                                          <label class="checkbox-inline">
                                            <input type="checkbox" name="option" value="background" checked>
                                            background
                                          </label>
                                        </li>

                                        <li role="presentation">
                                          <label class="checkbox-inline">
                                            <input type="checkbox" name="option" value="autoCrop" checked>
                                            autoCrop
                                          </label>
                                        </li>
                                        <li role="presentation">
                                          <label class="checkbox-inline">
                                            <input type="checkbox" name="option" value="dragCrop" checked>
                                            dragCrop
                                          </label>
                                        </li>
                                        <li role="presentation">
                                          <label class="checkbox-inline">
                                            <input type="checkbox" name="option" value="movable" checked>
                                            movable
                                          </label>
                                        </li>
                                        <li role="presentation">
                                          <label class="checkbox-inline">
                                            <input type="checkbox" name="option" value="resizable" checked>
                                            resizable
                                          </label>
                                        </li>
                                        <li role="presentation">
                                          <label class="checkbox-inline">
                                            <input type="checkbox" name="option" value="rotatable" checked>
                                            rotatable
                                          </label>
                                        </li>
                                        <li role="presentation">
                                          <label class="checkbox-inline">
                                            <input type="checkbox" name="option" value="zoomable" checked>
                                            zoomable
                                          </label>
                                        </li>
                                        <li role="presentation">
                                          <label class="checkbox-inline">
                                            <input type="checkbox" name="option" value="touchDragZoom" checked>
                                            touchDragZoom
                                          </label>
                                        </li>
                                        <li role="presentation">
                                          <label class="checkbox-inline">
                                            <input type="checkbox" name="option" value="mouseWheelZoom" checked>
                                            mouseWheelZoom
                                          </label>
                                        </li>
                                      </ul>
                                    </div> 
                            -->
                            <!--          /.dropdown -->
                        </div>
                        <!-- /.docs-toggles -->
                    </div>

                </div>
            </div>
            <!-- Alert -->
            <div class="docs-alert"><span class="warning message"></span></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                <input type="submit" class="btn btn-success" value="Salvar" /></div>
        </div>
    </div>
</form>
</div>

<!--Modal para alterar avatar-->
<form method="POST" id="edtAvatar" class="modal fade" id="exampleModal6" role="dialog">
    <?php 
                $corpo = $avatares['corpo'];
                $cabelo = $avatares['cabelo'];
                $item = $avatares['item'];
                $rosto = $avatares['rosto'];
                $roupa = $avatares['roupa'];

    ?>

    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true" class="glyphicon glyphicon-remove"></span>
                                </button>
                <h4 class="modal-title">Personalizar Avatar</h4>
            </div>
            <div class="modal-body container-fluid modalAvatar">
                <div id="msg"></div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">
                        <input type="text" class="form-control" placeholder="Seu nome no mundo LED" value="<?php echo utf8_encode($infoUser['Nickname']);?>" name="txtNick">
                        <input type="hidden" value="<?php echo $infoUser['Token'];?>" id="txtToken">
                    </div>
                </div><br/>
                <div class="row">
                    <ul class="nav nav-pills nav-stacked col-md-1 col-sm-2 col-lg-1 col-xs-2">
                        <li class="active"><a href="#corpoavatar" data-toggle="pill"><i class="fa fa-paint-brush" aria-hidden="true"></i></a></li>
                        <li><a href="#rostoavatar" data-toggle="pill"><i class="fa fa-smile-o" aria-hidden="true"></i></a></li>
                        <li><a href="#roupaavatar" data-toggle="pill"><i class="fa fa-street-view" aria-hidden="true"></i></a></li>
                        <li><a href="#cabeloavatar" data-toggle="pill"><i class="fa fa-scissors" aria-hidden="true"></i></a></li>
                        <li><a href="#itemavatar" data-toggle="pill"><i class="fa fa-gamepad" aria-hidden="true"></i></a></li>
                    </ul>
                    <div class="tab-content col-md-6 col-sm-6 col-lg-7 col-xs-10">
                        <div class="tab_con tab-pane active" id="corpoavatar">
                            <p>
                                <?php foreach ($corpo as $corpo): ?>
                                <a class="btn btnavatar" data-nome='<?= base_url("/assets/img/avatar/$corpo->Link.png"); ?>' data-id='<?php $id = explode("/",$corpo->Link); echo $id[0]; ?>' ' data-cod='<?php echo $corpo->CodCorpo; ?>' type="button">
                                                        <img class="corpo"  src='<?= base_url("assets/img/avatar/$corpo->Link.png"); ?>'>
                                                    </a>
                                <?php endforeach; ?>
                            </p>
                        </div>
                        <div class="tab_con tab-pane" id="rostoavatar">
                            <p>
                                <?php foreach ($rosto as $rosto): ?>
                                <a style="color:red;" class="btn btnavatar" data-nome='<?= base_url("assets/img/avatar/$rosto->Link.png"); ?>' data-id='<?php $id = explode("/",$rosto->Link); echo $id[0]; ?>' ' data-cod='<?php echo $rosto->CodRosto; ?>' type="button">
                                                        <img class="rosto"  src='<?= base_url("assets/img/avatar/$rosto->Link.png"); ?>'>
                                                    </a>
                                <?php endforeach; ?>
                                <a class="btn btnavatar fa fa-trash fa-2x" data-nome='' data-id='rosto' ' data-cod='' type="button"></a>
                            </p>
                        </div>
                        <div class="tab_con tab-pane" id="roupaavatar">
                            <p>
                                <?php foreach ($roupa as $roupa): ?>
                                <a class="btn btnavatar" data-nome='<?= base_url("assets/img/avatar/$roupa->Link.png"); ?>' data-id='<?php $id = explode("/",$roupa->Link); echo $id[0]; ?>' ' data-cod='<?php echo $roupa->CodRoupa; ?>' type="button">
                                                        <img class="rosto"  src='<?= base_url("assets/img/avatar/$roupa->Link.png"); ?>'>
                                                    </a>
                                <?php endforeach; ?>
                                <a class="btn btnavatar fa fa-trash fa-2x" data-nome='' data-id='roupa' ' data-cod='' type="button"></a>
                            </p>
                        </div>
                        <div class="tab_con tab-pane" id="cabeloavatar">
                            <p>
                                <?php foreach ($cabelo as $cabelo): ?>
                                <a class="btn btnavatar" data-nome='<?= base_url("assets/img/avatar/$cabelo->Link.png"); ?>' data-id='<?php $id = explode("/",$cabelo->Link); echo $id[0]; ?>' ' data-cod='<?php echo $cabelo->CodCabelo; ?>' type="button">
                                                        <img class="cabelo"  src='<?= base_url("assets/img/avatar/$cabelo->Link.png"); ?>'>
                                                    </a>
                                <?php endforeach; ?>
                                <a class="btn btnavatar fa fa-trash fa-2x" data-nome='' data-id='cabelo' ' data-cod='' type="button"></a>
                            </p>
                        </div>
                        <div class="tab_con tab-pane" id="itemavatar">
                            <p>
                                <?php foreach ($item as $item): ?>
                                <a class="btn btnavatar" data-nome='<?= base_url("assets/img/avatar/$item->Link.png"); ?>' data-id='<?php $id = explode("/",$item->Link); echo $id[0]; ?>' ' data-cod='<?php echo $item->CodItem; ?>' type="button">
                                                        <img src='<?= base_url("assets/img/avatar/$item->Link.png");echo "?".time(); ?>'>
                                                    </a>
                                <?php endforeach; ?>
                                <a class="btn btnavatar fa fa-trash fa-2x" data-nome='' data-id='item' ' data-cod='' type="button"></a>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-lg-4 col-xs-2">
                        <div class="avatar">
                            <input type="hidden" value="<?php echo $avatar['CodAvatar'];?>" name="codavatar">
                            <img src="<?= base_url('assets/img/avatar/'.$avatar['corpo'].".png");echo "?".time();?>" id="corpo">
                            <input type="hidden" value="<?php echo $avatar['CodCorpo'];?>" name="codcorpo">
                        </div>
                        <div class="avatar">
                            <img src="<?= base_url('assets/img/avatar/'.$avatar['roupa'].".png");echo "?".time();?>" id="roupa">
                            <input type="hidden" value="<?php echo $avatar['CodRoupa'];?>" name="codroupa">
                        </div>
                        <div class="avatar">
                            <img src="<?= base_url('assets/img/avatar/'.$avatar['item'].".png");echo "?".time();?>" id="item">
                            <input type="hidden" value="<?php echo $avatar['CodItem'];?>" name="coditem">
                        </div>
                        <div class="avatar">
                            <img src="<?= base_url('assets/img/avatar/'.$avatar['rosto'].".png");echo "?".time();?>" id="rosto">
                            <input type="hidden" value="<?php echo $avatar['CodRosto'];?>" name="codrosto">
                        </div>
                        <div class="avatar">
                            <img src="<?= base_url('assets/img/avatar/'.$avatar['cabelo'].".png");echo "?".time();?>" id="cabelo">
                            <input type="hidden" value="<?php echo $avatar['CodCabelo'];?>" name="codcabelo">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                <input type="submit" class="btn btn-success" value="Salvar"/>
            </div>
        </div>
    </div>
</form>


<?php else:?>
<!--Modal para visualizar dados perfil-->
<div class="modal fade" id="visualizaPerfil" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true" class="glyphicon glyphicon-remove"></span>
                                </button>
                <h4 class="modal-title"><?php echo "Perfil de ".utf8_encode($infoUser['Nome'])." ".utf8_encode($infoUser['Sobrenome']);?></h4>
            </div>
            <div class="panel-body">
                         <div class="well well-sm">
                            <div class="row">
                                <?php 
                                        $idade = date("Y-m-d") - $infoUser['DataNascimento'];
                                        $idade .=  $idade > 1 ? "&nbsp;anos" : "&nbsp;ano";

                                        $CI =& get_instance();
                                        $CI->load->helper('interface');
                                        $fotoUsuario = fotoPerfil($infoUser['Foto'],$infoUser['Sexo']);
                                        
                                    ?>
                                <div class="col-xs-12 col-sm-3 col-md-2" align="center">
                                    <img src="<?php echo $fotoUsuario; ?>" alt="<?php echo utf8_encode($infoUser['Nome']); ?>" class="img-circle thumbnail" />
                                </div>
                                <div class="col-xs-8 col-xs-offset-2 col-sm-7 col-sm-offset-2 col-md-7 col-md-offset-2">
                                    <h4><?php echo utf8_encode($infoUser['Nome'])." ".utf8_encode($infoUser['Sobrenome'])." - ".$idade; ?></h4>
                                    <small style="display: block; line-height: 1.428571429; color: #999;">
                                        <cite title="<?php echo utf8_encode($infoUser['Cidade']);?>">
                                            <?php 
                                                echo utf8_encode($infoUser['Cidade']);?>&nbsp;<i class="glyphicon glyphicon-map-marker"></i>
                                        </cite>
                                    </small><br/>
                                    <p>
                                        <i class="glyphicon glyphicon-user"></i>&nbsp;
                                            <?php echo ($infoUser['Sexo'] == 'M')? "Homem" : "Mulher" ;?><br/>
                                        <i class="glyphicon glyphicon-gift"></i>&nbsp;
                                            <?php echo utf8_encode(date('d/m/Y', strtotime($infoUser['DataNascimento']))); ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
        </div>
    </div>
</div>

<?php endif; ?>
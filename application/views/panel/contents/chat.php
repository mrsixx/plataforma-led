<?php defined('BASEPATH') OR exit('No direct script access allowed');
    // $this->load->view('panel/commons/led_header');
    
?>
<!--cabeçalho do chat-->
                                <div class="new_message_head">
                                    <div class="pull-left ">
                                        <div class="dropdown">
                                            <button class="dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="glyphicon glyphicon-option-vertical" aria-hidden="true"></i>
                                              </button>
                                            <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                                                <li><a href="#"><i class="glyphicon glyphicon-trash">&nbsp;</i>Limpar conversa</a></li>
                                                <li><a href="#"><i class="glyphicon glyphicon-folder-open">&nbsp;</i>Imagens compart.</a></li>
                                                <li><a href="#"><i class="glyphicon glyphicon-user">&nbsp;</i>Ir ao perfil</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="pull-left"><button>3 º ETIM</button></div>
                                </div>
                                <!--aqui acaba cabeçalho -->

                                <!--aqui vai a area de mensagens-->
                                <div class="chat_area">
                                    <ul class="list-unstyled container-fluid">
                                        <li class="left clearfix row">
                                            <span class="chat-img1 pull-left col-xs-1">
                                                    <img src="<?php echo base_url('users/profile/sid.JPG');?>" alt="Ketlyn" class="img-circle"/>
                                            </span>
                                            <div class="chat-body1 clearfix col-xs-9 col-sm-8 col-md-6">
                                                <p><?php echo parse_smileys("E aí povo,<br/>  B)  B)  B)  B)", base_url('assets/smileys/'))?></p>
                                                <div class="chat_time pull-right">09:39PM</div>
                                            </div>
                                        </li>


                                        <li class="left clearfix row">
                                            <span class="chat-img1 pull-left col-xs-1">
                                                    <img src="<?php echo base_url('users/profile/IMG_1054.JPG');?>" alt="Ketlyn" class="img-circle"/>
                                            </span>
                                            <div class="chat-body1 clearfix col-xs-9 col-sm-8 col-md-6">
                                                <p><?php echo parse_smileys("Oii,<br/>  :uni:", base_url('assets/smileys/'))?></p>
                                                <div class="chat_time pull-right">09:39PM</div>
                                            </div>
                                        </li>

                                        <li class="left clearfix row">
                                            <span class="chat-img1 pull-left col-xs-1">
                                                    <img src="<?php echo base_url('users/profile/marino.JPG');?>" alt="Ketlyn" class="img-circle"/>
                                            </span>
                                            <div class="chat-body1 clearfix col-xs-9 col-sm-8 col-md-6">
                                                <p><?php echo parse_smileys("Shazam :v >.<", base_url('assets/smileys/'))?></p>
                                                <div class="chat_time pull-right">09:41PM</div>
                                            </div>
                                        </li>

                                        <li class="right clearfix row">

                                            <div class="chat-body2 clearfix col-xs-9 col-xs-offset-2 col-sm-8 col-sm-offset-4 col-md-6 col-md-offset-6">
                                                <p><?php echo parse_smileys("Fala galera,<br/>Tudo bem? :?", base_url('assets/smileys/'))?></p>

                                                <div class="chat_time pull-right"><i class="fa fa-eye-slash" aria-hidden="true"></i> 09:42PM</div>
                                            </div>
                                        </li>
                                        <!-- <li class="left clearfix row">
                                            <span class="chat-img1 pull-left col-xs-1">
                                                    <img src="http://www.esmart-vision.com/uploads/posts/304e25390c0cb1f2abbf79123003f6b9.png" alt="User Avatar" class="img-circle"/>
                                            </span>
                                            <div class="chat-body1 clearfix col-xs-9 col-sm-8 col-md-6">
                                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker includin</p>
                                                <div class="chat_time pull-right">09:40PM</div>
                                            </div>
                                        </li>

                                        <li class="right clearfix row">

                                            <div class="chat-body2 clearfix col-xs-9 col-xs-offset-2 col-sm-8 col-sm-offset-4 col-md-6 col-md-offset-6">
                                                <p>Olá, está tudo bem? </p>
                                                <div class="chat_time pull-right"><i class="fa fa-eye-slash" aria-hidden="true"></i> 09:40PM</div>
                                            </div>
                                        </li>

                                        <li class="right clearfix row">

                                            <div class="chat-body2 clearfix col-xs-9 col-xs-offset-2 col-sm-8 col-sm-offset-4 col-md-6 col-md-offset-6">
                                                <p>Olá, está tudo bem? Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker includin</p>
                                                <div class="chat_time pull-right"><i class="fa fa-eye" aria-hidden="true"></i> 09:40PM</div>
                                            </div>
                                        </li>
                                        <li class="left clearfix row">
                                            <span class="chat-img1 pull-left col-xs-1">
                                                    <img src="http://www.esmart-vision.com/uploads/posts/304e25390c0cb1f2abbf79123003f6b9.png" alt="User Avatar" class="img-circle"/>
                                            </span>
                                            <div class="chat-body1 clearfix col-xs-9 col-sm-8 col-md-6">
                                                <p>Olá, está tudo bem? Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker includin</p>
                                                <div class="chat_time pull-right">09:40PM</div>
                                            </div>
                                        </li>

                                        <li class="right clearfix row">

                                            <div class="chat-body2 clearfix col-xs-9 col-xs-offset-2 col-sm-8 col-sm-offset-4 col-md-6 col-md-offset-6">
                                                <p>Olá, está tudo bem? </p>
                                                <div class="chat_time pull-right"><i class="fa fa-eye-slash" aria-hidden="true"></i> 09:40PM</div>
                                            </div>
                                        </li>

                                        <li class="right clearfix row">

                                            <div class="chat-body2 clearfix col-xs-9 col-xs-offset-2 col-sm-8 col-sm-offset-4 col-md-6 col-md-offset-6">
                                                <p>Olá, está tudo bem? Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker includin</p>
                                                <div class="chat_time pull-right"><i class="fa fa-eye" aria-hidden="true"></i> 09:40PM</div>
                                            </div>
                                        </li>
                                        <li class="left clearfix row">
                                            <span class="chat-img1 pull-left col-xs-1">
                                                    <img src="http://www.esmart-vision.com/uploads/posts/304e25390c0cb1f2abbf79123003f6b9.png" alt="User Avatar" class="img-circle"/>
                                            </span>
                                            <div class="chat-body1 clearfix col-xs-9 col-sm-8 col-md-6">
                                                <p>Olá, está tudo bem? Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker includin</p>
                                                <div class="chat_time pull-right">09:40PM</div>
                                            </div>
                                        </li>

                                        <li class="right clearfix row">

                                            <div class="chat-body2 clearfix col-xs-9 col-xs-offset-2 col-sm-8 col-sm-offset-4 col-md-6 col-md-offset-6">
                                                <p>Olá, está tudo bem? </p>
                                                <div class="chat_time pull-right"><i class="fa fa-eye-slash" aria-hidden="true"></i> 09:40PM</div>
                                            </div>
                                        </li>

                                        <li class="right clearfix row">

                                            <div class="chat-body2 clearfix col-xs-9 col-xs-offset-2 col-sm-8 col-sm-offset-4 col-md-6 col-md-offset-6">
                                                <p>Olá, está tudo bem? Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker includin</p>
                                                <div class="chat_time pull-right"><i class="fa fa-eye" aria-hidden="true"></i> 09:40PM</div>
                                            </div>
                                        </li>
                                        <li class="left clearfix row">
                                            <span class="chat-img1 pull-left col-xs-1">
                                                    <img src="http://www.esmart-vision.com/uploads/posts/304e25390c0cb1f2abbf79123003f6b9.png" alt="User Avatar" class="img-circle"/>
                                            </span>
                                            <div class="chat-body1 clearfix col-xs-9 col-sm-8 col-md-6">
                                                <p>Olá, está tudo bem? Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker includin</p>
                                                <div class="chat_time pull-right">09:40PM</div>
                                            </div>
                                        </li>

                                        <li class="right clearfix row">

                                            <div class="chat-body2 clearfix col-xs-9 col-xs-offset-2 col-sm-8 col-sm-offset-4 col-md-6 col-md-offset-6">
                                                <p>Olá, está tudo bem? </p>
                                                <div class="chat_time pull-right"><i class="fa fa-eye-slash" aria-hidden="true"></i> 09:40PM</div>
                                            </div>
                                        </li>

                                        <li class="right clearfix row">

                                            <div class="chat-body2 clearfix col-xs-9 col-xs-offset-2 col-sm-8 col-sm-offset-4 col-md-6 col-md-offset-6">
                                                <p>Olá, está tudo bem? Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker includin</p>
                                                <div class="chat_time pull-right"><i class="fa fa-eye" aria-hidden="true"></i> 09:40PM</div>
                                            </div>
                                        </li>
                                        <li class="left clearfix row">
                                            <span class="chat-img1 pull-left col-xs-1">
                                                    <img src="http://www.esmart-vision.com/uploads/posts/304e25390c0cb1f2abbf79123003f6b9.png" alt="User Avatar" class="img-circle"/>
                                            </span>
                                            <div class="chat-body1 clearfix col-xs-9 col-sm-8 col-md-6">
                                                <p>Olá, está tudo bem? Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker includin</p>
                                                <div class="chat_time pull-right">09:40PM</div>
                                            </div>
                                        </li>

                                        <li class="right clearfix row">

                                            <div class="chat-body2 clearfix col-xs-9 col-xs-offset-2 col-sm-8 col-sm-offset-4 col-md-6 col-md-offset-6">
                                                <p>Olá, está tudo bem? </p>
                                                <div class="chat_time pull-right"><i class="fa fa-eye-slash" aria-hidden="true"></i> 09:40PM</div>
                                            </div>
                                        </li>

                                        <li class="right clearfix row">

                                            <div class="chat-body2 clearfix col-xs-9 col-xs-offset-2 col-sm-8 col-sm-offset-4 col-md-6 col-md-offset-6">
                                                <p>Olá, está tudo bem? Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker includin</p>
                                                <div class="chat_time pull-right"><i class="fa fa-eye" aria-hidden="true"></i> 09:40PM</div>
                                            </div>
                                        </li>
                                        <li class="left clearfix row">
                                            <span class="chat-img1 pull-left col-xs-1">
                                                    <img src="http://www.esmart-vision.com/uploads/posts/304e25390c0cb1f2abbf79123003f6b9.png" alt="User Avatar" class="img-circle"/>
                                            </span>
                                            <div class="chat-body1 clearfix col-xs-9 col-sm-8 col-md-6">
                                                <p>Olá, está tudo bem? Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker includin</p>
                                                <div class="chat_time pull-right">09:40PM</div>
                                            </div>
                                        </li>

                                        <li class="right clearfix row">

                                            <div class="chat-body2 clearfix col-xs-9 col-xs-offset-2 col-sm-8 col-sm-offset-4 col-md-6 col-md-offset-6">
                                                <p>Olá, está tudo bem? </p>
                                                <div class="chat_time pull-right"><i class="fa fa-eye-slash" aria-hidden="true"></i> 09:40PM</div>
                                            </div>
                                        </li>

                                        <li class="right clearfix row">

                                            <div class="chat-body2 clearfix col-xs-9 col-xs-offset-2 col-sm-8 col-sm-offset-4 col-md-6 col-md-offset-6">
                                                <p>Olá, está tudo bem? Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker includin</p>
                                                <div class="chat_time pull-right"><i class="fa fa-eye" aria-hidden="true"></i> 09:40PM</div>
                                            </div>
                                        </li>
                                        <li class="left clearfix row">
                                            <span class="chat-img1 pull-left col-xs-1">
                                                    <img src="http://www.esmart-vision.com/uploads/posts/304e25390c0cb1f2abbf79123003f6b9.png" alt="User Avatar" class="img-circle"/>
                                            </span>
                                            <div class="chat-body1 clearfix col-xs-9 col-sm-8 col-md-6">
                                                <p>Olá, está tudo bem? Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker includin</p>
                                                <div class="chat_time pull-right">09:40PM</div>
                                            </div>
                                        </li>

                                        <li class="right clearfix row">

                                            <div class="chat-body2 clearfix col-xs-9 col-xs-offset-2 col-sm-8 col-sm-offset-4 col-md-6 col-md-offset-6">
                                                <p>Olá, está tudo bem? </p>
                                                <div class="chat_time pull-right"><i class="fa fa-eye-slash" aria-hidden="true"></i> 09:40PM</div>
                                            </div>
                                        </li>

                                        <li class="right clearfix row">

                                            <div class="chat-body2 clearfix col-xs-9 col-xs-offset-2 col-sm-8 col-sm-offset-4 col-md-6 col-md-offset-6">
                                                <p>Olá, está tudo bem? Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker includin</p>
                                                <div class="chat_time pull-right"><i class="fa fa-eye" aria-hidden="true"></i> 09:40PM</div>
                                            </div>
                                        </li> -->

                                    </ul>
                                </div>
                                <!--aqui acaba a area de mensagens-->

                                <!--aqui vai a caixa para escrever e enviar as mensagens-->
                                <form class="message_write">
                                    <!--aqui vai a area de envio-->
                                    <div class="chat_bottom container-fluid">

                                        <!--aqui vai a area de escrever-->
                                        <div class="form-group popup-messages-footer row">
                                            <textarea class="form-control" id="status_message" placeholder="Escreva uma menssagem..." name="message"></textarea>
                                            <!-- AQUI VAI O CONTAINER COM OS BOTÕES -->
                                            <div class="botoes">
                                            <!--aqui vai a anexação de arquivos-->
                                                <!-- <button class="btn_chat btnfile">
                                                    <i class="glyphicon glyphicon-picture" aria-hidden="true"></i>
                                                </button>
                                                    <input type="file" name="arquivo" id="arquivo" class="arquivo"> -->

                                                    <!-- <div class="btn_chat">
                                                        <input type="file" name="arquivo" id="arquivo" class="arquivo">
                                                    </div> -->

                                                    <div class="fileUpload btn pull-left">
                                                        <i class="glyphicon glyphicon-picture" aria-hidden="true"></i>
                                                        <input type="file" class="upload" />
                                                    </div>
                                            <!--aqui acaba a anexação-->

                                            <!--aqui vai o botão de emoticon-->
                                                
                                                <div class="dropdown-menu drop-up col-xs-12 col-sm-8 col-md-3" role="menu">
                                                    <?php echo $smiley_table; ?>
                                                </div>
                                                <button class="btn_chat dropdown-toggle col-md-1 col-xs-1 col-sm-1" data-toggle="dropdown">
                                                    <i class="fa fa-smile-o" aria-hidden="true"></i>
                                                </button>
                                            <!--aqui acaba o botão-->
                                            <!--aqui vai o botão de enviar-->
                                                <button type="button" href="#" class="btn_chat col-md-1 col-xs-1 col-sm-1 pull-right">
                                                    <i class="glyphicon glyphicon-send" aria-hidden="true"></i>
                                                </button>
                                            <!--aqui acaba o botão-->       
                                            </div>                           
                                        </div>
                                        <!--aqui acaba a area de escrver-->
                                    </div>
                                    <!--aqui acaba a area de envio-->

                                </form>
                                <!--aqui acaba a caixa-->
<?php 

    // $this->load->view('panel/commons/led_footer');
<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
    // var_dump($tipo);
?>
 <div id="main">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="page-header">
                                    <h3><?php echo $nome."&nbsp;".$sobrenome;?></h3>
                                </div>
                                

                                <?php 
                                    switch ($tipo) {
                                        case 1:
                                            //aqui vai o conteúdo da home do administrador
                                ?>
                                    <div class="panel panel-primary ">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Panel primary</h3>
                                    </div>
                                    <div class="panel-body">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent eget magna et ante suscipit lacinia. Aenean porttitor velit id pretium blandit. Aenean ut sodales ante. Ut faucibus ornare venenatis. Duis sit amet arcu eros. Mauris volutpat vestibulum congue. Nam volutpat, urna eu varius dapibus, velit nisl bibendum lorem, sit amet dapibus sem dolor eu felis. Nulla tincidunt augue vel dolor convallis lobortis. Nunc nibh dolor, tincidunt elementum lorem id, porta imperdiet neque. Quisque egestas lacus nec magna mattis aliquam. Nunc eget orci odio. Quisque neque odio, lobortis a orci ut, tempus feugiat tortor. Quisque et tincidunt arcu. Sed vel accumsan risus. Quisque enim ipsum, luctus vitae ultrices at, vulputate eu lorem. Curabitur at nibh sagittis, lobortis odio nec, sodales velit. Aenean interdum, magna nec molestie congue, magna nisi sodales dolor, at mattis ipsum nisi at nibh. Aenean quis dictum lacus. Vivamus commodo sit amet nibh eget scelerisque.
                                    </div>
                                </div>

                                <?php
                                            break;
                                        
                                        case 2:
                                            //aqui vai o conteúdo da home do funcionario
                                ?>

                                    <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Panel success</h3>
                                    </div>
                                    <div class="panel-body">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent eget magna et ante suscipit lacinia. Aenean porttitor velit id pretium blandit. Aenean ut sodales ante. Ut faucibus ornare venenatis. Duis sit amet arcu eros. Mauris volutpat vestibulum congue. Nam volutpat, urna eu varius dapibus, velit nisl bibendum lorem, sit amet dapibus sem dolor eu felis. Nulla tincidunt augue vel dolor convallis lobortis. Nunc nibh dolor, tincidunt elementum lorem id, porta imperdiet neque. Quisque egestas lacus nec magna mattis aliquam. Nunc eget orci odio. Quisque neque odio, lobortis a orci ut, tempus feugiat tortor. Quisque et tincidunt arcu. Sed vel accumsan risus. Quisque enim ipsum, luctus vitae ultrices at, vulputate eu lorem. Curabitur at nibh sagittis, lobortis odio nec, sodales velit. Aenean interdum, magna nec molestie congue, magna nisi sodales dolor, at mattis ipsum nisi at nibh. Aenean quis dictum lacus. Vivamus commodo sit amet nibh eget scelerisque.
                                    </div>
                                </div>
                                <?php
                                            break;
                                        
                                        case 3:
                                            //aqui vai o conteúdo da home do aluno
                                ?>
                                    <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Panel warning</h3>
                                    </div>
                                    <div class="panel-body">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent eget magna et ante suscipit lacinia. Aenean porttitor velit id pretium blandit. Aenean ut sodales ante. Ut faucibus ornare venenatis. Duis sit amet arcu eros. Mauris volutpat vestibulum congue. Nam volutpat, urna eu varius dapibus, velit nisl bibendum lorem, sit amet dapibus sem dolor eu felis. Nulla tincidunt augue vel dolor convallis lobortis. Nunc nibh dolor, tincidunt elementum lorem id, porta imperdiet neque. Quisque egestas lacus nec magna mattis aliquam. Nunc eget orci odio. Quisque neque odio, lobortis a orci ut, tempus feugiat tortor. Quisque et tincidunt arcu. Sed vel accumsan risus. Quisque enim ipsum, luctus vitae ultrices at, vulputate eu lorem. Curabitur at nibh sagittis, lobortis odio nec, sodales velit. Aenean interdum, magna nec molestie congue, magna nisi sodales dolor, at mattis ipsum nisi at nibh. Aenean quis dictum lacus. Vivamus commodo sit amet nibh eget scelerisque.
                                    </div>
                                </div>

                                <?php
                                            break;
                                        
                                        default:
                                            redirect(base_url());
                                            break;
                                    }


                                ?>
                            </div>
                        </div>
                </div>;
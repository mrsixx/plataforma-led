<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
    // var_dump($tipo);
?>
 <div id="main">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="page-header">
                                    <h3><?php echo $info['titulo'];?></h3>
                                </div>
                                
                                <div class="panel panel-primary ">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Tasks</h3>
                                    </div>
                                    <div class="panel-body">
                                        <?php echo $info['msg']; ?>
                                    </div>
                                    <div class="panel-footer">
                                        <?php echo $info['btn'];?>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                </div>
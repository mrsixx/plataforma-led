<?php defined('BASEPATH') OR exit('No direct script access allowed');
	if(isset($css))
		$data['css'] = $css;
	else
		$data['css'] = null;
    $this->load->view('panel/commons/led_header', $data);

?>
<div class="row">
        <div id="wrapper">
				<div id="sidebar-wrapper" class="col-md-3">
                <div class="mini-submenu">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </div>
                <?php 
                    $this->load->view("panel/sidebars/$sidebar", $data);
                 ?>
            </div>
            <div id="main-wrapper" class="col-xs-12 col-sm-12 col-md-9 pull-right">
                <?php
                    $this->load->view("panel/contents/$content", $data);
                ?>
            </div>
        </div>
<?php 

    $this->load->view('panel/commons/led_footer', $data);

    
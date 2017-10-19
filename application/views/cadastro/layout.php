<?php defined('BASEPATH') OR exit('No direct script access allowed');
	if(isset($files))
		$data['files'] = $files;
	else
		$data['files'] = null;
    $this->load->view('cadastro/commons/led_header', $data);

?>
<div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-3">
                <?php
                    $this->load->view("cadastro/contents/$content", $data);
                ?>
        </div>
</div>
<?php 
    if(isset($filesfooter))
        $data['filesfooter'] = $filesfooter;
    else
        $data['filesfooter'] = null;
    $this->load->view('cadastro/commons/led_footer', $data);

    
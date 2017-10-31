<?php defined('BASEPATH') OR exit('No direct script access allowed');
	if(isset($files))
		$data['files'] = $files;
	else
		$data['files'] = null;

    $this->load->view('links/commons/led_header', $data);
?>  

 <div class="row">
            <div id="wrapper">
                <div id="main-wrapper" class="col-md-12">
                     <?php $this->load->view("links/contents/$content", $data); ?>
                </div>
            </div>
<?php 
    
    

    if(isset($filesfooter))
        $data['filesfooter'] = $filesfooter;
    else
        $data['filesfooter'] = null;
    $this->load->view('links/commons/led_footer', $data);

    
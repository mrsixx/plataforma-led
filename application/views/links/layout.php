<?php defined('BASEPATH') OR exit('No direct script access allowed');
	if(isset($files))
		$data['files'] = $files;
	else
		$data['files'] = null;

    $this->load->view('links/commons/led_header', $data);

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

    
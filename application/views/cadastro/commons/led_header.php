<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?php echo "Plataforma LED | $title";?>
    </title>
    <link rel="shortcut icon" href="<?= base_url("assets/img/favicon.ico"); ?>">
    <link href="<?= base_url("assets/css/bootstrap.css");?>" rel="stylesheet">
    <link href="<?= base_url("assets/css/cadastro.css");?>" rel="stylesheet">

    <?php if(isset($files)){
        foreach ($files as $key => $value) {
            echo '<!-- script para '.$key.' -->';
            echo "\n";
            echo $value;
            echo "\n";
        }
    } ?>

    <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
</head>

<body>
    <div class="container-fluid">
    <div class="row">
        <div id="header" class="navbar navbar-default navbar-fixed-top">
            <div class="navbar-header">
                <button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                <a class="navbar-brand" href="<?php echo base_url('painel');?>">
                    <img src="<?= base_url("assets/img/logo-header.png");?>" class="img img-responsive logo">
                </a>
            </div>
            <nav class="collapse navbar-collapse">

                <ul class="nav navbar-nav pull-right">
                    <li class="dropdown">
                        <a href="#" id="nbAcctDD" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-user"></i><i class="glyphicon glyphicon-chevron-down"></i></a>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="<?php echo base_url("ajuda");?>"><span class="fa fa-question"></span> Ajuda</a></li>
                            <li><a href="<?php echo base_url("configuracoes");?>"><span class="glyphicon glyphicon-cog"></span> Configurações</a></li>
                            <li><a href="<?php echo base_url("logout");?>"><span class="glyphicon glyphicon-log-out"></span> Sair</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </div>  
        
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo "Plataforma LED | ".$title;?></title>
        <link rel="shortcut icon" href="assets/img/favicon.ico">
        <!-- Incluindo o CSS do Bootstrap -->
        <link href="<?= base_url("assets/css/bootstrap.min.css"); ?>" rel="stylesheet" media="screen">
        <!-- Incluindo o CSS do Bootstrap -->
        <link href="<?= base_url("assets/css/style-install.css"); ?>" rel="stylesheet" media="screen">
        <!-- Incluindo o jQuery que é requisito do JavaScript do Bootstrap -->
        <script src="<?= base_url("assets/js/jquery-3.2.1.min.js"); ?>"></script>
        <!-- Incluindo o JavaScript do Bootstrap -->
        <script src="<?= base_url("assets/js/bootstrap.min.js"); ?>"></script>

    </head>

    <body>
        <div class="container">
            <div class="row">
                <img src="<?= base_url("assets/img/logo.png"); ?>" class="img img-responsive logo-install"/><br/>
                <div class="col-md-8 col-md-offset-2 col-xs-12 panel panel-default" role="main">
                        
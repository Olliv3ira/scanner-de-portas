<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Scanner de Portas</title>

    <!-- CSS -->
    <?= link_tag('vendor/twbs/bootstrap/dist/css/bootstrap.min.css'); ?>
    <?= link_tag('assets/css/app.css'); ?>
</head>
<body>
<header>
    <div class="se-pre-con"></div>
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
               <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?= base_url(); ?>">SCANNER DE PORTAS</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse" id="navbar">
                <ul class="nav navbar-nav">
                    <li><a href="como-usar">COMO USAR <span class="sr-only">(current)</span></a></li>
                </ul>
            </div>
      </div>
    </nav>
</header> 
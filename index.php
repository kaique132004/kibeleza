<?php

    require_once('admin/site.php');
    $site = new Site();
    $listaServico = $site->ListaServico();
    $listaFunc = $site->listaFunc();

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Site Kaique TI12</title>
    
    <link rel="stylesheet" type="text/css" href="css/reset.css">
    <link rel="stylesheet" type="text/css" href="css/slick.css">
    <link rel="stylesheet" type="text/css" href="css/slick-theme.css">
    <link rel="stylesheet" type="text/css" href="css/lity.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
</head>
<body>
    <?php require_once("pages/topoRedeSocial.php")?>
    <?php require_once("pages/banner.php") ?>
    <?php require_once("pages/Sobre.php") ?>
    <?php require_once("pages/galeria.php") ?>
    <?php require_once("pages/servicos.php") ?>
    <?php require_once("pages/destaques.php") ?>
    <?php require_once("pages/equipes.php") ?>
    <?php require_once("pages/rodape.php") ?>
    
    <script type="text/javascript" src="js/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="js/slick.js"></script>
    <script type="text/javascript" src="js/animate.js"></script>
    <script type="text/javascript" src="js/lity.js"></script>
    <script src="js/wow.min.js"></script>
</body>
</html>
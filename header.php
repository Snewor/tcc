<?php
    session_start();

    if(!isset($_SESSION['usuarioLogado']) || !$_SESSION['usuarioLogado']){
         header('Location: home.php'); 
    }
?>

<html lang="pt-br">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Bem-vindo!</title>
    <script src="assets/js/jquery-3.4.1.min.js"></script>
    <script src="assets/js/jquery.mask.js"></script>
    <script src="assets/js/main.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
      <link rel="stylesheet" href="assets/css/main.css">
      <link rel="stylesheet" href="style.css">

    <style>
      .card-login {
        padding: 30px 0 0 0;
        width: 350px;
        margin: 0 auto;
      }
    </style>
  </head>
    
  <body>
   <nav class="navbar navbar-dark" style="background-color:#363636;">
      <a class="navbar-brand" href="#">
        <img src="logon.png" width="275" height="100" class="d-inline-block align-top" alt="">
      </a>
       
       <h6 class="ml-auto" style="color: white;">Bem vindo, <?php echo $_SESSION['user']['login']; ?></h6>
    </nav>
      <div class="wrapper-content">
   <div id="sidebar-wrapper">
        <ul class="sidebar-nav">
            <li> <a href="meusp.php" target="_self" class="options">MEUS PROTOCOLOS</a> </li>
            <li> <a href="consup.php" target="_self" class="options">CONSULTAR PROTOCOLO</a> </li>
            <li> <a href="addp.php" target="_self" class="options">ADICIONAR PROTOCOLOS</a> </li>
            <li> <a style="width: 100%;
    font-weight: bold;
    color: white;
    background-color: darkred;
    padding: 10px;
    position: absolute;
    top: 93%;
    text-align: center;
    right: 0px;
    text-transform: uppercase;
    text-decoration: none;" href="javascript:void(0)" id="logoff">SAIR</a> </li>
        </ul>
    </div> <!-- /#sidebar-wrapper -->

<?php
session_start();
	$user = $_SESSION['user'];
?>

<!DOCTYPE HTML>
<html style="overflow: hidden;">
	<head>

		<link href="https://fonts.googleapis.com/css?family=Dosis|Nanum+Gothic|Raleway&display=swap" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="style.css.css"/>
        <script src="assets/js/jquery.mask.js"></script>
		<script src="assets/js/jquery-3.4.1.min.js"></script>
      	<script src="assets/js/main.js"></script>
		<title>Menu</title>

	</head>

   

	<body class="bg">

		<div style="width: 108%;
    margin-top: -8px; margin-left: -12px; background: #202020 ; height: 70px;">
<a href="index.php" target="corpo.html">
    	<img src="logon.png" style="position: relative; margin-top:2.7%; left: 9%; width: 44%;">
</a>
    </div>

		<a href="meusp.php" target="site" class="options">MEUS PROTOCOLOS</a>
		<br>
		<a href="consup.php" target="site" class="options">CONSULTAR PROTOCOLO</a>
		<br>
		<a href="addp.php" target="site" class="options">ADICIONAR PROTOCOLOS</a>

		<p style="
    position: absolute;
    top: 15px;
    color: white;
    font-size: 13px;
    text-transform: uppercase;
    font-weight: bold;
    right: 16px;">Bem vindo, <?php echo $user['login'] ?></p>
		<a href="javascript:void(0)" id="logoff" style="width: 100%;
    font-weight: bold;
    color: white;
    background-color: darkred;

    padding: 10px;
    position: absolute;
    top: 93%;
    text-align: center;
    right: -4px;
    text-transform: uppercase;
    text-decoration: none;">Sair</a>

	</body>
</html>

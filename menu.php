<?php
session_start();
	$user = $_SESSION['user'];
?>

<!DOCTYPE HTML>
<html style="overflow: hidden;">
	<head>

		<link href="https://fonts.googleapis.com/css?family=Dosis|Nanum+Gothic|Raleway&display=swap" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="style.css.css"/>
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

		<p>Bem vindo, <?php echo $user['login'] ?></p>
		<a href="javascript:void(0)" id="logoff">Sair</a>

	</body>
</html>

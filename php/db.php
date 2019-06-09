<?php
    $server = "localhost";
    $user = "root";
    $senha = "";
    $base = "promapa_v2";
    $conexao = mysqli_connect($server, $user, $senha) or die("Erro na conexão!");
    $conexao->set_charset("utf8");
    mysqli_select_db($conexao, $base);

    $pdo = new PDO("mysql:host=$server;dbname=$base",$user,$senha,array(
		PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, 
		PDO::ATTR_PERSISTENT => false,
		PDO::ATTR_EMULATE_PREPARES => false,
		PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
	));
?>
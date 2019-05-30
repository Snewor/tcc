<?php
    $server = "localhost";
    $user = "root";
    $senha = "";
    $base = "promapa";
    $conexao = mysqli_connect($server, $user, $senha) or die("Erro na conexão!");
    mysqli_select_db($conexao, $base);
?>
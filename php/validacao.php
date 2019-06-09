<?php 
    
    session_start();
    
    require('db.php');
    
    $funcionario_autenticado = false;

    $funcionarios = $pdo->query("SELECT * FROM usuarios;");

    foreach($funcionarios as $user){
        
        if($user['nome'] == $_POST['usuario'] && $user['senha'] == $_POST['password']){
            $funcionario_autenticado = true;
            $_SESSION['user'] = array(
                "nome" => $user['nome'],
                "id" => $user['id'],
            );
        }
    }

    if($funcionario_autenticado) {
        $_SESSION['autenticado'] = 'SIM';
        
        header('Location: ../index.php');
    }else {
        $_SESSION['autenticado'] = 'NAO';
        header('Location: login.php?login=erro');
    }

?>
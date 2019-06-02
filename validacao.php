<?php 
    
    session_start();
    
    require('php/db.php');
    
    $funcionario_autenticado = false;

    $funcionarios = $pdo->query("SELECT * FROM funcionario;");

    foreach($funcionarios as $user){
        
        if($user['usuario'] == $_POST['usuario'] && $user['senhafuncionario'] == $_POST['password']  
          || $user['emailfuncionario'] == $_POST['usuario'] && $user['senhafuncionario'] == $_POST['password']){
            $funcionario_autenticado = true;
            $_SESSION['userlogado'] = $user['nomefuncionario'];
            $SESSION['userid'] = $user['codfuncionario'];
        }
    }

    if($funcionario_autenticado) {
        $_SESSION['autenticado'] = 'SIM';
        
        header('Location: index.php');
    }else {
        $_SESSION['autenticado'] = 'NAO';
        header('Location: login.php?login=erro');
    }

?>
<?php 

   require('php/db.php');

        $nome = $_POST["nome"];
        $sobrenome = $_POST["sobrenome"];
        $usuario = $_POST["usuario"];
        $email = $_POST["email"];
        $cemail = $_POST["cemail"];
        $senha = $_POST["senha"];
        $csenha = $_POST["csenha"];
        
if($email == $cemail && $senha == $csenha){
    
	try {
        
		$stmt = $pdo->prepare("INSERT INTO funcionario VALUES(null,'$nome','$sobrenome','$usuario','$email','$senha')");		
		$stmt->execute();				 				 

        header('Location: login.php?cadastro=ok');
        
	}catch(PDOException $e) {
		echo 'Error: ' . $e->getMessage();
	}
}elseif($email != $cemail && $senha != $csenha) {
    
    header('Location: cadastro.php?cadastro=erro1');
    
}elseif($senha != $csenha) {
    
    header('Location: cadastro.php?cadastro=erro2');
    
}else {
    header('Location: cadastro.php?cadastro=erro3');
}

     
?>
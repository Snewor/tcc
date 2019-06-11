<?php

include 'db.php';

if (isset($_POST["action"])) {
    $action = $_POST["action"];
	
    if($action == 'buscarProtocolo'){
        $numProtocolo = $_POST["numProtocolo"];
        $usuarioId = isset($_POST['usuarioId']) ? $_POST['usuarioId'] : null ;
        buscarProtocolo($numProtocolo, $usuarioId);
    }
    else if($action == 'buscarProtocoloPorCliente'){
        $cliente = $_POST['cliente'];
        buscarProtocoloPorCliente($cliente);
    }
    else if($action == 'adicionarProtocolo'){
        $data = $_POST['dados'];
        $usuarioId = $_POST['usuarioId'];
        adicionarProtocolo($data, $usuarioId);
    }
    else if($action == 'autenticarUsuario'){
        $dados = $_POST['dados'];
        autenticarUsuario($dados);
    }
    else if($action == 'deslogarUsuario'){
        deslogarUsuario();
    }
}

function buscarProtocolo($numProtocolo, $usuarioId = NULL){
    $server = "localhost";
    $user = "root";
    $senha = "";
    $base = "promapa_v2";
    $conexao = mysqli_connect($server, $user, $senha) or die("Erro na conexão!");
	$conexao->set_charset("utf8");
    mysqli_select_db($conexao, $base);

    if($usuarioId == null){
        $sql = "SELECT * FROM clientes WHERE numeroProtocolo LIKE '%".$numProtocolo."%'";
    }
    else{
        $sql = "SELECT * FROM clientes WHERE numeroProtocolo LIKE '%".$numProtocolo."%' AND usuario_id = ".$usuarioId.";";
    }
	
    $result = mysqli_query($conexao, $sql);
    $cont = mysqli_affected_rows($conexao);

    if ($cont > 0) {      
        $response = array();

        while ($linha = mysqli_fetch_array($result)) {
            $returnArray = array(
                "numeroProtocolo" => utf8_encode($linha["numeroProtocolo"]),
                "CNPJ" => utf8_encode($linha["cnpj"]),
                "nomefantasia" => utf8_encode($linha["nomeFantasia"]),
                "razaosocial" => utf8_encode($linha["razaoSocial"])
            );
            array_push($response, $returnArray);
        }
        echo json_encode($response);   

    } else {
        echo "Não foram encontrados registros!";
    }
};

function adicionarProtocolo($dados, $usuarioId){
	session_start();
			
    $server = "localhost";
    $user = "root";
    $senha = "";
    $base = "promapa_v2";
    $conexao = mysqli_connect($server, $user, $senha) or die("Erro na conexão!");
    $conexao->set_charset("utf8");
    mysqli_select_db($conexao, $base);

    $anotacao = $dados['anotacao'];
    $cnpj = $dados['cnpj'];
    $dataConstituicao = $dados['dataConstituicao'];
    $email = $dados['email'];
    $nomeFantasia = $dados['nomeFantasia'];
    $razaoSocial = $dados['razaoSocial'];
    $telefone = $dados['telefone'];
    $created_at = date("Y-m-d");

    $nomeContato = $nomeFantasia;
	$usuarioId = $_SESSION['user']['id'];    
    
    $clienteSql = "SELECT * FROM clientes WHERE cnpj = '" .$cnpj. "' AND dataConstituicao = '" . $dataConstituicao . "';";
    
    try{
         $clienteResult = mysqli_query($conexao, $clienteSql);
         $clienteCont = mysqli_affected_rows($conexao);

         if($clienteCont > 0){
            echo json_encode("");
            throw new Exception('Ja existe um protocolo cadastrado para esse cliente!');
         }
    }
    catch(Exception $e){
        echo $e;
    }
   
	
	$date = "";
	$codigo = "";
	$numero = "";
	
	$numProtocoloSql = "SELECT MAX(numeroProtocolo) FROM clientes WHERE usuario_id = ".$usuarioId.";";
	$numProtocoloResult = mysqli_query($conexao, $numProtocoloSql);
    $numProtocoloCont = mysqli_affected_rows($conexao);
	
	 if ($numProtocoloCont > 0) {
        while ($linha = mysqli_fetch_array($numProtocoloResult)) {
            $numProtocolo = $linha[0];
        } 
	 }
	  if($numProtocolo != null){
		$numeroProtocolo = $numProtocolo + 1; 
	 }
	 else{
		$numeroProtocolo = date("Y") . $_SESSION['user']['codigo'] . "001"; 
	 }
	 
    $sql = "INSERT INTO clientes(usuario_id, numeroProtocolo, cnpj, razaoSocial, nomeFantasia, dataConstituicao, anotacao, telefone, email, nomeContato, created_at)
            VALUES(".$usuarioId.", ".$numeroProtocolo.", '".$cnpj."', '".$razaoSocial."', '".$nomeFantasia."', '".$dataConstituicao."', '".$anotacao."', '".$telefone."', '".$email."', '".$nomeContato."', '".$created_at."');";
       		
    $result = mysqli_query($conexao, $sql);
    $cont = mysqli_affected_rows($conexao);

    if($cont > 0){
        $insertId = mysqli_insert_id($conexao);
        criarLogProtocolo($insertId, $usuarioId);
    }
    else{
        echo "Um erro aconteceu, verifique os dados e tente novamente: <br>";
        echo mysqli_error($conexao);
    }
}

function autenticarUsuario($dados){
    session_start();

    $server = "localhost";
    $user = "root";
    $senha = "";
    $base = "promapa_v2";
    $conexao = mysqli_connect($server, $user, $senha) or die("Erro na conexão!");
    mysqli_select_db($conexao, $base);

    $usuarioLogado = false;

    $login = $dados['login'];
    $senha = $dados['senha'];

    $sql = "SELECT * FROM usuarios WHERE nome = '".$login."' AND senha = '".$senha."';";
    
    $result = mysqli_query($conexao, $sql);
    $cont = mysqli_affected_rows($conexao);

    if($cont > 0){
        while($fetchArray = mysqli_fetch_array($result)){
            $_SESSION['user'] = array(
                "login" => $fetchArray['nome'],
                "id" => $fetchArray['id'],
                "codigo" => $fetchArray['codigo']
            );
        };

        echo json_encode($_SESSION['user']);

        $userId = $_SESSION['user']['id'];
        criarLogAcesso($userId); 
    }
    else{
        echo "Um erro aconteceu ao cadastrar o log de protocolo";
        echo mysqli_error($conexao);
    }
};

function criarLogAcesso($usuarioId){
    $server = "localhost";
    $user = "root";
    $senha = "";
    $base = "promapa_v2";
    $conexao = mysqli_connect($server, $user, $senha) or die("Erro na conexão!");
    $conexao->set_charset("utf8");
    mysqli_select_db($conexao, $base);

    $created_at = date("Y-m-d");

    $sql = "INSERT INTO logacessos(usuario_id, created_at)
            VALUES(".$usuarioId.", '".$created_at."');";

    $result = mysqli_query($conexao, $sql);
    $cont = mysqli_affected_rows($conexao);

    if($cont > 0){
       // echo "Log de acesso inserido com sucesso!";
    }
    else{
       // echo "Um erro aconteceu ao cadastrar o log de acesso";
       // echo mysqli_error($conexao);
    }
} 

function buscarProtocoloPorCliente($cliente){
    $server = "localhost";
    $user = "root";
    $senha = "";
    $base = "promapa_v2";
    $conexao = mysqli_connect($server, $user, $senha) or die("Erro na conexão!");
    $conexao->set_charset("utf8");
    mysqli_select_db($conexao, $base);
    
   
}

function criarLogProtocolo($clienteId, $usuarioId){
    $server = "localhost";
    $user = "root";
    $senha = "";
    $base = "promapa_v2";
    $conexao = mysqli_connect($server, $user, $senha) or die("Erro na conexão!");
    $conexao->set_charset("utf8");
    mysqli_select_db($conexao, $base);

    $created_at = date("Y-m-d");

    $sql = "INSERT INTO logprotocolos(cliente_id, usuario_id, created_at)
            VALUES(".$clienteId.", ".$usuarioId.", '".$created_at."');";

    $result = mysqli_query($conexao, $sql);
    $cont = mysqli_affected_rows($conexao);

    if($cont > 0){
        echo true;
    }
    else{
        echo false;;
        echo mysqli_error($conexao);
    }
}

function deslogarUsuario(){
    session_start();
    session_destroy();

    echo true;
}

?>
<?php

include 'db.php';
echo $conexao->character_set_name();

if (isset($_POST["action"])) {
    $action = $_POST["action"];

    if($action == 'buscarProtocolo'){
        $numProtocolo = $_POST["numProtocolo"];
        $usuarioId = isset($_POST['usuarioId']) ? $_POST['usuarioId'] : null ;
        buscarProtocolo($numProtocolo, $usuarioId);

    }
    else if($action == 'adicionarProtocolo'){
        $data = $_POST['dados'];
        $usuarioId = $_POST['usuarioId'];
        adicionarProtocolo($data, $usuarioId);
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
        $sql = "SELECT * FROM clientes WHERE numeroProtocolo LIKE '%".$numProtocolo."%' AND usuario_id =".$usuarioId.";";
    }

    $result = mysqli_query($conexao, $sql);
    $cont = mysqli_affected_rows($conexao);

    if ($cont > 0) {      
        $response = array();

        while ($linha = mysqli_fetch_array($result)) {
            $returnArray = array(
                "numeroProtocolo" => $linha["numeroProtocolo"],
                "CNPJ" => $linha["cnpj"],
                "nomefantasia" => $linha["nomeFantasia"],
                "razaosocial" => $linha["razaoSocial"]
            );
            array_push($response, $returnArray);
        }
        echo json_encode($response);
    } else {
        echo "Não foram encontrados registros!";
    }
};

function adicionarProtocolo($dados, $usuarioId){
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
    $numeroProtocolo = '23456789213';

    $sql = "INSERT INTO clientes(usuario_id, numeroProtocolo, cnpj, razaoSocial, nomeFantasia, dataConstituicao, anotacao, telefone, email, nomeContato, created_at)
            VALUES(".$usuarioId.", ".$numeroProtocolo.", '".$cnpj."', '".$razaoSocial."', '".$nomeFantasia."', '".$dataConstituicao."', '".$anotacao."', '".$telefone."', '".$email."', '".$nomeContato."', '".$created_at."');";
        
    $result = mysqli_query($conexao, $sql);
    $cont = mysqli_affected_rows($conexao);

    if($cont > 0){
        echo "Registro inserido com sucesso!";
        $insertId = mysqli_insert_id($conexao);
        criarLogProtocolo($insertId, $usuarioId);
    }
    else{
        echo "Um erro aconteceu, verifique os dados e tente novamente: <br>";
        echo mysqli_error($conexao);
    }
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
        echo "Log de criação de protocolo inserido com sucesso!";
    }
    else{
        echo "Um erro aconteceu ao cadastrar o log de protocolo";
        echo mysqli_error($conexao);
    }
}
 

?>
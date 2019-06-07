<?php
// Verifica se existe a variável txtnome
if (isset($_POST["action"])) {
    $action = $_POST["action"];

    if($action == 'buscarProtocolo'){
        $numProtocolo = $_POST["numProtocolo"];
        buscarProtocolo($numProtocolo);

    }
    else if($action == 'adicionarProtocolo'){
        $data = $_POST['dados'];
        echo json_encode($data, JSON_PRETTY_PRINT);
    }
}

/* function buscarProtocolo($numProtocolo){
    echo $numProtocolo;
}; */

function buscarProtocolo($numProtocolo){
    $server = "localhost";
    $user = "root";
    $senha = "";
    $base = "promapa";
    $conexao = mysqli_connect($server, $user, $senha) or die("Erro na conexão!");
    mysqli_select_db($conexao, $base);

    $sql = "SELECT * FROM cliente WHERE numeroProtocolo LIKE '%".$numProtocolo."%'";
    $result = mysqli_query($conexao, $sql);
    $cont = mysqli_affected_rows($conexao);

    if ($cont > 0) {      
        $response = array();

        while ($linha = mysqli_fetch_array($result)) {
            $returnArray = array(
                "numeroProtocolo" => $linha["numeroProtocolo"],
                "CNPJ" => $linha["CNPJ"],
                "nomefantasia" => $linha["nomefantasia"],
                "razaosocial" => $linha["razaosocial"]
            );
            array_push($response, $returnArray);
        }
        echo json_encode($response);
    } else {
        echo "Não foram encontrados registros!";
    }
};

 

?>
<?php
  include 'php/db.php';
  include('header.php');
  $user = $_SESSION['user'];
?>

<div class="page-content">

  <style>

  </style>

    <div class="page-heading">
    
  <span style="font-size: 60px;">MEUS PROTOCOLOS</span> 
        
    <input type="text" placeholder="Número do Protocolo" style="margin-left: 160px; border-radius:20px; width: 271px; padding: 10px;"  id="consultarProtocolo">
        
    </div>

  <table style="width:100%" id="resultTable">
    <tr class="bd-none">
      <th>Nº PROTOCOLO</th>
      <th>CNPJ</th>
      <th>NOME FANTASIA</th>
      <th>RAZÃO SOCIAL</th>
      <th>DATA DE CONSTITUIÇÃO</th>
        <th>TELEFONE</th>
        <th>ANOTACAO</th>
        <th>EMAIL</th>
    </tr>

    <?php 
  $userId = $user['id'];
  $sql = "SELECT * FROM clientes WHERE usuario_id =" . $userId . ";";
  $result = mysqli_query($conexao, $sql);
  $cont = mysqli_affected_rows($conexao);
  $return = '';
      while ($linha = mysqli_fetch_array($result)) {
          $return.= "<tr>"; 
          $return.= "<td>" . utf8_encode($linha["numeroProtocolo"]) . "</td>";
          $return.= "<td>" . utf8_encode($linha["cnpj"]) . "</td>";
          $return.= "<td>" . utf8_encode($linha["nomeFantasia"]) . "</td>";
          $return.= "<td>" . utf8_encode($linha["razaoSocial"]) . "</td>";
          $return.= "<td>" . utf8_encode($linha["dataConstituicao"]) . "</td>";
          $return.= "<td>" . utf8_encode($linha["telefone"]) . "</td>";
          $return.= "<td>" . utf8_encode($linha["anotacao"]) . "</td>";
            $return.= "<td>" . utf8_encode($linha["email"]) . "</td>";
          $return.= "</tr>";
      }
      echo $return;
  ?>

  </table>
</div>
  </div>
  </body>
</html>

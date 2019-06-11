<?php
  session_start();
  include 'php/db.php';
  $user = $_SESSION['user'];
?>

<!DOCTYPE html>
<html>
  <head>
    	<script src="assets/js/jquery-3.4.1.min.js"></script>
      <script src="assets/js/main.js"></script>

  <style>
  tr {
      border: 1px solid black;
      border-collapse: collapse;
  }
  th, td {
      padding: 5px;
      text-align: left;
  }
  </style>
  </head>
  <body>
<div style="width: 108%;
    margin-top: -8px; margin-left: -12px; background: #202020; height: 70px;">
      
    </div>
  <span style="font-size: 60px;">MEUS PROTOCOLOS</span> <input type="text" placeholder="CNPJ, PROTOCOLO, NOME FANTASIA..." style="margin-left: 160px; border-radius:50px; width: 271px; padding: 10px;"  id="consultarProtocolo">

  <table style="width:100%" id="resultTable">
    <caption>Protocolos</caption>
    <tr class="bd-none">
      <th>Nº PROTOCOLO</th>
      <th>CNPJ</th>
      <th>NOME FANTASIA</th>
      <th>RAZÃO SOCIAL</th>
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
          $return.= "</tr>";
      }
      echo $return;
  ?>

  </table>
  
  </body>
</html>

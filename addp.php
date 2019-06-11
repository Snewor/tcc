<?php
  session_start();
  include 'php/db.php';
  $user = $_SESSION['user'];

  echo "<script>window.userId = " . $user['id'] . ";</script>"
?>

<!DOCTYPE html>
<html style="overflow: hidden;">
  <head>	
      <script src="assets/js/jquery-3.4.1.min.js"></script>
	   <script src="assets/js/jquery.mask.js"></script>
      <script src="assets/js/main.js"></script>
	  

  </head>
  <body>
<div style="width: 108%;
    margin-top: -8px; margin-left: -12px; background: #202020; height: 70px;">
    	
    </div>

  <h2 style="font-size: 60px; margin-left: 330px;">ADICIONAR PROTOCOLO</h2>
  <div style="width: 350px; margin: 0 auto">
  <input type="text" id="cnpj" name="CNPJ" placeholder="CNPJ" style=" width: 300px; margin-bottom: 15px;">
  <input type="text" id="razaoSocial" name="Razão social" placeholder="Razão social" style ="width: 300px; margin-bottom: 15px;">
  <input type="text" id="nomeFantasia" name="Nome fanntasia" placeholder="Nome fanntasia" style="width: 300px; margin-bottom: 15px;">
  <input type="text" id="dataConstituicao" name="Data de constituição" placeholder="Data de constituição" style="width: 300px; margin-bottom: 15px;">
  <input type="text" id="telefone" name="Telefone" placeholder="Telefone" style="width: 300px; margin-bottom: 15px;">
  <input type="email" id="email" name="Email" placeholder="Email" style="width: 300px; margin-bottom: 15px;">
  <input type="message" id="anotacoes" name="Anotações" placeholder="Anotações" style="width: 300px; margin-bottom: 15px;">

  <button style="background-color: green; color: white; border:none; padding: 15px;" id="adicionarProtocolo">Adicionar</button>
</div>

  <div id="result"></div>
      
      <script>
          
        $(document).ready(function(){
            $("#cnpj").mask('00.000.000/0000-00');
            $("#dataConstituicao").mask('00/00/0000');
            $("#telefone").mask('(00) 0000-0000');
        });
          
      </script>

  </body>
</html>

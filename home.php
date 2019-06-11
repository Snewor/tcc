
<!DOCTYPE>
<html lang="pt-br">
 <head>
 	<title>PROMAPA ASSESSORIA</title>
 	<link href="https://fonts.googleapis.com/css?family=Dosis|Nanum+Gothic|Raleway&display=swap" rel="stylesheet">
     <script src="assets/js/jquery.mask.js"></script>
 	<link rel="icon" type="imagem/png" href="icon.png" />
  <meta charset="UTF-8"/>
     <link rel="stylesheet" type="text/css" href="style.css"/>
 </head>
      <frameset cols="20%,80%,*" border="0px">
        <frame src="menu.php" resize="no"></frame>
        <frame src="corpo.html" Name="site" noresize="yes"></frame>
      </frameset>
      <link rel="stylesheet" type="text/css" href="style.css"/>
    <?php 

            session_start();
    
            if(!isset($_SESSION['usuariologado']) || !$_SESSION['usuariologado']){
                 header('Location: index.php'); 
            }

        ?>
	<body>

		
	</body>

</html>

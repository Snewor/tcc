<html lang="pt-br">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Bem-vindo!</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
      .card-login {
        padding: 30px 0 0 0;
        width: 350px;
        margin: 0 auto;
      }
    </style>
  </head>

  <body>

    <nav class="navbar navbar-dark bg-dark">
      <a class="navbar-brand" href="#">
        <img src="logon.png" width="275" height="100" class="d-inline-block align-top" alt="">
        
      </a>
    </nav>

    <div class="container">    
      <div class="row">

        <div class="card-login">
          <div class="card">
            <div class="card-header">
              Login
            </div>
            <div class="card-body">
                
              <form action="validacao.php" method="post">
                <div class="form-group">
                  <input type="text" name="usuario" class="form-control" placeholder="Usuário">
                </div>
                  
                <div class="form-group">
                  <input type="password" name="password" class="form-control" placeholder="Senha">
                </div>
                
                <?php if(isset($_GET['login']) && $_GET['login'] == 'erro') { ?>
                    <div style="text-align: center;">
                        <span style="color: red;">Usuário ou senha inválido(s)</span>
                    </div>
                <?php } ?>
                
                <?php if(isset($_GET['login']) && $_GET['login'] == 'erro2') { ?>
                    <div style="text-align: center;">
                        <span style="color: red;"></span>
                    </div>
                <?php } ?>
                      
                <?php if(isset($_GET['cadastro']) && $_GET['cadastro'] == 'ok') { ?>
                    <div style="text-align: center; margin-top: 2%; color: green">
                            Cadastro realizado com sucesso!
                    </div>
                <?php } ?>
                
                  <button class="btn btn-lg btn-info btn-block" type="submit">Entrar</button>
                
              </form>
                
            </div>
          </div>
        </div>
    </div>
  </body>
</html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Bem-vindo!</title>
    <script src="assets/js/jquery-3.4.1.min.js"></script>
    <script src="assets/js/main.js"></script>
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
                
              <form>
                <div class="form-group">
                  <input type="text" name="usuario" id="login" class="form-control" placeholder="Usuário">
                </div>
                  
                <div class="form-group">
                  <input type="password" id="senha" name="password" class="form-control" placeholder="Senha">
                </div>

                <button class="btn btn-lg btn-info btn-block" type="submit" id="btnLogin">Entrar</button>
                
              </form>

              <div id="errorMsgWrapper" class="d-none" style="text-align: center; margin-top: 2%; color: green">
                  <p id="errormsg"></p>
              </div>

            </div>
          </div>
        </div>
    </div>
  </body>
</html>
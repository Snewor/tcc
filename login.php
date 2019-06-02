<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <style>
.sec-bg-login {
    width: 100%;
    height: 79vh;
}

.sec-form-login {
    border: 2px solid rgba(12, 144, 252, 0.87);
    width: 30%;
    height: 30%;
    margin: 0 auto;
    padding: 1.5%;
    background: #191919;
    background: rgba(255,255,255,.8);
    display: block;
    position: absolute;
    margin-top: 20vh;
    margin-left: 35vw;
}
.tx {
    background: rgba(255,255,255,.1);
    border: 2px solid rgba(12, 144, 252, 0.87);
    border-radius: 7px;
    width: 100%;
    height: 25px;
    color: rgba(12, 144, 252, 0.87);
    margin-top: 0.5%;
    margin-bottom: 3.5;
    transition: all 0.5s ease-in;
    text-align: center;
}

.txa {
    background: rgba(255,255,255,.1);
    border: 2px solid rgba(12, 144, 252, 0.87);
    border-radius: 7px;
    color: rgba(12, 144, 252, 0.87);
    transition: all 0.5s ease-in;
}

.txa:focus {
    border: 2px solid #000;
}

.txa2 {
    width: 100%;
    height: 120px;
}

.tx:focus {
    border: 2px solid #000;
}

.bt {   
    margin-top: 2.5%;
    background: rgba(12, 144, 252, 0.87);
    border: 2px solid rgba(12, 144, 252, 0.87);
    padding: 7px 20px;
    color: #fff;
    text-transform: uppercase;
    font-weight: 700;
    
    transition: all 0.5s ease-in;
    border-radius: 10px;   
}
        
.bt:hover {
    background: none;
    color: rgba(12, 144, 252, 0.87);
}

::-webkit-input-placeholder { /*Chrome / Opera / Safari*/
    color: rgba(12, 144, 252, 0.87);
    text-transform: uppercase;
    padding-left: 5px;
}

::-moz-placeholder { /*Firefox 19+ */
    color: rgba(12, 144, 252, 0.87);
    text-transform: uppercase;
    padding-left: 5px;       
}
        
:-ms-input-placeholder { /* IE 10+ */
    color: rgba(12, 144, 252, 0.87);
    text-transform: uppercase;
    padding-left: 5px;
}
        
:moz-placeholder { /*Firefox 18- */
    color: rgba(12, 144, 252, 0.87);
    text-transform: uppercase;
    padding-left: 5px;
}
           
    </style>

    
  </head>
  <body>
      <section class="sec-bg-login">
        <section class="sec-form-login">
          
              <div class="d-login">
                  <form action="validacao.php" method="post">
                      <div class="d-all">
                          <label>Usuário ou e-mail</label><br/>
                          <input type="text" name="usuario" class="tx"/>
                      </div>

                      <div class="d-all">
                          <label>Senha</label><br/>
                          <input type="password" name="password" class="tx"/>
                      </div>

                      <!--função isset-->
                      <?php if(isset($_GET['login']) && $_GET['login'] == 'erro') { ?>

                      <div style="text-align: center;">
                        <span style="color: red;">Usuário ou senha inválido(s)</span>
                      </div>

                      <?php } ?>
                      
                      <?php if(isset($_GET['login']) && $_GET['login'] == 'erro2') { ?>

                      <div style="text-align: center;">
                        <span style="color: red;">Faça login!</span>
                      </div>

                      <?php } ?>
                      
                      <?php if(isset($_GET['cadastro']) && $_GET['cadastro'] == 'ok') { ?>

                        <div style="text-align: center; margin-top: 2%; color: green">
                            Cadastro realizado com sucesso!
                        </div>

                      <?php } ?>

                      <div class="d-all">
                          <input type="submit" value="Login" class="bt"/>
                      </div> 
                  </form>

                  <div class="d-all">
                      <p style="text-align: center;">
                      <a href="cadastro.php">Cadastrar</a><br/>
                  </div>
              </div>
      </section>
    </section>

  </body>
    
    
</html>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <style>
        
.sec-bg-cadastro {
    width: 100%;
    height: 79vh;
}

.sec-form {
    border: 2px solid rgba(12, 144, 252, 0.87);
    width: 45%;
    height: auto;
    padding: 2%;
    background: rgba(255,255,255,.8);
    display: block;
    position: absolute;
    margin-top: 15vh;
    margin-left: 26vw;
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
      
   
      
    <section class="sec-bg-cadastro">
    <section class="sec-form">
        <div class="d-login">
            <h3>Cadastro:</h3>
            <form action="inserirfuncionario.php" method="post">
                
                <div class="d-all">
                    <input type="text" name="nome" placeholder="Nome" class="tx" required/>
                </div>
                
                <div class="d-all">
                    <input type="text" name="sobrenome" placeholder="Sobrenome" class="tx" required/>
                </div>
                
                <div class="d-all">
                    <input type="text" name="usuario" placeholder="Usuário" class="tx" required/>
                </div>
                
                <div class="d-all">
                    <input type="email" name="email" placeholder="E-mail" class="tx" required/>
                </div>
                
                <div class="d-all">
                    <input type="email" name="cemail" placeholder="Confirmar e-mail" class="tx" required/>
                </div>

                <div class="d-all">
                    <input type="password" name="senha" placeholder="Senha" class="tx" required/>
                </div>

                <div class="d-all">
                    <input type="password" name="csenha" placeholder="Confirmar senha" class="tx" required/>
                </div>
                
                
                
                <?php if(isset($_GET['cadastro']) && $_GET['cadastro'] == 'erro1') { ?>

                    <div style="text-align: center; margin-top: 2%;">
                        * Senhas digitadas não coincidem<br>
                        * E-mails digitados não coincidem
                    </div>

                <?php } ?>
                
                <?php if(isset($_GET['cadastro']) && $_GET['cadastro'] == 'erro2') { ?>

                    <div style="text-align: center; margin-top: 2%;">
                        * Senhas digitadas não coincidem
                    </div>

                <?php } ?>
                
                <?php if(isset($_GET['cadastro']) && $_GET['cadastro'] == 'erro3') { ?>

                    <div style="text-align: center; margin-top: 2%;">
                        * E-mails digitados não coincidem
                    </div>

                <?php } ?>
                

                <div class="d-all">
                    <input type="submit" class="bt" value="Cadastrar">
                </div>
            </form>
        </div>
    </section>
        </section>

  </body>
</html>
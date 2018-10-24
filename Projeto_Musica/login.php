<?php
    $erro = isset($_GET['erro']) ? $_GET['erro'] : 0;
    session_start();
    unset($_SESSION['usuario']);  
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Projeto Música</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        
        <script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
        <script src="js/bootstrap.js"></script>
                
        <link rel="stylesheet" href="css/bootstrap.css">      
    </head>

    <script type="text/javascript">     
            $(document).ready( function(){
                $('#btn_login').click(function(){
                    var campo_vazio = false;
                    if($('#usuario').val() == ''){
                        $('#usuario').css({'border-color': '#A94442'});
                        campo_vazio = true;
                        alert('Informe o usuário');
                    } else {
                        $('#email').css({'border-color': '#CCC'});
                    }

                    if($('#senha').val() == ''){
                        $('#senha').css({'border-color': '#A94442'});
                        campo_vazio = true;
                        alert('Informe a senha');
                    } else {
                        $('#senha').css({'border-color': '#CCC'});
                    }
                    if(campo_vazio) return false;
                });
            });             
    </script>
    
    <body>
        <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">APLICATIVO DE MÚSICAS</a>
                <div class="navbar-collapse collapse navbar-right">
                  <ul class="nav navbar-nav">
                    <li class="active"><a href="index.php">HOME</a></li>
                    <li><a href="cadastro.php">CADASTRO</a></li>   
                    <li><a href="index.php">SAIR</a></li>                
                  </ul>
                </div>
            </div>
        </div>
   
       <div class="container col-sm-3 col-md-offset-4" style="margin-top: 90px;">
            <form class="form-signin" method="post" action="classes/validar_acesso.php" id="formLogin">
                <h2 class="form-signin-heading" align="center">Login | Entrar</h2>               
                <label for="usuario">Usuário:</label>
                <input align="center" type="usuario" id="usuario" name="usuario" class="form-control" placeholder="Digite o email..." autofocus>

                <label for="senha">Senha:</label>
                <input align="center" type="password" id="senha" name="senha" class="form-control" placeholder="Digite a senha...">
                <br>
                <button type="buttom" class="btn btn-lg btn-primary btn-block" id="btn_login">Entrar</button>     
            </form>
            <br>
            <?php 
                if ($erro == 1) {
                    echo '<font color="#FF0000">Desculpe, não foi possível encontrar uma conta com este nome de usuário e/ou senha. Por favor, verifique se você está usando o nome de usuário correto e tente novamente!</font>';
                }
            ?>
        </div>
    </body>    
</html>
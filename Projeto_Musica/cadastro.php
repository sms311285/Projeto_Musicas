<?php
  $erro_usuario = isset($_GET['erro_usuario']) ? $_GET['erro_usuario'] : 0;
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
            <li><a href="index.php">SAIR</a></li>   
                      
          </ul>
        </div>  
  		</div>
  	</div>

    <div class="container" style="margin-top: 100px;">
      <h2>Cadastro de Usuários</h2>
      <br>
      <form method="post" action="classes/registra_usuario.php" id="formCadastro">
        <div class="row">
          <div class="form-group col-sm-6 col-xs-12">
            <label for="email">Usuário:</label>
            <input autocomplete="off" type="text" id="usuario" name="usuario" class="form-control" placeholder="Digite o usuário..." autocomplete="off">
            <?php
              if ($erro_usuario == 1){
                echo '<font style="color:#FF0000"> Usuário já existe !!</font>';
              }
            ?>
          </div>
        </div>

        <div class="row">
          <div class="form-group col-sm-6 col-xs-12">
            <label for="senha">Senha:</label>
            <input autocomplete="off" type="password" id="senha" name="senha" 
              class="form-control" placeholder="Digite a senha..." required>
          </div>
        </div>
        <br>             
        <button type="submit" class="btn btn-secondary" style="width: 200px;">Salvar</button>        
      </form> 
      <hr>
      <footer>
        <p>&copy; SAMUEL MAGNO DA SILVA - 2018</p>
      </footer>         
    </div>
  </body>  	
</html>
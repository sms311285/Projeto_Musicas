<?php
  $erro_nome = isset($_GET['erro_nome']) ? $_GET['erro_nome'] : 0;
  $erro_twitter = isset($_GET['erro_twitter']) ? $_GET['erro_twitter'] : 0;
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
            <li><a href="lista_artistas.php">LISTA DE ARTISTAS</a></li>
            <li><a href="lista_albuns.php">LISTA DE ÁLBUNS</a></li>
            <li><a href="index.php">SAIR</a></li>               
          </ul>
        </div>  
  		</div>
  	</div>

    <div class="container" style="margin-top: 100px;">
      <h2>Cadastro de Artistas</h2>
      <br>
      <form method="post" action="classes/registra_artista.php" id="formCadastro">
        <div class="row">
          <div class="form-group col-sm-6 col-xs-12">
            <label for="email">Nome do artista:</label>
            <input autocomplete="off" type="text" id="nome" name="nome" class="form-control" placeholder="Digite o nome do artista..." autocomplete="off">
            <?php
              if ($erro_nome == 1){
                echo '<font style="color:#FF0000"> Nome já existe !!</font>';
              }
            ?>
          </div>
        </div>

        <div class="row">
          <div class="form-group col-sm-6 col-xs-12">
            <label for="twitter">Twitter:</label>
            <input autocomplete="off" type="text" id="twitter" name="twitter" 
              class="form-control" placeholder="Digite o twitter..." >
              <?php
              if ($erro_twitter == 1){
                echo '<font style="color:#FF0000"> Twitter já existe !!</font>';
              }
            ?>
          </div>
        </div>
        <br>             
        <button type="submit" class="btn btn-secondary" style="width: 200px;">Salvar</button>
        <a class="btn btn-secondary" href="lista_artistas.php" role="button">Voltar</a>       
      </form> 
      <hr>
      <footer>
        <p>&copy; SAMUEL MAGNO DA SILVA - 2018</p>
      </footer>         
    </div> 
  </body>  	
</html>
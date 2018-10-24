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
            <li class="active"><a href="#">HOME</a></li>
            <li><a href="login.php">LISTA DE ARTISTAS</a></li>
            <li><a href="login.php">LISTA DE ÁLBUNS</a></li>
            <li><a href="cadastro.php">CADASTRO</a></li>   
            <li><a href="login.php">ENTRAR</a></li>               
          </ul>
        </div>  
  		</div>
  	</div>

    <div class="jumbotron">
      <div class="container">
      	<br />
        <h1>APLICATIVO DE MÚSICAS</h1> 
      </div>
    </div>

    <div class="container">
      <hr>
      <footer>
        <p>&copy; SAMUEL MAGNO DA SILVA - 2018</p>
      </footer>
    </div> 
  </body>  	
</html>
<?php
  require_once ('classes/db.class.php');
  session_start();

  if (!isset($_SESSION['usuario'])) {
    header('location: index.php?erro=1');    
  }
  require_once ('classes/db.class.php');
  $sql = " SELECT * FROM artistas ";
  $objDB = new db();
  $link = $objDB-> conecta_mysql();
  $resultado_id = mysqli_query($link, $sql);
  if ($resultado_id) {
    $dados_artistas = array();
    while($linha = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)){                      
      $dados_artistas[] = $linha;
    }                                        
  } else {
    echo 'Erro na execução da consulta, contactar o administrador do site!';
  } 
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
        <a class="navbar-brand" href="#">LISTA DE ARTISTAS</a>
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

    <div class="jumbotron">
      <div class="container">
      	<br />
        <h1>LISTA DE ARTISTAS</h1> 
      </div>
    </div>

    <div class="container">
      <a href="cadastro_artista.php"> Cadastro de Artistas</a> 
      &nbsp;&nbsp;|&nbsp;&nbsp;
      <a href="editar_artistas.php"> Editar Artistas</a>
      <br><br>
      <table class="table table-striped table-bordered table-hover table-condensed">
        <thead>
          <tr>
            <th>Código</th>
            <th>Nome do Artista</th>
            <th>Twitter</th>
          </tr> 
        </thead>
        <tbody><!--tbody = Corpo da tabela-->
          <?php foreach($dados_artistas as $row){?>
            <tr >
              <td><?php echo $row['id'] ;?></td>
              <td><?php echo $row['nome'] ;?></td>
              <td><?php echo $row['twitter'] ;?></td>
            </tr>
        <?php }?>
        </tbody>
    </table>
    </div>

    <div class="container">
      <hr>
      <footer>
        <p>&copy; SAMUEL MAGNO DA SILVA - 2018</p>
      </footer>
    </div>
  </body>  	
</html>
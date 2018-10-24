<?php
  $erro_album = isset($_GET['erro_album']) ? $_GET['erro_album'] : 0; 

  // Buscando os artistas
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
      <h2>Cadastro de Álbum</h2>
      <br>
      <form method="post" action="classes/registra_album.php" id="formCadastro">
        <div class="row">
          <div class="form-group col-sm-6 col-sm-6">
            <label for="id_artista">Artista:</label><br>
            <select class="form-control" id="id_artista" name="id_artista" required="required">
              <option value="0">Selecione o Artista</option>
              <?php foreach($dados_artistas as $row){?>
                <option value="<?php echo $row['id'] ;?>"><?php echo $row['nome'] ;?></option>
              <?php }?>
            </select>
          </div>
        </div>

        <div class="row">
          <div class="form-group col-sm-6 col-xs-12">
            <label for="nome_album">Nome Álbum:</label>
            <input autocomplete="off" type="text" id="nome_album" name="nome_album" 
              class="form-control" placeholder="Digite o nome do álbum..." required>
              <?php
              if ($erro_album == 1){
                echo '<font style="color:#FF0000"> Nome de álbum já existe !!</font>';
              }
            ?>
          </div>

          <div class="form-group col-sm-6 col-xs-12">
            <label for="ano">Ano:</label>
            <input autocomplete="off" type="text" id="ano" name="ano" 
              class="form-control" placeholder="Digite o nome do álbum..." required>              
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
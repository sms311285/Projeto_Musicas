<?php
  $erro_usuario = isset($_GET['erro_usuario']) ? $_GET['erro_usuario'] : 0;
  require_once ('classes/db.class.php');
  $sql = " SELECT * FROM artistas ";
  $objDB = new db();
  $link = $objDB-> conecta_mysql();
  $resultado_id = mysqli_query($link, $sql);
  if ($resultado_id) {
    $dados_artistas = array();
    $map_artistas = array();
    while($linha = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)){                      
      $dados_artistas[] = $linha;
      $map_artistas[$linha["id"]] = $linha;
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

    <script type="text/javascript">
     
      $(document).ready( function(){        
        $("#id").change(function(){
          var id = $('#id').val();
          if(id == 0){
            $("#nome").val("");
            $("#twitter").val("");
            return;
          }
          
          var artistas = <?php echo json_encode($map_artistas);?>;
          
          $("#nome").val(artistas[id]["nome"]);
          $("#twitter").val(artistas[id]["twitter"]);          
        });
      }); 
    </script>      
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
      <h2>Atualizar Artistas</h2>
      <br>
      <form method="post" action="classes/update_artista.php" id="formCadastro">
        <div class="row">
          <div class="form-group col-sm-6 col-sm-6">
            <label for="desc">Código:</label><br>
            <select class="form-control" id="id" name="id" required="required">
              <option value="0">Selecione o código</option>
              <?php foreach($dados_artistas as $row){?>
                <option value="<?php echo $row['id'] ;?>"><?php echo $row['id'] ;?></option>
              <?php }?>
            </select>
          </div>
        </div>

        <div class="row">
          <div class="form-group col-sm-6 col-xs-12">
            <label for="artista">Artista:</label>
            <input autocomplete="off" type="text" id="nome" name="nome" 
              class="form-control" placeholder="Digite a senha..." required>
          </div>

          <div class="form-group col-sm-6 col-xs-12">
            <label for="twitter">Twitter:</label>
            <input autocomplete="off" type="text" id="twitter" name="twitter" 
              class="form-control" placeholder="Digite a senha..." required>
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
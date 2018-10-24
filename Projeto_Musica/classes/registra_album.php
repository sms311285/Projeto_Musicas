<?php
	require_once ('db.class.php');

	$id_artista = $_POST['id_artista'];
	$nome_album = $_POST['nome_album'];	
    $ano = $_POST['ano']; 

	$objDB = new db();
	$link = $objDB-> conecta_mysql();

    $nome_album_existe = false;

    $sql = "SELECT * FROM album WHERE nome_album = '$nome_album' ";

    if($resultado_id = mysqli_query($link, $sql)){
        $dados_usuario = mysqli_fetch_array($resultado_id);

        if (isset($dados_usuario['nome_album'])) {
            $nome_album_existe = true;
        }
    }else {
        echo 'Erro ao tentar localizar o regsitro de usuário';
    }
    
    if ($nome_album_existe) {
        $retorno_get = '';

        if ($nome_album_existe) {
            $retorno_get.="erro_album=1&";
        }
        header('Location: ../cadastro_album.php?'.$retorno_get);
        die();
    }   
    
	$sqli = " insert into album(id_artista, nome_album, ano) values('$id_artista', '$nome_album', '$ano')";
	
	if (mysqli_query($link, $sqli)){
		echo"<script>
				alert('Álbum cadastrado com sucesso!!'); window.location = '../lista_albuns.php';
			</script>";
	} else{
		echo 'Erro ao registrar álbum !';
	}
?>
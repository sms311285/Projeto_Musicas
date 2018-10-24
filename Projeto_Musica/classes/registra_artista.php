<?php
	require_once ('db.class.php');

	$nome = $_POST['nome'];
	$twitter = $_POST['twitter'];	

	$objDB = new db();
	$link = $objDB-> conecta_mysql();

    $nome_existe = false;
    $twitter_existe = false;

    $sql = "SELECT * FROM artistas WHERE nome = '$nome' ";
    if($resultado_id = mysqli_query($link, $sql)){
        $dados_usuario = mysqli_fetch_array($resultado_id);

        if (isset($dados_usuario['nome'])) {
            $nome_existe = true;
        }
    }else {
        echo 'Erro ao tentar localizar o regsitro de usuário';
    }

    $sql = "SELECT * FROM artistas WHERE twitter = '$twitter' ";
    if($resultado_id = mysqli_query($link, $sql)){
        $dados_usuario = mysqli_fetch_array($resultado_id);

        if (isset($dados_usuario['twitter'])) {
            $twitter_existe = true;
        }
    }else {
        echo 'Erro ao tentar localizar o regsitro de usuário';
    }
    
    if ($nome_existe) {
        $retorno_get = '';

        if ($nome_existe) {
            $retorno_get.="erro_nome=1&";
        }
        header('Location: ../cadastro_artista.php?'.$retorno_get);
        die();
    } 

    if ($twitter_existe) {
        $retorno_get = '';

        if ($twitter_existe) {
            $retorno_get.="erro_twitter=1&";
        }
        header('Location: ../cadastro_artista.php?'.$retorno_get);
        die();
    } 
    
	$sqli = " insert into artistas(nome, twitter) values('$nome', '$twitter')";
	
	if (mysqli_query($link, $sqli)){
		echo"<script>
				alert('Artista cadastrado com sucesso!!'); window.location = '../lista_artistas.php';
			</script>";
	} else{
		echo 'Erro ao registrar artista !';
	}
?>
<?php
	require_once ('db.class.php');

	$usuario = $_POST['usuario'];
	$senha = md5($_POST['senha']);	

	$objDB = new db();
	$link = $objDB-> conecta_mysql();

    $usuario_existe = false;

    $sql = "SELECT * FROM usuarios WHERE usuario = '$usuario' ";

    if($resultado_id = mysqli_query($link, $sql)){
        $dados_usuario = mysqli_fetch_array($resultado_id);

        if (isset($dados_usuario['usuario'])) {
            $usuario_existe = true;
        }
    }else {
        echo 'Erro ao tentar localizar o regsitro de usuário';
    }
    
    if ($usuario_existe) {
        $retorno_get = '';

        if ($usuario_existe) {
            $retorno_get.="erro_usuario=1&";
        }
        header('Location: ../cadastro.php?'.$retorno_get);
        die();
    } 
    
	$sqli = " insert into usuarios(usuario, senha) values('$usuario', '$senha')";
	
	if (mysqli_query($link, $sqli)){
		echo"<script>
				alert('Usuário cadastrado com sucesso!!'); window.location = '../index.php';
			</script>";
	} else{
		echo 'Erro ao registrar usuário !';
	}
?>
<?php
	session_start();
	require_once ('db.class.php');
	$usuario = $_POST['usuario'];
	$senha = md5($_POST['senha']);
	
	$sql = " SELECT * FROM usuarios WHERE usuario = '$usuario ' AND senha = '$senha' ";

	$objDB = new db();
	$link = $objDB-> conecta_mysql();
	
	$resultado_id = mysqli_query($link, $sql);
	
	if ($resultado_id) {		
		$dados_usuario = mysqli_fetch_array($resultado_id);

		if (isset($dados_usuario['usuario'])) {
			$_SESSION['usuario'] = $dados_usuario['usuario'];
			header('location: ../lista_artistas.php');
		} else {
			header('location: ../login.php?erro=1');
		}		
	} else {
		echo 'Erro na execução da consulta, contactar o administrador do site!';
	}
?>
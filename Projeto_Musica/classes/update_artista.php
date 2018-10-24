<?php
    session_start();

    if(!isset($_SESSION['usuario'])){
        header('Location: index.php?erro=1');
    }

    require_once('db.class.php');

    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $twitter = $_POST['twitter'];

    if($nome == '' || $twitter == ''){
        // parando a execução
        die();
    }

    $objDB = new db();
    $link = $objDB->conecta_mysql();

    $sql = "UPDATE artistas set nome = '$nome', twitter = '$twitter' where id = '$id' " ;

    if (mysqli_query($link, $sql)){
        echo"<script>
                alert('Artista atualizado com sucesso!!'); window.location = '../lista_artistas.php';
            </script>";
    } else{
        echo 'Erro ao atualizar artista !';
    }
?>
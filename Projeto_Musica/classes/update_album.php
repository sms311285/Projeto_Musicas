<?php
    session_start();

    if(!isset($_SESSION['usuario'])){
        header('Location: index.php?erro=1');
    }

    require_once('db.class.php');

    $id = $_POST['id'];
    $nome_album = $_POST['nome_album'];
    $ano = $_POST['ano'];

    if($nome_album == '' || $ano == ''){
        die();
    }

    $objDB = new db();
    $link = $objDB->conecta_mysql();

    $sql = "UPDATE album set nome_album = '$nome_album', ano = '$ano' where id = '$id' " ;

    if (mysqli_query($link, $sql)){
        echo"<script>
                alert('Álbum atualizado com sucesso!!'); window.location = '../lista_albuns.php';
            </script>";
    } else{
        echo 'Erro ao atualizar artista !';
    }
?>
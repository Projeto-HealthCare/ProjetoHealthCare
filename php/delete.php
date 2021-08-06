<?php
    session_start();
    if(!isset($_SESSION['logado'])){
        echo "<script language='javascript' type='text/javascript'>
            alert('É necessário realizar Login!');
            window.location.href='../views/DadosSite/Login.html';
            </script>";
    }

    $id = $_SESSION['logado'];
    require("./connection.php");
    $bd->query("DELETE FROM usuario WHERE id_usuario = '$id'");
    echo "<script language='javascript' type='text/javascript'>
        alert('Conta excluida com sucesso!');
        window.location.href='../views/DadosSite/Login.html';
        </script>";

?>
<?php 
    session_start();
    if(!isset($_SESSION['logado'])){
        echo "<script language='javascript' type='text/javascript'>
              alert('É necessário realizar Login!');
              window.location.href='../DadosSite/Login.html';
             </script>";
    }

    $newEmail = $_POST['email'];
    $confSenha= $_POST['senha'];
    $id = $_SESSION['logado'];

    if($confSenha == $_SESSION['senha']){
        require("./connection.php");
        $rs = $bd->prepare("UPDATE usuario SET email=? WHERE id_usuario=?");
        $rs->bindParam(1,$newEmail);
        $rs->bindParam(2,$id);
        $rs->execute();
        echo "<script language='javascript' type='text/javascript'>
            alert('Email modificado com sucesso!');
            window.location.href='../views/DadosSite/Perfil.php';
            </script>";
    }
    else{
        echo "<script language='javascript' type='text/javascript'>
            alert('Senha inválida!');
            window.location.href='../views/DadosSite/Perfil.php';
            </script>";
    }
?>
<?php 
    session_start();
    if(!isset($_SESSION['logado'])){
        echo "<script language='javascript' type='text/javascript'>
              alert('É necessário realizar Login!');
              window.location.href='../DadosSite/Login.html';
             </script>";
    }

    $newTelefone = $_POST['telefone'];
    $confSenha= $_POST['senha'];
    $id = $_SESSION['logado'];


    if($confSenha == $_SESSION['senha']){
        require("./connection.php");
        $rs = $bd->prepare("UPDATE usuario SET telefone=? WHERE id_usuario=?");
        $rs->bindParam(1,$newTelefone);
        $rs->bindParam(2,$id);
        $rs->execute();
        echo "<script language='javascript' type='text/javascript'>
            alert('Telefone modificado com sucesso!');
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
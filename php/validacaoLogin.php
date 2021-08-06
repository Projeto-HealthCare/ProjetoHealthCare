<?php

    session_start();
    
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $_SESSION['logado'] = NULL;

    $senha = hash("md5",$senha);
    

    if (isset($email) && isset($senha)) {

        require('./connection.php');

        $sql = "SELECT id_usuario FROM usuario WHERE email = '$email' AND senha = '$senha'";
        foreach($bd->query($sql) as $row){
            $id_usuario = $row['id_usuario'];
        }

        if(isset($id_usuario)){
            $_SESSION['logado'] = $id_usuario;
            $_SESSION['email'] = $email;
            $_SESSION['senha'] = $_POST['senha'];
            header("Location: ../views/DadosSite/Perfil.php");
        } 
        else {
            echo"<script language='javascript' type='text/javascript'>
                alert('Email e/ou senha incorretos');
                window.location.href='../views/DadosSite/Login.html';</script>";
        }

    }

?>
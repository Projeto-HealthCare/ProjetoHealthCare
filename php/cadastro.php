<?php 

	try{
		require("./connection.php");
		$nome = $_POST["nome_completo"];
		$dataNascimento = $_POST["data_nascimento"];
		$telefone = $_POST["telefone"];
		$email = $_POST["email"];
		$senha = $_POST["senha"];

		$senha = hash("md5",$senha);

		$rs = $bd->prepare("INSERT INTO usuario (nome_completo,data_nascimento,telefone,email,senha) VALUES (?,?,?,?,?)");

		$rs->bindParam(1,$nome);
		$rs->bindParam(2,$dataNascimento);
		$rs->bindParam(3,$telefone);
		$rs->bindParam(4,$email);
		$rs->bindParam(5,$senha);
		$rs->execute();

		echo"<script language='javascript' type='text/javascript'>
				alert('Cadastro realizado com sucesso!');
				window.location.href='../views/DadosSite/Login.html';
			</script>";
	}catch(error $e){
		echo"<script language='javascript' type='text/javascript'>
				alert('Erro ao realizar o cadastro');
				window.location.href='../views/DadosSite/Login.html';
			</script>";
	}
	
?>
<?php 

  session_start();
  session_destroy();
  header("Location: ../views/DadosSite/Login.html");  

?>
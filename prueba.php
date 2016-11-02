<?php

session_start();
if(!isset($_SESSION["coordinador"])){
  header("location:index.php");
}

echo "hola prueba"

?>
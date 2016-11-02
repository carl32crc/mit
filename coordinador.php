<?php

session_start();
if(!isset($_SESSION["coordinador"])){
  header("location:index.php");
}

echo '<h1 align=center>Bienvenido\a coordinador\a:'.$_SESSION["coordinador"].'</h1>';
echo '<p align=center><a href="prueba.php">Hola</a></p>';
echo '<p align=center><a href="logout.php">Logout</a></p>';

?>
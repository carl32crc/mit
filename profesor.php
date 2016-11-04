<?php
require('functions.php');
session_start();
if(!isset($_SESSION["profesor"])){
  header("location:index.php");
}

echo '<h1 align=center>Bienvenido\a profesor\a:'.$_SESSION["profesor"].'</h1>';
echo '<p align=center><a href="index.php?action=logout">Logout</a></p>';

?>
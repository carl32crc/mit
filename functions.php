<?php

function connectDB(){
	$servidor = "localhost";
	$usuario  = "webmonkey";
	$pass     = "12345aA";
	$DB       = "universidad";
	$connect  = mysqli_connect($servidor,$usuario,$pass,$DB);

	return $connect;
}

function logout(){
	session_start();
	session_destroy();
	header("location:index.php");
}
/*
type: 
	1 => alumno
	2 => professor
	3 => secretaria
*/

function getMenu($type, $connect){
	$consulta = "SELECT nombre, url FROM menu WHERE tipo_usuario = '$type'";

	$result = mysqli_query($connect, $consulta);
	echo '<ul>';
	foreach ($result as $line) {
		echo'<li><a class="action" href="'.$line['url'].'">'.$line['nombre'].'</a></li>';
	}
	echo '</ul>';
}
?>
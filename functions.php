<?php

function connectDB(){
	$servidor = "localhost";
	$usuario  = "webmonkey";
	$pass     = "12345aA";
	$DB       = "universidad";
	$connect = mysqli_connect($servidor,$usuario,$pass,$DB);

	return $connect;
}



?>
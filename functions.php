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

function getHeader(){
	echo '<header>
            <img class="logo" src="images/mit.png">
            <div id="title">
              Massachusetts Institute of Technology
          	</div>
      </header>';
}

function footer(){
	echo "<footer><span> © MIT, 2016-2017</span></footer>";
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
	$cont = 0;

	echo '	<section class="left-bar">
				<div class="profile">
					<img class="user" alt="foto-perfil" src="images/user.png">
					<p class="user-name">Bienvenido/a: '.$_SESSION['alumno'].'</p>
				</div>
				<ul id="menu">';
					foreach ($result as $line) {
							$cont++;
							if($cont===1){
								echo '<li><a class="action active" href="'.$line['url'].'" >'.$line['nombre'].'</a></li>';
							}else{
								echo '<li><a class="action" href="'.$line['url'].'" >'.$line['nombre'].'</a></li>';
							}
						}
				echo '</ul>
			</section>';
	}
?>
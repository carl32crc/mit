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
	echo "<footer><span>Copy Right © MIT</span></footer>";
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

	echo'<div id="user_perfil">
	  		<img alt="Foto_perfil" src="img/user.png"></br></br>
			<div id="user_propieties">
				<div id="user_name">'.$_SESSION['alumno'].'</div></br>
			    <div id="user_menu">
			    	<ul>';
						foreach ($result as $line) {
							echo'<li><a class="action" href="'.$line['url'].'">'.$line['nombre'].'</a></li>';
						}
			        echo '</ul>
			    </div>
			</div>
		</div>';
}

?>
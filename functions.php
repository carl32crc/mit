<?php
//BASE DE DATOS: start

//Se connecta a la base de datos
function connectDB(){
	$servidor = "localhost";
	$usuario  = "webmonkey";
	$pass     = "12345aA";
	$DB       = "universidad";
	$connect  = mysqli_connect($servidor,$usuario,$pass,$DB);

	return $connect;
}
/*
Selecciona la información que le pidas de la base de datos.
PARAMETROS:
	connect (variable que retorna connectDB), 
	arg (los argumentos que quieres que retorne),
	table (las tablas de donde quieres que saque la info),
	where (en caso que quieras poner un where añadelo, sino dejalo en blanco o en NULL)
 */
function select($connect, $arg, $table, $where = null){
	$sql = "SELECT {$arg} FROM {$table}";
	if ($where === null) {
		$sql .= ';';
	}
	else{
		$sql .= " WHERE {$where};";
	}
	$result = mysqli_query($connect, $sql);
	return $result;
}
//BASE DE DATOS: end

//SELECT: start

//devuelve todas las asignaturas que el usuario esta impartiendo PARAMETROS: nombre (nombre del usuario) y connect (variable que retorna connectDB)
function getAsignaturasI($nombre, $connect){
	$result = select($connect, 'a.descripcion as asignatura, a.codigo as codigo', 'imparte i, profesores p, asignaturas a', 'i.dni = p.dni AND a.codigo = i.asignatura AND p.nombre = "'.$nombre.'"');
	return $result;
}
//devuelve todas las asignaturas que el usuario esta preparando PARAMETROS: nombre (nombre del usuario) y connect (variable que retorna connectDB)
function getAsignaturasP($nombre, $connect){
	$result = select($connect, 'a.descripcion as asignatura, a.codigo as codigo', 'prepara i, profesores p, asignaturas a', 'i.dni = p.dni AND a.codigo = i.asignatura AND p.nombre = "'.$nombre.'"');
	return $result;
}
//devuelve toda la información de la asignatura PARAMETROS: nombre (codigo de la asignatura) y connect (variable que retorna connectDB)
function getAsignatura($code, $connect){
	$result = select($connect, '*', 'asignaturas', 'codigo = "'.$code.'"');
	$row = mysqli_fetch_array($result);

	return $row;
}
//devuelve del id del alumno PARAMETROS: nombre (nombre del alumno) y connect (variable que retorna connectDB)
function getAlumnoId($nombre, $connect){
	$result = select($connect, 'id_alumno as id', 'alumnos', 'nombre = "'.$_SESSION['nombre'].'" LIMIT 1');
	$row = mysqli_fetch_array($result);

	return intval($row['id']);
}

//SELECT: end

//Desloguea al usuario
function logout(){
	session_start();
	session_destroy();
	header("location:index.php");
}
//Retorna el header
function getHeader($ruta = null){
	if ($ruta == null) {
		echo '<header>
            <img class="logo" src="'.$ruta.'images/mit.png">
            <div id="title">
              Massachusetts Institute of Technology
          	</div>
      </header>';
	}
	else{
		echo '<header>
			<a id="cd-menu-trigger" href="#0"><span class="cd-menu-text">Menu</span><span class="cd-menu-icon"></span></a>
            <img class="logo" src="'.$ruta.'images/mit.png">
            <div id="title">
              Massachusetts Institute of Technology
          	</div>
    	</header>';
		
	}
}
//Retorna el footer
function footer(){
	echo "<footer><div style='float: left; text-align: left;'>Alumne: anna@gmail.com / sarria<br>Professor: manuel@gmail.com / 12345aA<br>Coordinador: gomez@gmail.com / 12345aA</div><span> © MIT, 2016-2017</span></footer>";
}
/*
type: 
	1 => alumno
	2 => professor
	3 => secretaria
*/
//Retorna el menú según el usuario
function getMenu($type, $connect){
	$consulta = "SELECT nombre, url FROM menu WHERE tipo_usuario = '$type'";

	$result = mysqli_query($connect, $consulta);
	$cont = 0;			
			echo '<nav id="cd-lateral-nav">
			<ul class="cd-navigation">
			<div class="profile">
				<img class="user" alt="foto-perfil" src="https://www.buira.org/assets/images/shared/default-profile.png">
				<p class="user-name">Bienvenido/a:'.$_SESSION["nombre"].'</p>
			</div>
			<ul class="cd-navigation cd-single-item-wrapper">';
				foreach ($result as $line) {
					$cont++;
					$url = $line['url'];
					if(strpos($_SERVER['REQUEST_URI'], $line['url']) !== false){
						echo '<li><a class=" active" href="'.$line['url'].'" >'.$line['nombre'].'</a></li>';
					}
					elseif(substr($_SERVER['REQUEST_URI'], -1) == '/' && $line['url'] == 'index.php'){
						echo '<li><a class=" active" href="'.$line['url'].'" >'.$line['nombre'].'</a></li>';
					}
					else{
						echo '<li><a href="'.$line['url'].'" >'.$line['nombre'].'</a></li>';
					}
				}
				echo '</ul>';
				if($type == 2){
					$result = getAsignaturasP($_SESSION["nombre"], $connect);
					echo '<li class="item-has-children">
					<a href="#0">Preparando</a>
					<ul class="sub-menu">';
					foreach ($result as $asignaturas) {
						echo '<li><a href="preparadas.php?a='.$asignaturas['codigo'].'">'.$asignaturas['asignatura'].'</a></li>';
					}
					echo '</ul></li>
					<li class="item-has-children">	
					<a href="#0">Impartiendo</a>
					<ul class="sub-menu">';
					$result = getAsignaturasI($_SESSION["nombre"], $connect);
					foreach ($result as $asignaturas) {
						echo '<li><a href="impartidas.php?a='.$asignaturas['codigo'].'">'.$asignaturas['asignatura'].'</a></li>';
					}
					echo '</ul></li>';
				}
				echo '<ul class="cd-navigation cd-single-item-wrapper">
				<li><a href="#0">Configuración</a></li>
				<li><a href="/mit/index.php?action=logout">Logout</a></li>
				</ul> <!-- cd-single-item-wrapper -->
				</nav>';
	}

?>
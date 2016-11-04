<?php
	session_start();
	include 'sesions.php';
	if (isset($_SESSION['email'])) {
		echo '<script>windows.location="alumnos/espacioalumno.php"</script>';
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	
	<form  action="sesions.php" method="post">

		<input name="email" type="text" placeholder="Email" />
		<input name="psw"  type="password" placeholder="Contraseña" />
		<input type="submit" value="acceder" class="enviar">

	</form>
</body>
</html>

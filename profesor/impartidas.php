<?php

session_start();
if(!isset($_SESSION["nombre"])){
  header("location:index.php");
}
require('../functions.php');
$connect = connectDB();
$asignatura = getAsignatura($_GET['a'], $connect);

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Impartidas</title>
	<meta charset="UTF-8">
	
	<link rel="stylesheet" href="../css/reset.css"> <!-- CSS reset -->
	<link rel="stylesheet" type="text/css" href="../css/menu.css">
    <link href="../css/styleLoginPage.css" rel="stylesheet" type="text/css" type="text/css">
	<link href="../css/styleTableAndMenu.css" rel="stylesheet" type="text/css" >
	
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script src="../js/main.js"></script> <!-- Resource jQuery -->
    
	<!--JTABLES: start-->
	<link href="../themes/redmond/jquery-ui-1.8.16.custom.css" rel="stylesheet" type="text/css" />
	<link href="../scripts/jtable/themes/lightcolor/blue/jtable.css" rel="stylesheet" type="text/css" />
    <script src="../scripts/jquery-ui-1.8.16.custom.min.js" type="text/javascript"></script>
    <script src="../scripts/jtable/jquery.jtable.js" type="text/javascript"></script>
	<!--JTABLES: end-->
    
</head>
<body>
	
	<?php 
	getHeader('../');
	?>
	<div id="general" class="cd-main-content">
		<section class="profile-content" >
			<h1 class="page-header">Asignatura preparada: <?=$asignatura['descripcion']?></h1>
			<div id="PeopleTableContainer"></div>
		</section>
	</div>
	<?php
		getMenu(2, $connect);
		echo $_SESSION['type'];
		footer();
	?>
</body>
<script type="text/javascript">
	$(document).ready(function () {
		var materia = '<?=$asignatura['codigo']?>';
		
		$('#PeopleTableContainer').jtable({
			title: 'Tabla de Alumnos',
			paging: true,
			pageSize: 2,
			sorting: true,
			//ALERTA!!!!! CAMBIAR ESTO PARA QUE FUNCIONE!
			defaultSorting: 'nombre ASC',
			actions: {
				listAction: 'actions.php?action=list&materia='+materia,
				updateAction: 'actions.php?action=update&materia='+materia
			},
			fields: {
				id_alumno: {
					key: true,
					create: false,
					edit: false,
					list: false
				},
				nombre: {
					title: 'Nombre',
					width: '20%'
				},
				apellidos: {
					title: 'Apellido',
					width: '20%'
				},
				nota: {
					title: 'Nota',
					width: '20%'
				}
			}
		});

		//Load person list from server
		$('#PeopleTableContainer').jtable('load');

		});
</script>
</html>
<?php

session_start();
if(!isset($_SESSION["alumno"])){
  header("location:index.php");
}
require('functions.php');
// echo '<h1 align=center>Bienvenido\a alumno\a:'.$_SESSION["alumno"].'</h1>';
// echo '<p align=center><a href="index.php?action=logout">Logout</a></p>';

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Alumno</title>
	<link href="themes/redmond/jquery-ui-1.8.16.custom.css" rel="stylesheet" type="text/css" />
	<link href="scripts/jtable/themes/lightcolor/blue/jtable.css" rel="stylesheet" type="text/css" />
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"  
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous" />
	
    <link href="css/styleLoginPage.css" type="text/css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="css/styleTableAndMenu.css">
	<script src="scripts/jquery-1.6.4.min.js" type="text/javascript"></script>
    <script src="scripts/jquery-ui-1.8.16.custom.min.js" type="text/javascript"></script>
    <script src="scripts/jtable/jquery.jtable.js" type="text/javascript"></script>
    
</head>
<body>
	
	<?php 
	getHeader();
	?>
	<div id="general">
		<?php
		$connect = connectDB();
		getMenu(1, $connect);

		?>
		<section class="profile-content" >
			<h1 class="page-header">Tabla de Notas</h1>
			<div id="PeopleTableContainer"></div>
		</section>
	</div>
	<?php
		footer();
	?>
</body>
<script type="text/javascript">


		$(document).ready(function () {

			$('#PeopleTableContainer').jtable({
				title: 'Tabla de tus notas',
				paging: true,
				pageSize: 2,
				sorting: true,
				defaultSorting: 'descripcion ASC',
				actions: {
					listAction: 'alumnoActions.php?action=list',
				},
				fields: {
					id_alumno: {
						key: true,
						create: false,
						edit: false,
						list: false
					},
					descripcion: {
						title: 'Asignatura',
						width: '20%'
					},
					codigo: {
						title: 'Codigo',
						width: '20%'
					},
					convoc: {
						title: 'Convocatoria',
						width: '20%'
					},
					nota: {
						title: 'Nota',
						width: '20%'
					},
					baixa: {
						title: 'Baja',
						width: '20%'
					}
				}
			});

			//Load person list from server
			$('#PeopleTableContainer').jtable('load');

		});

	</script>
</html>
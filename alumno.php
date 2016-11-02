<?php

session_start();
if(!isset($_SESSION["alumno"])){
  header("location:index.php");
}

echo '<h1 align=center>Bienvenido\a alumno\a:'.$_SESSION["alumno"].'</h1>';
echo '<p align=center><a href="logout.php">Logout</a></p>';

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Alumno</title>
<link href="themes/redmond/jquery-ui-1.8.16.custom.css" rel="stylesheet" type="text/css" />
	<link href="scripts/jtable/themes/lightcolor/blue/jtable.css" rel="stylesheet" type="text/css" />
	
	<script src="scripts/jquery-1.6.4.min.js" type="text/javascript"></script>
    <script src="scripts/jquery-ui-1.8.16.custom.min.js" type="text/javascript"></script>
    <script src="scripts/jtable/jquery.jtable.js" type="text/javascript"></script>
</head>
<body>
	<div id="PeopleTableContainer"></div>
</body>
<script type="text/javascript">

		$(document).ready(function () {

		    //Prepare jTable
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
						title: 'Nombre Asignatura',
						width: '50%'
					},
					codigo: {
						title: 'Codigo Asignatura',
						width: '20%'
					},
					convoc: {
						title: 'Convocatoria',
						width: '10%'
					},
					nota: {
						title: 'Nota',
						width: '10%'
					},
					baixa: {
						title: 'Baja',
						width: '10%'
					}
				}
			});

			//Load person list from server
			$('#PeopleTableContainer').jtable('load');

		});

	</script>
</html>


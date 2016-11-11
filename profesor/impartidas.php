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
	<meta charset="UTF-8">
	<title>Preparadas</title>
	<link href="../themes/redmond/jquery-ui-1.8.16.custom.css" rel="stylesheet" type="text/css" />
	<link href="../scripts/jtable/themes/lightcolor/blue/jtable.css" rel="stylesheet" type="text/css" />
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"  
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous" />
	
    <link href="../css/styleLoginPage.css" type="text/css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="../css/styleTableAndMenu.css">
	<script src="../scripts/jquery-1.6.4.min.js" type="text/javascript"></script>
    <script src="../scripts/jquery-ui-1.8.16.custom.min.js" type="text/javascript"></script>
    <script src="../scripts/jtable/jquery.jtable.js" type="text/javascript"></script>
    
</head>
<body>
	
	<?php 
	getHeader('../');
	?>
	<div id="general">
		<?php
		getMenu(2, $connect);
		?>
		<section class="profile-content" >
			<h1 class="page-header">Asignatura preparada: <?=$asignatura['descripcion']?></h1>
			<div id="PeopleTableContainer"></div>
		</section>
	</div>
	<?php
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
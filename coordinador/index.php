<?php

session_start();
if(!isset($_SESSION["nombre"])){
  header("location:index.php");
}
require('../functions.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script src="../js/main.js"></script> <!-- Resource jQuery -->
	<link href="../themes/redmond/jquery-ui-1.8.16.custom.css" rel="stylesheet" type="text/css" />
	<link href="../scripts/jtable/themes/lightcolor/blue/jtable.css" rel="stylesheet" type="text/css" />
	
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="../css/reset.css"> <!-- CSS reset -->
	<link rel="stylesheet" type="text/css" href="../css/menu.css">
	<link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,600,700' rel='stylesheet' type='text/css'>
    
    <link href="../css/styleLoginPage.css" type="text/css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="../css/styleTableAndMenu.css">
	
	<script src="../scripts/jquery-1.6.4.min.js" type="text/javascript"></script>
    <script src="../scripts/jquery-ui-1.8.16.custom.min.js" type="text/javascript"></script>
    <script src="../scripts/jtable/jquery.jtable.js" type="text/javascript"></script>
	<script type="text/javascript" src="../js/modernizr.js"></script>
    
</head>
<body>
	
	<?php 
	getHeader('../');
	?>
	<div id="general" class="cd-main-content">
		<section class="profile-content" >
			<h1 class="page-header">Tabla de Notas</h1>
		</section>
	</div>
	<?php
		$connect = connectDB();
		getMenu(3, $connect);
		footer();
	?>
</body>
</html>
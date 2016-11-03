<?php
require('functions.php');
$args = array(0 =>
	array('text' => 'Hola',
		'url' => 'index.php'),
	array('text' => 'adeu',
		'url' => 'index.php'),
	);

$connect = connectDB();
getMenu(1, $connect);

//for menu in menus

?>


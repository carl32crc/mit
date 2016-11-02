<?php

try
{

	session_start();

	$idAlumno = $_SESSION["id_alumno"];

	$servidor = "localhost";
	$usuario  = "carl";
	$pass     = "prueba123";
	$DB       = "universidad";

	$connect = mysqli_connect($servidor,$usuario,$pass,$DB);

	if($_GET["action"] == "list"){


		$consulta = "SELECT alumno.id_alumno,asig.descripcion,m.codigo,m.convoc,m.nota,m.baixa,COUNT(*) as RecordCount 
					FROM matricula AS m INNER JOIN asignaturas as asig on asig.codigo = m.codigo 
					INNER JOIN alumnos AS alumno ON alumno.id_alumno=m.id_alumno WHERE alumno.id_alumno='$idAlumno'";

		$result = mysqli_query($connect, $consulta);
		$row = mysqli_fetch_array($result);
		$recordCount = $row['RecordCount'];


		$consulta = "SELECT alumno.id_alumno,asig.descripcion,m.codigo,m.convoc,m.nota,m.baixa 
					FROM matricula AS m INNER JOIN asignaturas as asig on asig.codigo = m.codigo 
					INNER JOIN alumnos AS alumno ON alumno.id_alumno=m.id_alumno WHERE alumno.id_alumno='$idAlumno'
					ORDER BY " . $_GET["jtSorting"] . " LIMIT " . $_GET["jtStartIndex"] . "," . $_GET["jtPageSize"] . ";";

		$result = mysqli_query($connect, $consulta);

		$rows = array();

		while($row = mysqli_fetch_array($result)){
			$rows[] = $row;
		}

		$jTableResult = array();
		$jTableResult['Result'] = "OK";
		$jTableResult['TotalRecordCount'] = $recordCount;
		$jTableResult['Records'] = $rows;
		print json_encode($jTableResult);
	}

	// $con = mysql_connect("localhost","carl","prueba123");
	// mysql_select_db("universidad", $con);

	//Getting records (listAction)
	// if($_GET["action"] == "list")
	// {

	// 	//Get record count
	// 	$result = mysql_query("SELECT alumno.id_alumno,asig.descripcion,m.codigo,m.convoc,m.nota,m.baixa,COUNT(*) as RecordCount 
	// 				FROM matricula AS m INNER JOIN asignaturas as asig on asig.codigo = m.codigo 
	// 				INNER JOIN alumnos AS alumno ON alumno.id_alumno=m.id_alumno WHERE alumno.id_alumno='$idAlumno'");

	// 	$row = mysql_fetch_array($result);
	// 	$recordCount = $row['RecordCount'];

	// 	//Get records from database
	// 	$result = mysql_query("SELECT alumno.id_alumno,asig.descripcion,m.codigo,m.convoc,m.nota,m.baixa 
	// 				FROM matricula AS m INNER JOIN asignaturas as asig on asig.codigo = m.codigo 
	// 				INNER JOIN alumnos AS alumno ON alumno.id_alumno=m.id_alumno WHERE alumno.id_alumno='$idAlumno' ORDER BY " . $_GET["jtSorting"] . " LIMIT " . $_GET["jtStartIndex"] . "," . $_GET["jtPageSize"] . ";");
		
	// 	//Add all records to an array
	// 	$rows = array();
	// 	while($row = mysql_fetch_array($result))
	// 	{
	// 	    $rows[] = $row;
	// 	}

	// 	//Return result to jTable
	// 	$jTableResult = array();
	// 	$jTableResult['Result'] = "OK";
	// 	$jTableResult['TotalRecordCount'] = $recordCount;
	// 	$jTableResult['Records'] = $rows;
	// 	print json_encode($jTableResult);
	// }


	mysqli_close($connect);

}
catch(Exception $ex)
{

	$jTableResult = array();
	$jTableResult['Result'] = "ERROR";
	$jTableResult['Message'] = $ex->getMessage();
	print json_encode($jTableResult);
}

?>

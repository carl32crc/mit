<?php

session_start();

$servidor = "localhost";
$usuario  = "carl";
$pass     = "prueba123";
$DB       = "universidad";

$connect = mysqli_connect($servidor,$usuario,$pass,$DB);

if(isset($_POST["email"]) && isset($_POST["pass"])){

  $email   = mysqli_real_escape_string($connect, $_POST["email"]);
  $pass    = mysqli_real_escape_string($connect, $_POST["pass"]);

  $consultaAlumnoSql  = "SELECT * FROM alumnos WHERE email = '$email' AND pwd='$pass'";
  $consultaProfesorSql  = "SELECT * FROM profesores WHERE email = '$email' AND psw='$pass'";
  $consultaCoordinadorSql  = "SELECT * FROM coordinadores WHERE email = '$email' AND psw='$pass'";
  
  $resultAlumnos  = mysqli_query($connect, $consultaAlumnoSql);
  $numRowAlumnos = mysqli_num_rows($resultAlumnos);

  $resultProfesores  = mysqli_query($connect, $consultaProfesorSql);
  $numRowProfesores = mysqli_num_rows($resultProfesores);

  $resultCoordinadores  = mysqli_query($connect, $consultaCoordinadorSql);
  $numRowCoordinadores = mysqli_num_rows($resultCoordinadores);
 
  if ($numRowAlumnos == "1") {
    $dataAlumno = mysqli_fetch_array($resultAlumnos);
    $_SESSION["alumno"] = $dataAlumno["nombre"];
    $_SESSION["id_alumno"] = $dataAlumno["id_alumno"];

    echo "1";
  }else if($numRowProfesores=="1"){
    $dataProfesor = mysqli_fetch_array($resultProfesores);
    $_SESSION["profesor"] = $dataProfesor["nombre"];

    echo "2";
  }else if($numRowCoordinadores=="1"){
    $dataCoordinador = mysqli_fetch_array($resultCoordinadores);
    $_SESSION["coordinador"] = $dataCoordinador["nombre"];

    echo "3";
  }else {
    echo "error";
  }
} else {
  echo "error";
}

?>

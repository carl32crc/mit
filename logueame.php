<?php
require('functions.php');

session_start();

$connect = connectDB();


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
    $_SESSION["nombre"] = $dataAlumno["nombre"];
    $_SESSION["type"] = 1;
    echo "1";

  } else if($numRowProfesores=="1"){

    $dataProfesor = mysqli_fetch_array($resultProfesores);
    $_SESSION["nombre"] = $dataProfesor["nombre"];
    $_SESSION["type"] = 2;
    echo "2";

  } else if($numRowCoordinadores=="1"){

    $dataCoordinador = mysqli_fetch_array($resultCoordinadores);
    $_SESSION["nombre"] = $dataCoordinador["nombre"];
    $_SESSION["type"] = 3;
    echo "3";

  } else {

    echo "error";

  }

} else {

  echo "error";

}

?>

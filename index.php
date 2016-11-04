<?php
require('functions.php');
if(isset($_GET["action"]) && $_GET["action"] == "logout"){
  logout();
}else{
  session_start();
  if (isset($_SESSION["alumno"])) {
    header("location:alumno.php");
  }
  if(isset($_SESSION["profesor"])){
    header("location:profesor.php");
  }
  if(isset($_SESSION["coordinador"])){
     header("location:coordinador.php");
  }
}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <script src="js/jquery-1.12.3.min.js" charset="utf-8"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" 
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/styleLoginPage.css">
  </head>
  <body>
    <?php
      getHeader();
    ?>
    <div class="container">
      <div class="row">
          <div class="col-md-6 col-md-offset-3">
              <div class="login-box">
                <form method="post">
                  <h1>ACCESO DE USUARIO</h1>
                  <div class="form-container-login">
                        <div class="form-group">
                        <div class="row">
                          <div class="col-sm-12">
                            <input type="text" name="email" id="email" class="form-control input input-lg" placeholder="Correo Electrónico">
                            <span class="glyphicon glyphicon-envelope form-control-feedback" aria-hidden="true"></span>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="form-group">
                          <div class="col-sm-12">
                            <input type="password" name="pass" id="pass" class="form-control input-lg" placeholder="Contraseña">
                            <span class="glyphicon glyphicon-lock form-control-feedback" aria-hidden="true"></span>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <input type="button" name="login" id="login" value="INICIA SESIÓN" class="btn btn-success btn-lg">
                      </div>
                      <span id="result"></span>
                  </div>
                </form>
             </div>
          </div>
        </div>
    </div>
    <?php
      footer();
    ?>
  </body>
</html>

<script src="js/login.js" charset="utf-8"></script>

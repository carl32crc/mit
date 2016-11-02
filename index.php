<?php

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

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <script src="js/jquery-1.12.3.min.js" charset="utf-8"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" 
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-md-offset-3">
          <form method="post">
            <br><br>
            <h1><p class="text-center">Login</p></h1>
            <br><br>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="text" name="email" id="email" class="form-control">
            </div>
            <div class="form-group">
              <label for="pass">Password</label>
              <input type="password" name="pass" id="pass" class="form-control">
            </div>
            <br><br>
            <div class="form-group">
              <input type="button" name="login" id="login" value="Login" class="btn btn-success">
            </div>
            <br>
            <span id="result"></span>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>

<script src="js/login.js" charset="utf-8"></script>

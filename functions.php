<?php

function connectDB(){
	$servidor = "localhost";
	$usuario  = "webmonkey";
	$pass     = "12345aA";
	$DB       = "universidad";
	$connect  = mysqli_connect($servidor,$usuario,$pass,$DB);

	return $connect;
}

function logout(){
	session_start();
	session_destroy();
	header("location:index.php");
}

function getHeader(){
	echo '<header>
            <img id="logo" src="images/mit.png">
            <div id="title">
              Massachusetts Institute of Technology
          	</div>
      </header>';
}

function footer(){
	echo "<footer><span>Copy Right © MIT</span></footer>";
}



?>
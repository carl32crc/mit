
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="stylePrueba.css">
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"  
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous" />
      <link href="css/styleLoginPage.css" type="text/css" rel="stylesheet" type="text/css">
	<link href="css/style.css" rel="stylesheet" type="text/css" />
	<script src="https://code.jquery.com/jquery-3.1.1.js" integrity="sha256-16cdPddA6VdVInumRGo6IbivbERE8p7CQR3HzTBuELA=" crossorigin="anonymous"></script>
</head>
<body>
	<?php 
		require('functions.php');
		getHeader();
	?>
	<section class="profile-content" >
		<h1>Tabla de Notas</h1>
	</section>
	<?php
		footer();
	?>
</body>
</html>
<script>


function showonlyone(thechosenone,url) {
      var triangle = document.getElementsByTagName("div");

            for(var x=0; x<triangle.length; x++) {
                  name = triangle[x].getAttribute("class");
                  if (name == 'triangle') {
                        if (triangle[x].id == thechosenone) {
                        triangle[x].style.display = 'block';
                        //window.location=url;
                  }
                  else {
                        triangle[x].style.display = 'none';
                  }
            }
      }
}
</script>
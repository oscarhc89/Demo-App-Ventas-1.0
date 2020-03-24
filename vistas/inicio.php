<?php 
	session_start();
	if(isset($_SESSION['usuario'])){
		
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>inicio</title>
	<?php require_once "menu.php"; ?>
</head>
<body>
<div class="container">
    <div class="panel">
      <div class="jumbotron text-center">
         <h1>Bienvenido a TECMEDICA C.A.</h1>
     
      </div>
    </div>
 </div>
</body>
</html>
<?php 
	}else{
		header("location:../index.php");
	}
 ?>
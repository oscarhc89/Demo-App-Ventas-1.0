<?php 
	
	require_once "clases/Conexion.php";
	$obj= new conectar();
	$conexion=$obj->conexion();
	$sql="SELECT * from usuarios where email='admin'";
	$result=mysqli_query($conexion,$sql);
	$validar=0;
	if(mysqli_num_rows($result) > 0){
		$validar=1;
	}
 ?>


<!DOCTYPE html>
<html>
<head>
	<title>Login de usuario</title>
	<link rel="stylesheet" type="text/css" href="librerias/bootstrap/css/bootstrap.min.css">
	<link href="librerias/bootstrap-glyphicons/bootstrap-glyphicons/css/bootstrap-glyphicons.min.css" rel="stylesheet" type="text/css"/>
</head>
<body style="background-color: blue">
	<br><br><br>
	<div class="container">
		<div class="row">
			<div class="col-sm-4"></div>
			<div class="col-sm-4">
				<div class="panel panel-primary">
					<h3 class="text-center text-info text-light">Sistema de Inventario TECMEDICA</h3>
						<p>
							<img src="img/tecmedica.jpg"  height="190">
						</p>
						<form id="frmLogin">
							<label>Usuario</label>
							<input type="text" class="form-control input-sm" name="usuario" id="usuario">
							<label>Password</label>
							<input type="password" name="password" id="password" class="form-control input-sm">
							<p></p>
							<span class="btn btn-primary btn-sm" type="submit" id="entrarSistema">Entrar</span>
							<?php function validaRequerido($validar){
								if($validar == ''){
									return false;
								}else{
									return true;
								}
							}
							?>
							<a href="registro.php" class="btn btn-danger btn-sm">Registrar</a>
							
						</form>
					</div>
				</div>
			</div>
			<div class="col-sm-4"></div>
		</div>
	</div>
</body>
<script src="librerias/jquery-3.4.1.min.js"></script>
<script src="js/funciones.js"></script>
</html>

<script type="text/javascript">
	$(document).ready(function(){
		$('#entrarSistema').click(function(){
		vacios=validarFormVacio('frmLogin');
			if(vacios > 0){
				alert("Debes llenar todos los campos!!");
				return false;
			}
		datos=$('#frmLogin').serialize();
		$.ajax({
			type:"POST",
			data:datos,
			url:"procesos/regLogin/login.php",
			success:function(r){
				if(r==1){
					window.location="vistas/inicio.php";
				}else{
					alert("No se pudo acceder :(");
				}
			}
		});
	});
	});
</script>
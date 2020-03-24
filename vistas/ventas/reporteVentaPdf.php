<?php 
	require_once "../../clases/Conexion.php";
	require_once "../../clases/Ventas.php";
	$objv= new ventas();
	$c=new conectar();
	$conexion= $c->conexion();	
	$idventa=$_GET['idventa'];
 $sql="SELECT ve.id_venta,
		ve.fechaCompra,
		ve.id_cliente,
		art.nombre,
        art.precio,
        art.descripcion
	from ventas  as ve 
	inner join articulos as art
	on ve.id_producto=art.id_producto
	and ve.id_venta='$idventa'";
$result=mysqli_query($conexion,$sql);
	$ver=mysqli_fetch_row($result);
	$folio=$ver[0];
	$fecha=$ver[1];
	$idcliente=$ver[2];
 ?>	

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Reporte de venta</title>
 	<link rel="stylesheet" type="text/css" href="../../librerias/bootstrap/css/bootstrap.css">
 </head>
 <body>
 		<img src="../../img/tec.jpg" width="200" height="200">
 		<br>
 		<table style="border-collapse: collapse;" border="2,5">
 			<tr>
 				<td>Fecha: <?php echo $fecha ?></td>
 			</tr>
 			<tr>
 				<td>Folio: <?php echo $folio ?></td>
 			</tr>
 			<tr>
 				<td>cliente: <?php echo $objv->nombreCliente($idcliente) ?></td>
 			</tr>
 		</table>


 		<table style="border-collapse: collapse;" border="2,5">
 			<tr>
 				<td>Nombre Producto</td>
 				<td>Precio</td>
 				<td>Cantidad</td>
 				<td>Descripcion</td>
 			</tr>

 			<?php 
 				$sql="SELECT ve.id_venta,
						ve.fechaCompra,
						ve.id_cliente,
						art.nombre,
				        art.precio,
				        art.descripcion
					from ventas as ve 
					inner join articulos as art
					on ve.id_producto=art.id_producto
					and ve.id_venta='$idventa'";
			$result=mysqli_query($conexion,$sql);
			$total=0;
			while($mostrar=mysqli_fetch_row($result)){
 			 ?>
			<tr>
 				<td><?php echo $mostrar[3] ?></td>
 				<td><?php echo $mostrar[4] ?></td>
 				<td>1</td>
 				<td><?php echo $mostrar[5] ?></td>
 			</tr>
 			<?php 
 				$total=$total + $mostrar[4];
 			}
 			?>
 			 <tr>
 			 	<td>Total=  <?php echo "$".$total ?></td>
 			 </tr>
 		</table>
 </body>
 </html>
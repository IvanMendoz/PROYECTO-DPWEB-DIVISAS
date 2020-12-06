<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src='https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.4/sweetalert2.all.js'></script>
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
	<title>Eliminar registro</title>
</head>
<body>
	
	<?php
	include($_SERVER['DOCUMENT_ROOT'].'/DIVISAS/include/config.inc');
	$conexion = mysqli_connect($server,$user,$password,$DB);
	mysqli_set_charset($conexion,"utf8");	
	if(isset($_REQUEST['cf'])){
		$Idpais=$_REQUEST['Id_pais'];



		$resultado=mysqli_query( $conexion, "select id_moneda from tblmonedas where id_pais=".$Idpais.";");
		if($fila=mysqli_fetch_row($resultado)){
			
			$idmone=$fila[0];
			$consulta="call EliminarMoneda($idmone);";
			$resultado=mysqli_query( $conexion, $consulta );
		}

		$consulta="call EliminarPais($Idpais);";
		//echo($consulta);
		
		$resultado=mysqli_query( $conexion, $consulta ) or die ( "No se puede eliminar el registro");
		if($resultado)
		{
		  echo ("El registo fue eliminado de forma satisfactoria.<br>");
		  header("Location:Mostra.php");
		}
		else
		{
		  echo ("Surgio un problema al momento de eliminar el registro.<br>");
		  echo ("El problema es:.<br>");
		  echo ("Codigo del error.<br>".mysql_errno()."</br><br>");
		  echo ("Descripcion del error.<br>".mysql_error()."</br><br>");	
		}
	}else if(isset($_REQUEST['Id_pais'])){
		echo 
				 '<script>
			

					swal({
						title: "Esta seguro que quiere borra estos datos?",
						text: "No los podrá recuperar!",
						type: "warning",
						showCancelButton: true,
						confirmButtonClass: "btn-danger",
						confirmButtonText: "SI!",
						cancelButtonText: "No!",
						closeOnConfirm: false,
						closeOnCancel: false
					}).then(function() {
						window.location = "eliminar.php?Id_pais='.$_REQUEST['Id_pais'].'&cf=1";
				  }).catch(function() {
					window.location = "Mostra.php";
			  });
  
  
			
	        	</script>';
	}


	

	// cerrar conexión de base de datos
	mysqli_close( $conexion );
	
?>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Almacenando y modificando</title>
	<script src='https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.4/sweetalert2.all.js'></script>
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
</head>
<body>
<?php
	include($_SERVER['DOCUMENT_ROOT'].'/DIVISAS/include/config.inc');
	
	$misql = mysqli_connect($server,$user,$password,$DB);
	mysqli_set_charset($misql,"utf8");
	
	    $Id_pais = $_POST["txtId_pais"];
		$nombre = $_POST["txtNombre"];
		
    
	

	$query = "call ModificarPais('$Id_pais ', '$nombre');";

	//echo $query;
	$consulta=$misql->query($query);

	if($consulta){
		echo 
	         	'<script>
	        		swal({
	          			title: "Buena trabajo",
	          			text: "Registro modificado correctamente!",
	          			type: "success",
	          			confirmButtonText: "Continuar"

	        		}).then(function() {
	          			window.location = "Mostra.php";
	        		});
	        	</script>';
	}
	else{
		echo 
            	'<script>
			        swal({
			          	title: "ERROR!",
			          	text: "No se pudo modificar .",
			          	type: "error"
			        }).then(function() {
			          	window.location = "Mostra.php";
			        });
			    </script>';
	}
  ?>
</body>
</html>
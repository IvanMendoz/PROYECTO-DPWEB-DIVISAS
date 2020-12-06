<html>
	<head>
		<title>Insertar datos de tabla con MySQL</title>
		<script src='https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.4/sweetalert2.all.js'></script>
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
	</head>
	<body >
		<h1>Insertando registros en la Base de Datos</h1>
		<?php

			include($_SERVER['DOCUMENT_ROOT'].'/DIVISAS/include/config.inc');
			$conexion = mysqli_connect($server,$user,$password,$DB);
			mysqli_set_charset($conexion,"utf8");
	
	        
			$nombre = $_POST["txtNombre"];
			
	
			//creando la consulta para insertar el registro
			$consulta = "call CrearPais('$nombre');";
			echo ($consulta);
			$EjecutarConsulta=mysqli_query( $conexion, $consulta ) or die ( "No se pudo insertar el registro");		

			if ($EjecutarConsulta)
			{ 
				echo 
	         	'<script>
	        		swal({
	          			title: "Buena trabajo",
	          			text: "datos insertados correctamente!",
	          			type: "success",
	          			confirmButtonText: "Continuar"

	        		}).then(function() {
	          			window.location = "Mostra.php";
	        		});
	        	</script>';
	
			}
			else
			{
				'<script>
	        		swal({
	          			title: "Algo salio mal",
	          			text: "datos no insertados!",
	          			type: "success",
	          			confirmButtonText: "Continuar"

	        		}).then(function() {
	          			window.location = "Mostra.php";
	        		});
	        	</script>';
			}			

			//liberando recursos y cerrando la BD;
			mysqli_close($conexion);
		?>

		<br><br><a href="index.html">Home</a>
		<br><br>
		
	</body>
</html>|


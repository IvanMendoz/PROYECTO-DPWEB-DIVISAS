<!DOCTYPE html>
<html lang="en">
<head>
		<title>Insertando...</title>
		<script src='https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.4/sweetalert2.all.js'></script>
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <style>
        body{
            background:#6EA7F5;
        }
    </style>
	</head>
	<body >
		
		<?php

			include('../../include/config.inc');
			$connecction = mysqli_connect($server,$user,$password,$DB);
			mysqli_set_charset($connecction,"utf8");
	
			$nombre = $_POST["txtNombreM"];
			$ValorLocal = $_POST["VL"];
            $ValorDollar = $_POST["VD"];
            $Pais = $_POST["slpais"];
            $id="";
            $query="select id_pais from tblpaises where nombre='$Pais'";
            $runQuery=mysqli_query( $connecction, $query);
            if ($runQuery)
			{
		  
				while ($row=mysqli_fetch_array($runQuery))
				{
					              
					$id=$row['id_pais'];
					
				}	
				
			}
			else
			{
				echo ("Surgio problema para Mostrar los registros.<br>");
				echo ("El problema es: .<br>");
				echo ("Codigo de error: .<b>".mysql_errno ()."</b><br>");
				echo ("Descripcion de error: <b>".mysql_error ()."</b><br>");
            }			
            $consulta="call CrearMoneda('$nombre','$ValorLocal','$ValorDollar','$id');";
            $resultado=mysqli_query( $connecction, $consulta);
            if ($resultado)
			{
				echo 
  '<script>
   swal({
       title: "Éxito",
       text: "Se inserto correctamente!",
       type: "success",
       confirmButtonText: "Continuar"

   }).then(function() {
       window.location = "MostrarMoneda.php";
   });
 </script>';
			}
			else
			{
				echo 
            	'<script>
			        swal({
			          	title: "ERROR!",
			          	text: "No se Inserto nada en la Base",
			          	type: "error",
			        }).then(function() {
			          	window.location = "MostrarMoneda.php";
			        });
			    </script>';
			}	
			
	//liberando recursos y cerrando la BD;
			mysqli_close($connecction);
		?>
		<br><br>
		
	</body>
</html>
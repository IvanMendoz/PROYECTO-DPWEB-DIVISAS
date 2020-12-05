<html>
	<head>
        <title>Mostrar datos de tabla con MySQL</title>
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
    //capturar el codigo a modificar
//cargar la connecction y octener la connecction activa $mysql
    include('../../include/config.inc');
    $connecction = mysqli_connect($server,$user,$password,$DB);
    mysqli_set_charset($connecction,"utf8");    
    $idMoneda=$_POST['id_moneda2'];
    $nombre = $_POST['txtnombre'];
    $ValorLocal = $_POST['txtVL'];
    $ValorDolar = $_POST['txtVD'];
    $idPais = $_POST['slpais'];
    $id="";
            $query="select id_pais from tblpaises where nombre='$idPais';";
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
	$query = "call ModificarMonedas('$idMoneda','$nombre','$ValorLocal','$ValorDolar','$id')";
	$runQuery=mysqli_query( $connecction, $query );		
    if ($runQuery)
			{
                echo 
                '<script>
                 swal({
                     title: "Éxito",
                     text: "Se Modificó correctamente!",
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
			          	text: "No se Modificó nada en la Base",
			          	type: "error",
			        }).then(function() {
			          	window.location = "MostrarMoneda.php";
			        });
			    </script>';
            }	
            mysqli_close($connecction); 

?>
   
</body>
</html>|
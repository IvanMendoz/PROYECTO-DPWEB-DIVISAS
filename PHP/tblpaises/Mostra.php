<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CDN DE BOOTSTRAP -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!-- CDN DE FONT AWESOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <!-- CDN DE FONT AWESOME -->
    <link rel="stylesheet" href="../../CSS/style.css">
    <link rel="stylesheet" href="CSS/estilos.css">
    <!-- LINKS DE REFERENCIA DE GOOGLE FONTS -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">
    <title>Mostrando paises</title>
</head>
<body>
<div class="containeer">
        <nav class="menu">
            <div class="menu-logo">
                <a href="../../index.html"> <img src="../../IMAGES/divisas7.png" alt="DIVISAS"> </a>
            </div>
            <div class="menu-button">
                <!-- MENU DROPDOWN PARA CONVERSION DE DIVISAS -->
                <div class="dropdown">
                    <button onclick="location.href ='../../index.html'" class="dropdown-btn">Pagina principal <i class="fas fa-home"></i></button>
                    <div class="dropdown-content">
                    <a href="../conversiones/conversion.php" class="">Realizar conversion <i class="fas fa-dollar-sign"></i></a>
                    <a href="../../integrantes.html" class="">Lista de integrantes <i class="fas fa-users"></i></a>
                    </div>
                </div>
                <!-- MENU DROPDOWN PARA MANTENIMIENTO DE LA TABLA PAISES -->
                <div class="dropdown">
                    <button style="background:#000;" class="dropdown-btn activee" href="#">Mantenimiento Paises <i class="fas fa-globe-americas"></i></button>
                    <div class="dropdown-content">
                        <a href="./InsertarRegistro.html" class="">Ingresar nuevo pais <i class="fas fa-table"></i></a>
                        <a href="./Mostra.php" class="" style="background:#3a3a3a; color:#fff;border-radius:9px;">Ver pasies existentes <i class="fas fa-list-ol"></i></a>
                        <a href="./Mostra.php" class="">Modificar pais existente <i class="fas fa-edit"></i></a>
                        <a href="./Mostra.php" class="">Eliminar pais existente <i class="fas fa-trash-alt"></i></a>
                    </div>
                </div>
                <!-- MENU DROPDOWN PARA MANTENIMIENTO DE LA TABLA MONEDAS -->
                <div class="dropdown">
                    <button class="dropdown-btn" href="#">Mantenimiento Monedas <i class="fab fa-bitcoin"></i></button>
                    <div class="dropdown-content">
                        <a href="../tblMonedas/insertarMoneda.php" class="">Ingresar nueva moneda <i class="fas fa-table"></i></a>
                        <a href="../tblMonedas/MostrarMoneda.php" class="">Ver monedas existentes <i class="fas fa-list-ol"></i></a>
                        <a href="../tblMonedas/MostrarMoneda.php" class="">Modificar moneda existente <i class="fas fa-edit"></i></a>
                        <a href="../tblMonedas/MostrarMoneda.php" class="">Eliminar moneda existente <i class="fas fa-trash-alt"></i></a>
                    </div>
                </div>
                <!-- MENU DROPDOWN PARA MANTENIMIENTO DE LA BASE -->
                <div class="dropdown">
                    <button class="dropdown-btn" href="#">Mantenimiento base de datos <i class="fas fa-database"></i></button>
                    <div class="dropdown-content">
                        <a href="../createDB.php" class="">Crear base de datos <i class="fas fa-database"></i></a>
                        <a href="../dropDB.php" class="">Eliminar base de datos <i class="fas fa-trash-alt"></i></a>
                    </div>
                </div>
                <!-- <a href="" class="btn">Realizar conversion <i class="fas fa-trash-alt"></i></a>
            
                <a href="" class="btn">Mantenimiento Paises <i class="fas fa-globe-americas"></i><a>
            
                <a href="" class="btn">Mantenimiento Monedas <i class="fab fa-bitcoin"></i></a> -->
            
            </div>
        </nav>
        <p>
            <span class="antes"></span><span class="despues"></span>
            <h1 style="text-align: center; margin:1em 0; font-weight:bold; color:#000;"> <span style="color:rgba(29, 3, 70, 0.8);"> Listado de paises almacenados</span> hasta este momento. <i class="fas fa-book"></i></h1>
        </p>
	<?php
			include($_SERVER['DOCUMENT_ROOT'].'/DIVISAS/include/config.inc');
			$conexion = mysqli_connect($server,$user,$password,$DB);
			mysqli_set_charset($conexion,"utf8");
			

			$query="call MostrarPais();";

			$runQuery=mysqli_query( $conexion, $query ) or die ( "No se pueden mostrar los registros");
					
			echo"<table width='100%' border='1' align='center'>";
			echo "<tr>";
			echo "<th>Id País</th><th>Nombre</th><th>Eliminar</th><th>Modificar</th>";
			echo "</tr>";

			while ($row=mysqli_fetch_array($runQuery))
				{
				echo "<tr>";
				echo "<td>",$row['Id_pais'],"</td>";				
				echo "<td>",$row['nombre'],"</td>";

				 echo "<td>"."<a class='btn' href='./eliminar.php?Id_pais=".$row['Id_pais']."'>Eliminar <i class='fas fa-trash-alt'></i></a>"."</td>";

                 echo "<td>"."<a class='btn' href='./modificar.php?Id_pais=".$row['Id_pais']."'>Modificar <i class='fas fa-edit'></i></a>"."</td>";
				
				
								
				echo "</tr>";
				}
			echo "</table>";
			
			// cerrar conexión de base de datos
			mysqli_close( $conexion );
         ?>
         <div class="santa">
        <img class="" src="../../IMAGES/navidad.gif" alt="">
    </div>
	</div>
	</body>
</html>
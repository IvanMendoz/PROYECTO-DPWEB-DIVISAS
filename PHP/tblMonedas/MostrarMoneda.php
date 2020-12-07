<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CDN DE BOOTSTRAP -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!-- CDN DE FONT AWESOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <!-- HOJAS DE ESTILOS CREADAS PROPIAMENTE -->
    <link rel="stylesheet" href="../../CSS/style.css">
    <link rel="stylesheet" href="CSS/estilos.css">
    <!-- LINKS DE REFERENCIA DE GOOGLE FONTS -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">
    <title>Mostrando Monedas</title>
</head>
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
                    </div>
                </div>
                <!-- MENU DROPDOWN PARA MANTENIMIENTO DE LA TABLA PAISES -->
                <div class="dropdown">
                    <button class="dropdown-btn" href="#">Mantenimiento Paises <i class="fas fa-globe-americas"></i></button>
                    <div class="dropdown-content">
                    <a href="../tblpaises/insertarRegistro.html" class="">Ingresar nuevo pais <i class="fas fa-table"></i></a>
                    <a href="../tblpaises/Mostra.php" class="">Ver pasies existentes <i class="fas fa-list-ol"></i></a>
                    <a href="../tblpaises/Mostra.php" class="">Modificar pais existente <i class="fas fa-edit"></i></a>
                    <a href="../tblpaises/Mostra.php" class="">Eliminar pais existente <i class="fas fa-trash-alt"></i></a>
                    </div>
                </div>
                <!-- MENU DROPDOWN PARA MANTENIMIENTO DE LA TABLA MONEDAS -->
                <div class="dropdown">
                    <button style="background:#000;" class="dropdown-btn activee" href="#">Mantenimiento Monedas <i class="fab fa-bitcoin"></i></button>
                    <div class="dropdown-content">
                        <a href="./insertarMoneda.php" class="">Ingresar nueva moneda  <i class="fas fa-table"></i></a>
                        <a href="./MostrarMoneda.php" class="" style="background:#3a3a3a; color:#fff;border-radius:9px;">Ver monedas existentes   <i class="fas fa-list-ol"></i></a>
                        <a href="./MostrarMoneda.php" class="">Modificar moneda existente <i class="fas fa-edit"></i></a>
                        <a href="./MostrarMoneda.php" class="">Eliminar moneda existente  <i class="fas fa-trash-alt"></i></a>
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
            <h1 style="text-align: center; margin:1em 0; font-weight:bold; color:#000;"> <span style="color:rgba(29, 3, 70, 0.8);"> Listado de monedas almacenadas</span> hasta este momento. <i class="fas fa-book"></i></h1>
        </p>
    <?php
        include('../../include/config.inc');
        $connecction = mysqli_connect($server,$user,$password,$DB);
        mysqli_set_charset($connecction,"utf8");
        $consulta = "call MostraMonedas;";
        $resultado=mysqli_query( $connecction, $consulta ) or die ( "No se puede Mostrar los registros");		

        if ($resultado)
        {
        echo"<table width='100%' border='1' align='center'>";
        echo "<tr>";
        echo "<th>id_moneda</th> <th>nombre</th> <th>valor local</th> <th>valor en dolar</th> <th>id_pais</th> <th>Eliminar<th/> Modificar";
        echo "</tr>";
            while ($row=mysqli_fetch_array($resultado))
            {
                echo "<tr>";                
                echo "<td>",$row['id_moneda'],"</td>";
                echo "<td>",$row['nombre'],"</td>";
                echo "<td>",$row['val_local'],"</td>";
                echo "<td>","$".$row['val_dolar'],"</td>"; 
                echo "<td>",$row['id_pais'],"</td>"; 
                echo "<td>"."<a class='btn' href='./eliminarMoneda.php?id_moneda=".$row['id_moneda']."'>Eliminar <i class='fas fa-trash-alt'></i></a>"."</td>";
                echo "<td>"."<a class='btn' href='./ModificarMoneda.php?id_moneda=".$row['id_moneda']."'>Modificar <i class='fas fa-edit'></i> </a>"."</td>";   
                echo "</tr>";
            }	
        }
        else
        {
            echo ("Surgio problema para Mostrar los registros.<br>");
            echo ("El problema es: .<br>");
            echo ("Codigo de error: .<b>".mysql_errno ()."</b><br>");
            echo ("Descripcion de error: <b>".mysql_error ()."</b><br>");
        }	
        echo ("</table>");
        //liberando recursos y cerrando la BD;
        mysqli_close($connecction);
    ?>
    <div class="santa">
        <img class="" src="../../IMAGES/navidad.gif" alt="">
    </div>
</div>

</body>
</html>
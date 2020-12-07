<DOCTYPE! html>
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
        <title>Monedas ingresadas</title>     
</head>
	<body >
    <div class="containeer">
        <nav class="menu">
            <div class="menu-logo">
                <a href="../../index.html"> <img src="../../IMAGES/divisas7.png" alt="DIVISAS"> </a>
            </div>
            <div class="menu-button">
                <!-- MENU DROPDOWN PARA CONVERSION DE DIVISAS -->
                <div class="dropdown">
                    <button onclick="location.href ='../../index.html'" class="dropdown-btn" >Pagina principal <i class="fas fa-home"></i></button>
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
                        <a href="./insertarMoneda.php" class="">Ingresar nueva moneda <i class="fas fa-table"></i></a>
                        <a href="./MostrarMoneda.php" class="">Ver monedas existentes <i class="fas fa-list-ol"></i></a>
                        <a href="./MostrarMoneda.php" class="" style="background:#3a3a3a; color:#fff;border-radius:9px;">Modificar moneda existente <i class="fas fa-edit"></i></a>
                        <a href="./MostrarMoneda.php" class="">Eliminar moneda existente <i class="fas fa-trash-alt"></i></a>
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
<?php
    //capturar el codigo a modificar
//cargar la conexion y octener la conexion activa $mysql
    include('../../include/config.inc');
    $conexion = mysqli_connect($server,$user,$password,$DB);
    mysqli_set_charset($conexion,"utf8");
    $idMoneda = $_REQUEST['id_moneda'];

    $query="call MostraMonedasPorId('$idMoneda');";
    $runQuery=$conexion->query($query);
    $row=$runQuery->fetch_assoc(); 
    
    mysqli_close($conexion);    
?>
    
    <div class="containeer-contenido">
        <div class="form-box">
            <form method = "post" name="frmvalor" action="./MonedaUpdate.php">
                <h2>Informacion del registro seleccionada</h2>

                <div class="">
                    <input type="text" name="id_moneda2" value="<?php echo $row['id_moneda'];?>" disabled required>
                    <input type="text" name="id_moneda2" style="display:none;" value="<?php echo $row['id_moneda'];?>">
                    <label for="">id moneda</label> 
                </div>
                <div class="">
                    <input type="text" name="txtnombre" value="<?php echo $row['nombre'];?>" minlength="3" required>
                    <label for="">Nombre</label>
                </div>
                <div class="">
                    <input type="number" name="txtVL" value="<?php echo $row['val_local'];?>" required min="0" step=".01">
                    <label for="">Valor local</label>
                </div>
                <div class="">
                    <input type="number" name="txtVD" value="<?php echo $row['val_dolar'];?>" required min="0" step=".01">  
                    <label for="">Valor en dolar</label> 
                </div>
                <?php
                    include('../../include/config.inc');
                    $conexion = mysqli_connect($server,$user,$password,$DB);
                    mysqli_set_charset($conexion,"utf8");
                    $id_moneda = $row['id_moneda'];
                    $consulta = "select nombre from tblpaises where Id_pais = '$id_moneda';";
                    $resultado=mysqli_query( $conexion, $consulta ) or die ( "No se puede Mostrar los registros");
                    if ($resultado)
                    {
                        echo "<div>";
                        echo"<span style = 'font-weight:500; font-size:17px;'>Seleccione el pais</span> <select name='slpais'>";
                        while ($row=mysqli_fetch_array($resultado))
                        {
                            
                            echo "<option>";
                            echo $row['nombre'];
                            echo "</option>";
                            
                            
                        }	
                        echo"</select>";
                        echo "</div>";
                    }
                    else
                    {
                        echo ("Surgio problema para Mostrar los registros.<br>");
                        echo ("El problema es: .<br>");
                        echo ("Codigo de error: .<b>".mysql_errno ()."</b><br>");
                        echo ("Descripcion de error: <b>".mysql_error ()."</b><br>");
                    }	
                    
                    echo "<br>";
                    echo "<br>";
                  
                    mysqli_close($conexion);
                ?>
                <div class="">
                    <input type="submit" name="btnModificar" value="Modificar" class="btn margin">
                </div>
        
            </form>
        </div>
        <div class="form-info">
            <h1>HOLIII</h1>
        </div>
    </div>
    </div>
</body>
</html>


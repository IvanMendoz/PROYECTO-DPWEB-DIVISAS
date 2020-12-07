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
    <!-- SCRIPTS PARA SWEETALERT -->
     <script src='https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.4/sweetalert2.all.js'></script>
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <title>Modificando pais</title>
</head>
<body>

<div class="containeer">
        <nav class="menu">
            <div class="menu-logo">
            <span class="fondo"></span><a href="../../index.html"> <img src="../../IMAGES/divisas7.png" alt="DIVISAS"> </a>
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
                    <button style="background:#000;" class="dropdown-btn activee" href="#">Mantenimiento Paises <i class="fas fa-globe-americas"></i></button>
                    <div class="dropdown-content">
                        <a href="./InsertarRegistro.html" class="">Ingresar nuevo pais <i class="fas fa-table"></i></a>
                        <a href="./Mostra.php" class="" >Ver pasies existentes <i class="fas fa-list-ol"></i></a>
                        <a href="./Mostra.php" class="" style="background:#3a3a3a; color:#fff;border-radius:9px;">Modificar pais existente <i class="fas fa-edit"></i></a>
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


<?php
     //capturar el codigo a modificar
     $Id_pais = $_REQUEST['Id_pais'];

     //cargar la conexion y octener la conexion activa $mysql
     include($_SERVER['DOCUMENT_ROOT'].'/DIVISAS/include/config.inc');

     $conexion = mysqli_connect($server,$user,$password,$DB);

     mysqli_set_charset($conexion,"utf8");


     $query="call MostrarPaisPorId('$Id_pais');";

     $consulta=$conexion->query($query);

     $row=$consulta->fetch_assoc(); 

     mysqli_close($conexion);    

 ?>

<div class="containeer-contenido">
    <div class="form-box">

        <form method = "post" name="frmvalor" action="almacenarmodificar.php" id="form">
        <h2>Informacion del registro seleccionado</h2>
            <div class="">
                <input type="text" name="txtId_pais" value="<?php echo $row['Id_pais'];?>" disabled required><br><br> 
                <input type="text" name="txtId_pais" style="display:none;" value="<?php echo $row['Id_pais'];?>">
                <label for="">Id pais</label>
            </div>
            <div class="">
                <input type="text" name="txtNombre" minlength="3" value="<?php echo $row['nombre'];?>" required><br><br>
                <label for="">Nombre pais</label>
            </div>
            <button onclick="f1()" class="btn" >Modificar</button>
        </form>

    </div>
    <div class="form-info">
        <div class="">
                <h2><span style="color:rgb(19, 23, 82);">Actualice registros</span> de manera rapida.</h2>
                <p style="font-size:19px; font-weight:bold">Almacene el nombre de cada pais para poder utilizarlos al momento de ingresar nuevas monedas y realizar conversiones.</p>
            </div>
            <p style="color:#000; font-weight:500" class="alerta"><span style="color:red; font-weight:bold">NOTA:</span> De preferencia escriba correctamente el nombre del pais <br> de esta manera se evitaran problemas. </p>
            <div class="">
                <img style="fill: none;" src="../../IMAGES/mundos.gif" alt="">
            </div>
    </div>
</div>
     </div>
</body>

<script>
 var f=document.getElementById("form");
function f1(){
          swal({
			title: 'Esta seguro que quiere borra estos datos?',
			text: 'No los podrá recuperar!',
			type: 'warning',
			showCancelButton: true,
			confirmButtonClass: 'btn-danger',
			confirmButtonText: 'SI!',
			cancelButtonText: 'No!',
			closeOnConfirm: false,
			closeOnCancel: false
		}).then(function() {
			f.submit();
          });
          
     }

</script>
</html>
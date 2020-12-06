<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CDN DE BOOTSTRAP -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!-- CDN DE FONT AWESOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <!-- CDN DE ESTILOS PROPIOS -->
    <link rel="stylesheet" href="../../CSS/style.css">
    <link rel="stylesheet" href="CSS/estilos.css">
    <!-- LINKS DE REFERENCIA DE GOOGLE FONTS -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">
    <title>Insertar Moneda</title>
</head>
<body>
<div class="containeer">
    <nav class="menu">
        <div class="menu-logo">
            <a href="index.html"> <img src="../../IMAGES/divisas7.png" alt="DIVISAS"> </a>
        </div>
        <div class="menu-button">
            <!-- MENU DROPDOWN PARA CONVERSION DE DIVISAS -->
            <div class="dropdown">
                <button onclick="location.href ='../../index.html'" class="dropdown-btn">Pagina principal <i class="fas fa-home"></i></button>
            <div class="dropdown-content">
            <a href="#" class="">Realizar conversion <i class="fas fa-dollar-sign"></i></a>
            </div>
            </div>
            <!-- MENU DROPDOWN PARA MANTENIMIENTO DE LA TABLA PAISES -->
            <div class="dropdown">
                <button class="dropdown-btn" href="#">Mantenimiento Paises <i class="fas fa-globe-americas"></i></button>
                <div class="dropdown-content">
                <a href="../tblpaises/insertarRegistro.html" class="">Ingresar nuevo pais <i class="fas fa-table"></i></a>
                <a href="../tblpaises/Mostra.php" class="">Ver pasies existentes <i class="fas fa-list-ol"></i></a>
                <a href="../tblpaises/modificar.php" class="">Modificar pais existente <i class="fas fa-edit"></i></a>
                <a href="#" class="">Eliminar pais existente <i class="fas fa-trash-alt"></i></a>
            </div>
        </div>
        <!-- MENU DROPDOWN PARA MANTENIMIENTO DE LA TABLA MONEDAS -->
        <div class="dropdown">
            <button class="dropdown-btn active" style="background:#000;" href="#">Mantenimiento Monedas <i class="fab fa-bitcoin"></i></button>
            <div class="dropdown-content">
                    <a href="./insertarMoneda.php" class="" style="background:#3a3a3a; color:#fff;border-radius:9px;">Ingresar nueva moneda <i class="fas fa-table"></i></a>
                    <a href="./MostrarMoneda.php" class="">Ver monedas existentes <i class="fas fa-list-ol"></i></a>
                    <a href="./ModificarMoneda.php" class="">Modificar moneda existente <i class="fas fa-edit"></i></a>
                    <a href="#" class="">Eliminar moneda existente <i class="fas fa-trash-alt"></i></a>
            </div>
        </div>
        <!-- MENU DROPDOWN PARA MANTENIMIENTO DE LA BASE -->
        <div class="dropdown">
            <button class="dropdown-btn" href="#">Mantenimiento base de datos <i class="fas fa-database"></i></button>
            <div class="dropdown-content">
            <a href="../createDB.php" class="">Crear base de datos <i class="fas fa-database"></i></a>
            <a href="../dropDB.php" class="">Eliminar base de datos <i class="fas fa-trash-alt"></i></a>
        </div>
    <!-- </div>
                <a href="" class="btn">Realizar conversion <i class="fas fa-trash-alt"></i></a>
            
                <a href="" class="btn">Mantenimiento Paises <i class="fas fa-globe-americas"></i><a>
            
                <a href="" class="btn">Mantenimiento Monedas <i class="fab fa-bitcoin"></i></a>
            
    </div> -->
    </nav>
    <div class="content-form">
        <div class="content-form-input">
            <form action="InsertarMone.php" method="post">
                <div class="">
                    <div>
                        <input class="input" type="text" autocomplete="off" name="txtNombreM" minlength="3" required>
                        <label for="txtNombreM" class="label-name">
                            <span class="content-name">Nombre moneda</span>
                        </label>
                    </div>
                    <div>
                        <input class="input" type="number" autocomplete="off" name="VL" step=".01" min="0" required>
                        <label for="VL" class="label-name">
                            <span class="content-name">Valor local</span>
                        </label>
                    </div>
                    <div>
                        <input class="input" type="number" autocomplete="off" name="VD" step=".01" min="0" required>
                        <label for="VD" class="label-name">
                            <span class="content-name">Valor dolar</span>
                        </label>
                    </div>
                    <select name="slpais" id="" required>
                        <option value="">Seleccione...</option>
                    <?php
                        include('../../include/config.inc');
                        $connecction = mysqli_connect($server,$user,$password,$DB);
                        mysqli_set_charset($connecction,"utf8");
                        $query = "select nombre from tblpaises;";
                        $runQuery=mysqli_query( $connecction, $query );
                        while ($row=mysqli_fetch_array($runQuery))
                        {
                    ?>
                            <option value="<?php echo $row['nombre']?>"><?php echo $row['nombre']?></option>
    
                    <?php
                        }
                    ?>
                    </select>
                    <?php	
    
                        include('../../include/config.inc');
                        $connecction = mysqli_connect($server,$user,$password,$DB);
                        mysqli_set_charset($connecction,"utf8");
    
                    
                        mysqli_close($connecction);
                    ?>
                    <p>
                        <input type="submit" value="Enviar">
                        <input type="reset" value="Cancelar">
                    </p>
                </div>
            </form>
        </div>

        <div class="content-form-information">
            
        <div class="slideshow">
        <div class="slides">
          <img src="https://d500.epimg.net/cincodias/imagenes/2015/03/13/mercados/1426251429_476349_1426251583_noticia_normal.jpg
          " alt="BERETTA" />
          <img src="../../IMAGES/divisas7.png" alt="BERETTA" />
          <img src="../../IMAGES/divisas7.png" alt="BERETTA" />
          <img src="../../IMAGES/divisas7.png" alt="BERETTA" />
          <img src="../../IMAGES/divisas7.png" alt="BERETTA" />
        </div>
      </div>
      <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
      <script src="JS/jquery.slides.js"></script>
      <script>
        $(function () {
          $(".slides").slidesjs({
            play: {
              active: true,
              // [boolean] Generate the play and stop buttons.
              // You cannot use your own buttons. Sorry.
              effect: "slide",
              // [string] Can be either "slide" or "fade".
              interval: 3000,
              // [number] Time spent on each slide in milliseconds.
              auto: true,
              // [boolean] Start playing the slideshow on load.
              swap: true,
              // [boolean] show/hide stop and play buttons
              pauseOnHover: false,
              // [boolean] pause a playing slideshow on hover
              restartDelay: 2500,
              // [number] restart delay on inactive slideshow
            },
          });
        });
      </script>
        </div>
    </div>
    </div>
</body>
</html>
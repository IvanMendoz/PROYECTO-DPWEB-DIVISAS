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
            <button class="dropdown-btn activee" style="background:#000;" href="#">Mantenimiento Monedas <i class="fab fa-bitcoin"></i></button>
            <div class="dropdown-content">
                    <a href="./insertarMoneda.php" class="" style="background:#3a3a3a; color:#fff;border-radius:9px;">Ingresar nueva moneda <i class="fas fa-table"></i></a>
                    <a href="./MostrarMoneda.php" class="">Ver monedas existentes <i class="fas fa-list-ol"></i></a>
                    <a href="./MostrarMoneda.php" class="">Modificar moneda existente <i class="fas fa-edit"></i></a>
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

    <!-- </div>
                <a href="" class="btn">Realizar conversion <i class="fas fa-trash-alt"></i></a>
            
                <a href="" class="btn">Mantenimiento Paises <i class="fas fa-globe-americas"></i><a>
            
                <a href="" class="btn">Mantenimiento Monedas <i class="fab fa-bitcoin"></i></a>
            
    </div> -->
    </nav>
    <div class="content-form">
        
        <div class="content-form-input">
            <div class="form-box">
                <form action="InsertarMone.php" method="post">
                    <div class="">
                        <div class="in">
                            <input type="text" name="txtNombreM" minlength="3" required>
                            <label class="">Nombre moneda</label>
                        </div>
                        <div class="in">
                            <input type="number" name="VL" step=".01" min="0" required>
                            <label class="">Valor local</label>
                        </div>
                        <div class="in">
                            <input type="number" name="VD" step=".01" min="0" required>
                            <label class="">Valor en dolar</label>
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
        </div>

        <div class="content-form-information">
            <div class="">
                <h2><span style="color:rgb(19, 23, 82);">Realice ahora</span> el cambio.</h2>
                <p style="font-size:19px; font-weight:bold">Solo almancene el valor de la equivalencia de cualquier moneda y cualquiera pais,<br>y uselas para siempre!!!.</p>
            </div>
        
            <div id="carouselExampleIndicators slide" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                    <img src="../../IMAGES/monedas1.jpg" class="d-block w-100" alt="DIVISAS">
                    </div>
                    <div class="carousel-item">
                    <img src="../../IMAGES/monedas3.jpg" class="d-block w-100" alt="DIVISAS">
                    </div>
                    <div class="carousel-item">
                    <img src="../../IMAGES/monedas4.png" class="d-block w-100" alt="DIVISAS">
                    </div>
                    <div class="carousel-item">
                    <img src="../../IMAGES/monedas5.jpg" class="d-block w-100" alt="DIVISAS">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
                </div>
            


            </div>
        </div>
    </div>



    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>
</html>
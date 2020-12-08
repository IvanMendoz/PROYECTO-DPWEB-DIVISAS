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
    <link rel="stylesheet" href="../../plugins/animate.css/animate.css">
    <link rel="stylesheet" href="../../plugins/sweetAlert2/sweetalert2.min.css">
    <!-- LINKS DE REFERENCIA DE GOOGLE FONTS -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">
    <!-- AJAX -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
    <script
  src="https://code.jquery.com/jquery-3.5.1.js"
  integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
  crossorigin="anonymous"></script>
  <!-- SWEETALERT -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.4/sweetalert2.all.js'></script>
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <title>Realizar conversion</title>
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
                    <button  style="background:#000;" onclick="location.href ='../../index.html'" class="dropdown-btn activee" >Pagina principal <i class="fas fa-home"></i></button>
                    <div class="dropdown-content">
                    <a href="./conversion.php" class="" style="background:#3a3a3a; color:#fff;border-radius:9px;">Realizar conversion <i class="fas fa-dollar-sign"></i></a>
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
    <script>
        <?php
            include('../../include/config.inc');
            $connecction = mysqli_connect($server,$user,$password,$DB);
            mysqli_set_charset($connecction,"utf8");
            $query = "select nombre from tblMonedas;";
            $runQuery=mysqli_query( $connecction, $query );
            while ($row=mysqli_fetch_array($runQuery))
            {
        ?>

        window.onload= () =>{

            eleccion();

            function eleccion(){
            ( async ()=>{
                const {value:monedas } = await Swal.fire({
                    type: 'success',
                    title:'Seleccione una moneda',
                    text: '<h6>Esta moneda se usara para realizar la conversion</h6>',
                    padding: '15px',
                    footer:'<h4>Es muy inportante</h4>',
                    confirmButtonText: "Seleccionar",
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    allowEnterKey:false,
                    stopKeydownPropagation:false,
                    input: 'select',
                    inputValue: '',
                    inputOptions: {
                    
                    <?php while ($row=mysqli_fetch_array($runQuery)){?>
                    '<?php echo $row['nombre']?>': '<?php echo $row['nombre']?>',
                    <?php
                        }
                    ?>

                    }
                });

                if(monedas){
                    console.log(monedas);
                }
                let valor = monedas;
                console.log(valor);
                document.getElementById('moneda').value = valor;
            })()};
        }
        <?php
            }
        ?>
    </script>

    <div class="containeer-contenido">
            <div class="form-box">
                <form  method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" class="" >
                    <h1>Conversion de moneda</h1>
                    <div class="">
                        <input type="text" style="" id="moneda" name="moneda" required disabled/>
                        <label for="" style="position:absolute; left:25px;">Moneda seleccionada</label>
                    </div>

                    <div class="">
                        <input type="number" name="cantidad" min="0.01" step=".01" id="cantidad" required>
                        <label for="" style="position:absolute; left:25px;">Cantidad a convertir</label>
                    </div>
                        <select name="opcion" id="" required>
        
                        <?php
                            include($_SERVER['DOCUMENT_ROOT'].'/DIVISAS/include/config.inc');
                            $conexion = mysqli_connect($server,$user,$password,$DB);
                            mysqli_set_charset($conexion,"utf8");
        
                            $moneda = $_POST["moneda"];
        
                            if($moneda == "dolar estadounidense"){
                                $query = "select nombre from tblMonedas where nombre = '$moneda';";
                                $runQuery = mysqli_query($conexion, $query);
                                while ($row = mysqli_fetch_array($runQuery)){
                            
                            ?>
                                <option style="color:#000;" value="<?php echo $row['nombre']?>">
                                    <?php echo $row['nombre']?>
                                </option>
                        <?php
                            }
                        }else{
                            $query = "select nombre from tblMonedas;";
                            $runQuery = mysqli_query($conexion, $query);
                            while ($row = mysqli_fetch_array($runQuery)){
                        ?>
                            <option value="<?php echo $row['nombre']?>">
                                <?php echo $row['nombre']?>
                            </option>
                        <?php
                        }
                    }
                        ?>
                        </select>
                        <p>
                            Seleccione la moneda a la cual desea convetir el valor:
                        </p>
                        <p>
                        <select name="conversion" id="" required>
                        <option value="">Seleccione moneda...</option>
                        <?php
                        
                            include($_SERVER['DOCUMENT_ROOT'].'/DIVISAS/include/config.inc');
                            $conexion = mysqli_connect($server,$user,$password,$DB);
                            mysqli_set_charset($conexion,"utf8");
        
        
                            $query = "select nombre from tblMonedas;";
                            $runQuery = mysqli_query($conexion, $query);
                            while ($row = mysqli_fetch_array($runQuery)){
        
                        ?>
        
                                <option value="<?php echo $row['nombre']?>">
                                    <?php echo $row['nombre']?>
                                </option>
        
                        <?php
                        
                            }
                        ?>
                        </select>
                        </p>
                        <div class="buttons">
                            <input type="submit" value="Convertir" name=submit class="">
                            <button type="button" class="btn" style="width:190px; border-bottom:2px solid rgb(102, 157, 219);" onclick="eleccion1();">Elegir otra moneda</button>
                        </div>
                </form>
                <!-- FIN DEL FORM-BOX -->
            </div>
            <div class="form-info">
                
         
        

        <?php

            include($_SERVER['DOCUMENT_ROOT'].'/DIVISAS/include/config.inc');
            $conexion = mysqli_connect($server,$user,$password,$DB);
            mysqli_set_charset($conexion,"utf8");
        
            if(isset($_POST['submit'])){
                $monedaSeleccionada = $_POST['opcion'];
                $monedaConversion = $_POST['conversion'];
                $cantidad = $_POST['cantidad'];
                $moneda = $_POST['moneda'];

            if($monedaSeleccionada ==  "dolar estadounidense"){
                $query = "select val_local from tblMonedas where nombre = '$monedaConversion'";
                $runQuery = mysqli_query( $conexion, $query );
                while ($row = mysqli_fetch_array( $runQuery)){
                    $valorLocal = $row['val_local'];
    
                }
    
                floatval($valorLocal);
                echo $monedaSeleccionada;
                echo "<h1>".$moneda."</h1>";
                echo $monedaConversion;
                echo $cantidad;
                echo "<br>".$valorLocal * $cantidad." ".$monedaConversion;
    
                echo "<h1>HOLAAAAA</h1>";

            }else{

                $query = "select val_local from tblMonedas where nombre = '$monedaSeleccionada'";
                $runQuery = mysqli_query($conexion, $query);
                while ($row = mysqli_fetch_array($runQuery)){
                    $valorLocal = $row["val_local"];
                }
                floatval($valorLocal);
                echo ($cantidad * 1)/$valorLocal;
                echo "<h1>PUTO :V</h1>";
                }
            }
        ?>
   </div>
        <!-- FIN DEL CONTAINEER-CONTENIDO -->
    </div>
    <!-- FIN DEL CONTAINEER -->
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    <script src="../../JS/sweetalert.js"></script>
    <script src="../../JS/jquery-3.3.1.min.js"></script>
    <script src="../../popper/popper.min.js"></script>
    <script src="../../plugins/sweetAlert2/sweetalert2.all.min.js"></script>


    <script>
        <?php
            include('../../include/config.inc');
            $connecction = mysqli_connect($server,$user,$password,$DB);
            mysqli_set_charset($connecction,"utf8");
            $query = "select nombre from tblMonedas;";
            $runQuery=mysqli_query( $connecction, $query );
            while ($row=mysqli_fetch_array($runQuery))
            {
        ?>
            function eleccion1(){
            ( async ()=>{
                const {value:monedas } = await Swal.fire({
                    type: 'success',
                    title:'Seleccione una moneda',
                    text: '<h6>Esta moneda se usara para realizar la conversion</h6>',
                    padding: '15px',
                    footer:'<h4>Es muy inportante</h4>',
                    confirmButtonText: "Seleccionar",
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    allowEnterKey:false,
                    stopKeydownPropagation:false,
                    input: 'select',
                    inputValue: '',
                    inputOptions: {
                    
                    <?php while ($row=mysqli_fetch_array($runQuery)){?>
                    '<?php echo $row['nombre']?>': '<?php echo $row['nombre']?>',
                    <?php
                        }
                    ?>
                    }
                });
                if(monedas){
                    console.log(monedas);
                }
                let valor = monedas;
                console.log(valor);
                document.getElementById('moneda').value = valor;
            })();
        }
        <?php
            }
        ?>
    </script>
</body>
</html>
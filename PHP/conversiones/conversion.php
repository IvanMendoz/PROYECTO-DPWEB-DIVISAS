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
            </div>
        </nav>
    <div class="containeer-contenido">
            <div class="form-box" style="display: flex; flex-flow:column nowrap; align-items:center; justify-content: center;">
                <form  method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" class="" id="lista"><br><br>
                    <h2>Conversion de moneda</h2><br>
                        <div>
                        <h6 style="font-weight:initial;">
                            Seleccione la moneda a la cual desea convetir el valor:
                        </h6>
                        <select name="conversion" id="sele" required>
                        <option value="">Seleccione moneda...</option>
                        <?php
                        
                            include($_SERVER['DOCUMENT_ROOT'].'/DIVISAS/include/config.inc');
                            $conexion = mysqli_connect($server,$user,$password,$DB);
                            mysqli_set_charset($conexion,"utf8");
        
        
                            $query = "select nombre from tblMonedas;";
                            $runQuery = mysqli_query($conexion, $query);
                            while ($row = mysqli_fetch_array($runQuery)){
        
                        ?>
        
                                <option style="color:#000;" value="<?php echo $row['nombre']?>">
                                    <?php echo $row['nombre']?>
                                </option>
        
                        <?php
                        
                            }
                        ?>
                        </select>
                        </div>
                </form>
                <form  method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" class="" >
                    <div class="">
                        <input type="text" name="moneda" value="<?php if(isset($_POST['conversion'])){echo $_POST['conversion']; }?>" readonly required>
                        <label for="" style="position:absolute; left:25px;"></label>
                    </div>
                    <div class="">
                        <input type="radio" name="crb" checked  style="margin-left:100px;" <?php
                        include($_SERVER['DOCUMENT_ROOT'].'/DIVISAS/include/config.inc');
                        $conexion = mysqli_connect($server,$user,$password,$DB);
                        mysqli_set_charset($conexion,"utf8");
                        if(isset($_POST['conversion'])){
                            $vl=$_POST['conversion'];
                            //$query = "select nombre from tblMonedas;";
                            $query = "select val_dolar from tblMonedas where nombre='$vl'";
                            $runQuery = mysqli_query($conexion, $query);
                            if($row = mysqli_fetch_array($runQuery)){
                                echo "value=".$row['val_dolar']."";
                            }
                        }                   
                        //
                        
                        ?> id="rb1">
                        
                        <label for="" style="position:absolute; left:25px;" id="lbl1">Dolar a <?php if(isset($_POST['conversion'])){echo $_POST['conversion']; }?></label>
                    </div>
                    <div class="">
                        <input type="radio" name="crb" style="margin-left:100px;" <?php
                        include($_SERVER['DOCUMENT_ROOT'].'/DIVISAS/include/config.inc');
                        $conexion = mysqli_connect($server,$user,$password,$DB);
                        mysqli_set_charset($conexion,"utf8");
                        if(isset($_POST['conversion'])){
                            $vl=$_POST['conversion'];
                            //$query = "select nombre from tblMonedas;";
                            $query = "select val_local from tblMonedas where nombre='$vl'";
                            $runQuery = mysqli_query($conexion, $query);
                            if($row = mysqli_fetch_array($runQuery)){
                                echo "value=".$row['val_local']."";
                            }
                        }
    
                   
                        //
                        
                        
                        
                        ?> id="rb2">
                        
                        <label for="" style="position:absolute; left:25px;" id="lbl2"><?php if(isset($_POST['conversion'])){echo $_POST['conversion']; }?> a Dolar</label>
                    </div>
                 
                    <div class="">
                        <input type="number" name="cantidad" min="0.01" step=".01" id="cantidad" required>
                        <label for="" style="position:absolute; left:25px;" >Cantidad a convertir</label>
                    </div>

                        <div class="buttons">
                            <input type="submit" style="width:110px" value="Convertir" name=submit class="" id="btn">
                        </div>
                        <input type="text" name="texto" id="texto" style="display:none;" value="Dolar a <?php if(isset($_POST['conversion'])){echo $_POST['conversion']; }?>">
                </form>
                <!-- FIN DEL FORM-BOX -->
            </div>
            <div class="form-info">
                <h1>CONVERSIONES <span style="color:rgb(150, 90, 193);"> AL INSTANTE</span></h1>
                <div class="infa" style=" background:rgba(0,0,0,0.6); border:2px solid #000; box-shadow: 4px 4px 4px rgba(0, 0, 0, .0.6);">

                <script>
                    var s =document.getElementById("sele");
                    var f =document.getElementById("lista");
                    var texto =document.getElementById("texto");
                    var rb1 =document.getElementById("rb1");
                    var rb2 =document.getElementById("rb2");
                    var lbl1 =document.getElementById("lbl1");
                    var lbl2 =document.getElementById("lbl2");
                    s.addEventListener("change",()=>{

                        f.submit();
                    })

                    rb1.addEventListener("change",()=>{

                        texto.value=lbl1.textContent;
                        //console.log(texto.textContent)
                    })
                    rb2.addEventListener("change",()=>{

                        texto.value=lbl2.textContent;
                        //console.log(texto.textContent)
                    })
                </script>

                <?php

                    if(isset($_POST['submit'])){
                        if($_POST['moneda']==""){
                            echo 
                            '<script>
                                swal({
                                    title: "ERROR!",
                                    text: "Seleccione una moneda primero.",
                                    type: "error"
                                }).then(function() {
                                    
                                });
                            </script>';
                        }else{
                            $valor=$_POST['cantidad']*$_POST['crb'];
                            /*echo "<script>
                            
                            alert(".$valor.")
                
                            </script>";*/
                            echo '<p style="font-size:75px;color:#fff;" >'.$_POST['cantidad']." de ".$_POST['texto'].' son:</p>';
                            echo '<p style="font-size:75px;color:#fff;">'.$valor.'</p>';
                        
                        }
                    
                    }
                
                ?>
                </div>
            </div>
    </div>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src='https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.4/sweetalert2.all.js'></script>
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <title>DROP DB</title>
</head>
<body>
    <?php
        include("../include/config.inc");
        $connection = mysqli_connect($server, $user, $password, $DB);
        mysqli_set_charset($connection, "utf8");

        $query = "DROP DATABASE IF EXISTS BasePaises";
        $runQuery = mysqli_query($connection, $query);

        if ($runQuery) {
            echo 
                     '<script>
                        swal({
                              title: "Buen trabajo",
                              text: "La base de datos ha sido eliminada correctamente!",
                              type: "success",
                              confirmButtonText: "Continuar"
    
                        }).then(function() {
                              window.location = "../index.html";
                        });
                    </script>';
             } else 
         {
                echo 
                    '<script>
                        swal({
                              title: "ERROR!",
                              text: "No hay ninguna base de datos, cree una.",
                              type: "error"
                        }).then(function() {
                              window.location = "../index.html";
                        });
                    </script>';
             }
             mysqli_close($conexion);
    ?>
    <br>
    <a class="btn btn-primary" href="../index.html">IR A LA PAGINA INICIAL</a>

</body>
</html>

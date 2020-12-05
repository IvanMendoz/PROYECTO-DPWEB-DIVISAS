<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src='https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.4/sweetalert2.all.js'></script>
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <title>CREATE DB</title>
</head>
<body>
<?php
    // Ejemplo de conexión a base de datos MySQL con PHP.
    // Datos de la base de datos
    $server = "localhost";
    $user = "root";
    $password = "";
    $DB = "test";

    // creación de la conexión a la base de datos con mysql_connect()
    $conexion = mysqli_connect( $server, $user, $password) or die ("No se ha podido conectar al server de Base de datos");
   
    // Selección de la base de datos a utilizar
    $db = mysqli_select_db( $conexion, $DB ) or die ( "Upps! Pues no se ha podido conectar a la base de datos" );
	
	//Realizando la query para crear una BD si es que no existe
	$query="CREATE DATABASE BasePaises";
	$runQuery = mysqli_query( $conexion, $query );  

  //Verificando si la BD se creo.
  if ($runQuery)
    echo 
	         	'<script>
	        		swal({
	          			title: "Buena trabajo",
	          			text: "La base de datos ha sido creada correctamente!",
	          			type: "success",
	          			confirmButtonText: "Continuar"

	        		}).then(function() {
	          			window.location = "../index.html";
	        		});
	        	</script>';
  else
  {
    echo 
            	'<script>
			        swal({
			          	title: "ERROR!",
			          	text: "ya existe la base de datos.",
			          	type: "error"
			        }).then(function() {
			          	window.location = "../index.html";
			        });
			    </script>';
  }

   $DB = "BasePaises";

$db = mysqli_select_db($conexion, $DB) or die("Upps! no se ha podido conectar a la nueva Base de Datos");

//Realizando la query para crear la tabla Alumno si es que no existe


$query="CREATE TABLE tblpaises (Id_pais INT PRIMARY KEY AUTO_INCREMENT, 
nombre varchar(50))";

$runQuery = mysqli_query($conexion, $query) or die("no se pudo crear la tabla tblpaises");

  //Verificando si la tabla se creo.
  if ($runQuery)
    echo ("La tabla tblpaises fue creada de Forma satisfactoria.<br>");
  else
  {
    echo ("Surgio problema para crear la tblpaises.<br>");
    echo ("El problema es: <br>");
    echo ("Codigo de error: <b>".mysql_error()."</b><br>");
    echo ("Descripcion de error: <b>".mysql_error ()."</b><br>");
  }

//Realizando la query para crear la tabla Alumno si es que no existe

$query="CREATE TABLE tblMonedas (id_moneda INT PRIMARY KEY AUTO_INCREMENT, 
nombre varchar(20),val_local float, val_dolar float, id_pais int,foreign key(id_pais) references tblpaises(Id_pais))";

$runQuery = mysqli_query($conexion, $query) or die ("No se pudo crear la tabla tblMonedas");

  //Verificando si la tabla se creo.
  if ($runQuery)
    echo ("La tabla tblMonedas  fue creada de Forma satisfactoria.<br>");
  else
  {
    echo ("Surgio problema para crear la tblMonedas.<br>");
    echo ("El problema es: <br>");
    echo ("Codigo de error: <b>". mysql_error ()."</b><br>");
    echo ("Descripcion de error: <b>". mysql_error ()."</b><br>");
  }



$query="CREATE PROCEDURE CrearPais
( 
    IN nom VARCHAR(50)
)
 
insert into tblpaises (nombre)
values (nom)";


$runQuery = mysqli_query($conexion, $query) ;

  //Verificando si el SP se creo.
  if ($runQuery)
    echo ("El SP  CrearPais fue creado de Forma satisfactoria.<br>");
  else
  {
    echo ("Surgio problema para crear el SP CrearPais.<br>");
    echo ("El problema es: <br>");
    echo ("Codigo de error: <b>". mysql_error ()."</b><br>");
    echo ("Descripcion de error: <b>". mysql_error ()."</b><br>");
  }
  
  
  
  
$query="CREATE PROCEDURE ModificarPais
 ( 
    IN par_idPais INT,
    IN par_nombre VARCHAR(50)
   
  )
 
update tblpaises set nombre = par_nombre where Id_pais = par_idPais";

$runQuery = mysqli_query($conexion, $query) or die ("No se pudo crear el SP ModificarPais");

  //Verificando si el SP se creo.
  if ($runQuery)
    echo ("El SP  ModificarPais fue creado de Forma satisfactoria.<br>");
  else
  {
    echo ("Surgio problema para crear el SP ModificarPais.<br>");
    echo ("El problema es: <br>");
    echo ("Codigo de error: <b>". mysql_error ()."</b><br>");
    echo ("Descripcion de error: <b>". mysql_error ()."</b><br>");
  }
  
  
  
  $query="CREATE PROCEDURE EliminarPais
 ( 
    IN par_idPais INT
  )
  delete from  tblpaises where Id_pais = par_idPais";

$runQuery = mysqli_query($conexion, $query) or die ("No se pudo crear el SP EliminarPais");

  //Verificando si el SP se creo.
  if ($runQuery)
    echo ("El SP  EliminarPais fue creado de Forma satisfactoria.<br>");
  else
  {
    echo ("Surgio problema para crear el SP EliminarPais.<br>");
    echo ("El problema es: <br>");
    echo ("Codigo de error: <b>". mysql_error ()."</b><br>");
    echo ("Descripcion de error: <b>". mysql_error ()."</b><br>");
  }
  
  
    $query="CREATE PROCEDURE MostrarPais
  ( 
    
  )
  SELECT * FROM tblpaises";

$runQuery = mysqli_query($conexion, $query) or die ("No se pudo crear el SP MostrarPais");

  //Verificando si el SP se creo.
  if ($runQuery)
    echo ("El SP  MostrarPais fue creado de Forma satisfactoria.<br>");
  else
  {
    echo ("Surgio problema para crear el SP MostrarPais.<br>");
    echo ("El problema es: <br>");
    echo ("Codigo de error: <b>". mysql_error()."</b><br>");
    echo ("Descripcion de error: <b>". mysql_error()."</b><br>");
  }




    $query="CREATE PROCEDURE MostrarPaisPorId
  (
    IN par_idpais INT
  )
  SELECT * FROM tblpaises
  where id_pais = par_idpais;";
  
   $runQuery = mysqli_query( $conexion, $query ) or die ( "No se pudo crear el procedimiento almacenado MostrarPaisPorId ");
  
  //Verificando si el SP se creo.
  if ($runQuery)
    echo ("El SP  MostrarPaisPorId fue creado de Forma satisfactoria.<br>");
  else
  {
    echo ("Surgio problema para crear el SP MostrarPaisPorId.<br>");
    echo ("El problema es: <br>");
    echo ("Codigo de error: <b>". mysql_error()."</b><br>");
    echo ("Descripcion de error: <b>". mysql_error()."</b><br>");
  }

          
  $query="CREATE PROCEDURE CrearMoneda
  ( 
      IN nom VARCHAR(50),
      IN val_l float,
      IN val_d float,
      IN id_pa int
  )
   
  insert into tblMonedas (nombre,val_local,val_dolar,id_pais)
  values (nom,val_l,val_d,id_pa)";
  
  
  $runQuery = mysqli_query($conexion, $query) ;
  
    //Verificando si el SP se creo.
    if ($runQuery)
      echo ("El SP  CrearMoneda fue creado de Forma satisfactoria.<br>");
    else
    {
      echo ("Surgio problema para crear el SP CrearMoneda.<br>");
      echo ("El problema es: <br>");
      echo ("Codigo de error: <b>". mysql_error ()."</b><br>");
      echo ("Descripcion de error: <b>". mysql_error ()."</b><br>");
    }
    
 
    
    
  $query="CREATE PROCEDURE ModificarMonedas
   ( 
      IN par_idMoneda INT,
      IN nom VARCHAR(50),
      IN val_l float,
      IN val_d float,
      IN id_pa int
     
    )
   
  update tblMonedas set nombre = nom,val_local=val_l,val_dolar=val_d,id_pais=id_pa where id_moneda = par_idMoneda";
  
  $runQuery = mysqli_query($conexion, $query) or die ("No se pudo crear el SP ModificarMonedas");
  
    //Verificando si el SP se creo.
    if ($runQuery)
      echo ("El SP  ModificarMonedas
fue creado de Forma satisfactoria.<br>");
    else
    {
      echo ("Surgio problema para crear el SP ModificarMonedas
.<br>");
      echo ("El problema es: <br>");
      echo ("Codigo de error: <b>". mysql_error ()."</b><br>");
      echo ("Descripcion de error: <b>". mysql_error ()."</b><br>");
    }
    
    
    
    $query="CREATE PROCEDURE EliminarMoneda
   ( 
      IN par_idMoneda INT
    )
    delete from  tblMonedas where id_moneda = par_idMoneda";
  
  $runQuery = mysqli_query($conexion, $query) or die ("No se pudo crear el SP EliminarMoneda");
  
    //Verificando si el SP se creo.
    if ($runQuery)
      echo ("El SP  EliminarMoneda fue creado de Forma satisfactoria.<br>");
    else
    {
      echo ("Surgio problema para crear el SP EliminarMoneda.<br>");
      echo ("El problema es: <br>");
      echo ("Codigo de error: <b>". mysql_error ()."</b><br>");
      echo ("Descripcion de error: <b>". mysql_error ()."</b><br>");
    }
    
    
      $query="CREATE PROCEDURE MostraMonedas
    ( 
      
    )
    SELECT * FROM tblMonedas";
  
  $runQuery = mysqli_query($conexion, $query) or die ("No se pudo crear el SP MostraMonedas");
  
    //Verificando si el SP se creo.
    if ($runQuery)
      echo ("El SP  MostraMonedas fue creado de Forma satisfactoria.<br>");
    else
    {
      echo ("Surgio problema para crear el SP MostraMonedas.<br>");
      echo ("El problema es: <br>");
      echo ("Codigo de error: <b>". mysql_error()."</b><br>");
      echo ("Descripcion de error: <b>". mysql_error()."</b><br>");
    }
  
  
  
  
    $query="CREATE PROCEDURE MostraMonedasPorId
    (
      IN par_idMoneda INT
    )
    SELECT * FROM tblMonedas
    where id_moneda = par_idMoneda;";
    
     $runQuery = mysqli_query( $conexion, $query ) or die ( "No se pudo crear el procedimiento almacenado MostraMonedasPorId ");
    
    //Verificando si el SP se creo.
    if ($runQuery)
      echo ("El SP  MostraMonedasPorId fue creado de Forma satisfactoria.<br>");
    else
    {
      echo ("Surgio problema para crear el SP MostraMonedasPorId.<br>");
      echo ("El problema es: <br>");
      echo ("Codigo de error: <b>". mysql_error()."</b><br>");
      echo ("Descripcion de error: <b>". mysql_error()."</b><br>");
    }
  
        ?>
    
</body>
</html>

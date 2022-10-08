<?php

   include 'conexion_be.php';

  $nombre = $_POST['nombre'];
  $apellido = $_POST['apellido'];
  $identificacion = $_POST['identificacion'];
  $num_identificacion = $_POST['num_identificacion'];
  $fecha_naci = $_POST['fecha'];
  $ocupacion = $_POST['ocupacion'];
  $ingresos = $_POST['ingreso'];
  $gastos = $_POST['gasto'];
  $correo = $_POST['correo'];
  $contrasena = $_POST['contrasena'];
  $contrasena = hash('sha512', $contrasena);


  $query = "INSERT INTO users (nombre, apellido, identificacion, num_identificacion, fecha, ocupacion, ingreso, gasto, correo, contrasena)
           VALUES('$nombre', '$apellido','$identificacion','$num_identificacion','$fecha_naci','$ocupacion','$ingresos',$gastos,'$correo', '$contrasena')";
          
  $verificar_correo = mysqli_query($conexion,"SELECT * FROM users WHERE correo = '$correo'");
   if(mysqli_num_rows($verificar_correo) > 0){
    echo ' 
     <script> 
     alert("Error, correo electrónico ya esta en uso");
     window.location="../indexlo.php";

     </script>
     ';
     exit();
   }

  $verificar_ident = mysqli_query($conexion,"SELECT * FROM users WHERE num_identificacion = '$num_identificacion'");
   if(mysqli_num_rows($verificar_ident) > 0){
    echo ' 
     <script> 
     alert("Error, Usuario ya esta en uso");
     window.location="../indexlo.php";

     </script>
     ';
     exit();
   }

  $ejecutar   = mysqli_query($conexion, $query);

  
  if($ejecutar){
    echo ' 
    <script>
       alert("Usuario almacenado exitosamente");
       window.location="../indexlo.php";

    </script>
    ';
  }else{
    echo ' 
    <script>
       alert("Error, intentalo de nuevo");
       window.location="../indexlo.php";

    </script>
    ';
  }

mysqli_close($conexion);
?>
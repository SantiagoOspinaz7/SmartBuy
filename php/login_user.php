<?php
session_start();
 include 'conexion_be.php';

$correo = $_POST['correo']; 
$contrasena = $_POST['contrasena'];
$contrasena = hash('sha512', $contrasena); //encriptacion

$validar_login = mysqli_query ($conexion, "SELECT * FROM users WHERE correo = '$correo' and contrasena = '$contrasena'");
$fila=mysqli_fetch_array($validar_login);
 if (mysqli_num_rows($validar_login)> 0){
  $_SESSION['user']=  $correo; 
  if ($fila['idRol']==1){
  
    header("location: ../dash/indexAdmin.php");
   
    
 }else
   if($fila['idRol']==0){
     
     header("location:../dash/indexUser.php");
   }
}else{
    echo'
     <script> 
       alert("Error, Usuario no existe, intente nuevamente");
       window.location="../indexlo.php";
       
      </script>
    ';
     exit;
 }


 


?>

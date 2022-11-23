<?php
 session_start();
 if(!isset($_SESSION['user'])){
  echo '
  <script> 
     alert("Debes iniciar sesión");
     window.location="indexlo.php";
   </script>
  
  ';
 
  session_destroy();
  die();
 }
/*session_destroy();*/
?>


<!DOCTYPE html>
<html lang="es">

  <head>
    
    <meta charset="UTF-8">
    <meta name="Viewport" content="width=device-width, initial-scale=1.0">
    <title> Menu usuario</title>
 
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;700&display=swap" rel="stylesheet">

  </head>

  <body>
    
    <h1>hola, bienvenidos</h1>
    <h2> Proximamente buscador de tarjetas </h2>
    <a href="/dash/indexUser.php">Regresar </a>
    <a href="php/cerrar_sesion.php">Cerrar sesión </a>
  </body>
</html>
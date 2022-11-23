<?php
 session_start();
 if(!isset($_SESSION['user'])){
  echo '
  <script> 
     alert("Debes iniciar sesión");
     window.location="/indexlo.php";
   </script>
  
  ';
 
  session_destroy();
  die();
 }
/*session_destroy();*/
?>

<?php require_once "vistasAdmin/part_sup.php" ?>

<div class= "container">
    <h1>Panel</h1>
    
    
<?php require_once "vistasAdmin/part_inf.php" ?>



              

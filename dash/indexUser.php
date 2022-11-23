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

<?php require_once "vistasUser/part_supUser.php" ?>

<div class= "container">
    <h1>Panel del usuario</h1>
    
    
<?php require_once "vistasUser/part_infUser.php" ?>



              

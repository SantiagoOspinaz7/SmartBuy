<?php
include_once '../bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

// Recepción de los datos enviados mediante POST desde el JS   

$nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : '';
$apellido = (isset($_POST['apellido'])) ? $_POST['apellido'] : '';
$identificacion = (isset($_POST['identificacion'])) ? $_POST['identificacion'] : '';
$fecha = (isset($_POST['fecha'])) ? $_POST['fecha'] : '';
$ocupacion = (isset($_POST['ocupacion'])) ? $_POST['ocupacion'] : '';
$correo = (isset($_POST['correo'])) ? $_POST['correo'] : '';
$idRol = (isset($_POST['idRol'])) ? $_POST['idRol'] : '';
$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
$id = (isset($_POST['id'])) ? $_POST['id'] : '';

switch($opcion){
    case 1: //alta
       /* $consulta = "INSERT INTO users (nombre, pais, edad) VALUES('$nombre', '$pais', '$edad') ";			
        $resultado = $conexion->prepare($consulta);
        $resultado->execute(); */

        $consulta = "SELECT id, nombre, apellido, identificacion, fecha, ocupacion, correo,idRol FROM users ORDER BY id DESC LIMIT 1";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    case 2: //modificación
        $consulta = "UPDATE users SET nombre='$nombre', apellido='$apellido', identificacion='$identificacion', fecha='$fecha', ocupacion='$ocupacion', correo='$correo', idRol='$idRol' WHERE id='$id' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
         
        $consulta = "SELECT id, nombre, apellido, identificacion, fecha, ocupacion, correo, idRol FROM users WHERE id='$id' ";       
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;        
    case 3://baja
        $consulta = "DELETE FROM users WHERE id='$id' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();                           
        break;        
}

print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
$conexion = NULL;

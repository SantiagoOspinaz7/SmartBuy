<?php require_once "vistasAdmin/part_sup.php" ?>

<div class= "container">
    <h1>Gestion de usuarios</h1>
    <?php
include_once '../dash/bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$consulta = "SELECT id, nombre, apellido, identificacion, fecha, ocupacion, correo, idRol FROM users";
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$data=$resultado->fetchAll(PDO::FETCH_ASSOC);
?>


    
  
      
<div class="container">
        <div class="row">
            <div class="col-lg-12">            
            <button id="btnNuevo" type="button" class="btn btn-success" data-toggle="modal">Nuevo</button>    
            </div>    
        </div>    
    </div>    
    <br>  
    <div class="container">
        <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">        
                        <table id="tablaPersonas" class="table table-striped table-bordered table-condensed" style="width:100%">
                        <thead class="text-center">
                            <tr>
                                <th>Id</th>
                                <th>Nombre</th>
                                <th>Apellido</th>                                
                                <th>Identificacion</th>  
                                <th>Fecha</th>  
                                <th>Ocupacion</th> 
                                <th>Correo</th>   
                                <th>Rol</th>  
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php                            
                            foreach($data as $dat) {                                                        
                            ?>
                            <tr>
                                <td><?php echo $dat['id'] ?></td>
                                <td><?php echo $dat['nombre'] ?></td>
                                <td><?php echo $dat['apellido'] ?></td>
                                <td><?php echo $dat['identificacion'] ?></td>   
                                <td><?php echo $dat['fecha'] ?></td>
                                <td><?php echo $dat['ocupacion'] ?></td> 
                                <td><?php echo $dat['correo'] ?></td>
                                <td><?php echo $dat['idRol'] ?></td>
                                <td></td>
                            </tr>
                            <?php
                                }
                            ?>                                
                        </tbody>        
                       </table>                    
                    </div>
                </div>
        </div>  
    </div>    
      
<!--Modal para CRUD-->
<div class="modal fade" id="modalCRUD" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
        <form id="formPersonas">    
            <div class="modal-body">
                <div class="form-group">
                <label for="nombre" class="col-form-label">Nombre:</label>
                <input type="text" class="form-control" id="nombre">
                </div>
                <div class="form-group">
                <label for="pais" class="col-form-label">Apellido:</label>
                <input type="text" class="form-control" id="apellido">
                </div>                
                <div class="form-group">
                <label for="identificacion" class="col-form-label">Identificacion:</label>
                <input type="text" class="form-control" id="identificacion">
                </div>            
                <div class="form-group">
                <label for="fecha" class="col-form-label">Fecha:</label>
                <input type="text" class="form-control" id="fecha">
                </div> 
                <div class="form-group">
                <label for="ocupacion" class="col-form-label">Ocupacion:</label>
                <input type="text" class="form-control" id="ocupacion">
                </div> 
                <div class="form-group">
                <label for="correo" class="col-form-label">Correo:</label>
                <input type="text" class="form-control" id="correo">
                </div> 
                <div class="form-group">
                <label for="idRol" class="col-form-label">Rol:</label>
                <input type="number" class="form-control" id="idRol">
                </div> 
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                <button type="submit" id="btnGuardar" class="btn btn-dark">Guardar</button>
            </div>
        </form>    
        </div>
    </div>
</div> 
      

  

    
<?php require_once "vistasAdmin/part_inf.php" ?>
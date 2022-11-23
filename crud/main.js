$(document).ready(function(){
    tablaPersonas = $("#tablaPersonas").DataTable({
       "columnDefs":[{
        "targets": -1,
        "data":null,
        "defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btnEditar'>Editar</button><button class='btn btn-danger btnBorrar'>Borrar</button></div></div>"  
       }],
        
        //Para cambiar el lenguaje a español
    "language": {
            "lengthMenu": "Mostrar _MENU_ registros",
            "zeroRecords": "No se encontraron resultados",
            "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sSearch": "Buscar:",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast":"Último",
                "sNext":"Siguiente",
                "sPrevious": "Anterior"
             },
             "sProcessing":"Procesando...",
        }
    });
    
$("#btnNuevo").click(function(){
    $("#formPersonas").trigger("reset");
    $(".modal-header").css("background-color", "#28a745");
    $(".modal-header").css("color", "white");
    $(".modal-title").text("Nueva Persona");            
    $("#modalCRUD").modal("show");        
    id=null;
    opcion = 1; //alta
});    
    
var fila; //capturar la fila para editar o borrar el registro
    
//botón EDITAR    
$(document).on("click", ".btnEditar", function(){
    fila = $(this).closest("tr");
    id = parseInt(fila.find('td:eq(0)').text());
    nombre = fila.find('td:eq(1)').text();
    apellido = fila.find('td:eq(2)').text();
    identificacion = (fila.find('td:eq(3)').text());
    fecha = (fila.find('td:eq(4)').text());
    ocupacion = (fila.find('td:eq(5)').text());
    correo = (fila.find('td:eq(6)').text());
    idRol = parseInt(fila.find('td:eq(7)').text());
    
    $("#nombre").val(nombre);
    $("#apellido").val(apellido);
    $("#identificacion").val(identificacion);
    $("#fecha").val(fecha);
    $("#ocupacion").val(ocupacion);
    $("#correo").val(correo);
    $("#idRol").val(idRol);
    opcion = 2; //editar
    
    $(".modal-header").css("background-color", "#007bff");
    $(".modal-header").css("color", "white");
    $(".modal-title").text("Editar Persona");            
    $("#modalCRUD").modal("show");  
    
});

//botón BORRAR
$(document).on("click", ".btnBorrar", function(){    
    fila = $(this);
    id = parseInt($(this).closest("tr").find('td:eq(0)').text());
    opcion = 3 //borrar
    var respuesta = confirm("¿Está seguro de eliminar el registro: "+id+"?");
    if(respuesta){
        $.ajax({
            url: "bd/crud.php",
            type: "POST",
            dataType: "json",
            data: {opcion:opcion, id:id},
            success: function(){
                tablaPersonas.row(fila.parents('tr')).remove().draw();
            }
        });
    }   
});
    
$("#formPersonas").submit(function(e){
    e.preventDefault();    
    nombre = $.trim($("#nombre").val());
    apellido = $.trim($("#apellido").val());
    identificacion = $.trim($("#identificacion").val()); 
    fecha = $.trim($("#fecha").val()); 
    ocupacion = $.trim($("#ocupacion").val()); 
    correo = $.trim($("#correo").val()); 
    idRol = $.trim($("#idRol").val()); 
       
    $.ajax({
        url: "bd/crud.php",
        type: "POST",
        dataType: "json",
        data: {nombre:nombre, apellido:apellido, identificacion:identificacion, id:id, fecha:fecha, ocupacion:ocupacion, correo:correo, idRol:idRol, opcion:opcion},
        success: function(data){  
            console.log(data);
            id = data[0].id;            
            nombre = data[0].nombre;
            apellido = data[0].apellido;
            identificacion = data[0].identificacion;
            fecha = data[0].fecha;
            ocupacion = data[0].ocupacion;
            correo = data[0].correo;
            idRol = data[0].idRol;

            if(opcion == 1){tablaPersonas.row.add([id,nombre,apellido,identificacion,fecha,ocupacion,correo,idRol]).draw();}
            else{tablaPersonas.row(fila).data([id,nombre,apellido,identificacion,fecha,ocupacion,correo,idRol]).draw();}            
        }        
    });
    $("#modalCRUD").modal("hide");    
    
});    
    
});
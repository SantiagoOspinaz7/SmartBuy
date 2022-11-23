<?php
session_start();
/*if(isset($_SESSION['user'])){
    header("location: indexmenu.php");
}*/
if(isset($_SESSION['user'])){
    
    /*switch($_SESSION['rol']){
        case 0:
            header("location: indexmenu.php");
            break; 

        case 1:
            header("location: indexMenuAdmin.php");
            break;
            
        default:


    }*/
   
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login y Register</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <link rel="stylesheet" href="assets/css/estilos.css">
</head>

<body>
    

        <main>

            <div class="contenedor__todo">
                <div class="caja__trasera">
                    <div class="caja__trasera-login">
                        <h3>¿Ya tienes una cuenta?</h3>
                        <p>Inicia sesión para entrar en la página</p>
                        <button id="btn__iniciar-sesion">Iniciar Sesión</button>
                    </div>
                    <div class="caja__trasera-register">
                        <h3>¿Aún no tienes una cuenta?</h3>
                        <p>Regístrate para que puedas iniciar sesión</p>
                        <button id="btn__registrarse">Regístrarse</button>
                    </div>
                </div>

                <!--Formulario de Login y registro-->
                <div class="contenedor__login-register">
                    <!--Login-->
                    <form action="php/login_user.php" method = "POST" class="formulario__login" id="login">
                        <h2>Iniciar Sesión </h2>
                        <input type="email" placeholder="Correo Electrónico" name = "correo" id= "user">
                        <input type="password" placeholder="Contraseña" name = "contrasena" id= "password">
                        <button>Entrar</button>
                    </form>

                    <!--Register-->
                    <form action="php/register_usuario.php" method = "POST" class="formulario__register" id = "register">
                        <h2>Regístrarse</h2>
                        <div class="box">
                            <input type="text" placeholder="Nombres" name = "nombre" required>
                            <input type="text" placeholder="Apellidos" name = "apellido" required>
                        </div>
                        <div class="box">
                        <input type="text" placeholder="Identificación" name =" num_identificacion" required>
                            <select class="form-select" aria-label="Default select example" name ="identificacion" >
                                <option selected>Tipo de identificación</option>
                                <option value="Cedula ciudadania">Cedula ciudadania</option>
                                <option value="Cedula de extranjeria">Cedula de extranjeria</option>
                                <option value="Pasaporte">Pasaporte</option>
                            </select>
                        </div>
                         
                         <div class="box">
                            <input type="date" placeholder="Fecha de nacimiento" name ="fecha" required>
                            <select class="form-select" aria-label="Default select example" name ="ocupacion">
                                <option selected>Ocupacion</option>
                                <option value="Estudiante">Estudiante </option>
                                <option value="Independiente">Independiente</option>
                                <option value="Pensionado">Pensionado</option>
                                <option value="Desempleado">Desempleado</option>
                                <option value="Asalariado">Asalariado</option>
                            </select>
                        </div>
                        <div class="box">
                            <input type="number" placeholder="Ingreso mensuales en COP"  name ="ingreso">
                            <input type="number" placeholder="Gastos mensuales en COP"  name ="gasto">
                        </div>
                        <div class="box">
                            <input type="email" placeholder="Correo Electrónico"  name ="correo">
                            <input type="password" placeholder="Contraseña"  name ="contrasena">
                        </div>
                        
                        <label for=""><input type="checkbox" id="termsAndConditions" required> </label>
                        <label for="termsAndConditions">He leído y acepto las</label>
                         <a href="#">políticas de privacidad.</a>
                        
                         
                        <button>Regístrarse</button>
                    </form>
                </div>
            </div>

        </main>

        <script src="assets/js/script.js"></script>
        <script src="/JavaScript/code.js"></script>
</body>
</html>
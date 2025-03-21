<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
        integrity="sha384-1BmE4kWBq78iYhFldvkuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqy12QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" 
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="CSS/SingUpLogin.css">
    <title>Registrarse</title>
    <!-- Mejorar icono (no olvidar :)) -->
    <link rel="icon" href="Imagenes/PioPio.ico">
</head>
<body>

    <form action="CrearSesion.php" method="POST">
        <center><h1>REGISTRARSE</h1></center>
        <br>
        <hr>

        <?php
            if (isset($_GET['error2'])) {
            ?>
            <p class="error">
                <?php
                    echo $_GET['error2']
                 ?>
            </p>
        <?php
            }
            elseif(isset($_GET['aviso'])){
            ?>
            <p class="aviso">
                <?php
                    echo $_GET['aviso']
                ?>
            </p>
        <?php
            }
        ?>
        <br>
        <i class="fa-solid fa-user"></i>
        <label>Usuario</label>
        <center><input type="text" name="usuario" placeholder ="Crear Nombre de Usuario"></center>
        <br>
        <i class="fa-solid fa-envelope"></i>
        <label>Correo Electrónico</label>
        <center><input type="email" name="mail" placeholder ="Ingresar Correo Electrónico"></center>
        <br>
        <i class="fa-solid fa-key"></i>
        <label>Contraseña</label>
        <center><input type="password" name="clave" placeholder ="Crear Contraseña"></center>
        <br>
        <i class="fa-solid fa-unlock"></i>
        <label>Repetir Contraseña</label>
        <center><input type="password" name="rclave" placeholder ="Repetir Contraseña"></center>
        <br>
        <hr>
        <center><button type="submit" name="registrar">Registrarse</button></center>
        <br>
        <center><a href="Login.php">¿Ya tienes cuenta?</a></center>
        

     </form>

</body>
</html>
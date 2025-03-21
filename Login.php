<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
        integrity="sha384-1BmE4kWBq78iYhFldvkuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqy12QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/SingUpLogin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" 
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Mejorar icono (no olvidar :)) -->
    <link rel="icon" href="Imagenes/PioPio.ico">
</head>

<body>

<form action="IniciarSesion.php" method="POST">
        <center><h1>INICIAR SESIÓN</h1></center>
        <br>
        <hr>

        <?php
            if (isset($_GET['error1'])) {
            ?>
            <p class="error">
                <?php
                    echo $_GET['error1']
                 ?>
            </p>
        <?php
            }
        ?>
        <br>
        <i class="fa-solid fa-user"></i>
        <label>Usuario</label>
        <center><input type="text" name="Usuario" placeholder ="Nombre de Usuario"></center>
        <br>
        <i class="fa-solid fa-key"></i>
        <label>Contraseña</label>
        <center><input type="password" name="Clave" placeholder ="Contraseña"></center>
        <br>
        <hr>
        <center><button type="submit">Iniciar Sesión</button></center>
        <br>
        <center><a href="SingUp.php">¿No tienes cuenta?</a></center>
        

     </form>

    </form>

</body>
</html>
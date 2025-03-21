<?php
session_start();
if (!isset($_SESSION['Usuario'])) {
    // Si no hay sesión iniciada, redirige al Inicio :)
    header("Location: Inicio.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
        integrity="sha384-1BmE4kWBq78iYhFldvkuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqy12QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" 
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Mejorar icono (no olvidar :)) -->
    <link rel="icon" href="Imagenes/PioPio.ico">
    <link rel="stylesheet" href="CSS/HomeStyle.css">
    <title>Recetas de cocina</title>
</head>
<body>

    <header>
        <div class="back">
            <div class="menu container">
                <img class="log" src="Imagenes/Pio_Pio.png" alt="Pio Pio logo">
                <a href="#" class="logo">Pio Pio</a>
                <input type="checkbox" id="menu">
                <label for="menu">
                    <img src="Imagenes/menu.png" class="menu-icono" alt="">
                </label>
                <nav class="navbar">
                    <ul>
                        <li><a href="#">Inicio</a></li>
                        <li id="menu-item">
                            <a href="#">Categorias</a>
                            <ul id="submenu">
                                <!-- Pasamos el nombre de la categoría como parámetro en la URL -->
                                <li><a href="RecetasCateg.php?id_categoria=Entrante">Entrantes</a></li>
                                <li><a href="RecetasCateg.php?id_categoria=Plato Principal">Platos Principales</a></li>
                                <li><a href="RecetasCateg.php?id_categoria=Bebida">Bebidas</a></li>
                                <li><a href="RecetasCateg.php?id_categoria=Vegetariana">Vegetarianas</a></li>
                                <li><a href="RecetasCateg.php?id_categoria=Pasta">Pastas</a></li>
                                <li><a href="RecetasCateg.php?id_categoria=Tarta">Tartas</a></li>
                                <li><a href="RecetasCateg.php?id_categoria=Galletita">Galletitas</a></li>
                                <li><a href="RecetasCateg.php?id_categoria=Postre">Postres</a></li>
                            </ul>
                        </li>
                        <li><a href="AgregarReceta.php">Agregar receta</a></li>
                        <li><a href="AcercaDe.php">Acerca De</a></li>
                        <li><a href="CerrarSesion.php" role="button">Cerrar Sesión</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>
    <br>
    <strong><h1 class="Titulo">¡Hola, <?php echo ucfirst(htmlspecialchars($_SESSION['Usuario'])); ?>!</h1></strong>
    <br>
    <center>
    <div class="receta">
    <?php 
        include('UnaRecetaHome.php');
        if ($receta): ?>
            <h1>Te puede interesar: <br> <?php echo htmlspecialchars($receta['Titulo']); ?></h1>
            <a href="detalle_receta.php?id=<?php echo $receta['IDRecetas']; ?>">
                <img src="Imagenes/<?php echo htmlspecialchars($receta['imagen']); ?>" alt="<?php echo htmlspecialchars($receta['Titulo']); ?>" style="width:300px;height:200px;">
            </a>
        <?php else: ?>
            <h1>No hay recetas disponibles</h1>
        <?php endif; ?>
    </div>
    </center>
  

    

</body>
</html>
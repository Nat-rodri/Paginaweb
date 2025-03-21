<?php
include('Conexion.php');

session_start();
if (!isset($_SESSION['Usuario'])) {
    // Si no hay sesión iniciada, redirige al Inicio :)
    header("Location: Inicio.php");
    exit();
}
else{
    // Obtener el ID o nombre de la categoría desde la URL
$categoria = $conexion->real_escape_string($_GET['id_categoria']);

// Consultar las recetas que pertenecen a la categoría seleccionada
$sql = "SELECT IDRecetas, Titulo, imagen FROM recetas 
        WHERE IDCateg = (SELECT IDCateg FROM categorias WHERE Categoria = '$categoria')";
$result= mysqli_query($conexion, $sql);

}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo ucfirst($categoria); ?></title>
    <link rel="stylesheet" href="CSS/RecetaStyle.css">
    <link rel="icon" href="Imagenes/PioPio.ico">
</head>
<body>
<header>
        <div class="back">
            <div class="menu container">
                <img class="log" src="Imagenes/Pio_Pio.png" alt="Pio Pio logo">
                <a href="#" class="logo">Pio Pio</a>
                <input type="checkbox" id="menu">
                <label for="menu">
                    <img src="Imagenes/menu.png" class="menu-icono" alt="menu">
                </label>
                <nav class="navbar">
                    <ul>
                        <li><a href="Home.php">Inicio</a></li>
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
    <h1>Categoria: <?php echo ucfirst($categoria); ?></h1>
    <br>
    <div class="recetas-grid">
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<div class='receta-card'>";
                if ($row['imagen']) {
                    echo "<a href='detalle_receta.php?id=" . $row['IDRecetas'] . "'>";
                    echo "<img src='imagenes/" . $row['imagen'] . "' alt='" . $row['Titulo'] . "' class='imagen-receta'>";
                    echo "</a>";
                }
                echo "</div>";
            }
        } else {
            echo "<h2>No hay recetas disponibles en esta categoría.</h2>";
        }
        ?>
    </div>
</body>
</html>
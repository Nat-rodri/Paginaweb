<?php
include('Conexion.php');
session_start();

if (!isset($_SESSION['Usuario'])) {
    // Si no hay sesión iniciada, redirige al Inicio :)
    header("Location: Inicio.php");
    exit();
}
    // Obtener el ID de la receta desde la URL
$id = $_GET['id'];

// Consultar los detalles de la receta junto con el nombre del usuario
$sql = "SELECT recetas.Titulo, recetas.Descripcion, recetas.Ingredientes, recetas.Preparacion, recetas.imagen, 
               categorias.Categoria AS categoria, usuarios.Usuario AS nombre_usuario
        FROM recetas 
        JOIN categorias ON recetas.IDCateg = categorias.IDCateg 
        LEFT JOIN usuarios ON recetas.IDUsuarios = usuarios.IDUsuarios 
        WHERE recetas.IDRecetas = $id";
$result = $conexion->query($sql);

// Verificar si se encontró la receta
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {
    echo "Receta no encontrada.";
    exit;
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $row['Titulo']; ?></title>
    <link rel="stylesheet" href="CSS/DetStyle.css">
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
                    <img src="Imagenes/menu.png" class="menu-icono" alt="">
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
    <h1><?php echo $row['Titulo']; ?></h1>
    <br>
    <div class="receta-detalle">
        <?php if ($row['imagen']) { ?>
            <img src="imagenes/<?php echo $row['imagen']; ?>" alt="<?php echo $row['Titulo']; ?>" class="imagen-receta">
        <?php } ?>
        <p><strong>Categoría:</strong> <?php echo $row['categoria']; ?></p>
        <p><strong>Descripción:</strong> <br> <?php echo $row['Descripcion']; ?></p>
        <p><strong>Ingredientes:</strong> <br> <?php echo nl2br($row['Ingredientes']); ?></p>
        <p><strong>Preparación:</strong> <br> <?php echo nl2br($row['Preparacion']); ?></p>
        <br>
        <!-- Mostrar el nombre del usuario que creó la receta, si existe -->
        <footer>
            <?php if (!empty($row['nombre_usuario'])): ?>
                <p>Recetado por: <strong><?php echo htmlspecialchars($row['nombre_usuario']); ?></strong></p>
            <?php else: ?>
                <p>Receta del equipo de Pio Pio</p>
            <?php endif; ?>
            <br>
            <?php
            if (isset($_SESSION['Usuario'])) {
                ?>
                <form action="comentario.php" method="post">
                    <textarea name="comentario" placeholder="Escribe tu comentario aquí..." required></textarea>
                    <input type="hidden" name="id_receta" value="<?php echo $id; ?>">
                    <button type="submit">Enviar comentario</button>
                </form>
                <?php
            }
            ?>
            <?php
                $sql_comentarios = "SELECT comentarios.Comentario, comentarios.fecha, usuarios.Usuario
                                FROM comentarios 
                                JOIN usuarios ON comentarios.IDUsuarios = usuarios.IDUsuarios
                                WHERE comentarios.IDRecetas = ?
                                ORDER BY comentarios.fecha DESC";

                $stmt = $conexion->prepare($sql_comentarios);
                $stmt->bind_param("i", $id);
                $stmt->execute();
                $result_comentarios = $stmt->get_result();

                if ($result_comentarios->num_rows > 0) {
                    echo "<h2><strong>Comentarios<strong></h2>";
                    echo "<br>";
                    while ($comentario = $result_comentarios->fetch_assoc()) {
                        echo "<div class='comentario'>";
                        echo "<p><strong>" . htmlspecialchars($comentario['Usuario']) . "</strong> comentó el " . $comentario['fecha'] . ":</p>";
                        echo "<p>" . htmlspecialchars($comentario['Comentario']) . "</p>";
                        echo "</div>";
                    }
                } else {
                    echo "<p>Sé el primero en comentar.</p>";
                }
            ?>  
        </footer>
    </div>
    
</body>
</html>
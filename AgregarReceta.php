<?php

session_start();
if (!isset($_SESSION['Usuario'])) {
    header("Location: Inicio.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Receta</title>
    <link rel="icon" href="Imagenes/PioPio.ico">
    <link rel="stylesheet" href="CSS/AgregarRStyle.css">
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
                        <li><a href="AcercaDe.php">Acerca De</a></li>
                        <li><a href="CerrarSesion.php" role="button">Cerrar Sesión</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>
    <br>
    <form action="guardar_receta.php" method="POST" enctype="multipart/form-data">
        <?php
            if (isset($_GET['agrego'])) {
            ?>
            <p class="agregar">
                <?php
                    echo $_GET['agrego']
                 ?>
            </p>
        <?php
            }
        ?>
        <label for="titulo">Título de la receta:</label>
        <input type="text" id="titulo" name="titulo" required><br>

        <label for="descripcion">Descripción:</label>
        <textarea id="descripcion" name="descripcion" required></textarea><br>

        <label for="ingredientes">Ingredientes:</label>
        <textarea id="ingredientes" name="ingredientes" required></textarea><br>

        <label for="preparacion">Preparación:</label>
        <textarea id="preparacion" name="preparacion" required></textarea><br>

        <label for="categoria">Categoría:</label>
        <select id="categoria" name="categoria" required>
            <?php
            include('Conexion.php');
            // Obtener categorías
            $sql = "SELECT IDCateg, Categoria FROM categorias";
            $result = $conexion->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['IDCateg'] . "'>" . $row['Categoria'] . "</option>";
                }
            } else {
                echo "<option value=''>No hay categorías disponibles</option>";
            }
            ?>
        </select><br>

        <label for="imagen">Subir imagen:</label>
        <input type="file" id="imagen" name="imagen" accept="image/*"><br>

        <button type="submit">Guardar Receta</button>
    </form>
</body>
</html>
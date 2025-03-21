<?php
include('Conexion.php');

if (!isset($_SESSION['Usuario'])) {
    header("Location: Inicio.php");
    exit();
}

// Consulta SQL para obtener una receta aleatoria
$sql = "SELECT * FROM recetas ORDER BY RAND() LIMIT 1";
$resultado = mysqli_query($conexion, $sql);

if ($resultado && mysqli_num_rows($resultado) > 0) {
    $receta = mysqli_fetch_assoc($resultado);
} else {
    // En caso de que no haya recetas disponibles
    $receta = null;
}
?>
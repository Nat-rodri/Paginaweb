<?php
// include('Conexion.php');
// session_start();

// if (!isset($_SESSION['Usuario'])) {
//     header("Location: Inicio.php");
//     exit();
// }

// // Obtener datos del formulario
// $titulo = $_POST['titulo'];
// $descripcion = $_POST['descripcion'];
// $ingredientes = $_POST['ingredientes'];
// $preparacion = $_POST['preparacion'];
// $categoria = $_POST['categoria'];

// // Obtener el ID del usuario desde la sesión
// $id_usuario = $_SESSION['IDUsuarios'] ?? null;

// // Manejo de la imagen
// if ($_FILES['imagen']['name']) {
//     $nombre_imagen = $_FILES['imagen']['name'];
//     $ruta_temporal = $_FILES['imagen']['tmp_name'];
//     $ruta_destino = "imagenes/" . basename($nombre_imagen);
//     move_uploaded_file($ruta_temporal, $ruta_destino);
// } else {
//     $nombre_imagen = null; // Si no se carga ninguna imagen
// }

// // Insertar los datos en la base de datos
// $sql = "INSERT INTO recetas (Titulo, Descripcion, Ingredientes, Preparacion, IDCateg, imagen, IDUsuarios) 
//         VALUES (?, ?, ?, ?, ?, ?, ?)";

// $stmt = $conexion->prepare($sql);

// if ($stmt === false) {
//     die('Error preparando la consulta: ' . $conexion->error);
// }

// $stmt->bind_param("ssssssi", $titulo, $descripcion, $ingredientes, $preparacion, $categoria, $nombre_imagen, $id_usuario);

// if ($stmt->execute()) {
//     header("Location: AgregarReceta.php?agrego=¡Receta guardada exitosamente!");
//     exit();
// } else {
//     echo "Error: " . $conexion->error;
//     header("Location: AgregarReceta.php?agrego=No se pudo guardar la receta correctamente...");
//     exit();
// }

// // Cerrar la declaración
// $stmt->close();
include('Conexion.php');
session_start();

if (!isset($_SESSION['Usuario'])) {
    header("Location: Inicio.php");
    exit();
}

// Obtener datos del formulario
$titulo = $_POST['titulo'];
$descripcion = $_POST['descripcion'];
$ingredientes = $_POST['ingredientes'];
$preparacion = $_POST['preparacion'];
$categoria = $_POST['categoria'];

// Obtener el ID del usuario desde la sesión
$id_usuario = $_SESSION['IDUsuarios'] ?? null;

if ($id_usuario === null) {
    die('El ID del usuario no está presente en la sesión.');
}

// Manejo de la imagen
if ($_FILES['imagen']['name']) {
    $nombre_imagen = $_FILES['imagen']['name'];
    $ruta_temporal = $_FILES['imagen']['tmp_name'];
    $ruta_destino = "imagenes/" . basename($nombre_imagen);
    move_uploaded_file($ruta_temporal, $ruta_destino);
} else {
    $nombre_imagen = null;
}

// Insertar los datos en la base de datos
$sql = "INSERT INTO recetas (Titulo, Descripcion, Ingredientes, Preparacion, IDCateg, imagen, IDUsuarios) 
        VALUES (?, ?, ?, ?, ?, ?, ?)";

$stmt = $conexion->prepare($sql);

if ($stmt === false) {
    die('Error preparando la consulta: ' . $conexion->error);
}

$stmt->bind_param("ssssssi", $titulo, $descripcion, $ingredientes, $preparacion, $categoria, $nombre_imagen, $id_usuario);

if ($stmt->execute()) {
    header("Location: AgregarReceta.php?agrego=¡Receta guardada exitosamente!");
    exit();
} else {
    echo "Error: " . $conexion->error;
    header("Location: AgregarReceta.php?agrego=No se pudo guardar la receta correctamente...");
    exit();
}

$stmt->close();
?>

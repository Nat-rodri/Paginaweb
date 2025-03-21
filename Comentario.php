<?php
include('Conexion.php');
session_start();

if (isset($_POST['comentario']) && isset($_POST['id_receta']) && isset($_SESSION['IDUsuarios'])) {
    $comentario = $_POST['comentario'];
    $id_receta = $_POST['id_receta'];
    $id_usuario = $_SESSION['IDUsuarios'];

    $sql = "INSERT INTO comentarios (IDRecetas, IDUsuarios, Comentario) VALUES (?, ?, ?)";
    $stmt = $conexion->prepare($sql);

    if ($stmt === false) {
        die('Error en la preparación de la consulta: ' . $conexion->error);
    }

    $stmt->bind_param("iis", $id_receta, $id_usuario, $comentario);

    if ($stmt->execute()) {
        header("Location: detalle_receta.php?id=" . $id_receta);
        exit();
    } else {
        echo "Error al guardar el comentario: " . $conexion->error;
    }

    $stmt->close();
} else {
    echo "Datos no válidos para guardar el comentario.";
}
?>

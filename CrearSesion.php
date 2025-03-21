<?php
include('Conexion.php');

$UsuarioR = $_POST['usuario'];
$Mail = $_POST['mail'];
$ClaveR = $_POST['clave'];
$RclaveR = $_POST['rclave'];

if (isset($_POST['usuario']) && isset($_POST['clave']) && isset($_POST['mail']) && isset($_POST['rclave'])) {
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        $data = strtolower($data);
        return $data;
    }

    $UsuarioR = validate($_POST['usuario']);
    $Mail = validate($_POST['mail']);
    $ClaveR = validate($_POST['clave']);
    $RclaveR = validate($_POST['rclave']);

    if (empty($UsuarioR)) {
        header("Location: SingUp.php?error2=El Usuario es requerido para registrarse");
        exit();
    }
    elseif (empty($Mail)) {
        header("Location: SingUp.php?error2=El Mail es requerido para registrarse");
        exit();
    }
    elseif (empty($ClaveR)) {
        header("Location: SingUp.php?error2=La Contraseña es requerida para registrarse");
        exit();
    }
    elseif (empty($RclaveR)) {
        header("Location: SingUp.php?error2=Es necesario repetir la Contraseña");
        exit();
    }
    elseif ($ClaveR !== $RclaveR) {
        header("Location: SingUp.php?error2=Las Contraseñas no coinciden");
        exit();
    } 
    else{
        $sqlUsu = "SELECT Usuario FROM usuarios WHERE Usuario = '$UsuarioR'";
        $resultadoUR = mysqli_query($conexion, $sqlUsu);

        $sqlMail = "SELECT CorreoElectronico FROM usuarios WHERE CorreoElectronico = '$Mail'";
        $resultadoMR = mysqli_query($conexion, $sqlMail);

        if(mysqli_num_rows($resultadoUR) > 0){
            header("Location: SingUp.php?error2=El nombre de Usuario ya existe");
            exit();
        }
        elseif(mysqli_num_rows($resultadoMR) > 0){
            header("Location: SingUp.php?error2=El Correo Electronico ya fue registrado");
            exit();
        }
        else{
            $sqlR = "INSERT INTO usuarios (Usuario, Clave, CorreoElectronico) VALUES ('$UsuarioR', '$ClaveR', '$Mail')";
            $resultadoR = mysqli_query($conexion, $sqlR);

            if($resultadoR){
                header("Location: SingUp.php?aviso=¡Se ha registrado correctamente!");
                exit();
            }
            else {
                header("Location: SingUp.php?error2=¡UPS! Ha habido un error al registrar");
                exit();
            }
        }
    }                                           
}
else{
    header("Location: SingUp.php");
    exit();
}
?>
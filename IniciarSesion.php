<?php
    session_start();
    include('Conexion.php');

    if (isset($_POST['Usuario']) && isset($_POST['Clave']) ) {
        function validate($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            $data = strtolower($data);
            return $data;
        }

        $Usuario = validate($_POST['Usuario']);
        $Clave = validate($_POST['Clave']);

        if (empty($Usuario)) {
            header("Location: Login.php?error1=El Usuario es requerido");
            exit();
        }
        elseif (empty($Clave)) {
            header("Location: Login.php?error1=La Clave es requerida");
            exit();
        }
        else{
            // $Clave = md5($Clave);

            $sql = "SELECT * FROM usuarios WHERE Usuario = '$Usuario' AND Clave = '$Clave'";
            $resultado = mysqli_query($conexion, $sql);

            if (mysqli_num_rows($resultado) === 1) {
                $row = mysqli_fetch_assoc($resultado);
                if($row['Usuario'] === $Usuario && $row['Clave'] === $Clave){
                    $_SESSION['Usuario'] = $row['Usuario'];
                    $_SESSION['IDUsuarios'] = $row['IDUsuarios'];
                    $_SESSION['CorreoElectronico'] = $row['CorreoElectronico'];
                    header("Location: Home.php");
                    exit();
                }
                else{
                    header("Location: Login.php?error1=El Usuario o la Clave son incorrectas");
                    exit();
                }
            }
            else{
                header("Location: Login.php?error1=El Usuario o la Clave son incorrectas");
                exit();
                }
        }
    }
    else{
        header("Location: Login.php");
        exit();
    }

?>
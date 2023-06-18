<?php
if (!empty($_POST['inputAdminButtonMaestro'])) {
    if (!empty($_POST['inputAdminEmailMaestro']) && !empty($_POST['inputAdminNombreMaestro']) && !empty($_POST['inputAdminApellidoMaestro']) && !empty($_POST['inputAdminDireccionMaestro']) && !empty($_POST['inputAdminFechaMaestro'])) {

        $servername = "127.0.0.1";
        $username = "root";
        $password = "";
        $dbname = "proyecto";

        $conn = mysqli_connect($servername, $username, $password, $dbname);
        $conn->set_charset("utf8");

        if (!$conn) {
            die("Error de conexión: " . mysqli_connect_error());
        }
    
        $email = $_POST['inputAdminEmailMaestro'];
        $name = $_POST['inputAdminNombreMaestro'];
        $apellido = $_POST['inputAdminApellidoMaestro'];
        $direccion = $_POST['inputAdminDireccionMaestro'];
        $fecha = $_POST['inputAdminFechaMaestro'];
        $fullName = $name . " " . $apellido;
        $permiso = 2;
        $password = "maestro";
        $estado = 1;
        
        $sql = "INSERT INTO universityusers (email, password, permiso, estado, nombre, direccion, fechaDeNacimiento) VALUES ('$email', '$password', '$permiso', '$estado', '$fullName', '$direccion', '$fecha')";
        if (mysqli_query($conn, $sql)) {
            header("Location: ../views/adminMaestros.view.php?alert=success");
            exit;
        } else {
            header("Location: ../views/adminMaestros.view.php?alert=error");
            exit;
        }
    } else {
        header("Location: ../views/adminMaestros.view.php?alert=empty");
        exit;
    }
}
?>
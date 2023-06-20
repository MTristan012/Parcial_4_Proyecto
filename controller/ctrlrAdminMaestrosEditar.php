<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "proyecto";

$conn = mysqli_connect($servername, $username, $password, $dbname);
$conn->set_charset("utf8");

if (!$conn) {
    die("Error de conexión: " . mysqli_connect_error());
}

$email = $_POST['inputAdminEmailMaestros'];
$name = $_POST['inputAdminNombreMaestros'];
$direccion = $_POST['inputAdminDireccionMaestros'];
$date = $_POST['inputAdminFechaMaestros'];
$clase = $_POST['inputAdminClaseMaestros'];
$id = $_POST['inputAdminIDMaestros'];

$sql = "UPDATE universityusers SET nombre = '$name', direccion = '$direccion', fechaDeNacimiento = '$date', claseAsignada = '$clase' WHERE id = '$id' ";
if (mysqli_query($conn, $sql)) {
    header("Location: ../views/adminMaestros.view.php");
    exit;
} else {
    echo "Error al insertar el registro: " . mysqli_error($conn);
    header("Location: ../views/adminMaestros.view.php");
    exit;
}
?>
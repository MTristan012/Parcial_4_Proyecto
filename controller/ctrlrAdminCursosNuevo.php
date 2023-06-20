<?php
if (!empty($_POST['inputAdminButtonCurso'])) {
    if (!empty($_POST['inputAdminMaestroCurso']) && !empty($_POST['inputAdminNombreCurso'])) {

        $servername = "127.0.0.1";
        $username = "root";
        $password = "";
        $dbname = "proyecto";

        $conn = mysqli_connect($servername, $username, $password, $dbname);
        $conn->set_charset("utf8");

        if (!$conn) {
            die("Error de conexión: " . mysqli_connect_error());
        }
        
        $name = $_POST['inputAdminNombreCurso'];
        $maestro = $_POST['inputAdminMaestroCurso'];
        
        $sql = "INSERT INTO universitycursos (clase, maestro) VALUES ('$name', '$maestro')";
        if (mysqli_query($conn, $sql)) {
            header("Location: ../views/adminClases.view.php?alert=success");
            exit;
        } else {
            header("Location: ../views/adminClases.view.php?alert=error");
            exit;
        }
    } else {
        header("Location: ../views/adminClases.view.php?alert=empty");
        exit;
    }
}
?>
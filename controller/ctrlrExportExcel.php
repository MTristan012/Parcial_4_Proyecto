<?php
if (isset($_POST["export_data"])) {
    if (!empty($libros)) {
        $filename = "libros.xls";
        header("Content-Type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=" . $filename);

        $mostrar_columnas = false;

        foreach ($libros as $libro) {
            if (!$mostrar_columnas) {
                echo implode("\t", array_keys($libro)) . "\n";
                $mostrar_columnas = true;
            }
            echo implode("\t", array_values($libro)) . "\n";
        }
    } else {
        echo 'No hay datos a exportar';
    }
    exit;
}
?>
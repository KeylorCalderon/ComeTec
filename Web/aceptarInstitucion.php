<?php
$idInstitucion = $_GET['idInstitucion'];
// Verificamos si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Conectamos a la base de datos
    include "includes/Conexion.php";
    $conn=conectar();

    // Verificamos si hay algún error en la conexión
    if ($conn->connect_error) {
        die("Error de conexión a la base de datos: " . $conn->connect_error);
    }

    // Se cambia el estado de la instutición a aceptado (estado 1)
    $sql = "UPDATE institucion SET estado = 1 WHERE ID = '$idInstitucion'";
    $result = mysqli_query($conn, $sql);

    if ($conn->query($sql)) {
        echo "Se ha aceptado la institución";
    } else {
        echo "Error al aceptar la institución" . $conn->error;
    }

    // Cerramos la conexión a la base de datos
    $conn->close();
}
?>
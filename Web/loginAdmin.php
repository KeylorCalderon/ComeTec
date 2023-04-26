<?php
// Verificamos si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtenemos los datos del formulario
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Aquí podrías validar que los datos sean correctos antes de guardarlos en la base de datos

    // Conectamos a la base de datos (reemplaza estos valores por los tuyos)
    include "includes/Conexion.php";
    $conn=conectar();

    // Verificamos si hay algún error en la conexión
    if ($conn->connect_error) {
        die("Error de conexión a la base de datos: " . $conn->connect_error);
    }

    // Insertamos los datos en la base de datos (aquí podrías encriptar la contraseña antes de guardarla)
    $sql = "SELECT * FROM administrador WHERE usuario = '$username' AND contrasena = '$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo "<script>location.href='index.php';</script>";
    } else {
        echo "Error al iniciar sesión: " . $conn->error;
    }

    // Cerramos la conexión a la base de datos
    $conn->close();
}
?>

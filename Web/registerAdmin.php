<?php
// Verificamos si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtenemos los datos del formulario
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Aquí podrías validar que los datos sean correctos antes de guardarlos en la base de datos

    // Conectamos a la base de datos (reemplaza estos valores por los tuyos)
    include "includes/Conexion.php";
    $conn=conectar();

    // Verificamos si hay algún error en la conexión
    if ($conn->connect_error) {
        die("Error de conexión a la base de datos: " . $conn->connect_error);
    }

    if ($password === $confirm_password) {
        // Insertamos los datos en la base de datos (aquí podrías encriptar la contraseña antes de guardarla)
        $sql = "INSERT INTO administrador (usuario, contrasena) VALUES ('$username', '$password')";
        if ($conn->query($sql) === TRUE) {
            echo "<script>window.alert('El administrador ha sido registrado correctamente');</script>";
            echo "<script>location.href='loginAdminForm.php';</script>";
        } else {
            echo "<script>window.alert('Ha ocurrido un error al registrar el administrador');</script>";
        }
    } else {
        echo "<script>window.alert('Las contraseñas ingresadas no coinciden');</script>";
        echo "<script>location.href='loginAdminForm.php';</script>";
    }
    

    // Cerramos la conexión a la base de datos
    $conn->close();
}
?>

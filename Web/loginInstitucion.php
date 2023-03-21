<?php
        include "includes/sesionInicio.php";
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>Inicio de Sesión de Administrador</title>
	<link rel="stylesheet" type="text/css" href="css/loginAdmin.css">
</head>
<?php
        include "includes/Encabezado.php";
?>
<body>
	<div class="container">
		<h2>Inicio de Sesión de Institución</h2>
		<form method="POST">

        <h3>Inicio de sesión</h3>

			<div class="form-group">
				<label for="username">Nombre de usuario:</label>
				<input type="text" id="username" name="username" required>
			</div>
			<div class="form-group">
				<label for="password">Contraseña:</label>
				<input type="password" id="password" name="password" required>
			</div>
			<div class="form-group">
				<input type="submit" value="ingresar" name="Ingresar">
			</div>
		</form>


		<form method="POST" action="registroInstitucion.php">
			<div class="form-group">
				<input type="submit" value="Registrar">
			</div>
		</form>
	</div>
</body>

<?php

    function ValidarDatos(){
        // Validación de credenciales
        $username = $_POST["username"];
        $password = $_POST["password"];

        if($username == "" || $password == ""){
            return false;
        }   
            
        $conn=conectar();
        $resultado =mysqli_query($conn,  
        "SELECT * FROM institucion WHERE usuario = '$username' AND contrasena = '$password'");

        if(mysqli_num_rows($resultado) != 0) {
            echo "<script>window.alert('Inicio de sesión exitoso');</script>";
        } else {
            echo "<script>window.alert(' $username $password Contreseña o usuario incorrecto.');</script>";
        }
        mysqli_close($conn);
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['ingresar'])) {
        ValidarDatos();
    }
?>

<script type="text/javascript">
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }

    </script>
</html>
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

    <div class="espacio">   
    </div>
    <div class="espacio">   
    </div>

	<div class="registro-form">
		<h2>Inicio de sesión institución</h2>
		<form method="POST">

        <h3>Inicio de sesión</h3>
			
			<label for="username">Nombre de usuario:</label>
			<input type="text" id="username" name="username"  class="registro-input" required>
			
			<label for="password">Contraseña:</label>
			<input type="password" id="password" name="password"  class="registro-input" required>

			<input type="submit" value="Ingresar" name="Ingresar"  class="registrobutton">
		
		</form>


		<form method="POST" action="registroInstitucion.php">
		
				<input type="submit" value="Registrar"  class="registrobutton">
		
		</form>
	</div>
</body>

<div class="espacio">   
    </div>

    <div class="espacio">   
    </div> 

<?php
            include "includes/PiePagina.php";
        ?>


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

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['Ingresar'])) {
        ValidarDatos();
    }
?>

<script type="text/javascript">
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }

    </script>
</html>
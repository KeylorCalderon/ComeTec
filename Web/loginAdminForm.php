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
		<h2>Inicio de Sesión de Administrador</h2>
		<form method="POST" action="loginAdmin.php">
			<div class="form-group">
				<label for="username">Nombre de usuario:</label>
				<input type="text" id="username" name="username" required>
			</div>
			<div class="form-group">
				<label for="password">Contraseña:</label>
				<input type="password" id="password" name="password" required>
			</div>
			<div class="form-group">
				<input type="submit" value="Iniciar Sesión">
			</div>
		</form>
		<form method="POST" action="registerAdminForm.php">
			<div class="form-group">
				<input type="submit" value="Registrar">
			</div>
		</form>
	</div>
</body>
</html>
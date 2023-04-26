<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Crear Equipo</title>
	<link rel="stylesheet" type="text/css" href="css/registerAdmin.css">
</head>
<?php
        include "includes/Encabezado.php";
		$idInstitucion=$_GET['ID'];
		// Traer desde la base de datos los grados disponibles para el equipo
		$query = "SELECT * FROM grado";
		$conn = conectar();
		$result = mysqli_query($conn, $query);
?>
<body>
	<div class="container">
		<h2>Crear Equipo</h2>
		<form method="POST" action="addTeam.php?ID=<?php echo $idInstitucion; ?>">
			<div class="form-group">
				<label for="teamname">Nombre del equipo:</label>
				<input type="text" id="teamname" name="teamname" required>
			</div>
			<!-- Dropdown para mostrar los grados disponibles del equipo, traidos desde la base de datos -->
			<div class="form-group">
				<label for="teamgrade">Grado del equipo:</label>
				<select id="teamgrade" name="teamgrade">
					<?php
						while($row = mysqli_fetch_assoc($result)){
							$gradoID = $row['ID'];
							$grado = $row['nombre'];
							echo "<option value='$gradoID'>$grado</option>";
						}
					?>
				</select>
			</div>
			<div class="form-group">
				<input type="submit" value="Crear">
			</div>
		</form>
	</div>
</body>
</html>
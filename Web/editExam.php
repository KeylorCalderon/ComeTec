<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Editar examen</title>
	<link rel="stylesheet" type="text/css" href="css/registerAdmin.css">
</head>
<?php
        include "includes/Encabezado.php";
		$idExamen=$_GET['ID'];
        // Traer desde la base de datos los examenes disponibles para el examen
        $query = "SELECT P.ID, P.pregunta, P.puntos FROM examen E, pregunta P WHERE E.ID=$idExamen and E.ID=P.examenID";
        $conn = conectar();
        $result = mysqli_query($conn, $query);
?>
<body>
    <div class="wrapper">
    <nav class="menu-paginas">
        <?php
                $lista = array();
                    while($row = mysqli_fetch_assoc($result)){
                        $lista[] = $row;
                    }
                ?>
            <ul class="mi-lista">
                <?php $contador = 1;
                foreach($lista as $elemento): ?>
                    <li>
                        <p class="nombre"><?php echo 'Pregunta #'.$contador;  ?></p>
                        <p class="grado"><?php echo 'Pregunta: '; echo $elemento['pregunta'];  ?></p>
                        <p class="fecha"><?php echo 'Puntos: '; echo $elemento['puntos'];?></p>
                        <div class="editar">
                            <form action="editQuestion.php" method="GET">
                                <input type="hidden" name="ID" value="<?php echo $elemento['ID']; ?>">
                                <input type="hidden" name="numeroPregunta" value="<?php echo $contador; ?>">
                                <button class="btnEncabezado" type="submit">Editar</button>
                            </form>
                            <button class="btnEliminar" type="submit" onclick="confirmDelete('<?php echo $elemento['ID']; ?>', '<?php echo $contador; ?>')">Eliminar</button>
                        </div>
                    </li>
                <?php $contador++;
                endforeach; ?>
            </ul>
            <div class="boton-container">
                <button onclick="window.location.href=''">Administrar Examenes</button>
            </div>
        </nav>
	</div>
    <script>
        function confirmDelete(preguntaID, cont) {
            // Crear un objeto XMLHttpRequest
            var xhttp = new XMLHttpRequest();

            // Definir la función que se ejecutará cuando se reciba una respuesta del servidor
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    // Mostrar la respuesta del servidor en la consola del navegador
                    alert(this.responseText);
                }
            };

            // Abrir una conexión con el servidor
            xhttp.open("POST", "deleteQuestion.php", true);

            // Establecer las cabeceras de la solicitud
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

            // Enviar los datos al servidor
            xhttp.send("preguntaID="+preguntaID);
    
        }
    </script>

</body>
</html>
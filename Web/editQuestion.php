<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Editar examen</title>
	<link rel="stylesheet" type="text/css" href="css/registerAdmin.css">
</head>
<?php
        include "includes/Encabezado.php";
		$idPregunta=$_GET['ID'];
        $numeroPregunta=$_GET['numeroPregunta'];
        // Traer desde la base de datos los examenes disponibles para el examen
        $query = "SELECT P.ID, P.pregunta, P.puntos FROM pregunta P WHERE $idPregunta=P.ID";
        $conn = conectar();
        $result = mysqli_query($conn, $query);

        $query2 = "SELECT D.ID, D.distractor FROM preguntaxdistractor PXD, distractor D WHERE $idPregunta=PXD.preguntaID and PXD.distractorID=D.ID ";
        $result2 = mysqli_query($conn, $query2);

        $query3 = "SELECT R.ID, R.respuesta FROM respuesta R WHERE $idPregunta=R.preguntaID";
        $result3 = mysqli_query($conn, $query3);
?>
<body>
    <div class="wrapper">
    <nav class="menu-paginas">
        <?php
            $elemento = mysqli_fetch_assoc($result);
            $respuestaCorrecta=mysqli_fetch_assoc($result3);
        ?>
        <?php
            $lista2 = array();
            while($row = mysqli_fetch_assoc($result2)){
                $lista2[] = $row;
            }
        ?>
            <div class="mi-lista-unica">
                <p class="nombre"><?php echo 'Pregunta #'.$numeroPregunta;  ?></p>
                <p class="grado"><?php echo 'Pregunta: '; echo $elemento['pregunta'];  ?></p>
                <p class="fecha"><?php echo 'Puntos: '; echo $elemento['puntos'];?></p>
            

                <ul class="mi-lista-unica-respuestas">
                    <h1>Respuesta correcta</h1>
                    <li> 
                        <p><?php echo 'Pregunta: '; echo $respuestaCorrecta['ID'];  ?></p>
                        <p><?php echo 'Puntos: '; echo $respuestaCorrecta['respuesta'];?></p>
                        <div>
                            <form action="editQuestion.php" method="GET">
                                <input type="hidden" name="ID" value="<?php echo $elemento['ID']; ?>">
                                <button class="btnEncabezado" type="submit">Editar</button>
                            </form>
                            <button class="btnEliminar" type="submit" onclick="confirmDelete('<?php echo $elemento['ID']; ?>', '<?php echo $contador; ?>')">Eliminar</button>
                        </div>
                    </li>
                    <h1>Distractores</h1>
                    <?php $contador = 1;
                    foreach($lista2 as $elemento): ?>
                        <li> 
                            <p ><?php echo 'Pregunta #'.$contador;  ?></p>
                            <p ><?php echo 'Pregunta: '; echo $elemento['ID'];  ?></p>
                            <p ><?php echo 'Puntos: '; echo $elemento['distractor'];?></p>
                            <div>
                                <form action="editQuestion.php" method="GET">
                                    <input type="hidden" name="ID" value="<?php echo $elemento['ID']; ?>">
                                    <button class="btnEncabezado" type="submit">Editar</button>
                                </form>
                                <button class="btnEliminar" type="submit" onclick="confirmDelete('<?php echo $elemento['ID']; ?>', '<?php echo $contador; ?>')">Eliminar</button>
                            </div>
                        </li>
                    <?php $contador++;
                    endforeach; ?>
                </ul>

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
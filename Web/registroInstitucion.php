<!DOCTYPE html>
<html lang="en">

    <?php
            include "includes/Encabezado.php";
    ?>

    <body>

            
        <html>
            <head>
                <title>Formulario de Registro</title>
            </head>

            <body>
                <div class="espacio">   
                </div>
                <form class="registro-form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>?t=<?php echo time(); ?>">
                    <h1>Registro Institución</h1>

                    <label for="nombre">Nombre de la Institución</label>
                    <input type="text" id="nombre" name="nombre" class="registro-input" required>

                    <label for="contraseña">Nombre de usuario</label>
                    <input type="text" id="usuario" name="usuario" class="registro-input" required>

                    <label for="contraseña">Contraseña</label>
                    <input type="password" id="contraseña" name="contraseña" class="registro-input" required>

                    <label for="confirmar-contraseña">Confirmar Contraseña</label>
                    <input type="password" id="confirmarcontraseña" name="confirmarcontraseña" class="registro-input" required>

                    <input type="submit" value="Registrarse" name ="Registrarse" class="registrobutton">
                </form>

            </body>
        </html>

    
        <div class="espacio">       
        </div>

        <?php
            include "includes/PiePagina.php";
        ?>


    <?php
    function InsertarDatos() {
        // Obtener los datos a insertar
        $nombre = $_POST["nombre"];
        $usuario = $_POST["usuario"];
        $contraseña = $_POST["contraseña"];
        $contraseña2 = $_POST["confirmarcontraseña"];
        $estado = false;

        // Verificar que los datos estén completos
        if($contraseña != $contraseña2){
            echo "<script>window.alert('Error');</script>";
            return false;
        }   

        // Conectar a la base de datos
        $conn = conectar();

        // Realizar la consulta de inserción
        
        $insertQuery = "INSERT INTO institucion (usuario, contrasena, nombre, estado) 
        VALUES ('$usuario', '$contraseña', '$nombre', '$estado')";

        $conn->query($insertQuery);


        if($resultado){
            echo "Datos insertados correctamente";
        } else {
            echo "Error al insertar los datos: " . mysqli_error($conn);
        }

        echo "<script>window.alert('exito');</script>";

        // Cerrar la conexión a la base de datos
        mysqli_close($conn);
    }

    // Verificar si se recibió una solicitud de inserción
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['Registrarse'])) {
        InsertarDatos();
    }
    ?>

    </body> 
        
    <script type="text/javascript">
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>



</html>
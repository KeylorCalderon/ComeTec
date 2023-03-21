
<!DOCTYPE html>
<html lang="en">

    <?php
            include "includes/Encabezado.php";
    ?>

    <body>
        <div class="wrapper">        
            <main>
                <nav class="menu-paginas">
                    <a href="catalogo-productos-servicios.php">Catalogo de productos</a>
                    <a href="ReiniciarBD.php">Reiniciar la Base de Datos</a>
                    <a href="automatizacion.php">Registrar empresa</a>
                    <a href="registroInstitucion.php">Registrar institución</a>
                    <a href="ranking.php">Ver ranking</a>
                    <a href="gestionEquipos.php">Gestionar Equipos</a>
                </nav> 
            </main>
        </div>

        <div class="contenedor">
            <form method="post" class="login" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>?t=<?php echo time(); ?>">
                <h3>Inicio de sesión</h3>
                <input type="text" name="username" placeholder="Usuario" required>
                <input type="password" name="password" placeholder="Contraseña" required>
                <input type="submit" name="ingresar" value="Ingresar">
            </form>
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

                if(mysqli_num_rows($resultado) == 1) {
                    echo "<script>window.alert('Inicio de sesión exitoso');</script>";
                } else {
                    echo "<script>window.alert('Contreseña o usuario incorrecto.');</script>";
                }
                mysqli_close($conn);
        }
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['ingresar'])) {
            ValidarDatos();
        }
        ?>

    </body> 
    
    <script type="text/javascript">
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }

    </script>
</html>
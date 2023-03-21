
<!DOCTYPE html>
<html lang="en">

    <?php
            include "includes/Encabezado.php";
    ?>

    <div class="wrapper">        
        <main>
            <nav class="menu-paginas">
                <a href="catalogo-productos-servicios.php">Catalogo de productos</a>
                <a href="includes/DatosPrueba.php">Cargar la Base de Datos</a>
                <a href="ReiniciarBD.php">Reiniciar la Base de Datos</a>
                <a href="automatizacion.php">Registrar empresa</a>
                <a href="loginInstitucion.php">Iniciar sesión institución</a>
                <a href="ranking.php">Ver ranking</a>
                <a href="gestionEquipos.php?ID=1">Gestionar Equipos</a>
                <a href="loginAdminForm.php">Iniciar Sesión de Administrador</a>
                <a href="gestionarInstituciones.php">Gestionar Instituciones</a>
                <a href="gestionarInstitucionesPendientes.php">Gestionar instituciones Pendientes</a>
            </nav> 
        </main>
    </div>


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
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['ingresar'])) {
            ValidarDatos();
        }
        ?>


    </body> 
    
</html>
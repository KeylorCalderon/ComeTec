<?php
        include "includes/sesionInicio.php";
?>

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
                <a href="includes/DatosPrueba.php">Cargar la Base de Datos</a>
                <a href="ReiniciarBD.php">Reiniciar la Base de Datos</a>
                <a href="automatizacion.php">Registrar empresa</a>
                <a href="ranking.php">Ver ranking</a>
                <a href="gestionEquipos.php">Gestionar Equipos</a>
                <a href="loginAdminForm.php">Iniciar Sesión de Administrador</a>
                <a href="gestionarInstituciones.php">Gestionar Instituciones</a>
                <a href="gestionarInstitucionesPendientes.php">Gestionar instituciones Pendientes</a>
            </nav> 
        </main>

    </div>

    <?php
        include "includes/PiePagina.php";
    ?>
</body>

</html>
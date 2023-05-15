<!DOCTYPE html>
<html lang="en">
    
    <!-- Enlace al archivo CSS -->
    <link rel="stylesheet" href="css/index.css">

    <?php
        include "includes/Encabezado.php";
    ?>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <div class="wrapper">
        <main>
            <nav class="menu-paginas">
                <div class="boton-container">
                    <button onclick="window.location.href='examListForm.php'">Administrar Examenes</button>
                </div>
            </nav>
        </main>
    </div>

    <?php
        include "includes/PiePagina.php";
    ?>

</html>
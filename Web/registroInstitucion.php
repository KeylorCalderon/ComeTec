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

        
        <div class="espacio">   
        </div>


        <div class="contenedor">
            
        <html>
<head>
  <title>Formulario de Registro</title>
  
</head>
<body>
    <div class="espacio">   
    </div>
    <form class="registro-form">
        <h1>Registro Institución</h1>

        <label for="nombre">Nombre de la Institución</label>
        <input type="text" id="nombre" name="nombre" class="registro-input" required>

        <label for="contraseña">Nombre de usuario</label>
        <input type="text" id="usuario" name="usuario" class="registro-input" required>

        <label for="contraseña">Contraseña</label>
        <input type="password" id="contraseña" name="contraseña" class="registro-input" required>

        <label for="confirmar-contraseña">Confirmar Contraseña</label>
        <input type="password" id="confirmar-contraseña" name="confirmar-contraseña" class="registro-input" minlength="8" required>

        <input type="submit" value="Registrarse" class="registro-button">
    </form>

</body>
</html>

        </div>
        
        <div class="espacio">       
        </div>

        <?php
            include "includes/PiePagina.php";
        ?>


    </body> 
        
    <script type="text/javascript">
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }

    </script>
</html>
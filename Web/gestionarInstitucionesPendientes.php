<?php
        include "includes/sesionInicio.php";
?>

<!DOCTYPE html>
<html lang="en">



<?php
        include "includes/Encabezado.php";
?>
<body>     
    <main>
        <style>
            tr td:first-child {
                border-radius: 15px 0px 0px 15px;
            }
                tr td:last-child  {
                border-radius: 0px 15px 15px 0px;
            }
        </style>
        <div class="galeria">
            <table class="galeria" width="75%">
              <?php
                $conn=conectar();
                $result=mysqli_query($conn, "SELECT * FROM institucion WHERE estado = 0");      
                $cantidadInstituciones = mysqli_num_rows($result); 
                if ($cantidadInstituciones > 0) {                       
                    while($row=mysqli_fetch_assoc($result)){
                    $idInstitucion=$row['ID'];
                    $nombre = $row['nombre'];
                    echo "<div>
                            <tr class='espacio'></tr>
                                <tr class='galeria-item' bgcolor=#F7F7FE>
                                    <td class='titulos'  width='150px'>
                                        <h4>$nombre</h4>
                                    </td>
                                    <td class='titulos'  width='150px'>
                                        <form class='titulos' action='aceptarInstitucion.php?idInstitucion=$idInstitucion' method='post'>
                                            <button type='submit' name='idInstitucion' id='$idInstitucion' class='btn-estandar'>Aceptar</button>
                                        </form> 
                                    </td>
                                </tr>
                            <tr class='espacio'></tr>
                            </div>";
                    
                    }
                } else {
                    echo "<div>
                    <tr class='espacio'></tr>
                        <tr class='galeria-item' bgcolor=#F7F7FE>
                            <td class='titulos'  width='150px'>
                                <h4>No hay instituciones pendientes de aceptar</h4>
                            </td>
                        </tr>
                    <tr class='espacio'></tr>
                    </div>";
                }
                mysqli_close($conn);
              ?>
            </table>
        </div>
    </main>

    

    <?php
        include "includes/PiePagina.php";
    ?>
</body>

</html>
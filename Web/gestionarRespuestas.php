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

                $preguntaID=$_GET['ID'];
                $conn=conectar();
                $result=mysqli_query($conn, "SELECT * FROM respuesta WHERE preguntaID='$preguntaID'");

                echo "<div>
                          <tr class='espacio'></tr>
                            <tr class='galeria-item' bgcolor=#F7F7FE>
                                <td class='titulos'  width='150px'>
                                    <h4>                    </h4>
                                </td>
                                </td>
                                <td class='titulos'  width='450px'>
                                    <h4>Agregar Nueva Respuesta</h4>
                                </td>                              
                                <td class='titulos'  width='50px'>
                                    <h4>                    </h4>
                                </td>
                                <td class='titulos'  width='150px'>
                                    <form class='titulos' action='addAnswerForm.php?ID=$preguntaID' method='post'>
                                        <button type='submit' name='ID' id='$preguntaID' class='btn-estandar'>Añadir</button>
                                    </form> 
                                </td>
                            </tr>
                          <tr class='espacio'></tr>
                </div>";

                while($row=mysqli_fetch_assoc($result)){
                  $respuestaID = $row['ID'];         
                  $respuesta = $row['respuesta'];
                  $correcta = $row['correcta'];
                  if ($correcta == 1) {
                    $correcta = 'Correcta';
                  }else{
                    $correcta = 'Distractor';
                  };
                  echo "<div>
                          <tr class='espacio'></tr>
                            <tr class='galeria-item' bgcolor=#F7F7FE>
                                <td class='titulos'  width='150px'>
                                    <h4>$correcta</h4>
                                </td>
                                <td class='titulos'  width='450px'>
                                    <h4>$respuesta</h4>
                                </td>
                                <td class='titulos'  width='25px'>
                                    <form class='titulos' action='equipo.php?ID=0' method='post'>
                                        <button type='submit' name='ID' id='0' class='btn-estandar'>Editar</button>
                                    </form> 
                                </td>
                                <td class='titulos'  width='125px'>
                                    <form class='titulos' action='equipo.php?ID=0' method='post'>
                                        <button type='submit' name='ID' id='0' class='btn-estandar'>Eliminar</button>
                                    </form> 
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

function 
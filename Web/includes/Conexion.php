<?php

function cerrar($conn){
    mysqli_close($conn);
}

function conectar(){
    
    $servername = "localhost";
    $database = "cometec_DB";
    $username = "root";
    $password = "";

    $conn = mysqli_connect($servername, $username, $password, $database);
    if(!$conn)
    {
        echo "<h3>No se ha podido conectar PHP - MySQL, verifique sus datos.</h3><hr><br>";
        echo $conn->connect_errno;
    }
    /*
    else
    {
        echo "<h3>Conexion Exitosa PHP - MySQL</h3><hr><br>";
    }
    */

    return $conn;   
}
?>

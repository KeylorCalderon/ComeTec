<?php
require_once('db_credentials.php');
$mysqli= new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
$result = '';

if ($mysqli -> connect_errno)
{
	echo 'Error en la conexión';
	exit;
}

function deleteEstudiante($id)
{
		global $mysqli;
	    $sql="DELETE FROM estudianteXequipo WHERE estudianteID=$id";
	    $mysqli->query($sql);
}
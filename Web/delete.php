<?php
include_once('db/db_utilities.php');

$idBack= (int)$_GET['IDback'];	
$id= (int)$_GET['ID'];

header("Location: equipo.php?ID=1");

deleteEstudiante($id);

	
	


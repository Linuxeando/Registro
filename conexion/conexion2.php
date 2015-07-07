<?php
	$servidor = "localhost";
	$usuario = "aztecatu_adrian";
	$password = "aztlirulz";
	$mydb = "aztecatu_registro";
	$conexion = mysqli_connect($servidor,$usuario,$password);

	if (! $conexion) {
		//echo "Error de conexion";
	} else {
		//echo "Conexion exitosa";
		$ok = mysqli_select_db($conexion, $mydb);
		if($ok){
			// echo "Base de datos selecionada";
		}else {
			//echo "No se pudo seleccionar la base de datos";
		}
	}
?>

<?php

function insertMATERIAL($link, $nombre, $descripcion, $url, $imagen, $fecha, $idusuario)
{
//guardar los datos en la BD
	$query = "INSERT INTO" 
		. " materiales (nombre, descripcion, url, imagen, fechapublicacion, idusuario)"
		. " VALUES ('$nombre','$descripcion','$url', '$imagen', '$fecha', $idusuario)";
	
	echo "<p>$query</p>";

	$resultado = @mysqli_query($link, $query);
	if(!$resultado) 
	{
		echo "<p>Error al ejecutar la sentencia <b>$query</b>: " 
		. mysqli_error($link)
		. "</p>";
		return false;
	}


	return true;
}

function getmaterialesbyidusuario($link, $idusuario)
{
	$query = "SELECT *" 
		. " FROM materiales"
		. " WHERE idusuario = $idusuario"
		. " order by fechapublicacion desc";
	
	//echo "<p>$query</p>";

	$resultado = @mysqli_query($link, $query);

	//echo "<P>Valor de resultado: $resultado</P>";

	if($resultado)
	{
			return $resultado;
	}

	//echo "foto: $foto";

	//liberar memoria del resultado
	mysqli_free_result($resultado);

	return false;
}

?>

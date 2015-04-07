<?php



function insertUSUARIO($link, $nombre, $apellidos, $email, $pass, $foto)
{
//guardar los datos en la BD
	$query = "INSERT INTO" 
		. " usuarios (nombre, apellidos, email, password, foto)"
		. " VALUES ('$nombre','$apellidos','$email', '$pass', '$foto')";
	
	//echo "<p>$query</p>";

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

function getidusuariobyemailpass($link, $email, $pass)
{
	$query = "SELECT id" 
		. " FROM usuarios"
		. " WHERE email = '$email'"
		. " and password = '$pass'";
	
	//echo "<p>$query</p>";

	$resultado = @mysqli_query($link, $query);

	//echo "<P>Valor de resultado: $resultado</P>";

	$id=false;
	if($resultado)
	{
		if($fila = mysqli_fetch_assoc($resultado))
		{
			$id = $fila['id'];
		}
	}

	//echo "id: . $id";

	//liberar memoria del resultado
	mysqli_free_result($resultado);

	return $id;
}

function getnombreusuariobyid($link, $id)
{
	$query = "SELECT *" 
		. " FROM usuarios"
		. " WHERE id = '$id'";
	
	//echo "<p>$query</p>";

	$resultado = @mysqli_query($link, $query);

	//echo "<P>Valor de resultado: $resultado</P>";

	$nombre=false;
	if($resultado)
	{
		if($fila = mysqli_fetch_assoc($resultado))
		{
			$nombre = $fila['nombre'];
		}
	}

	//echo "nombre: $nombre";

	//liberar memoria del resultado
	mysqli_free_result($resultado);

	return $nombre;
}

function getfotousuariobyid($link, $id)
{
	$query = "SELECT *" 
		. " FROM usuarios"
		. " WHERE id = $id";
	
	//echo "<p>$query</p>";

	$resultado = @mysqli_query($link, $query);

	//echo "<P>Valor de resultado: $resultado</P>";

	$foto=false;
	if($resultado)
	{
		if($fila = mysqli_fetch_assoc($resultado))
		{
			$foto = $fila['foto'];
		}
	}

	//echo "foto: $foto";

	//liberar memoria del resultado
	mysqli_free_result($resultado);

	return $foto;
}

function getdatosusuariobyid($link, $id)
{
	$query = "SELECT *" 
		. " FROM usuarios"
		. " WHERE id = $id";
	
	//echo "<p>$query</p>";

	$resultado = @mysqli_query($link, $query);

	//echo "<P>Valor de resultado: $resultado</P>";

	if($resultado)
	{
		if($fila = mysqli_fetch_assoc($resultado))
		{
			return $fila;
		}
	}

	//echo "foto: $foto";

	//liberar memoria del resultado
	mysqli_free_result($resultado);

	return false;
}

?>
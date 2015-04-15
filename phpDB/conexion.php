<?php

function abrirconexion()
{
	$link = @mysqli_connect(
		'192.168.1.195',//'localhost', // El servidor
		'webdb', // El usuario
		'yYTVR7n23FCxPu7F', // La contraseña
		'socialnetwork'); // La base de datos	

	if(!$link) 
	{
		echo "<p>Error al conectar con la base de datos: " 
			. mysqli_connect_error()
			. "</p>";
	}
	return $link;
}

function cerrarconexion($link)
{
	mysqli_close($link);
}

?>
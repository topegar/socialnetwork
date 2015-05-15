<?php

function abrirconexion()
{
	//echo "HOST: " . gethostname();

	$hostname = gethostname();

	$link = false;
	if($hostname == "srv21.main-hosting.eu")
	{
		$link = @mysqli_connect(
			'mysql.hostinger.es', //'localhost', // El servidor
			'u653407273_admin', // El usuario
			'aportodas', // La contraseña
			'u653407273_scnwk'); // La base de datos	
	}
	else
	{
		//el servidor de BD local (XAMPP)
		$link = @mysqli_connect(
			'127.0.0.1',//'localhost', // El servidor
			'webdb', // El usuario
			'yYTVR7n23FCxPu7F', // La contraseña
			'socialnetwork'); // La base de datos	
	}

	if(!$link) 
	{
		echo "<p>Error al conectar con la base de datos: " 
			. mysqli_connect_error()
			. "</p>";
	}

	if($link)
	{
		$charset = mysqli_set_charset($link , "utf8");
		//echo "chaset: $charset";
	}

	return $link;
}

function cerrarconexion($link)
{
	mysqli_close($link);
}

?>
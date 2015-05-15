<?php
require_once("define.php");
require_once("phpDB/conexion.php");
require_once("phpDB/tablamateriales.php");

header("Content-Type: text/html;charset=utf-8");

session_start();

$nombre = "";
$descripcion = "";	
$url = "";
$imagen = "";

//punto de entrada del codigo PHP

if(isset($_POST['nombre']))
	$nombre = $_POST['nombre'];
	//$nombre = utf8_decode($_POST['nombre']);

if(isset($_POST['descripcion']))
	$descripcion = $_POST['descripcion'];	
	//$descripcion = utf8_decode($_POST['descripcion']);	

if(isset($_POST['url']))	
	$url = utf8_decode($_POST['url']);

	echo "<p>Los datos bien</p>";


if($_FILES['imagen']['error'] == 0)
{
	if($_FILES['imagen']['type'] == "image/jpeg"
		|| $_FILES['imagen']['type'] == "image/png")
	{

		$aleatorio = rand().rand().rand();

		if(!is_dir(MATERIALES_FOLDER))
			mkdir(MATERIALES_FOLDER);

		move_uploaded_file($_FILES['imagen']['tmp_name'],
			MATERIALES_FOLDER."/".$aletatorio.$_FILES['imagen']['name']);

		$imagen = $aleatoiro.$_FILES['imagen']['name'];

		//echo "<p>El archivo bien</p>";
	}
	else
	{
		echo "<p>El tipo del archivo no es el correcto</p>";		
	}
}
else
{
	echo "<p>Error en la recepcion del archivo</p>";
}


//solo se hace algo en caso de que el usuario este logado
//y el campo nombre no este vacio
if(isset($_SESSION['iduser']) && $nombre != "")
{
	$link = abrirconexion();
	if($link)
	{
		//insertar una fila nueva en la tabla usuarios
		$fecha = date("Ymd");

		echo "<p>Nombre: $nombre </p>";
		echo "<p>Descripcion: $descripcion </p>";

		$ok = insertMATERIAL($link, $nombre, $descripcion, $url, $imagen, $fecha, $_SESSION['iduser']);

		if($ok)
			echo "<p>Datos insertado correctamente</p>";
		else
			echo "<p>Error en la inserción de datos</p>";

		echo "<P>Todo correcto</P>";

		cerrarconexion($link);		
		header('Location: materiales.php');
	}
	else
	{
		echo "Error en la conexión a la BD";		
	}
}

?>
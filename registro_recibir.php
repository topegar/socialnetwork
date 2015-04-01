<?php
require_once("define.php");
require_once("phpDB/conexion.php");
require_once("phpDB/tablausuarios.php");

session_start();

function validar_email($email)
{
	$patron = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/";

	if(!preg_match($patron, $email))		
		return false;

	return true;
}

function validar_password($pass)
{
	$patron = "/^[A-Za-z0-9]{6,10}$/";

	if(!preg_match($patron, $pass))
		return false;

	return true;
}

function validar_registro($nombre, $apellidos, $email, $emailrep, $pass, $passrep)
{
	if($nombre == "")
	{
		echo "Error nombre: $nombre";
		return false;
	}
	if($apellidos == "")
	{
		echo "Error nombre: $apellidos";
		return false;
	}

	if(!validar_email($email))
	{
		echo "Error nombre: $email";
		return false;
	}

	if($email != $emailrep)
	{
		echo "Error nombre: $emailrep";
		return false;
	}

	if(!validar_password($pass))
	{
		echo "Error nombre: $pass";
		return false;
	}

	if($pass != $passrep)
	{
		echo "Error nombre: $passrep";
		return false;
	}

	return true;
}


//punto de entrada del codigo PHP
if(isset($_POST['nombre']) && isset($_POST['apellidos'])
	&& isset($_POST['email']) && isset($_POST['emailrep'])
	&& isset($_POST['pass']) && isset($_POST['passrep']))
{
	$nombre = $_POST['nombre'];
	$apellidos = $_POST['apellidos'];	
	$email = $_POST['email'];
	$emailrep = $_POST['emailrep'];
	$pass = $_POST['pass'];	
	$passrep = $_POST['passrep'];
	$foto = "";
	
	echo "<p>Los datos bien</p>";
}
else{
	$nombre = "";
	$apellidos = "";	
	$email = "";
	$emailrep = "";
	$pass = "";	
	$passrep = "";
	$foto = "";

	echo "<p>Error en la recepcion de datos</p>";
}
/*
echo "<p>".$_FILES['pic']['error']."</p>";
echo "<p>".$_FILES['pic']['type']."</p>";
echo "<p>".$_FILES['pic']['tmp_name']."</p>";
echo "<p>".USER_FOLDER."/".$_FILES['pic']['name']
."</p>";
*/

if($_FILES['pic']['error'] == 0)
{
	if($_FILES['pic']['type'] == "image/jpeg"
		|| $_FILES['pic']['type'] == "image/png")
	{

		move_uploaded_file($_FILES['pic']['tmp_name'],
			USER_FOLDER."/".$_FILES['pic']['name']);

		$foto = $_FILES['pic']['name'];

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

if(!validar_registro($nombre, $apellidos, $email, $emailrep, $pass, $passrep))
{
	echo "Error en la validacion de los datos";
}
else
{
	$link = abrirconexion();
	if($link)
	{
		//insertar una fila nueva en la tabla usuarios
		$ok = insertUSUARIO($link, $nombre, $apellidos, $email, $pass, $foto);

		if($ok)
			echo "<p>Datos insertado correctamente</p>";
		else
			echo "<p>Error en la inserción de datos</p>";

		echo "<P>Todo correcto</P>";

		//recuperar el ID de la fila insertada 
		//para asignarlo a la variable de session
		$idusuario = getidusuariobyemailpass($link, $email, $pass);


		echo "<P>Saltar a la página index.php con usuario logado</P>";
		if($idusuario)
		{
			echo "<P>Id del usuario registrado: $idusuario</P>";
			$_SESSION['iduser'] = $idusuario;
		}

		header('Location: index.php');
	}
	else
	{
		echo "Error en la conexión a la BD";		
	}
}
?>
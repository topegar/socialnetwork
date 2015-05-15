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

$nombre = "";
$apellidos = "";	
$email = "";
$emailrep = "";
$pass = "";	
$passrep = "";
$foto = "";
$eliminar = false;

//punto de entrada del codigo PHP

if(isset($_POST['nombre']))
	$nombre = utf8_decode($_POST['nombre']);

if(isset($_POST['apellidos']))
	$apellidos = $_POST['apellidos'];	

if(isset($_POST['email']))	
	$email = $_POST['email'];

if(isset($_POST['emailrep']))
	$emailrep = $_POST['emailrep'];

if(isset($_POST['pass']))	
	$pass = $_POST['pass'];	

if(isset($_POST['passrep']))
	$passrep = $_POST['passrep'];

if(isset($_POST['eliminar']))
	$eliminar = true;	

	echo "<p>Los datos bien</p>";

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

		$aleatorio = rand().rand().rand();

		if(!is_dir(USER_FOLDER))
			mkdir(USER_FOLDER);

		move_uploaded_file($_FILES['pic']['tmp_name'],
			USER_FOLDER."/".$aletatorio.$_FILES['pic']['name']);

		$foto = $aleatoiro.$_FILES['pic']['name'];

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
		//si el usuario no esta registrado 
		//insertar el usuario nuevo en la BD
		if(!isset($_SESSION['iduser']))
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

			cerrarconexion($link);		
			header('Location: index.php');
		}
		//si el usuario ya existe 
		//modificar los datos que se reciban
		else
		{
			if(!$eliminar)
			{
				//modificar una fila en la tabla usuarios
				$ok = updateUSUARIO($link, $nombre, $apellidos, $email, $pass, $foto, $_SESSION['iduser']);

				if($ok)
					echo "<p>Datos modificados correctamente</p>";
				else
					echo "<p>Error en la modificacion de datos</p>";

				echo "<P>Todo correcto</P>";


				//echo "<P>Saltar a la página index.php con usuario logado</P>";
				
				cerrarconexion($link);		
				header('Location: index.php');
			}
			else
			{
				echo "id de usuario: " . $_SESSION['iduser'];

				//eliminar usuario
				$ok = deleteUSUARIO($link, $_SESSION['iduser']);

				if($ok)
					echo "<p>Datos eliminados correctamente</p>";
				else
					echo "<p>Error en la eliminacion de datos</p>";

				//echo "<P>Todo correcto</P>";

				cerrarconexion($link);		
				header('Location: index.php?cerrar=yes');
			}
		}
	}
	else
	{
		echo "Error en la conexión a la BD";		
	}
}
?>
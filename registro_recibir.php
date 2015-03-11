<?php
/*
 
*/
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

function validar_registro()
{
	if($nombre == "")
		return false;

	if($apellidos == "")
		return false;

	if(!validar_email($email))
		return false;

	if($email != $emailrep)
		return false;

	if(!validar_password($pass))
		return false;

	if($pass != $passrep)
		return false;

	return true;
}

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

	echo "<p>Los datos bien</p>";
}
else{
	echo "<p>Error en la recepcion de datos</p>";
}

if($_FILES['pic']['error'] == 0)
{
	if($_FILES['pic']['type'] == "image/jpeg"
		|| $_FILES['pic']['type'] == "image/png")
	{

		move_uploaded_file($_FILES['pic']['tmp_name'],
			"images_user/".$_FILES['pic']['name']);

		echo "<p>El archivo bien</p>";
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

if(!validar_registro())
{
	echo "Error en la validacion de los datos";
}
else
{
	echo "Todo correcto, saltar a la página index con usuario logado";
}
?>
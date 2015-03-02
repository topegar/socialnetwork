<?php

if($_POST['nombre'])
{
	$nombre = $_POST['nombre'];
}

if($_POST['apellidos'])
{
	$apellidos = $_POST['apellidos'];	
}

if($_POST['e-mail'])
{
	$e-mail = $_POST['e-mail'];
}

if($_POST['e-mailrep'])
{
	$e-mailrep = $_POST[e-mailrep];
}

if($_POST['pass'])
{
	$pass = $_POST[pass];	
}

if($_POST['passrep'])
{
	$passrep = $_POST[passrep];
}



if($_FILES['pic']['error'] == 0)
{
	move_uploaded_file($_FILES['pic']['tmp_name'],
		"images_user/".$_FILES['pic']['name']);
}
?>
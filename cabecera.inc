<?php 
	require_once("define.php");
	require_once("phpDB/conexion.php");
	require_once("phpDB/tablausuarios.php");

	session_start();

	/*si no existe la variable se crea y se fija a -1
	valor que sirve de referencia para decir que 
	ningún usuario ha intruducido su mail y password*/
	if(!isset($_SESSION['iduser']))
		$_SESSION['iduser'] = -1;	

	/*se ha hecho clic en "Cerrar sesion"*/
	if(isset($_REQUEST["cerrar"]))
	{
        //echo "<p>Nombre de la sesion" . session_name() . "</p>";

		// Borra todas las variables de sesión
		$_SESSION = array();
		// Borra la cookie que almacena la sesión
				
		// Borra la cookie que almacena la sesión
		if(isset($_COOKIE[session_name()])) {
			setcookie(session_name(), '', time() - 42000, '/');
		}
		

		// Finalmente, destruye la sesión
		session_destroy();

		/*vuelvo a abrir otra sesion para tener la referencia de 
		la variable iduser y así saber si alguien esta logado o no
		*/
		session_start();
		$_SESSION['iduser'] = -1;
	}


	/*el usuario esta intentando logarse
	hay que comprobar su mail y su password*/
	if(isset($_REQUEST["mail"]) 	
		&& isset($_REQUEST["password"]))
	{
		$email = $_REQUEST["mail"];
		$pass = $_REQUEST["password"];

		//comprobar que el mail y el pass existen
		$link = abrirconexion();
		$idusuario = getidusuariobyemailpass($link, $email, $pass);
		if($idusuario)
		{
			//obtener datos del usuario
			$_SESSION['iduser'] = $idusuario; 
		}
		else
		{
			$_SESSION['iduser']	= -1;
		}
		
	}cerrarconexion($link);

	if($_SESSION['iduser'] != -1)
	{
		
		$link = abrirconexion();

		$nombre = getnombreusuariobyid($link, $_SESSION['iduser']);
		$foto = getfotousuariobyid($link, $_SESSION['iduser']);

		/*$nombre = "Tomas";
		$foto = "foto.jpg";*/

		cerrarconexion($link);
	}
?>

<html>
<head>
	<title></title>

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" type="text/css" href="./bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="./css/estilos.css">

	<script src="./bootstrap/js/jquery.js"></script>
	<script src="./bootstrap/js/bootstrap.min.js"></script>
				 
	<script type="text/javascript" src="js/validar.js"></script>
</head>
<body>
<div class="container">
	<div class="navbar navbar-inverse navbar-fixed-top">
	  	<div class="container-fluid">
		    <div class="navbar-header">
			    <button type="button" class="navbar-toggle" data-toggle="collapse"
	              data-target=".navbar-ex1-collapse">
			        <span class="sr-only">Desplegar navegación</span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
		      	</button>
	      		<a class="navbar-brand" href="index.php">Social Network</a>
		    </div>

			<div class="collapse navbar-collapse navbar-ex1-collapse">


			<?php
			if($_SESSION['iduser'] == -1)
			{
			?>

			<form class="navbar-form navbar-left" role="search">
		        <div class="form-group" onclick="return validarlogin()">
					<input class="form-control" type="text" placeholder="e-mail" id="mail" name="mail">
					<input class="form-control" type="password" placeholder="******" id="password" name="password">
		        </div>
		        <button type="submit" class="btn btn-default">Login</button>
	      	</form>

			<div>
				<ul class="nav navbar-nav">
			        <li>
						<a href="registro.php">Registro</a>
			        </li>
			        <li>
						<a href="#">Olvidaste tu contraseña?</a>
			        </li>
				</ul>
			</div>

			<?php 
			}
			else
			{
			?>
		    <div>
		      <ul class="nav navbar-nav">
		        <li class="active"><a href="#">Home</a></li>
		        <li><a href="#">Page 1</a></li>
		        <li><a href="#">Page 2</a></li>
		        <li><a href="#">Page 3</a></li>
		      </ul>
		    </div>
			<div  class="pull-right">
			  <ul class="nav navbar-nav">
					<?php  
					if(file_exists(USER_FOLDER."/".$foto))
					{
						//navbar-brand
						echo "<li><img class='navbar-brand' src='"
							.USER_FOLDER."/$foto'></li>";
					}
					?>
					<li class=""><a href="registro.php" class="navbar-link">Hola <?php echo $nombre; ?></a></li>
					<li class=""><a href="index.php?cerrar=yes" class="navbar-link">(Cerrar sesión)</a></li>
			  </ul>
			</div>		    

			<?php
			}
			?>
		</div>
    	</div>
	</div>

	<div class="clearfix "></div>

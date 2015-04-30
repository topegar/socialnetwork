<?php 
	require_once("define.php");
	require_once("phpDB/conexion.php");
	require_once("phpDB/tablausuarios.php");

	session_start();

	/*si no existe la variable se crea y se fija a -1
	valor que sirve de referencia para decir que 
	ningún usuario ha intruducido su mail y password*/
	/*if(!isset($_SESSION['iduser']))
		$_SESSION['iduser'] = -1;	
	*/

	/*se ha hecho clic en "Cerrar sesion"*/
	$cerrar = isset($_REQUEST["cerrar"]);
	if($cerrar)
	{
        //echo "<p>Nombre de la sesion" . session_name() . "</p>";

		//borra la cookie de recordar al usuario
		if(isset($_COOKIE['recuerdame']))
		{
			setcookie('recuerdame', '', time() - 42000);
		}

		// Borra todas las variables de sesión
		$_SESSION = array();
		$_REQUEST = array();
		$_POST = array();
		$_GET = array();
		// Borra la cookie que almacena la sesión
				
		// Borra la cookie que almacena la sesión
		if(isset($_COOKIE[session_name()])) 
		{
			setcookie(session_name(), '', time() - 42000);
		}
		
		// Finalmente, destruye la sesión
		session_destroy();

		/*vuelvo a abrir otra sesion para tener la referencia de 
		la variable iduser y así saber si alguien esta logado o no
		*/
		/*
		session_start();
		$_SESSION['iduser'] = -1;
		*/
	}

	if(isset($_COOKIE['recuerdame']) 
		&& !$cerrar)
	{
		$idusuario = $_COOKIE['recuerdame'];

		//echo "cookie: $idusuario";
		
		//comprobar en la BD que la información guardada en la cookie es correcta, es decir, que el id de usuario existe
		$link = abrirconexion();
		if($link)
		{
			$idcorrecto = isIDUsuarioBD($link, $idusuario);
			if($idcorrecto)
			{
				$_SESSION['iduser'] = $idusuario;
			}
			cerrarconexion($link);
		}
	}


	/*el usuario esta intentando logarse
	hay que comprobar su mail y su password*/
	if(isset($_POST["mail"]) 	
		&& isset($_POST["password"]))
	{
		$email = $_POST["mail"];
		$pass = $_POST["password"];

		$recuerdame = false;
		if(isset($_POST['recuerdame']))
			$recuerdame = true;


		//comprobar que el mail y el pass existen
		$link = abrirconexion();
		if($link)
		{
			$idusuario = getidusuariobyemailpass($link, $email, $pass);
			if($idusuario)
			{
				//obtener datos del usuario
				$_SESSION['iduser'] = $idusuario; 
				if($recuerdame)
				{
					setcookie('recuerdame', $idusuario, 
						time() + 365*24*60*60);
				}
			}
			cerrarconexion($link);	
		}
	}

	$nombre="";
	$foto="";
	if(isset($_SESSION['iduser']))
	{
		
		$link = abrirconexion();
		if($link)
		{
			$nombre = getnombreusuariobyid($link, $_SESSION['iduser']);
			$foto = getfotousuariobyid($link, $_SESSION['iduser']);
			cerrarconexion($link);
		}
		

		//si el login es correcto crear o aumentar la cookie de contador de visitas a la parte privada
		$namecookie = "contador".$_SESSION['iduser'];
		$caduca = time() + 365 * 24 * 60 * 60;
		if(isset($_COOKIE[$namecookie]))
		{
			// Caduca en un año
			setcookie($namecookie, $_COOKIE[$namecookie] + 1, $caduca);
		}
		else
		{
			// Caduca en un año
			setcookie($namecookie, 1, $caduca);
		}

		//echo $_COOKIE[$namecookie];
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
	<!--navbar-inverse-->
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
			if(!isset($_SESSION['iduser']))
			{
				//echo "sin sesion";
			?>

			<form class="navbar-form navbar-left" 
			onsubmit="return validarlogin()" method="post" action="index.php">
		    <div class="form-group" >
				<input class="form-control" type="text" placeholder="e-mail" id="mail" name="mail">
				<input class="form-control" type="password" placeholder="******" id="password" name="password">
		        
			    <button type="submit" class=" btn btn-default">Login</button>

				<!--<span class="navbar-text">recuerdame</span>-->
			</div>	
		    <div class="form-group" >
				<label>
				<input  class="form-control" type="checkbox" id="recuerdame" name="recuerdame">
				recuerdame
				</label>
		    </div>
	      	</form>
			<div>
				<ul class="nav navbar-nav">
			        <li>
						<a href="registro.php">Registro</a>
			        </li>
			        <li>
						<a href="#">Contraseña?</a>
			        </li>
				</ul>
			</div>
			<?php 
			}
			else
			{
				//echo "Con sesion a tope";
			?>
		    <div>
		      <ul class="nav navbar-nav">
		        <li class="active"><a href="#">Home</a></li>
		        <li><a href="materiales.php">Materiales</a></li>
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
					if(isset($_COOKIE[$namecookie]))
					{
					?>
					<li class="navbar-text">Visita: <?php echo $_COOKIE[$namecookie]?></li>
					<?php 
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

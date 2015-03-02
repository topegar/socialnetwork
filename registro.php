<?php 
	$iduser = -1;

	if(isset($_REQUEST["mail"]) 	
		&& isset($_REQUEST["password"]))
	{
		$mail = $_REQUEST["mail"];
		$pass = $_REQUEST["password"];

		//comprobar que el mail y el pass existen
		if($mail == "topegar@gmail.com" 
			&& $pass == "123asd")
		{
			//obtener datos del usuario
			$iduser = 1; 
			$nombre = "Tomas";
		}
	}
?>

<html>
<head>
	<title></title>
</head>

	<link rel="stylesheet" type="text/css" href="./bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="./css/estilos.css">

	<script src="./bootstrap/js/jquery.js"></script>
	<script src="./bootstrap/js/bootstrap.min.js"></script>
				 
	<script type="text/javascript" src="js/validar.js"></script>

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
			if($iduser == -1)
			{
			?>

			<form class="navbar-form navbar-left" role="search">
		        <div class="form-group">
					<input class="form-control" type="text" placeholder="e-mail" id="mail" name="mail">
					<input class="form-control" type="password" placeholder="******" id="password" name="password">
		        </div>
		        <button type="submit" class="btn btn-default">Login</button>
	      	</form>

			<div>
				<ul class="nav navbar-nav">
			        <li class="active">
						<a class="" href="registro.php">Registrate</a>
			        </li>
			        <li>
						<a class="" href="#">Olvidaste tu contraseña?</a>
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
			<div class="navbar-text pull-right">
			  	<span class="">Hola <?php echo $nombre; ?></span>
			  	<span class=""><a href="index.php" class="navbar-link">(Cerrar sesión)</a></span>
			</div>		    

			<?php
			}
			?>
		</div>
    	</div>
	</div>


	<div class="clearfix "></div>




	<div class="col-xs-12 col-sm-12 col-md-6">
		<img src="images/bolasn.jpg" class="img-responsive img-thumbnail" >
	</div>

	<div class="col-xs-12 col-sm-12 col-md-6">
	<form action="registro_recibir.php" method="post" class="form-horizontal" enctype="multipart/form-data">
		<div class="form-group">
			<label>Nombre
				<input class="form-control" type="text" id="nombre" name="nombre">
			</label>
			<label>Apellidos
				<input class="form-control" type="text" id="apellidos" name="apellidos">
			</label>
		</div>
		<div class="form-group">
			<label>e-mail
				<input class="form-control" type="text" id="e-mail" name="e-mail">
			</label>
			<label>Repite e-mail
				<input class="form-control" type="text" id="e-mailrep" name="e-mailrep">
			</label>
		</div>
		<div class="form-group">		
			<label>Contraseña
				<input class="form-control" type="text" id="pass" name="pass">
			</label>
			<label>Repite la contraseña
				<input class="form-control" type="text" id="passrep" name="passrep">
			</label>
		</div>
		<div class="form-group">		
			<label>Dejate ver, introduce tu fotografía
				<input class="form-control" type="file" id="pic" name="pic" >
			</label>
		</div>
		<div class="form-group center-block">		
	        <button type="submit" class="btn btn-default">Aceptar</button>
	        <button type="reset" class="btn btn-default">Cancelar</button>
		</div>

	</form>
	</div>
</div>
</body>
</html>
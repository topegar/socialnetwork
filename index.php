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
			$foto = "foto.jpg";
		}
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
			        <li>
						<a href="registro.php">Registrate</a>
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
					if(file_exists("images_user/".$foto))
					{
						echo "<li><img class='navbar-brand' src='images_user/foto.jpg'></li>";
					}
					?>
					<li class="navbar-text">Hola <?php echo $nombre; ?></li>
					<li class=""><a href="index.php" class="navbar-link">(Cerrar sesión)</a></li>
			  </ul>
			</div>		    

			<?php
			}
			?>
		</div>
    	</div>
	</div>


	<div class="clearfix "></div>

	<div class="row jumbotron center ">
		<h1>Página principal de mi molona red social</h1>
	</div>

	<div class="row">
		<div class="col-xs-12 col-sm-6 col-md-3 divmargin">
			<p>Noticia 1 de mi red social que habla de ...
			Noticia 1 de mi red social que habla de ...
			Noticia 1 de mi red social que habla de ...
			Noticia 1 de mi red social que habla de ...</p>
		</div>
		<div class="col-xs-12 col-sm-6 col-md-3 divmargin">
			<p>Ultima actualización realizada por un usuario a mi red social que nos dice como ...
			Ultima actualización realizada por un usuario a mi red social que nos dice como ...
			Ultima actualización realizada por un usuario a mi red social que nos dice como ...
			Ultima actualización realizada por un usuario a mi red social que nos dice como ...</p>
		</div>
		<div class="col-xs-12 col-sm-6 col-md-3 divmargin">
			<p>Por este lado podríamos hablar del tiempo que hará mañana ...
			Por este lado podríamos hablar del tiempo que hará mañana ...
			Por este lado podríamos hablar del tiempo que hará mañana ...
			Por este lado podríamos hablar del tiempo que hará mañana ...</p>
		</div>
		<div class="col-xs-12 col-sm-6 col-md-3 divmargin">
			<p>Ultima actualización realizada por un usuario a mi red social que nos dice como ...
			Ultima actualización realizada por un usuario a mi red social que nos dice como ...
			Ultima actualización realizada por un usuario a mi red social que nos dice como ...
			Ultima actualización realizada por un usuario a mi red social que nos dice como ...</p>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12 col-sm-6 divmargin">
			<p>Noticia 1 de mi red social que habla de mis cosas ... 
			Noticia 1 de mi red social que habla de ...
			Noticia 1 de mi red social que habla de ...
			Noticia 1 de mi red social que habla de ...</p>
		</div>
		<div class="col-xs-12 col-sm-6 divmargin">
			<p>Por este lado podríamos hablar del tiempo que hará mañana ...
			Por este lado podríamos hablar del tiempo que hará mañana ...
			Por este lado podríamos hablar del tiempo que hará mañana ...
			Por este lado podríamos hablar del tiempo que hará mañana ...</p>
		</div>
		<div class="col-xs-12 col-sm-6 divmargin">
			<p>Por este lado podríamos hablar del tiempo que hará mañana ...
			Por este lado podríamos hablar del tiempo que hará mañana ...
			Por este lado podríamos hablar del tiempo que hará mañana ...
			Por este lado podríamos hablar del tiempo que hará mañana ...</p>
		</div>

		<div class="col-xs-12 col-sm-6 divmargin">
			<p>Ultima actualización realizada por un usuario a mi red social que nos dice como ...
			Ultima actualización realizada por un usuario a mi red social que nos dice como ...
			Ultima actualización realizada por un usuario a mi red social que nos dice como ...
			Ultima actualización realizada por un usuario a mi red social que nos dice como ...</p>
		</div>
		<div class="col-xs-12 col-sm-6 divmargin">
			<p>Noticia 1 de mi red social que habla de mis cosas ... 
			Noticia 1 de mi red social que habla de ...
			Noticia 1 de mi red social que habla de ...
			Noticia 1 de mi red social que habla de ...</p>
		</div>
	</div>

</div>
</body>
</html>
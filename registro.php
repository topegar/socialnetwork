<?php
	require_once("cabecera.inc");

	//echo "usuario: " .$_SESSION['iduser'];


	if($_SESSION['iduser'] == 1)
	{
		$nombre = "Tomas";
		$apellidos = "Perez Garcia";
		$email = "topegar@gmail.com";
		$pass = "123asd";
		$foto = "foto.jpg";
	}
	else
	{
		$nombre = "";
		$apellidos = "";
		$email = "";	
		$pass = "";	
		$foto = "";
	}

?>
	

	<div class="col-xs-12 col-sm-12 col-md-6">
		<img src="images/bolasn.jpg" class="img-responsive img-thumbnail" >
	</div>

	<div class="col-xs-12 col-sm-12 col-md-6">
	<form action="registro_recibir.php" method="post" 
		class="form-horizontal" 
		enctype="multipart/form-data"
		onsubmit="return validar_registro()">
		<div class="form-group">
			<label>Nombre
				<input class="form-control" type="text" id="nombre" name="nombre" value="<?php echo $nombre?>">
			</label>
			<label>Apellidos
				<input class="form-control" type="text" id="apellidos" name="apellidos"
					value="<?php echo $apellidos?>">
			</label>
		</div>
		<div class="form-group">
			<label>e-mail
				<input class="form-control" type="text" id="email" name="email"
					value="<?php echo $email?>">
			</label>
			<label>Confirmar e-mail
				<input class="form-control" type="text" id="emailrep" name="emailrep"
					value="<?php echo $email?>">
			</label>
		</div>
		<div class="form-group">		
			<label>Contraseña
				<input class="form-control" type="password" id="pass" name="pass" value="<?php echo $pass?>">
			</label>
			<label>Confirmar contraseña
				<input class="form-control" type="text" id="passrep" name="passrep" value="">
			</label>
		</div>
		<div class="form-group">	
			<div class="row">	
				<?php 
				if($foto != "")
				{
				?>
				<div class="col-xs-12 col-sm-12 col-md-3">
					<img class="imgform img-rounded img-responsive " src="images_user/<?php echo $foto; ?>" >
				</div>
				<?php 
				}
				?>
				
				<div class="col-xs-12 col-sm-12 col-md-9">
					<label>
						<?php
						if($foto!="")  
							echo "Cambia tu fotografia";
						else
							echo "Dejate ver, introduce tu fotografía";
						?>
						<input type="file" accept="image/jpeg, image/png" id="pic" name="pic" class="form-control" value="">
					</label>
				</div>
			</div>
		</div>
		<div class="form-group center-block">		
	        <button type="submit" class="btn btn-default">Aceptar</button>
	        <button type="reset" class="btn btn-default">Cancelar</button>
		</div>

	</form>
	</div>

<?php
	require_once("pie.inc");
?>
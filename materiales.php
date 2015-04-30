<?php
	require_once("cabecera.inc");
?>

	<div class="row jumbotron center ">
		<h1>Materiales</h1>
	</div>

	<?php
	if(isset($_SESSION['iduser']))
	{
	?>
	<div class="row">
		<!-- lista de mis materiales con los comentarios -->
		<div class="col-xs-12 col-sm-6 col-md-6 divmargin">
			
			<form  role="form" action="materiales_recibir.php" method="post" enctype="multipart/form-data">
				<div class="form-group">
					<label for="nombre">Nombre</label>
					<input type="text" class="form-control" id="nombre" name="nombre" onsubmit="return validarmaterial()">
				</div>
				<div class="form-group">
					<label for="descripcion">Descripcion</label>
					<TEXTAREA class="form-control" id="descripcion" name="descripcion">						
					</TEXTAREA>
				</div>
				<div class="form-group">
					<label for="url">Url</label>
					<input type="text" class="form-control" id="url" name="url">
				</div>
				<div class="form-group">
					<label for="imagen">Imagen</label>
					<input type="file" class="form-control" id="imagen" name="imagen">
				</div>				
				<div class="form-group">
					<INPUT type="submit" value="Publicar">
					<INPUT type="reset"> 
				</div>
			</form>

			<?php 
			for($i=0; $i<5; $i++)
			{
			?>
			<div>
				<h3>Titulo material</h3>
				<p>Texto asociado la material bla bla bla bla bla bla 
					bla bla bla bla bla bla bla bla bla bla bla bla 
					bla bla bla bla bla bla bla bla bla bla bla bla
					bla bla bla bla bla bla bla bla bla bla bla bla 
				</p>
					
				<?php
				for($j=0; $j<3; $j++)
				{
				?>
				<div>
					<h4>Autor del comentario</h4>
					<p>Texto del comentario</p>
				</div>
				<?php
				}
				?>
			</div>
			<?php
			}
			?>
		</div>
		
		<!--materiales de mis contactos-->
		<div class="col-xs-12 col-sm-6 col-md-6 divmargin">
			<?php 
			for($i=0; $i<5; $i++)
			{
			?>
			<div>
				<h3>Titulo material de mis contactos</h3>
				<p>Texto asociado la material de mis contactos bla bla bla bla bla bla 
					bla bla bla bla bla bla bla bla bla bla bla bla 
					bla bla bla bla bla bla bla bla bla bla bla bla
					bla bla bla bla bla bla bla bla bla bla bla bla 
				</p>									
			</div>
			<?php
			}
			?>
		</div>

	</div>	
	<?php
	}
	else
	{
	?>

	<div>
		Cuando no hay ningún usuario logado tu no deberías aparecer
	</div>
	<?php	
	}
	?>

	

<?php
	require_once("pie.inc");
?>
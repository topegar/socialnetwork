
<?php
	require_once("cabecera.inc");
?>


	<div class="row jumbotron center ">
		<h1>Página principal de mi molona red social</h1>
	</div>

	<?php
	if(isset($_SESSION['iduser']))
	{
	?>
	<div class="row">
		<!-- lista de mis materiales con los comentarios -->
		<div class="col-xs-12 col-sm-6 col-md-6 divmargin">
			
			<form  role="form" >
				<div class="form-group">
					<label for="titulo">Titulo</label>
					<input type="text" class="form-control" id="titulo" name="titulo">
				</div>
				<div class="form-group">
					<label for="texto">Texto</label>
					<TEXTAREA class="form-control" id="texto" name="texto">						
					</TEXTAREA>
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
		Cosas que poner cuando no está logado ningún usuario
	</div>
	<?php	
	}
	?>

	

<?php
	require_once("pie.inc");
?>
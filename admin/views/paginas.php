<?php
//print_r($paginas);
?>

<div class="container">

	<h1>Modificar Páginas</h1>

	<form method="POST">

		<div class="form-group">
			<label> Corpo da página <?php echo $paginas[0]['titulo'];  ?> : </label>
			<textarea class="form-control" name="corpo_privacidade" id="corpo_privacidade">
				<?php
				if(!empty($paginas[0]['corpo']))
				{
					echo $paginas[0]['corpo']; 
				}
				?>
			</textarea>
		</div>

		<div class="form-group">
			<label> Corpo da página <?php echo $paginas[1]['titulo'];  ?> : </label>
			<textarea class="form-control" name="corpo_sobre" id="corpo_sobre">
				<?php
				if(!empty($paginas[1]['corpo']))
				{
					echo $paginas[1]['corpo']; 
				}
				?>
			</textarea>
		</div>

		<input type="submit" value="Modificar" />
	</form>

</div>

<script type="text/javascript" src="<?php echo BASE_URL; ?>ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/paginas.js"></script>
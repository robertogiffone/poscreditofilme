<?php
	$n = rand(1000, 9999);
	$_SESSION['captcha'] = $n;
	//print_r($_POST);
?>

<nav class="navbar navbar-default">
	<div class="container-fluid">
    
    	<ul class="nav navbar-nav navbar-left">
    		<li> <a href="<?php echo BASE_URL; ?>"> Home </a> </li>
    	</ul>
	    
  	</div><!-- /.container-fluid -->
</nav>

<div class="container">

	<div class="sugestao-filme">
		<h1> Adicionar sugestão </h1>

		<form method="POST" enctype="multipart/form-data">


			<div class="form-group">
			    <label for="titulo_ptbr">Título em português *</label>
			    <input type="text" class="form-control" id="titulo_ptbr" name="titulo_ptbr" 
			    value="<?php echo isset($_POST['titulo_ptbr']) ? $_POST['titulo_ptbr'] : '' ; ?>" />
		  	</div>

		  	<div class="form-group">
			    <label for="titulo_original">Título original</label>
			    <input type="text" class="form-control" id="titulo_original" name="titulo_original"
			    value="<?php echo isset($_POST['titulo_original']) ? $_POST['titulo_original'] : '' ; ?>" />
		  	</div>
			
		  	<div class="form-group">
			    <label for="ano_lancamento">Ano de lançamento *</label>
			    <input type="number" class="form-control" id="ano_lancamento" name="ano_lancamento" maxlength="4"
			    value="<?php echo isset($_POST['ano_lancamento']) ? $_POST['ano_lancamento'] : '' ; ?>" />
		  	</div>

		  	<div class="form-group">
				<label for="assistiu_filme">Você assistiu o filme? *</label>
		  		<select class="form-control" id="assistiu_filme" name="assistiu_filme">
		  			<option value=""> SELECIONE </option>
		  			<option value="1" <?php echo (isset($_POST['assistiu_filme']) && $_POST['assistiu_filme'] == '1') ? 'selected' : ''; ?> > SIM </option>
		  			<option value="0" <?php echo (isset($_POST['assistiu_filme']) && $_POST['assistiu_filme'] === '0') ? 'selected' : '' ; ?> > NÃO </option>
		  		</select>

		  	</div>

		  	<div class="form-group">
				<label for="tem_pos_credito">Possui cenas pós crédito? *</label>
		  		<select class="form-control" id="tem_pos_credito" name="tem_pos_credito">
		  			<option value=""> SELECIONE </option>
		  			<option value="1" <?php echo (isset($_POST['tem_pos_credito']) && $_POST['tem_pos_credito'] == '1') ? 'selected' : ''; ?> > SIM </option>
		  			<option value="0" <?php echo (isset($_POST['tem_pos_credito']) && $_POST['tem_pos_credito'] === '0') ? 'selected' : ''; ?> > NÃO </option>
		  		</select>
		  	</div>

		  	<div class="form-group">
			    <label for="qtd_cenas_pos_credito">Quantidade de cenas pós crédito *</label>
			    <!--
			    <input type="number" class="form-control" id="qtd_cenas_pos_credito" name="qtd_cenas_pos_credito" 
			    value="<?php echo isset($_POST['qtd_cenas_pos_credito']) ? $_POST['qtd_cenas_pos_credito'] : '' ; ?>" />
			    -->
			    <label class="radio-inline">
				  <input type="radio" name="qtd_cenas_pos_credito" value="1"
				  <?php echo (isset($_POST['qtd_cenas_pos_credito']) && $_POST['qtd_cenas_pos_credito'] == '1') ? 'checked' : ''; ?> /> 1 cena
				</label>
				<label class="radio-inline">
				  <input type="radio" name="qtd_cenas_pos_credito" value="2"  
				  <?php echo (isset($_POST['qtd_cenas_pos_credito']) && $_POST['qtd_cenas_pos_credito'] == '2') ? 'checked' : ''; ?> /> 2 cenas
				</label>
				<label class="radio-inline">
				  <input type="radio" name="qtd_cenas_pos_credito" value="3"
				  <?php echo (isset($_POST['qtd_cenas_pos_credito']) && $_POST['qtd_cenas_pos_credito'] == '3') ? 'checked' : ''; ?> /> 3 ou mais
				</label>
		  	</div>

		  	<div class="form-group">
			    <label for="img_filme">Cartaz do filme</label>
			    <input type="file" id="img_filme" name="img_filme">
			    <p class="help-block">Caso deseje inserir a imagem do filme</p>
		  	</div>

		  	<div class="form-group">
			    <label for="sinopse">Sinopse</label>
			   	<textarea id="sinopse" name="sinopse" class="form-control" rows="4">
			   		<?php
			   		if(isset($_POST['sinopse']) && !empty(isset($_POST['sinopse'])))
			   		{
			   			echo $_POST['sinopse'];
			   		}
			   		?>
			   	</textarea>
		  	</div>

		  	<div class="form-inline">
			   <img src="<?php echo BASE_URL; ?>views/imagem.php" width="100" height="50" />
			   <input type="text" class="form-control" id="captcha" name="captcha" />
		  	</div>

		  	<button type="submit" class="btn btn-default">Adicionar sugestão</button>

		</form>

	</div>

</div>

<style>
	.footer 
	{
	    position: relative;
	    margin-top: 30px;
	}
</style>

<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/sugestao_filme.js"></script>
﻿<?php
	$n = rand(1000, 9999);
	$_SESSION['captcha'] = $n;
	
	//print_r($sugestaoFilme);
?>

<div class="container">

	<div class="sugestao-filme">
		
			<h1> Adicionar filme </h1>

			<form method="POST" enctype="multipart/form-data">

				<div class="form-group">
				    <label for="titulo_ptbr">Título em português *</label>
				    <input type="text" class="form-control" id="titulo_ptbr" name="titulo_ptbr" 
				    value="<?php echo isset($sugestaoFilme['titulo_ptbr']) ? $sugestaoFilme['titulo_ptbr'] : '' ; ?>" />
			  	</div>

			  	<div class="form-group">
				    <label for="titulo_original">Título original</label>
				    <input type="text" class="form-control" id="titulo_original" name="titulo_original"
				    value="<?php echo isset($sugestaoFilme['titulo_original']) ? $sugestaoFilme['titulo_original'] : '' ; ?>" />
			  	</div>
				
			  	<div class="form-group">
				    <label for="ano_lancamento">Ano de lançamento *</label>
				    <input type="number" class="form-control" id="ano_lancamento" name="ano_lancamento"
				    value="<?php echo isset($sugestaoFilme['ano_lancamento']) ? $sugestaoFilme['ano_lancamento'] : '' ; ?>" />
			  	</div>

			  	<div class="form-group">
 					<label for="assistiu_filme">Você assistiu o filme? *</label>
			  		<select class="form-control" id="assistiu_filme" name="assistiu_filme">
			  			<option value=""> SELECIONE </option>
			  			<option value="1" <?php echo (isset($sugestaoFilme['assistiu_filme']) && $sugestaoFilme['assistiu_filme'] == '1') ? 'selected' : ''; ?> > SIM </option>
			  			<option value="0" <?php echo (isset($sugestaoFilme['assistiu_filme']) && $sugestaoFilme['assistiu_filme'] === '0') ? 'selected' : '' ; ?> > NÃO </option>
			  		</select>
			  	</div>

			  	<div class="form-group">
 					<label for="tem_pos_credito">Possui cenas pós crédito? * Em caso de resposta sim anterior </label>
			  		<select class="form-control" id="tem_pos_credito" name="tem_pos_credito">
			  			<option value=""> SELECIONE </option>
			  			<option value="1" <?php echo (isset($sugestaoFilme['tem_pos_credito']) && $sugestaoFilme['tem_pos_credito'] == '1') ? 'selected' : ''; ?> > SIM </option>
			  			<option value="0" <?php echo (isset($sugestaoFilme['tem_pos_credito']) && $sugestaoFilme['tem_pos_credito'] === '0') ? 'selected' : ''; ?> > NÃO </option>
			  		</select>
			  	</div>

			  	<div class="form-group">
				    <label for="qtd_cenas_pos_credito">Quantidade de cenas pós crédito * Em caso de resposta sim anterior</label>
				  
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
				    <?php
				    if(!empty($sugestaoFilme['imagem']) )
				    {	
				    ?>
				    	<img height="80" src="../../../assets/images/<?php echo $sugestaoFilme['imagem']; ?>" />
				    	<input type="hidden" name="imagem_filme_capa" value="<?php echo $sugestaoFilme['imagem']; ?>" />
				    <?php
					}
				    ?>
				    <p class="help-block">Caso já exista a imagem e deseje inserir uma imagem diferente selecione o arquivo desejado</p>
			  	</div>

			  	<div class="form-group">
				    <label for="detalhes">Detalhes</label>
				    <input type="text" class="form-control" id="detalhes" name="detalhes"
				    value="<?php echo isset($filme['detalhes']) ? $filme['detalhes'] : '' ; ?>" />
			  	</div>
			  	
			  	<div class="form-group">
				    <label for="sinopse">Sinopse</label>
				   	<textarea id="sinopse" name="sinopse" class="form-control" rows="4">
				   		<?php
				   		if(isset($sugestaoFilme['sinopse']) && !empty(isset($sugestaoFilme['sinopse'])))
				   		{
				   			echo $sugestaoFilme['sinopse'];
				   		}
				   		?>
				   	</textarea>
			  	</div>

			  	<div class="form-group">
				    <label for="duracao">Duração</label>
				    <input type="text" class="form-control" id="duracao" name="duracao" maxlength="8" />
			  	</div>

			  	<div class="form-group">
				    <label for="direcao">Direção</label>
				    <input type="text" class="form-control" id="direcao" name="direcao" />
			  	</div>

			  	<div class="form-group">
				    <label for="elenco">Elenco</label>
				    <input type="text" class="form-control" id="elenco" name="elenco" />
			  	</div>

			  	<div class="form-group">
				    <label for="generos">Gêneros</label>
				    <input type="text" class="form-control" id="generos" name="generos" />
			  	</div>

			  	<div class="form-group">
				    <label for="nacionalidade">Nacionalidade</label>
				    <input type="text" class="form-control" id="nacionalidade" name="nacionalidade" />
			  	</div>

			  	<div class="form-inline">
				   <img src="<?php echo BASE_URL; ?>views/imagem.php" width="100" height="50" />
				   <input type="text" class="form-control" id="captcha" name="captcha" />
			  	</div>

			  	<button type="submit" class="btn btn-default">Adicionar filme</button>

			</form>

	</div>

</div>
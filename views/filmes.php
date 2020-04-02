<?php
//print_r($filmes);
//var_dump($votacoesFilme);
?>

<nav class="navbar navbar-default conteudo-filmes-pesquisa">
  <div class="container-fluid">
    
      
      <ul class="nav navbar-nav">
        <li> <a class="voltar-home" href="<?php echo BASE_URL; ?>"> TEM PÓS CRÉDITOS? </a> </li>
      </ul>
      
      <form class="navbar-form navbar-right" method="POST" action="<?php echo BASE_URL; ?>filmes" >
		<div class="input-group">
			<input type="text" class="form-control" placeholder="PESQUISAR FILME" name="titulo_filme" id="titulo_filme"
			value="<?php if(isset($_POST['titulo_filme']) && !empty($_POST['titulo_filme'])) { echo $_POST['titulo_filme']; } ?>" />

			<div class="input-group-btn">
				<button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
			</div>
		
		</div>
	</form>

  </div><!-- /.container-fluid -->
</nav>

<div class="conteudo-filmes">

	<div class="container-fluid">

		<?php
		if(!empty($filmes) ):
		?>	

			<div class="informacoes-filme">

		<?php
			for($i = 0; $i < count($filmes) ; $i++):
		?>
				<?php
				if($i == 0):
				?>

				

					<?php
					if(!empty($filmes[$i]['imagem'])):
					?>
						<img title="<?php echo $filmes[$i]['titulo_ptbr']; ?> - Tem pós créditos" alt="<?php echo $filmes[$i]['titulo_ptbr']; ?> - Tem pós créditos" 
						src="<?php echo BASE_URL.'assets/images/'.$filmes[$i]['imagem']; ?>" />
					<?php
					endif;
					?>

						<h2> <?php echo $filmes[$i]['titulo_ptbr']; ?> </h2>

						<p> Título original: <?php echo $filmes[$i]['titulo_original']; ?> </p>
						<p> Ano lançamento: <?php echo '<strong>'.$filmes[$i]['ano_lancamento'].'</strong>('.$filmes[$i]['duracao'].')'; ?> </p>
						<p> Direção: <?php echo $filmes[$i]['direcao']; ?> </p>
						<p> Elenco: <?php echo $filmes[$i]['elenco']; ?> </p>
						<p> Gêneros: <strong> <?php echo $filmes[$i]['generos']; ?> </strong> </p>
						<p> Nacionalidade: <?php echo $filmes[$i]['nacionalidade']; ?> </p>

						<div class="informacoes-cenas-pos-credito">

							<h3> CENAS PÓS CRÉDITO </h3>
							<p> 
								TEM: 
								<?php
									$tem_cenas_pos_creditos = $filmes[$i]['tem_cenas_pos_creditos']; 
									if($tem_cenas_pos_creditos === '1')
									{
										$tem_cenas_pos_creditos = 'Sim';
									}
									else if($tem_cenas_pos_creditos === '0')
									{
										$tem_cenas_pos_creditos = 'Não';
									}
									else
									{
										$tem_cenas_pos_creditos = 'Não';
									}

									echo $tem_cenas_pos_creditos; 
								?>
							</p>
							<p> QUANTIDADE: <?php echo $filmes[$i]['qtd_cenas_pos_creditos'] == 3 ? '3 ou mais' : $filmes[$i]['qtd_cenas_pos_creditos']; ?> </p>
							<p>
								ESSA INFORMAÇÃO ESTÁ CORRETA?
								<span class="informacao-correta glyphicon glyphicon-thumbs-up" data-id="<?php echo $filmes[0]['id']; ?>" > </span> 
								<span class="qtd-informacao-correta"> <?php echo $votacoesFilme[0]['qtd_informacao_correta'] ?> </span>
								<span class="informacao-incorreta glyphicon glyphicon-thumbs-down" data-id="<?php echo $filmes[0]['id']; ?>"> </span> 
								<span class="qtd-informacao-incorreta"> <?php echo $votacoesFilme[0]['qtd_informacao_incorreta'] ?> </span>
							</p>

						</div>

						<h3> SINOPSE E DETALHES </h3>

						<p> <?php echo $filmes[$i]['detalhes']; ?> </p>
						<p> <?php echo $filmes[$i]['sinopse']; ?> </p> 
						
						<p> Caso tenha alguma sugestão de correção para o filme <span class="sugestao-correcao"> clique aqui </span> </p>
						
				<?php
				elseif($i == 1):
				?>
					Filme(s) similar(es): <?php echo $filmes[$i]['titulo_ptbr']; ?>

				<?php
				else:	
				?>	
					<?php echo ', '.$filmes[$i]['titulo_ptbr']; ?>
				<?php
				endif;
			endfor;
		?>
			</div>
		<?php
		else:
		?>

			<div class="filme-nao-encontrado">

				<p> RESULTADOS PARA "<?php echo $_POST['titulo_filme']; ?>" </p>

				<h3> INFELIZMENTE AINDA NÃO TEMOS O FILME EM NOSSO CATALOGO </h3>

				<p> VOCÊ PODE FAZER A SUGESTÃO PARA O FILME. </p>

				<a class="btn" href="<?php echo BASE_URL ?>filmes/sugestao" role="button"> FAZER UMA SUGESTÃO </a> 

			</div>
		
		<?php
		endif;
		?>

	</div>

</div>

<div id="modalSugestaoCorrecao" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"> Sugestão de correção </h4>
      </div>
      <div class="modal-body">
        
      	<input type="hidden" id="id_filme" value="<?php echo $filmes[0]['id']; ?>" />

        <div class="form-group">
		    <label for="sugestao_correcao">Sugestão de correção</label>
		    <input type="text" class="form-control" id="sugestao_correcao" maxlength="255" />
	  	</div>

	  	<button id="btn-sugestao-correcao" class="btn btn-default">Enviar</button>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
      </div>
    </div>

  </div>
</div>


<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/css/filmes.css" />
<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/filmes.js"></script>
<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/busca_filmes.js"></script>
<div class="container">


		<div class="conteudo-home panel panel-default">
		  
		  <!-- Default panel contents -->
		  <div class="panel-heading">Sugestões de filmes</div>
		  <!--<div class="panel-body">
		    <p>...</p>
		  </div>-->

		  	<div class="table-responsive">

			  	<!-- Table -->
		  		<table class="table">
		    	
		    		<thead>
			    		
			    		<tr>
				    		<th> Título em português </th>
				    		<th> Título original </th>
				    		<th> Imagem de capa </th>
				    		<th> Ano de lançamento </th>
				    		<th> Você assitiu o filme? </th>
				    		<th> Tem cenas pós créditos? </th>
				    		<th> Qtd de cenas pós créditos </th>
				    		<th> Sinopse </th>
				    		<th> Ações </th>
			    		</tr>

			    	</thead>

			    	<tbody>
			    		
			    		<?php
			    		foreach($sugestoesFilmes as $sugestaoFilme):
						?>

						<tr>

							<td>
								<?php
								echo $sugestaoFilme['titulo_ptbr'];	
								?>
							</td>
							<td>
								<?php
								echo $sugestaoFilme['titulo_original'];	
								?>
							</td>
							<td>
								<?php
								if( !empty($sugestaoFilme['imagem']) )
								{
								?>	
									<img height="50" src = "<?php echo '../assets/images/'.$sugestaoFilme['imagem']; ?>" />
								<?php
								}
								?>
							</td>
							<td> <?php echo $sugestaoFilme['ano_lancamento']; ?> </td>	
							<td> <?php echo $sugestaoFilme['assistiu_filme'] == '1' ? 'Sim':'Não'; ?> </td>	
							<td>
								<?php
									$tem_cenas_pos_creditos = $sugestaoFilme['tem_cenas_pos_creditos']; 
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
										$tem_cenas_pos_creditos = '';
									}

									echo $tem_cenas_pos_creditos; 
								?>
							</td>
							<td> <?php echo $sugestaoFilme['qtd_cenas_pos_creditos']; ?> </td>
							<td>
								<?php
								echo $sugestaoFilme['sinopse'];	
								?>
							</td>
							<td>
								<a class="editar-sugestao-filme" href="<?php echo BASE_URL.'filmes/edit_sugestao_filme/'.$sugestaoFilme['id']; ?>">
									<span class="glyphicon glyphicon-edit"> </span>
								</a>
								<a class="deletar-sugestao-filme" data-id="<?php echo $sugestaoFilme['id'] ?>" href="#">
									<span class="glyphicon glyphicon-trash"> </span>
								</a>
							</td>

						</tr>	

						<?php
						endforeach;
						?>

		    		</tbody>

		  		</table>

			</div>

		</div>

</div>

<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/home.js"></script>
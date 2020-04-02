<div class="container">


		<a href="<?php echo BASE_URL; ?>filmes/add_filme" class="btn btn-primary" > Inserir filme não sugerido </a>	

		<div class="conteudo-home panel panel-default">

		  <!-- Default panel contents -->
		  <div class="panel-heading">Filmes</div>

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
				    		<th> Detalhes </th>
				    		<th> Sinopse </th>
				    		<th> Duração </th>
				    		<th> Direção </th>
				    		<th> Elenco </th>
				    		<th> Gêneros </th>
				    		<th> Ações </th>
			    		</tr>

			    	</thead>

			    	<tbody>
			    		
			    		<?php
			    		foreach($filmes as $filme):
						?>

						<tr>

							<td>
								<?php
								echo $filme['titulo_ptbr'];
								?>
							</td>
							<td>
								<?php
								echo $filme['titulo_original'];
								?>
							</td>
							<td>
								<?php
								if( !empty($filme['imagem']) )
								{
								?>	
									<img height="50" src = "<?php echo '../assets/images/'.$filme['imagem']; ?>" />
								<?php
								}
								?>
							</td>
							<td> <?php echo $filme['ano_lancamento']; ?> </td>	
							<td> <?php echo $filme['assistiu_filme'] == '1' ? 'Sim':'Não'; ?> </td>	
							<td> 
								<?php
									$tem_cenas_pos_creditos = $filme['tem_cenas_pos_creditos']; 
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
							<td> <?php echo $filme['qtd_cenas_pos_creditos'] == 3 ? '3 ou mais' : $filme['qtd_cenas_pos_creditos']; ?> </td>
							<td>
								<?php
								echo $filme['detalhes'];
								?>
							</td>
							<td>
								<?php
								echo $filme['sinopse'];	
								?>
							</td>
							<td> <?php echo $filme['duracao']; ?> </td>
							<td>
								<?php
								echo $filme['direcao'];
								?>
							</td>
							<td>
								<?php
								echo $filme['elenco'];
								?>
							</td>
							<td>
								<?php
								echo $filme['generos'];
								?>
							</td>
							<td>
								<a class="editar-filme" href="<?php echo BASE_URL.'filmes/edit_filme/'.$filme['id']; ?>">
									<span class="glyphicon glyphicon-edit"> </span>
								</a>
								<a class="deletar-filme" data-id="<?php echo $filme['id'] ?>" href="#">
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
<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/filmes.js"></script>
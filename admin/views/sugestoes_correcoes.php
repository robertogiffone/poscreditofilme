<div class="container">

		<div class="conteudo-home panel panel-default">

		  <!-- Default panel contents -->
		  <div class="panel-heading">Filmes</div>

		  	<div class="table-responsive">

			  	<!-- Table -->
		  		<table class="table">
		    	
		    		<thead>
			    		
			    		<tr>
				    		<th> Título em português </th>
				    		<th> Sugestão para correçao </th>
				    		<th> Ações </th>
			    		</tr>

			    	</thead>

			    	<tbody>
			    		
			    		<?php
			    		foreach($sugestoesCorrecoes as $filme):
						?>

						<tr>

							<td>
								<?php
								echo $filme['titulo_ptbr'];	
								?>
							</td>
							<td>
								<?php
								echo $filme['sugestao_correcao'];
								?>
							</td>
							<td>
								<a class="tratar-sugestao-correcao-filme" data-id="<?php echo $filme['id'] ?>" href="#">
									Marcar como tratado
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
<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/sugestoes_correcoes_filmes.js"></script>
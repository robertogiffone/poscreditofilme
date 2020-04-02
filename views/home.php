<div class="container">

		<div class="conteudo-home">
			
			<?php
			if(isset($_SESSION['msg']) && !empty($_SESSION['msg'])):
			?>
			<div class="alert alert-success" role="alert">
			<?php
				echo $_SESSION['msg'];
				unset($_SESSION['msg']);
			?>
			</div>
			<?php
			endif;
			?>

			<h1> TEM PÓS CRÉDITOS? </h1>

			<form method="POST" action="<?php echo BASE_URL; ?>filmes">

				<div class="input-group">
					<input type="text" class="form-control" placeholder="PESQUISAR FILME" name="titulo_filme" id="titulo_filme" />
				
					<div class="input-group-btn">
						<button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
					</div>
					
				</div>

			</form>

		</div>

</div>

<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/busca_filmes.js" charset="utf-8" ></script>
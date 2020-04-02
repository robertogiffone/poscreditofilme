<div class="container">

	<div class="panel panel-default">

		<div style="padding: 20px;">
			
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

			<h1> Alterar senha </h1>

			<form method="POST">


				<div class="form-group">
				    <label for="titulo_ptbr">Nova senha *</label>
				    <input type="password" class="form-control" id="senha" name="senha" />
			  	</div>

			  	<button type="submit" class="btn btn-default">Alterar senha</button>

			</form>

		</div>

	</div>

</div>
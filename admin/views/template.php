<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title> <?php $viewData['titulo']; ?> </title>
		<meta name="robots" content="noindex, nofollow" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/css/bootstrap.min.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/css/dataTables.bootstrap.min.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/css/estilo.css" />
		<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/jquery-3.3.1.min.js"></script>
		<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/bootstrap.min.js"></script>
		<script type="text/javascript">
			var base_url = '<?php echo BASE_URL; ?>';
		</script>
	</head>
	<body>

		<?php
		if($viewData['menu'] === true && isset($_SESSION['lgadmin']) && !empty($_SESSION['lgadmin'])):
		?>

		<nav class="navbar navbar-default">
			<div class="container-fluid">
		    
		    	<ul class="nav navbar-nav navbar-left">
		    		<li> <a href="<?php echo BASE_URL; ?>"> Home </a> </li>
		    		<li> <a href="<?php echo BASE_URL.'filmes'; ?>"> Filmes </a> </li>
		    		<li> <a href="<?php echo BASE_URL.'filmes/sugestaocorrecao'; ?>"> Sugestões correções filmes </a> </li>
		    		<li> <a href="<?php echo BASE_URL.'paginas'; ?>"> Páginas </a> </li>
		    	</ul>
			    
			    <ul class="nav navbar-nav navbar-right">
			    	<li> <a href="<?php echo BASE_URL.'administradores'; ?>"> Alterar senha </a> </li>
					<li> <a href="<?php echo BASE_URL; ?>login/logout"> Sair </a> </li>
						
					
			    </ul>

		  </div><!-- /.container-fluid -->
		</nav>

		<?php
		endif;
		?>

		<?php
		$this->loadViewInTemplate($viewName, $viewData);

		if($viewData['rodape'] === true):
			$this->loadViewInTemplate('footer', $viewData);
		endif;
		?>
		
	</body>
</html>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title> <?php echo $viewData['titulo']; ?> </title>
		<meta name="robots" content="index, follow" />
		<meta name="keywords" content="temposcredito, Filme, Tem Pós Crédito?, Tem Pós Crédito, Filme tem pós crédito?" />
		<meta name="description" content="Consulta para verificação se filme: Tem Pós Crédito?" />
		<meta name="Author" content="Filme pós crédito" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/css/bootstrap.min.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/css/jquery-ui.min.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/css/estilo.css" />
		<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/jquery-3.3.1.min.js"></script>
		<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/jquery-ui.min.js"></script>
		<script type="text/javascript">
			var base_url = '<?php echo BASE_URL; ?>';
		</script>
	</head>
	<body>
		<?php
		$this->loadViewInTemplate($viewName, $viewData);

		if($viewData['rodape'] === true):
			$this->loadViewInTemplate('footer', $viewData);
		endif;
		?>
	</body>
</html>
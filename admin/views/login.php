<?php
/*
if(isset($_SESSION['msg']) && !empty($_SESSION['msg']))
{
	echo $_SESSION['msg'].'<br/>';
}
*/
?>

<form class="login" method="POST">
	<h1 class="h3 mb-3 font-weight-normal"> Login</h1>

	<label for="usuario" class="sr-only">Usuário</label>
	<input type="text" name="usuario" id="usuario" placeholder="Usuário" class="form-control" />

	<label for="senha" class="sr-only">Senha</label>
	<input type="password" name="senha" id="senha" placeholder="Senha" class="form-control" />
	<button type="submit" class="btn btn-lg btn-primary btn-block" > Entrar </button>

</form>


<link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/login.css">
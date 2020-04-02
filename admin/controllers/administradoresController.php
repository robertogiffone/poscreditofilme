<?php
class administradoresController extends Controller 
{

    public function index() 
    {
        parent::__construct();

        $dados = array( 'titulo' => 'Admin - Tem Pós Créditos?', 'menu' => true, 'rodape' => true);

		$admin = new Administradores();

		if(!$admin->estaLogado())
		{
			header('Location: '.BASE_URL.'login');
		}

		if(isset($_POST['senha']) && !empty($_POST['senha']))
		{
			$senha = md5($_POST['senha']);
			$inseriu = $admin->alterarSenha($senha);
			if($inseriu)
			{
				$_SESSION['msg'] = 'Senha alterada com sucesso';
			}
			else
			{
				$_SESSION['msg'] = 'Ocorreu um erro inesperado';
			}
		}

        $this->loadTemplate('senha_adm_edit', $dados);
    }

}
<?php
class paginasController extends Controller 
{

    public function index() 
    {
        parent::__construct();

        $dados = array( 'titulo' => 'Admin - Tem Pós Créditos?', 'menu' => true, 'rodape' => true, 'paginas' => array() );

		$admin = new Administradores();

		if(!$admin->estaLogado())
		{
			header('Location: '.BASE_URL.'login');
		}
		else
		{
			if(isset($_POST['corpo_privacidade']) && !empty($_POST['corpo_privacidade']) && isset($_POST['corpo_sobre']) && !empty($_POST['corpo_sobre']))
			{
				$paginas = new Paginas();
				$paginas->atualizarpaginas($_POST['corpo_privacidade'], $_POST['corpo_sobre']);
			}
			
			$paginas = new Paginas();
			$dados['paginas'] = $paginas->getAllPaginas();
		}

        $this->loadTemplate('paginas', $dados);
    }

}
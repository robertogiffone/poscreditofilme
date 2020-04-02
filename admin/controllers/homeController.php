<?php
class homeController extends Controller 
{

    public function index() 
    {
        parent::__construct();

        $dados = array( 'titulo' => 'Admin - Tem Pós Créditos?', 'menu' => true, 'rodape' => true, 'sugestoesFilmes' => array() );

		$admin = new Administradores();

		if(!$admin->estaLogado())
		{
			header('Location: '.BASE_URL.'login');
		}
		else
		{
			$sugestoesFilmes = new SugestoesFilmes();
			$dados['sugestoesFilmes'] = $sugestoesFilmes->getAllSugestoesFilmes();

			//print_r($dados);
		}

        $this->loadTemplate('home', $dados);
    }

}
<?php
class homeController extends Controller 
{

    public function index() 
    {
        $dados = array( 'rodape' => true, 'titulo' => 'Tem Pós Créditos?', 'paginas' => array() );

        $paginas = new Paginas();
        $dados['paginas'] = $paginas->getAllPaginas();

        $this->loadTemplate('home', $dados);
    }

}
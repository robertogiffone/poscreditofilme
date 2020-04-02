<?php
class ajaxController extends Controller {

	private $user;

	public function __construct() 
	{

		$this->user = new Administradores();

		if(!$this->user->estaLogado())
		{
			$array = array(
				'status' => '0'
			);

			echo json_encode($array);
			exit;
		}

	}

	public function index() {}

	public function rejeita_sugestao_filme()
	{
		$array = array('status' => '1');
		$sugestoesFilmes = new SugestoesFilmes();

		$id = $_POST['id'];
		$retorno = (int)$sugestoesFilmes->rejeitaSugestaoFilme($id);

		$array['rejeitou'] = $retorno; 

		echo json_encode($array);
		exit;			
	}

	public function excluir_filme()
	{
		$array = array('status' => '1');
		$filmes = new Filmes();

		$id = $_POST['id'];
		$retorno = (int)$filmes->excluirFilme($id);

		$array['excluiu'] = $retorno; 

		echo json_encode($array);
		exit;			
	}

	public function tratar_sugestao_correcao_filme()
	{
		$array = array('status' => '1');
		$sugestoesCorrecoesFilmes = new SugestoesCorrecoesFilmes();

		$id = $_POST['id'];
		$retorno = (int)$sugestoesCorrecoesFilmes->atualizarSugestaoCorrecao($id);

		$array['tratou'] = $retorno; 

		echo json_encode($array);
		exit;			
	}

}
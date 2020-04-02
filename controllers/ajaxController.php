<?php
class ajaxController extends Controller 
{

	public function __construct() 
	{
		parent::__construct();
	}

	public function index() {}

	public function cadastrar_votacao_filme()
	{
		$array = array();
		$votacoesFilmes = new VotacoesFilmes();

		$id_filme = $_POST['id_filme'];
		$informacao_correta = $_POST['informacao_correta'];
		$ip = $_SERVER['REMOTE_ADDR'];

		$podeVotar = $votacoesFilmes->podeVotar($id_filme, $ip);
		
		if($podeVotar == '0')
		{
			$retorno = (int)$votacoesFilmes->cadastrarVotacaoFilme($id_filme, $informacao_correta, $ip);
		}
		else
		{
			$retorno = 0;
			$array['msg'] = 'Não é possível votar novamente!';
		}

		$array['inseriu'] = $retorno; 

		echo json_encode($array);
		exit;			
	}

	public function get_votacoes_filme()
	{
		$id_filme = $_POST['id_filme'];
		$votacoesFilme = new VotacoesFilmes();
	    $dados = $votacoesFilme->getVotacoesFilme($id_filme);

	    echo json_encode($dados);
		exit;	
	}

	public function get_filmes()
	{
		//$titulo = $_POST['titulo_ptbr'];
		$titulo = $_GET['term'];
		//echo $titulo;
		//$dados = array('label' => $titulo, 'value'=> 'value1');

		$filmes = new Filmes();

		$dados = $filmes->getFilmes($titulo);

		//print_r($dados);

		//var_dump($dados);

		echo json_encode($dados);
		exit;
	}

	public function cadastrar_sugestao_correcao()
	{
		$array = array();
		$sugestoesCorrecoesFilmes = new SugestoesCorrecoesFilmes();

		$id_filme = $_POST['id_filme'];
		$sugestao_correcao = $_POST['sugestao_correcao'];

		$retorno = (int)$sugestoesCorrecoesFilmes->cadastrarSugestaoCorrecaoFilme($id_filme, $sugestao_correcao);

		$array['inseriu'] = $retorno; 

		echo json_encode($array);
		exit;			
	}

}
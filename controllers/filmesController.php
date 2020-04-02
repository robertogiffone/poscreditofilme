<?php
class filmesController extends Controller 
{

    public function index() 
    {
    	if( isset($_POST['titulo_filme']) && !empty($_POST['titulo_filme']) )
        {
	        $filmes = new Filmes();

	        $slug = $filmes->pesquisarSlugFilme($_POST['titulo_filme']);
	        //echo $slug; die;
	        header('Location: '.BASE_URL.'filmes/filme/'.$slug);
    	}
    	else
    	{
    		header('Location: '.BASE_URL);
    	}
    }

    public function filme($slug)
    {
    	$dados = array( 'rodape' => true, 'titulo' => 'Tem Pós Créditos?', 'filmes' => array(), 'paginas' => array(), 'votacoesFilme' => array() );

    	$paginas = new Paginas();
        $dados['paginas'] = $paginas->getAllPaginas();
    	
        if( isset($slug) && !empty($slug) )
        {
	        $filmes = new Filmes();

	        $dados['filmes'] = $filmes->pesquisarFilme($slug);

	        if(!empty($dados['filmes']))
	        {
	        	$dados['titulo'] = $dados['filmes'][0]['titulo_ptbr'].' - Tem Pós Créditos?';

		        $votacoesFilme = new VotacoesFilmes();
		        $dados['votacoesFilme'] = $votacoesFilme->getVotacoesFilme($dados['filmes'][0]['id']);
	    	}
    	}

        $this->loadTemplate('filmes', $dados);

    }

    public function validaCamposSugestao()
	{
		$validacao = '';

		if( isset($_POST['titulo_ptbr']) && empty($_POST['titulo_ptbr']) )
		{
			$validacao .= '<p>Favor preencha o título em português</p>';
		}

		if( isset($_POST['ano_lancamento']) && empty($_POST['ano_lancamento']) )
		{
			$validacao .= '<p>Favor preencha o ano de lançamento</p>';
		}

		if( isset($_POST['assistiu_filme']) && $_POST['assistiu_filme'] === '' )
		{
			$validacao .= '<p>Favor preencha se assistiu o filme</p>';
		}
		else
		{
			if($_POST['assistiu_filme'] == '1')
			{
				if( isset($_POST['tem_pos_credito']) && $_POST['tem_pos_credito'] === '' )
				{
					$validacao .= '<p>Favor preencha se possui cenas pós crédito</p>';
				}
				else
				{
					if($_POST['tem_pos_credito'] === '1')
					{
						if( isset($_POST['qtd_cenas_pos_credito']) && empty($_POST['qtd_cenas_pos_credito']) )
						{
							$validacao .= '<p>Favor preencha a quantidade de cenas pós crédito</p>';
						}
					}
				}

			}	
		}	

		if($_POST['captcha'] != $_SESSION['captcha'])
    	{
    		$validacao .= '<p>Favor preencha o captcha corretamente</p>';
    	}

    	return $validacao;

	}

	public function montaArraySugestao()
	{
		
		$sugestao['titulo_ptbr'] = $_POST['titulo_ptbr'];
		$sugestao['titulo_original'] = $_POST['titulo_original'];

		$sugestao['imagem'] = NULL;

		$imagem = $_FILES['img_filme'];
		
		$img = $this->uploadImagem($imagem); 
		if( $img != '' )
		{
			$sugestao['imagem'] = $img;			
		}

		$sugestao['ano_lancamento'] = $_POST['ano_lancamento'];
		$sugestao['assistiu_filme'] = $_POST['assistiu_filme'];
		$sugestao['tem_cenas_pos_creditos'] = NULL;
		
		if( isset($_POST['tem_pos_credito']) && !empty($_POST['tem_pos_credito']) )
		{
			$sugestao['tem_cenas_pos_creditos'] = $_POST['tem_pos_credito'];
		}
		
		$sugestao['qtd_cenas_pos_creditos'] = NULL;
		
		if( isset($_POST['qtd_cenas_pos_credito']) && !empty($_POST['qtd_cenas_pos_credito']) )
		{
			$sugestao['qtd_cenas_pos_creditos'] = $_POST['qtd_cenas_pos_credito'];
		}
		
		$sugestao['sinopse'] = trim($_POST['sinopse']);

		return $sugestao;
	}

	public function uploadImagem($imagem)
	{
		$md5name = '';
		if( !empty($imagem['tmp_name']) )
    	{
    		
    		$types = array('image/jpeg','image/jpg', 'image/png');

    		if(in_array($imagem['type'], $types))
    		{
    			$extensao = strrchr($imagem['name'], '.');
    			//nome do arquivo
    			$md5name = md5(time().rand(0,9999)).$extensao;

    			$caminho = 'assets/images/'.$md5name;
    			move_uploaded_file($imagem['tmp_name'], $caminho);
    		}

    	}
    	return $md5name;
	}

    public function sugestao()
    {

    	if( isset($_POST['titulo_ptbr']) )
    	{

    		$validacao = $this->validaCamposSugestao();

    		if($validacao == '')
    		{

				$sugestaoFilme = new SugestoesFilmes();

				$sugestao = $this->montaArraySugestao();

				$sugestaoFilme->cadastrarSugestao($sugestao);

				$_SESSION['msg'] = 'Sugestão inserida com sucesso!';

				//echo 'Inserido com sucesso!';
				header('Location: '.BASE_URL);
	    	}
	    	else
	    	{
	    		echo $validacao;
	    	}

    	}

    	$dados = array( 'rodape' => true, 'titulo' => 'Tem Pós Créditos?');

        $this->loadTemplate('sugestao_filme', $dados);	
    }

}
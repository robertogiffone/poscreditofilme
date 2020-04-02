<?php
class filmesController extends Controller 
{

    public function index() 
    {
    	$dados = array( 'titulo' => 'Admin - Tem Pós Créditos?', 'menu' => true, 'rodape' => true, 'filmes' => array() );
    	$admin = new Administradores();

		if(!$admin->estaLogado())
		{
			header('Location: '.BASE_URL.'login');
		}
		else
		{
			$filmes = new Filmes();
			$dados['filmes'] = $filmes->getAllFilmes();
		}

        $this->loadTemplate('filmes', $dados);
    }

	public function sugestaocorrecao()
	{
		$dados = array( 'titulo' => 'Admin - Tem Pós Créditos?', 'menu' => true, 'rodape' => true, 'sugestoesCorrecoes' => array() );
    	$admin = new Administradores();

		if(!$admin->estaLogado())
		{
			header('Location: '.BASE_URL.'login');
		}
		else
		{
			$sugestoesCorrecoesFilmes = new SugestoesCorrecoesFilmes();
			$dados['sugestoesCorrecoes'] = $sugestoesCorrecoesFilmes->getAllSugestoesCorrecoes();
		}

        $this->loadTemplate('sugestoes_correcoes', $dados);
	}

    public function validaCamposFilme()
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

	public function montaArrayFilme()
	{
		$filme['titulo_ptbr'] = $_POST['titulo_ptbr'];
		$filme['titulo_original'] = $_POST['titulo_original'];

		$filme['slug'] = $this->removeAcentosMontaUrl($_POST['titulo_ptbr'], '-').'-tem-pos-creditos';

		$filme['imagem'] = NULL;

		$imagem = $_FILES['img_filme'];
		
		$img = $this->uploadImagem($imagem); 
		if( $img != '' )
		{
			$filme['imagem'] = $img;			
		}
		else
		{
			if(isset($_POST['imagem_filme_capa']) && !empty($_POST['imagem_filme_capa']))
			{
				$filme['imagem'] = $_POST['imagem_filme_capa'];
			}
		}
		
		$filme['ano_lancamento'] = $_POST['ano_lancamento'];
		$filme['assistiu_filme'] = $_POST['assistiu_filme'];
		$filme['tem_cenas_pos_creditos'] = NULL;
		
		if( isset($_POST['tem_pos_credito']) && !empty($_POST['tem_pos_credito']) )
		{
			$filme['tem_cenas_pos_creditos'] = $_POST['tem_pos_credito'];
		}
		
		
		$filme['qtd_cenas_pos_creditos'] = NULL;
		
		if( isset($_POST['qtd_cenas_pos_credito']) && !empty($_POST['qtd_cenas_pos_credito']) )
		{
			$filme['qtd_cenas_pos_creditos'] = $_POST['qtd_cenas_pos_credito'];
		}
		
		$filme['detalhes'] = trim($_POST['detalhes']);
		$filme['sinopse'] = trim($_POST['sinopse']);
		$filme['duracao'] = $_POST['duracao'];
		$filme['direcao'] = $_POST['direcao'];
		$filme['elenco'] = $_POST['elenco'];
		$filme['generos'] = $_POST['generos'];
		$filme['nacionalidade'] = $_POST['nacionalidade'];
		
		return $filme;
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

    			$caminho = '../assets/images/'.$md5name;
    			move_uploaded_file($imagem['tmp_name'], $caminho);
    		}

    	}
    	return $md5name;
	}

    public function edit_sugestao_filme($id)
    {
    	$id = addslashes($id);

    	if( isset($_POST['titulo_ptbr']) )
    	{

    		$validacao = $this->validaCamposFilme();

    		if($validacao == '')
    		{

				$filme = new Filmes();

				$arrayFilme = $this->montaArrayFilme();

				$retorno = $filme->cadastrarFilme($arrayFilme);

				if($retorno)
				{
					$sugestaoFilme = new SugestoesFilmes();
					$retorno = $sugestaoFilme->atualizaStatusSugestaoFilme($id, 2);
					if($retorno)
					{
						header('Location: '.BASE_URL);
					}
				}
	    	}
	    	else
	    	{
	    		echo $validacao;
	    	}

    	}

    	$dados = array('titulo' => 'Admin - Tem Pós Créditos?', 'menu' => true, 'rodape' => true, 'sugestaoFilme' => array());

    	$sugestaoFilme = new SugestoesFilmes();

    	$dados['sugestaoFilme'] = $sugestaoFilme->getSugestaoFilme($id);

    	$this->loadTemplate('filme_add', $dados);	
    }

    public function add_filme()
    {
    	if( isset($_POST['titulo_ptbr']) )
    	{

    		$validacao = $this->validaCamposFilme();

    		if($validacao == '')
    		{
				$filme = new Filmes();

				$arrayFilme = $this->montaArrayFilme();

				$retorno = $filme->cadastrarFilme($arrayFilme);

				if($retorno)
				{
					header('Location: '.BASE_URL.'filmes');
				}
	    	}
	    	else
	    	{
	    		echo $validacao;
	    	}

    	}

    	$dados = array('titulo' => 'Admin - Tem Pós Créditos?', 'menu' => true, 'rodape' => true);

    	$this->loadTemplate('filme_add', $dados);	
    }

    public function edit_filme($id)
    {
    	$id = addslashes($id);

    	if( isset($_POST['titulo_ptbr']) )
    	{

    		$validacao = $this->validaCamposFilme();

    		if($validacao == '')
    		{

				$filme = new Filmes();

				$arrayFilme = $this->montaArrayFilme();

				$retorno = $filme->atualizarFilme($arrayFilme, $id);

				if($retorno)
				{
					header('Location: '.BASE_URL.'filmes');
				}
	    	}
	    	else
	    	{
	    		echo $validacao;
	    	}

    	}

    	$dados = array('titulo' => 'Admin - Tem Pós Créditos?', 'menu' => true, 'rodape' => true, 'filme' => array());

    	$filme = new Filmes();

    	$dados['filme'] = $filme->getFilme($id);

    	$this->loadTemplate('filme_edit', $dados);
    }

    function removeAcentosMontaUrl($string, $slug = false) 
    {
	  $string = strtolower($string);
	  // Código ASCII das vogais
	  $ascii['a'] = range(224, 230);
	  $ascii['e'] = range(232, 235);
	  $ascii['i'] = range(236, 239);
	  $ascii['o'] = array_merge(range(242, 246), array(240, 248));
	  $ascii['u'] = range(249, 252);
	  // Código ASCII dos outros caracteres
	  $ascii['b'] = array(223);
	  $ascii['c'] = array(231);
	  $ascii['d'] = array(208);
	  $ascii['n'] = array(241);
	  $ascii['y'] = array(253, 255);
	  foreach ($ascii as $key=>$item) {
	    $acentos = '';
	    foreach ($item AS $codigo) $acentos .= chr($codigo);
	    $troca[$key] = '/['.$acentos.']/i';
	  }
	  $string = preg_replace(array_values($troca), array_keys($troca), $string);
	  // Slug?
	  if ($slug) 
	  {
	    // Troca tudo que não for letra ou número por um caractere ($slug)
	    $string = preg_replace('/[^a-z0-9]/i', $slug, $string);
	    // Tira os caracteres ($slug) repetidos
	    $string = preg_replace('/' . $slug . '{2,}/i', $slug, $string);
	    $string = trim($string, $slug);
	  }
	  return $string;
	}

}
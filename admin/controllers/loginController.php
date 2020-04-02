<?php
class loginController extends Controller 
{

	public function __construct()
	{
		parent::__construct();
	}

    public function index() 
    {
        $dados = array( 'titulo' => 'Admin - Tem Pós Créditos?', 'menu' => false, 'rodape' => true );


        if( isset($_POST['usuario']) && !empty($_POST['usuario'])  )
        {
        	$usuario = addslashes($_POST['usuario']);
        	$senha = md5($_POST['senha']);

        	$admin = new Administradores();
        	if($admin->fazerLogin($usuario, $senha))
        	{
        		header("LOCATION: ".BASE_URL);
        	}
        	/*else
        	{
        		$_SESSION['msg'] = 'Usuário/senha incorreto!';
        	}*/	

        }

        $this->loadTemplate('login', $dados);
    }

    public function logout()
    {
    	unset($_SESSION['lgadmin']);
    	header("LOCATION: ".BASE_URL);
    }

}
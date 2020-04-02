<?php
class Administradores extends Model 
{
	private $id;
	private $usuario;

	public function setId($id)
	{
		$this->id = $id;
	}

	public function getId()
	{
		return $this->id;	
	}

	public function setUsuario($usuario)
	{
		$this->usuario = $usuario;
	}

	public function getUsuario()
	{
		return $this->usuario;	
	}

	public function estaLogado()
	{
		if( isset($_SESSION['lgadmin']) && !empty($_SESSION['lgadmin']) )
		{
			return true;
		}
		return false;
	}

	public function fazerLogin($usuario, $senha)
	{
		$sql = "SELECT id, usuario FROM administradores WHERE usuario = '$usuario' AND senha = '$senha'";
		$sql = $this->db->query($sql);

		if($sql->rowCount() > 0)
		{
			$row = $sql->fetch();

			$_SESSION['lgadmin'] = $row;

			return true;
		}

		return false;

	}

	public function alterarSenha($senha)
	{
		$sql = "UPDATE administradores SET senha = :senha WHERE id = 1";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(":senha", $senha);
		
		return $sql->execute();
	}

}
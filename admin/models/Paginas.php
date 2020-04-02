<?php
class Paginas extends Model 
{

	public function getAllPaginas()
	{
		$array = array();

		$sql = "SELECT * FROM paginas";
		$sql = $this->db->prepare($sql);
		$sql->execute();

		if($sql->rowCount() > 0) 
		{
			$array = $sql->fetchAll(PDO::FETCH_ASSOC);
		}

		return $array;
	}

	public function atualizarPaginas($corpo_privacidade, $corpo_sobre)
	{
		$sql = "UPDATE paginas SET corpo = :corpo WHERE id = 1";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(":corpo", $corpo_privacidade);
		
		$sql2 = "UPDATE paginas SET corpo = :corpo WHERE id = 2";
		$sql2 = $this->db->prepare($sql2);
		$sql2->bindValue(":corpo", $corpo_sobre);

		return ($sql->execute() && $sql2->execute());
	}

}
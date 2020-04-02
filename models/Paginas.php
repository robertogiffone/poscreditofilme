<?php
class Paginas extends Model 
{

	public function getAllPaginas()
	{
		$array = array();

		$sql = "SELECT titulo, corpo FROM paginas";
		$sql = $this->db->prepare($sql);
		$sql->execute();

		if($sql->rowCount() > 0) 
		{
			$array = $sql->fetchAll(PDO::FETCH_ASSOC);
		}

		return $array;
	}

}
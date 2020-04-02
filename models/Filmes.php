<?php
class Filmes extends Model 
{

	public function pesquisarSlugFilme($titulo)
	{
		$array = array();

		$sql = "SELECT slug FROM filmes WHERE titulo_ptbr LIKE :titulo_ptbr OR titulo_original LIKE :titulo_original";
		$sql = $this->db->prepare($sql);
		$titulo = '%'.$titulo.'%';
		$sql->bindValue(':titulo_ptbr', $titulo);
		$sql->bindValue(':titulo_original', $titulo);
		$sql->execute();

		if($sql->rowCount() > 0) 
		{
			$array = $sql->fetchAll(PDO::FETCH_ASSOC);
		}

		return $array[0]['slug'];
	}

	public function pesquisarFilme($slug)
	{
		$array = array();

		$sql = "SELECT * FROM filmes WHERE slug = :slug";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':slug', $slug);
		$sql->execute();

		if($sql->rowCount() > 0) 
		{
			$array = $sql->fetchAll(PDO::FETCH_ASSOC);
		}

		return $array;
	}

	public function getFilmes($titulo)
	{
		$array = array();

		$sql = "SELECT id, titulo_ptbr as label, slug FROM filmes WHERE titulo_ptbr LIKE :titulo_ptbr OR titulo_original LIKE :titulo_original";
		$sql = $this->db->prepare($sql);
		$titulo = '%'.$titulo.'%';
		$sql->bindValue(':titulo_ptbr', $titulo);
		$sql->bindValue(':titulo_original', $titulo);
		$sql->execute();

		if($sql->rowCount() > 0) 
		{
			$array = $sql->fetchAll(PDO::FETCH_ASSOC);
		}

		return $array;
	}

}
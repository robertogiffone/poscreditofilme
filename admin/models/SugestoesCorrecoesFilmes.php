<?php
class SugestoesCorrecoesFilmes extends Model 
{

	public function getAllSugestoesCorrecoes()
	{
		$array = array();

		$sql = "SELECT scf.* ,f.titulo_ptbr FROM sugestoes_correcoes_filme scf INNER JOIN filmes f ON scf.id_filme = f.id WHERE tratada = 0";
		$sql = $this->db->prepare($sql);
		$sql->execute();

		if($sql->rowCount() > 0) 
		{
			$array = $sql->fetchAll(PDO::FETCH_ASSOC);
		}

		return $array;
	}

	public function atualizarSugestaoCorrecao($id)
	{
		$sql = "UPDATE sugestoes_correcoes_filme SET tratada = 1 WHERE id = :id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(":id", $id);
		
		return $sql->execute();
	}

}
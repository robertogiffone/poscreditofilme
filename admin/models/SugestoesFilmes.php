<?php
class SugestoesFilmes extends Model 
{
	
	public function getAllSugestoesFilmes()
	{
		$array = array();

		$sql = "SELECT * FROM sugestoes_filmes WHERE id_status_sugestao_filme = 1";
		$sql = $this->db->prepare($sql);
		$sql->execute();

		if($sql->rowCount() > 0) 
		{
			$array = $sql->fetchAll(PDO::FETCH_ASSOC);
		}

		return $array;
	}

	public function rejeitaSugestaoFilme($id)
	{
		$sql = "UPDATE sugestoes_filmes SET id_status_sugestao_filme = 3 WHERE id = :id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(":id", $id);
		return $sql->execute();
	}

	public function getSugestaoFilme($id)
	{
		$array = array();

		$sql = "SELECT * FROM sugestoes_filmes WHERE id = :id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(":id", $id);
		$sql->execute();

		if($sql->rowCount() > 0) 
		{
			$array = $sql->fetch(PDO::FETCH_ASSOC);
		}

		return $array;
	}

	public function atualizaStatusSugestaoFilme($id, $status)
	{
		$sql = "UPDATE sugestoes_filmes SET id_status_sugestao_filme = :status WHERE id = :id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(":status", $status);
		$sql->bindValue(":id", $id);
		return $sql->execute();
	}

	/*
	public function cadastrarSugestao($sugestao) 
	{
		$sql = "INSERT INTO sugestoes_filmes(id_status_sugestao_filme, titulo_ptbr, titulo_original, imagem, ano_lancamento, assistiu_filme, tem_cenas_pos_creditos, qtd_cenas_pos_creditos, sinopse) 
		VALUES(1, :titulo_ptbr, :titulo_original, :imagem, :ano_lancamento, :assistiu_filme, :tem_cenas_pos_creditos, :qtd_cenas_pos_creditos, :sinopse)";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(":titulo_ptbr", $sugestao['titulo_ptbr']);
		$sql->bindValue(":titulo_original", $sugestao['titulo_original']);
		$sql->bindValue(":imagem", $sugestao['imagem']);
		$sql->bindValue(":ano_lancamento", $sugestao['ano_lancamento']);
		$sql->bindValue(":assistiu_filme", $sugestao['assistiu_filme']);
		$sql->bindValue(":tem_cenas_pos_creditos", $sugestao['tem_cenas_pos_creditos']);
		$sql->bindValue(":qtd_cenas_pos_creditos", $sugestao['qtd_cenas_pos_creditos']);
		$sql->bindValue(":sinopse", $sugestao['sinopse']);
		$sql->execute();
	}
	*/

}
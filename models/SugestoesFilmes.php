<?php
class SugestoesFilmes extends Model 
{
	
	public function pesquisarFilmes($titulo)
	{
		$array = array();

		$sql = "SELECT * FROM filmes WHERE titulo_ptbr LIKE '%:titulo%'";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':titulo', $titulo);
		$sql->execute();

		if($sql->rowCount() > 0) 
		{
			$array = $sql->fetchAll(PDO::FETCH_ASSOC);
		}

		return $array;
	}

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

}
<?php
class Filmes extends Model 
{

	public function cadastrarFilme($filme)
	{
		$sql = "INSERT INTO filmes(titulo_ptbr, titulo_original, imagem, ano_lancamento, assistiu_filme, tem_cenas_pos_creditos, qtd_cenas_pos_creditos, detalhes, sinopse, duracao, direcao, elenco, generos, nacionalidade, slug) 
		VALUES(:titulo_ptbr, :titulo_original, :imagem, :ano_lancamento, :assistiu_filme, :tem_cenas_pos_creditos, :qtd_cenas_pos_creditos, :detalhes, :sinopse, :duracao, :direcao, :elenco, :generos, :nacionalidade, :slug)";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(":titulo_ptbr", $filme['titulo_ptbr']);
		$sql->bindValue(":titulo_original", $filme['titulo_original']);
		$sql->bindValue(":imagem", $filme['imagem']);
		$sql->bindValue(":ano_lancamento", $filme['ano_lancamento']);
		$sql->bindValue(":assistiu_filme", $filme['assistiu_filme']);
		$sql->bindValue(":tem_cenas_pos_creditos", $filme['tem_cenas_pos_creditos']);
		$sql->bindValue(":qtd_cenas_pos_creditos", $filme['qtd_cenas_pos_creditos']);
		$sql->bindValue(":detalhes", $filme['detalhes']);
		$sql->bindValue(":sinopse", $filme['sinopse']);
		$sql->bindValue(":duracao", $filme['duracao']);
		$sql->bindValue(":direcao", $filme['direcao']);
		$sql->bindValue(":elenco", $filme['elenco']);
		$sql->bindValue(":generos", $filme['generos']);
		$sql->bindValue(":nacionalidade", $filme['nacionalidade']);
		$sql->bindValue(":slug", $filme['slug']);
		return $sql->execute();
	}

	public function getAllFilmes()
	{
		$array = array();

		$sql = "SELECT * FROM filmes";
		$sql = $this->db->prepare($sql);
		$sql->execute();

		if($sql->rowCount() > 0) 
		{
			$array = $sql->fetchAll(PDO::FETCH_ASSOC);
		}

		return $array;
	}

	public function getFilme($id)
	{
		$array = array();

		$sql = "SELECT * FROM filmes WHERE id = :id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(":id", $id);
		$sql->execute();

		if($sql->rowCount() > 0) 
		{
			$array = $sql->fetch(PDO::FETCH_ASSOC);
		}

		return $array;
	}

	public function atualizarFilme($filme, $id)
	{
		$sql = "UPDATE filmes SET titulo_ptbr = :titulo_ptbr, titulo_original = :titulo_original, imagem = :imagem, ano_lancamento = :ano_lancamento, assistiu_filme = :assistiu_filme, tem_cenas_pos_creditos = :tem_cenas_pos_creditos, qtd_cenas_pos_creditos = :qtd_cenas_pos_creditos, detalhes = :detalhes, sinopse = :sinopse, duracao = :duracao, direcao = :direcao, elenco = :elenco, generos = :generos, nacionalidade = :nacionalidade, slug = :slug WHERE id = :id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(":titulo_ptbr", $filme['titulo_ptbr']);
		$sql->bindValue(":titulo_original", $filme['titulo_original']);
		$sql->bindValue(":imagem", $filme['imagem']);
		$sql->bindValue(":ano_lancamento", $filme['ano_lancamento']);
		$sql->bindValue(":assistiu_filme", $filme['assistiu_filme']);
		$sql->bindValue(":tem_cenas_pos_creditos", $filme['tem_cenas_pos_creditos']);
		$sql->bindValue(":qtd_cenas_pos_creditos", $filme['qtd_cenas_pos_creditos']);
		$sql->bindValue(":detalhes", $filme['detalhes']);
		$sql->bindValue(":sinopse", $filme['sinopse']);
		$sql->bindValue(":duracao", $filme['duracao']);
		$sql->bindValue(":direcao", $filme['direcao']);
		$sql->bindValue(":elenco", $filme['elenco']);
		$sql->bindValue(":generos", $filme['generos']);
		$sql->bindValue(":nacionalidade", $filme['nacionalidade']);
		$sql->bindValue(":slug", $filme['slug']);
		$sql->bindValue(":id", $id);
		return $sql->execute();
	}


	public function excluirFilme($id)
	{
		$sql = "DELETE FROM filmes WHERE id = :id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(":id", $id);
		return $sql->execute();
	}

}
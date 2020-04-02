<?php
class VotacoesFilmes extends Model 
{

	public function getVotacoesFilme($id_filme)
	{
		$array = array();

		$sql = "SELECT id_filme, SUM( CASE WHEN informacao_correta = 1 THEN 1 ELSE 0 END ) AS qtd_informacao_correta ,SUM( CASE WHEN informacao_correta = 0 THEN 1 ELSE 0 END ) AS qtd_informacao_incorreta FROM votacoes_filmes WHERE id_filme = :id GROUP BY id_filme";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':id', $id_filme);
		$sql->execute();

		if($sql->rowCount() > 0) 
		{
			$array = $sql->fetchAll(PDO::FETCH_ASSOC);
		}
		else
		{
			$array[] = array('id_filme' => $id_filme, 'qtd_informacao_correta' => 0, 'qtd_informacao_incorreta' => 0);
		}

		return $array;
	}

	public function cadastrarVotacaoFilme($id_filme, $informacao_correta, $ip)
	{
		$sql = "INSERT INTO votacoes_filmes(id_filme, informacao_correta, ip) VALUES (:id_filme, :informacao_correta, :ip)";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(":id_filme", $id_filme);
		$sql->bindValue(":informacao_correta", $informacao_correta);
		$sql->bindValue(":ip", $ip);
		return $sql->execute();
	}

	public function podeVotar($id_filme, $ip)
	{
		$sql = "SELECT ip FROM votacoes_filmes WHERE id_filme = :id_filme AND ip = :ip";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':id_filme', $id_filme);
		$sql->bindValue(':ip', $ip);
		$sql->execute();

		return $sql->rowCount();
	}


}

?>
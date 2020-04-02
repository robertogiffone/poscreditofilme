<?php
class SugestoesCorrecoesFilmes extends Model 
{

	public function cadastrarSugestaoCorrecaoFilme($id_filme, $sugestao_correcao)
	{
		$sql = "INSERT INTO sugestoes_correcoes_filme(id_filme, sugestao_correcao, tratada) VALUES (:id_filme, :sugestao_correcao, false)";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(":id_filme", $id_filme);
		$sql->bindValue(":sugestao_correcao", $sugestao_correcao);
		return $sql->execute();
	}

}
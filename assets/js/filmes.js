function atualizaQtdVotacoes(id_filme)
{
	$.ajax(
	{
		url: base_url+'ajax/get_votacoes_filme'
		,method: "POST"
		,data:
		{
			id_filme: id_filme
		}
		,dataType: "json"
		,success: function(dados)
		{
			var qtd_informacao_correta = dados[0]['qtd_informacao_correta'];

			var qtd_informacao_incorreta = dados[0]['qtd_informacao_incorreta'];

			$('.qtd-informacao-correta').html(qtd_informacao_correta);
			$('.qtd-informacao-incorreta').html(qtd_informacao_incorreta);

		}
		,error: function(e,e2,descErro)
		{
			alert('Ocorreu um erro!'+descErro);
		}
	});	
}

$( document ).ready(function() 
{

	$( ".informacao-correta" ).click(function() 
	{
		var obj = $(this); 
		var id = obj.attr('data-id');

		$.ajax(
		{
			url: base_url+'ajax/cadastrar_votacao_filme'
			,method: "POST"
			,data:
			{
				id_filme:id
				,informacao_correta: 1
			}
			,dataType: "json"
			,success: function(json)
			{
				if(json.inseriu === 1)
				{
					atualizaQtdVotacoes(id);
				}
				else
				{
					alert(json.msg);
					//alert('Ocorreu um erro inesperado!');
				}

    		}
    		,error: function(e,e2,descErro)
			{
    			alert('Ocorreu um erro!'+descErro);
    		}
    	});

	});

	$( ".informacao-incorreta" ).click(function() 
	{
		var obj = $(this); 
		var id = obj.attr('data-id');

		$.ajax(
		{
			url: base_url+'ajax/cadastrar_votacao_filme'
			,method: "POST"
			,data:
			{
				id_filme:id
				,informacao_correta: 0
			}
			,dataType: "json"
			,success: function(json)
			{
				if(json.inseriu === 1)
				{
					atualizaQtdVotacoes(id);
				}
				else
				{
					alert(json.msg);
					//alert('Ocorreu um erro inesperado!');
				}

    		}
    		,error: function(e,e2,descErro)
			{
    			alert('Ocorreu um erro!'+descErro);
    		}
    	});

	});

	$(".sugestao-correcao").click(function() 
	{
		//alert('Oi');
		$('#modalSugestaoCorrecao').modal('show');
	});

	$( "#btn-sugestao-correcao" ).click(function() 
	{
		var sugestao_correcao = $('#sugestao_correcao').val();

		if(sugestao_correcao != '')
		{

			$.ajax(
			{
				url: base_url+'ajax/cadastrar_sugestao_correcao'
				,method: "POST"
				,data:
				{
					id_filme: $('#id_filme').val()
					,sugestao_correcao: sugestao_correcao
				}
				,dataType: "json"
				,success: function(json)
				{
					if(json.inseriu === 1)
					{
						alert('Inserido com sucesso!');
						$('#modalSugestaoCorrecao').modal('hide');
					}
					
	    		}
	    		,error: function(e,e2,descErro)
				{
	    			alert('Ocorreu um erro!'+descErro);
	    		}
	    	});
		}
		else
		{
			alert('Favor preencha o campo!');
		}

	});

});
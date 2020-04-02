$( document ).ready(function() 
{

	$('.table').DataTable();
	
	$( ".deletar-sugestao-filme" ).click(function() 
	{
		var obj = $(this); 
		var id = obj.attr('data-id');

		var confirma = confirm('Deseja realmente rejeitar a sugestão de filme?');

		if(confirma)
		{
			$.ajax(
			{
				url: base_url+'ajax/rejeita_sugestao_filme'
				,method: "POST"
				,data:{id:id}
    			,dataType: "json"
				,success: function(json)
				{
	        		if(json.status == '1') 
	        		{
						//alert(json.rejeitou);

						if(json.rejeitou === 1)
						{
							alert('Sugestão de filme rejeitada com sucesso!');
							var linha = obj.parent().parent();
							linha.remove();
						}
						else
						{
							alert('Ocorreu um erro inesperado!');
						}

					} else {
						window.location.href = BASE_URL+'login';
					}
	    		}
	    		,error: function(e,e2,descErro)
				{
	    			alert('Ocorreu um erro!');
	    		}
	    	});
		}

	});


});
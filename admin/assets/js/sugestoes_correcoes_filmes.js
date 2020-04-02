$( document ).ready(function() 
{
	$('.table').DataTable();


	$( ".tratar-sugestao-correcao-filme" ).click(function() 
	{
		var obj = $(this); 
		var id = obj.attr('data-id');

		var confirma = confirm('Deseja realmente marcar como tratado?');

		if(confirma)
		{
			$.ajax(
			{
				url: base_url+'ajax/tratar_sugestao_correcao_filme'
				,method: "POST"
				,data:{id:id}
    			,dataType: "json"
				,success: function(json)
				{
	        		if(json.status == '1') 
	        		{

						if(json.tratou === 1)
						{
							alert('Sugestão de correção tratada com sucesso!');
							location.reload();
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
	    			alert('Ocorreu um erro!'+descErro);
	    		}
	    	});
		}

	});


});
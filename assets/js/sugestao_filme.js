$( document ).ready(function() 
{

	$('label[for=tem_pos_credito], #tem_pos_credito, label[for=qtd_cenas_pos_credito], label[class=radio-inline]').hide();

	$( "#assistiu_filme" ).change(function() 
	{
		var assistiu_filme = $(this).val(); 
		
		if(assistiu_filme == '1')
		{
			$('label[for=tem_pos_credito], #tem_pos_credito').show();
		}
		else
		{
			$('label[for=tem_pos_credito], #tem_pos_credito, label[for=qtd_cenas_pos_credito], label[class=radio-inline]').hide();
			$('#tem_pos_credito').val('');
			//$('input[name=qtd_cenas_pos_credito]').attr('checked', false);
			//$("input[name=qtd_cenas_pos_credito]").prop("checked", "false");
		}

	});

	$( "#tem_pos_credito" ).change(function() 
	{
		var tem_pos_credito = $(this).val(); 
		
		if(tem_pos_credito == '1')
		{
			$('label[for=qtd_cenas_pos_credito], #qtd_cenas_pos_credito, label[class=radio-inline]').show();
		}
		else
		{
			$('label[for=qtd_cenas_pos_credito], label[class=radio-inline]').hide();
			//$('input[name=qtd_cenas_pos_credito]').attr('checked', false);
			//$("input[name=qtd_cenas_pos_credito]").prop("checked", "false");
		}

	});

});
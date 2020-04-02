$( document ).ready(function() 
{

	//está mostrando o label e o value
	$( "#titulo_filme" ).autocomplete
	({
    	source: function( request, response ) 
      	{
	        $.ajax({
	          url: base_url+"ajax/get_filmes",
	          dataType: "json",
	          data: 
	          {
	            term: request.term
	          },
	          success: function( data ) {
	            response( data );
	          }
	        });
      	},
      	minLength: 2,
      	select: function( event, ui ) 
      	{
        	//alert(ui.item.value + " Id " + ui.item.label+' - '+ui.item.slug);
        	$('#titulo_filme').val(ui.item.label);
        	//window.location = base_url+'filmes/filme/'+ui.item.slug; 

      	}
    });

});
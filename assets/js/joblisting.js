(function($){

	$("#searchform").submit(function(e){
		e.preventDefault();

		var data = {
			'q': $("#keyword").val(),
			'position': $("#position").val(),
			'categories': $("#categorie").val()
		};
		console.log(data);

		$.ajax({
			url: ajax_url,
			type: 'get',
			data: {
				action: 'joblist',
				data: data,
			},
			success: function(response){
				$("#joblist").html(response);			
			}
		});
	});

	$(document).on("click","#loadMore",function(){

		$.ajax({
			url: ajax_url,
			type: 'get',
			data: {
				action: 'scroll',
			},
			success: function(response){
				$("#joblist").append(response);			
			}
		});
	});
	
})(jQuery);
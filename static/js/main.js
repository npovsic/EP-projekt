$(document).ready(function(){
	console.log('Document ready.');
	$("#rating").on('submit',function(e){
		e.preventDefault();
		console.log(id_article, $('input[name=ocena]:checked', '#rating').val());

		$.ajax({
			type: "POST",
			url: "rate",
			data: {
				id : id_article,
				rating_value : parseInt($('input[name=rate]:checked', '#rating').val())
			},
			cache: false,
			success: function(rating){
                location.reload();
            },
			error: function(err) {
				console.log('Error occured.', err);
			}
		});

	});
});
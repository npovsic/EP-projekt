$(document).ready(function(){
	$("#ocena_proteina").on('submit',function(e){
		e.preventDefault();
		//console.log(id_article, parseInt($('input[name=ocena]:checked', '#ocena_proteina').val()));
		
		$.ajax({
			type: "POST",
			url: "/article/oceni",
			data: {
				id : id_article,
				ocena : parseInt($('input[name=ocena]:checked', '#ocena_proteina').val()),
			},
			cache: false,
			success: function(ocena){
			}
		});
		
	});
});
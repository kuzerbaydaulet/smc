$(document).ready(function(){
	var inProgress = false;

	var startForm = 10;

		$(window).scroll(function(){
			if($(window).scrollTop() + $(window).height() >= $(document).height() - 200 && !inProgress ){

				$.ajax({

					url: 'obrabotchik.php',

					method: 'post',

					data: { "startForm" : startForm },

					beforSend: function(){
						inProgress = true;
					}

				}).done(function(data){

					data = jQuery.parseJSON(data);

					if(data.length > 0){
						$.each(data, function(index, data){
							$("#articles").append("<p><b>" + data.title + "</b><br/>" + data.text + "</p>");
						});

						inProgress = false;

						startForm += 10;
					}
	
				});

			}
		});
});
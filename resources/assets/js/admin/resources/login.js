
$('form#form-login').submit(function(e){

	console.log('oi')

	e.preventDefault();

	let valores = $(this).serialize();

	$.ajax({
		type: 'POST',
		url: '/loginAdmin',
		data: valores,
		complete: function(retorno){

			if(retorno.responseText == 1) {

				$('.error-text').css({
					opacity: 0,
					visibility: 'hidden',
				});
				window.location = '/content-adm/dashboard';
				return;

			} else {

				$('.error-text').css({
					opacity: 1,
					visibility: 'visible',
				});
				return false;
			
			}
		}
	});

});

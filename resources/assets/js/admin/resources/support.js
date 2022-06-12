$(document).ready(function(){

	var redirectToList = function() {

    	window.location.href = '/content-adm/dashboard'; 

    }

	// Cadastrar Gestor
	$('form#support').submit(function(e){

		e.preventDefault();

		var form = $(this);

		if(validateInputs(form)){

			// loading
	        $('#fields').hide();
	        $('#carregando').show();
			$('#botao').attr('disabled', 'disabled');

			sendMail(form);

		}

	});

	var sendMail = function(form) {

		var valores = form.serialize();

		$.ajax({
			url      : '/sendMailSupport',
			type     : 'POST',
			dataType : 'JSON',
			data     : valores,
			success  : function(retorno){

				$('#botao').removeAttr('disabled');

                if(retorno.status == 1){

					showAlertDialog(retorno.msg, false);
                    setTimeout(redirectToList(), 2000);

                } else {

                    $('#carregando').hide();
                    $('#fields').show();
					showAlertDialog(retorno.msg, true);
                
                }
			}
		});

	}

});
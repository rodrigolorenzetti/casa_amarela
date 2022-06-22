window.validateInputs = function(form){

	let validate = true;

	form.find('input, textarea, select').removeClass("red-border");
	
	form.find('input, textarea, select').each(function(){

		if($(this).val() == '' || $(this).val() == null) {

			$(this).addClass("red-border").focus();
            validate = false;
			return validate;
		}

	});

	return validate;

}

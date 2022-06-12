window.validateInputs = function(form){

	let validate = true;

	$('.required').css({'border-color':'#E8E8E8'});
	
	form.find('input.required, textarea.required, select.required').each(function(){

		if($(this).val() == '' || $(this).val() == null) {

			$(this).css('border-color', '#be0007').focus();
            validate = false;
			return validate;
		}

	});

	return validate;

}

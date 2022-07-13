
var redirectToList = function() {
	window.location.href = '/content-adm/lista-gestores'; 
}

var validatePassword = function() {
	let password 	= $('input[name="password"]');
	let re_password = $('input[name="confirm_password"]');

	if(re_password.val() !== password.val()) {
		password.addClass("red-border").focus();
		re_password.addClass("red-border").focus();
		showModalSmallResponse("As senhas precisam ser iguais.", 'error')
		return false;
	}

	return true;
}

var ajaxSubmit = function(id, route) {

	var data = new FormData(document.getElementById(id));
	
	$.ajax({
		xhr: function() {
			var xhr = new window.XMLHttpRequest();
			xhr.upload.addEventListener("progress", function(evt) {
				if (evt.lengthComputable) {
					var percentComplete = ((evt.loaded / evt.total) * 100);
					percentComplete = Math.round(percentComplete);
					$(".loading-form").width(percentComplete + '%');
				}
			}, false);
			return xhr;
		},
		url      : '/' + route,
		type     : 'POST',
		dataType : 'JSON',
		data     : data,
		processData : false,
        contentType : false,
		beforeSend: function(){
			$(".loading-form").width('0%');
		},
		success  : function(retorno) {

			$('input[type="submit"]').removeClass('disabled');

			if(retorno.status == 1){
				showModalSmallResponse(retorno.msg, 'success')
				setTimeout(redirectToList(), 2000);
			}else{
				showModalSmallResponse(retorno.msg, 'error')
			}
		},
		error: function(retorno){
			$('input[type="submit"]').removeClass('disabled');
			showModalSmallResponse("Ocorreu um erro ao efetuar a operação. Por favor, entre em contato com o Suporte.", 'error')
		}
	});	
}

$('form#add-admin').submit(function(e) {
	let form = $(this);
	e.preventDefault();

	if(validateInputs(form) && validatePassword()){
		$('input[type="submit"]').addClass('disabled');
		ajaxSubmit("add-admin", "addAdmin");
	}
});

$('form#edit-admin').submit(function(e) {
	let form = $(this);
	let okGo = true;
	e.preventDefault();

	if ($('input[name="password"]').val() != '') {
		$('input[name="password"]').addClass('required');
		$('input[name="confirm_password"]').addClass('required');

		if(validateInputs(form)) {
			if(!validatePassword()) {
				okGo = false;
			}
		} else {
			okGo = false;
		}
	} else {
		$('input[name="password"]').removeClass('required');
		$('input[name="confirm_password"]').removeClass('required');

		if(!validateInputs(form)) {
			okGo = false;
		}
	}

	if (okGo) {
		$('input[type="submit"]').addClass('disabled');
		ajaxSubmit("edit-admin", "changeAdmin");
	}
});

$(".remove-admin").click(function() {

	var id    = $(this).data("value");
	var confirma = confirm('Deseja realmente remover este item? Esta ação é irreversível.');
	if(confirma){
		$.ajax({
			url      : '/deleteAdmin',
			type     : 'PUT',
			dataType : 'JSON',
			data     : {id : id},
			success  : function(retorno){
				if(retorno.status == 1 || retorno.status == 2){
					showModalSmallResponse(retorno.msg, 'success')
					setTimeout(redirectToList, 2000);
				}
			}
		});
	}
});

$(".remove-multiple-admins").click(function() {

    let inputs = [];

    $("input[name = 'delete-admins[]']").each(function(){
        if($(this).prop("checked")){
            inputs.push($(this).val())
        }
    });

    var confirma = confirm('Deseja realmente remover estes itens? Esta ação é irreversível.');
    if(confirma){
        $.ajax({
            url      : '/deleteMultipleAdmin',
            type     : 'PUT',
            dataType : 'JSON',
            data     : {inputs : inputs},
            success  : function(retorno){
                if(retorno.status == 1 || retorno.status == 2){
                    showModalSmallResponse(retorno.msg, 'success')
                    setTimeout(redirectToList(), 2000);
                }
            }
        });
    }
});


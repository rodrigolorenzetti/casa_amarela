
var redirectToList = function() {
	window.location.href = '/content-adm/lista-opcoes-doacao'; 
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

$('form#add-donation-option').submit(function(e) {
	let form = $(this);
	e.preventDefault();

	if(validateInputs(form)){
		$('input[type="submit"]').addClass('disabled');
		ajaxSubmit("add-donation-option", "addDonationOptions");
	}
});

$('form#edit-donation-option').submit(function(e) {
	let form = $(this);
	e.preventDefault();

	if(validateInputs(form)) {
        $('input[type="submit"]').addClass('disabled');
		ajaxSubmit("edit-donation-option", "changeDonationOptions");
	}
});

$(".remove-donation-option").click(function() {

	var id    = $(this).data("value");
	var confirma = confirm('Deseja realmente remover este item? Esta ação é irreversível.');
	if(confirma){
		$.ajax({
			url      : '/deleteDonationOptions',
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

$(".remove-multiple-donation-options").click(function() {

    let inputs = [];

    $("input[name = 'delete-donation-options[]']").each(function(){
        if($(this).prop("checked")){
            inputs.push($(this).val())
        }
    });

    var confirma = confirm('Deseja realmente remover estes itens? Esta ação é irreversível.');
    if(confirma){
        $.ajax({
            url      : '/deleteMultipleDonationOptions',
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


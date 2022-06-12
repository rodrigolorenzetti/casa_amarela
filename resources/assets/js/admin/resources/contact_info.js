var redirectToList = function() {
    window.location.reload();
}

var changeContactInfo = function(){

    var data = new FormData(document.getElementById("edit-contact-info"));

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
        url: '/changeContactInfo',
        type: "POST",
        data: data,
            mimeType: "multipart/form-data",
        dataType : 'json',
        contentType: false,
        cache: false,
        processData:false,
        beforeSend: function(){
            $(".loading-form").width('0%');
        },
        success     : function(retorno){

            $('input[type="submit"]').removeClass('disabled');
            if(retorno.status == 1){
                showModalSmallResponse(retorno.msg, 'success');
                setTimeout(redirectToList(), 2000);
            }else{
                showModalSmallResponse(retorno.msg, 'error');
            }
        },
        error     : function(retorno){
            $('input[type="submit"]').removeClass('disabled');
            $('#carregando').hide();
            $('#fields').show();
            showModalSmallResponse("Ocorreu um erro ao efetuar a operação. Por favor, entre em contato com o Suporte.", 'error')
        }
    });
}

$('form#edit-contact-info').submit(function(e){
    let form = $(this);
    e.preventDefault();
    if(validateInputs(form) && validateImages(form)){
        $('#fields').hide();
        $('#carregando').show();
        $('input[type="submit"]').addClass('disabled');
        changeContactInfo();
    }
});
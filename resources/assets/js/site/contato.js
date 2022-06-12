
var redirectToList = function() {
    window.location.reload();
}

$('form#send-contact').on("submit", function(e){
    let form = $(this);
    e.preventDefault();
    if(validateInputs(form)){
        $('input[type="submit"]').addClass('disabled');
        ajaxSubmit("send-contact", "sendContact");
    }
});

$('form.newsletter-form').on("submit", function(e){
    let form = $(this);
    let id = $(this).attr('id');
    e.preventDefault();
    if(validateInputs(form)){
        $('input[type="submit"]').addClass('disabled');
        ajaxSubmit(id, "sendNewsletter");
    }
});

function ajaxSubmit(id, route){
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
        url: "/" + route,
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
            $("#modal-result .section-title").html(retorno.title)
            $("#modal-result .geral-text").html(retorno.text)
            $("#modal-result").modal("show")

            if(retorno.status == 1){
                setTimeout(()=>{redirectToList()}, 4000);
            }
        },
        error     : function(retorno){
            $('input[type="submit"]').removeClass('disabled');
            
            $("#modal-result .section-title").html("Ocorreu um erro ao efetuar a operação")
            $("#modal-result .geral-text").html("Por favor, entre em contato com o Suporte.")
            $("#modal-result").modal("show")
        }
    });
}

var pathArray = window.location.pathname.split('/');
var currentLocation = pathArray[2];

window.showAlertDialog = function(msg, showOkButton) {
    $('#infoModalText').html(msg);

    if (!showOkButton) { $('#infoModalOkBtn').hide(); }

    $("#infoModal").modal();
}

window.openModal = function(modal) {

    if (modal != "") {
        $("#" + modal).addClass("show")

        $("body, html").css({
            overflow: 'hidden',
            height: '100%',
        })
    }

}

window.closeModal = function(modal) {

    if (modal != "") {
        $("#" + modal).removeClass("show")

        $("body, html").css({
            overflow: 'auto',
            height: 'auto',
        })
    }

}

window.showModalSmallResponse = function(msg, response_type) {

    let notifications_area = $('.small-notifications-area');

    let icon;

    var notification_box = "";

    if (response_type == 'success') {

        icon = "<span class='iconify success' data-icon='feather:check'></span>";

    } else if (response_type == 'error') {

        icon = "<svg class='error' width='18' height='18' viewBox='0 0 18 18' fill='none' xmlns='http://www.w3.org/2000/svg'><path d='M1 1L16.5 16.5' stroke='currentcolor' stroke-width='2'/><path d='M16.5 1L1 16.5' stroke='currentcolor' stroke-width='2'/></svg>";

    }

    notification_box =
        "<div class='box-small-response'>" +
        icon + "<p class='message'>" + msg + "</p>" +
        "</div>";

    notifications_area.append(notification_box);

    $('.box-small-response').each(function (i) {

        let box = $(this);

        box.css('visibility', 'visible');
        box.css('opacity', '1');

        setTimeout(function () {
            box.fadeOut(300, function () { $(this).remove(); });
        }, 5000);

    })

}

window.padNumber = function(num, size) {
    var s = num + "";
    while (s.length < size) s = "0" + s;
    return s;
}

window.clickInput = function () {

    $(".preview-img").on("click", function () {

        $(this).parents(".image-preview").find("input[type='file']").click()

    })

}

window.checkFile = function () {

    $("input[type='file']").on("change", function (e) {

        if ($(this).attr("name") != "images") {

            var files = e.target.files;
            var filename = files[0].name;
            var extension = files[0].type;

            var input = $(this);

            if (!extension.includes("image")) {
                showModalSmallResponse("Formato não suportado! Suba apenas imagens", "error")

                input.parent().find(".preview-img").css("background", "none").removeClass("w-background");

                input.val("")

            } else {

                if (files && files[0]) {

                    var reader = new FileReader();

                    reader.onload = function (e) {

                        input.parent().find(".preview-img").css('background-image', 'url(' + e.target.result + ')').addClass("w-background")

                    }

                    reader.readAsDataURL(files[0]);

                }
            }

        }


    })

}

window.validateInputs = function(form) {

	let validate = true;

	$('.required').css({ 'border-color': '#E8E8E8' });

	form.find('input.required, textarea.required, select.required').each(function () {

		if ($(this).val() == '' || $(this).val() == null) {

			$(this).css('border-color', '#be0007').focus();
			validate = false;
			return validate;
		}

	});

	return validate;

}

window.validateImages = function(form) {

	let validate = true;
	let text = "<p class='warning' style='color: #BE0007'>Imagem obrigatória!</p>";

	($('.warning')) ? $('.warning').remove() : '';
	$('.required').css({ 'box-shadow': 'unset' });

	form.find('input[type="file"]').each(function () {

		if ($(this).hasClass('required')) {

			if (document.getElementById($(this).attr('id')).files.length == 0) {

				$(this).css({
					'-webkit-box-shadow': 'inset 0 0 0 1px #BE0007',
					'box-shadow': 'inset 0 0 0 1px #BE0007'
				}).focus();

				$(text).appendTo($(this).parent());

				validate = false;
				return validate;

			}

		}

	});

	return validate;

}

$(document).on('change', ".multiple-delete", function () {

    if ($(this).prop("checked")) {

        $(".btn-multiple-actions").css("opacity", 1).css("visibility", "visible");

    } else {

        let counter = 0;

        $(".multiple-delete").each(function () {

            if ($(this).prop("checked")) {
                counter++;
            }

        });

        console.log(counter)

        if (counter == 0) {
            $(".btn-multiple-actions").css("opacity", 0).css("visibility", "hidden");;
        }

    }

})

$(document).ready(function () {

    if ($("aside.general-dashboard-aside").length > 0) {

        let width = $("aside.general-dashboard-aside").width() + 40;

        $(".content-wrap").css("padding-left", width + "px")

    }

    Simditor.locale = 'pt-BR';
    toolbar = ['title', 'bold', 'italic', 'underline', 'ol', 'ul', 'blockquote', 'link', 'indent', 'outdent', 'alignment'];

    $(".simditor-text").each(function () {
        let id = $(this).attr("id")

        if (id != "" && typeof id !== "undefined") {
            new Simditor({
                textarea: $('#' + id),
                toolbar: toolbar,
            });
        }
    })

    $('#dataTable').DataTable();

    clickInput();
    checkFile();

})

require('./resources/login');
require('../site/mascaras.js');

if(currentLocation.includes("gestor")){
    require('./resources/admins');
}

require('./resources/pages');

require('./resources/partners');
require('./resources/donation_options');
require('./resources/site_configuration');
require('./resources/volunteering');
require('./resources/about_gallery');
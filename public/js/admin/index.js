/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/assets/js/admin/index.js":
/*!********************************************!*\
  !*** ./resources/assets/js/admin/index.js ***!
  \********************************************/
/***/ ((__unused_webpack_module, __unused_webpack_exports, __webpack_require__) => {

var pathArray = window.location.pathname.split('/');
var currentLocation = pathArray[2];

window.showAlertDialog = function (msg, showOkButton) {
  $('#infoModalText').html(msg);

  if (!showOkButton) {
    $('#infoModalOkBtn').hide();
  }

  $("#infoModal").modal();
};

window.openModal = function (modal) {
  if (modal != "") {
    $("#" + modal).addClass("show");
    $("body, html").css({
      overflow: 'hidden',
      height: '100%'
    });
  }
};

window.closeModal = function (modal) {
  if (modal != "") {
    $("#" + modal).removeClass("show");
    $("body, html").css({
      overflow: 'auto',
      height: 'auto'
    });
  }
};

window.showModalSmallResponse = function (msg, response_type) {
  var notifications_area = $('.small-notifications-area');
  var icon;
  var notification_box = "";

  if (response_type == 'success') {
    icon = "<span class='iconify success' data-icon='feather:check'></span>";
  } else if (response_type == 'error') {
    icon = "<svg class='error' width='18' height='18' viewBox='0 0 18 18' fill='none' xmlns='http://www.w3.org/2000/svg'><path d='M1 1L16.5 16.5' stroke='currentcolor' stroke-width='2'/><path d='M16.5 1L1 16.5' stroke='currentcolor' stroke-width='2'/></svg>";
  }

  notification_box = "<div class='box-small-response'>" + icon + "<p class='message'>" + msg + "</p>" + "</div>";
  notifications_area.append(notification_box);
  $('.box-small-response').each(function (i) {
    var box = $(this);
    box.css('visibility', 'visible');
    box.css('opacity', '1');
    setTimeout(function () {
      box.fadeOut(300, function () {
        $(this).remove();
      });
    }, 5000);
  });
};

window.padNumber = function (num, size) {
  var s = num + "";

  while (s.length < size) {
    s = "0" + s;
  }

  return s;
};

window.clickInput = function () {
  $(".preview-img").on("click", function () {
    $(this).parents(".image-preview").find("input[type='file']").click();
  });
};

window.checkFile = function () {
  $("input[type='file']").on("change", function (e) {
    if ($(this).attr("name") != "images") {
      var files = e.target.files;
      var filename = files[0].name;
      var extension = files[0].type;
      var input = $(this);

      if (!extension.includes("image")) {
        showModalSmallResponse("Formato não suportado! Suba apenas imagens", "error");
        input.parent().find(".preview-img").css("background", "none").removeClass("w-background");
        input.val("");
      } else {
        if (files && files[0]) {
          var reader = new FileReader();

          reader.onload = function (e) {
            input.parent().find(".preview-img").css('background-image', 'url(' + e.target.result + ')').addClass("w-background");
          };

          reader.readAsDataURL(files[0]);
        }
      }
    }
  });
};

window.validateInputs = function (form) {
  var validate = true;
  $('.required').css({
    'border-color': '#E8E8E8'
  });
  form.find('input.required, textarea.required, select.required').each(function () {
    if ($(this).val() == '' || $(this).val() == null) {
      $(this).css('border-color', '#be0007').focus();
      validate = false;
      return validate;
    }
  });
  return validate;
};

window.validateImages = function (form) {
  var validate = true;
  var text = "<p class='warning' style='color: #BE0007'>Imagem obrigatória!</p>";
  $('.warning') ? $('.warning').remove() : '';
  $('.required').css({
    'box-shadow': 'unset'
  });
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
};

$(document).on('change', ".multiple-delete", function () {
  if ($(this).prop("checked")) {
    $(".btn-multiple-actions").css("opacity", 1).css("visibility", "visible");
  } else {
    var counter = 0;
    $(".multiple-delete").each(function () {
      if ($(this).prop("checked")) {
        counter++;
      }
    });
    console.log(counter);

    if (counter == 0) {
      $(".btn-multiple-actions").css("opacity", 0).css("visibility", "hidden");
      ;
    }
  }
});
$(document).ready(function () {
  if ($("aside.general-dashboard-aside").length > 0) {
    var width = $("aside.general-dashboard-aside").width() + 40;
    $(".content-wrap").css("padding-left", width + "px");
  }

  Simditor.locale = 'pt-BR';
  toolbar = ['title', 'bold', 'italic', 'underline', 'ol', 'ul', 'blockquote', 'link', 'indent', 'outdent', 'alignment'];
  $(".simditor-text").each(function () {
    var id = $(this).attr("id");

    if (id != "" && typeof id !== "undefined") {
      new Simditor({
        textarea: $('#' + id),
        toolbar: toolbar
      });
    }
  });
  $('#dataTable').DataTable();
  clickInput();
  checkFile();
});

__webpack_require__(/*! ./resources/login */ "./resources/assets/js/admin/resources/login.js");

__webpack_require__(/*! ../site/mascaras.js */ "./resources/assets/js/site/mascaras.js");

if (currentLocation.includes("gestor")) {
  __webpack_require__(/*! ./resources/admins */ "./resources/assets/js/admin/resources/admins.js");
}

__webpack_require__(/*! ./resources/pages */ "./resources/assets/js/admin/resources/pages.js");

__webpack_require__(/*! ./resources/partners */ "./resources/assets/js/admin/resources/partners.js");

__webpack_require__(/*! ./resources/donation_options */ "./resources/assets/js/admin/resources/donation_options.js");

__webpack_require__(/*! ./resources/site_configuration */ "./resources/assets/js/admin/resources/site_configuration.js");

__webpack_require__(/*! ./resources/volunteering */ "./resources/assets/js/admin/resources/volunteering.js");

__webpack_require__(/*! ./resources/about_gallery */ "./resources/assets/js/admin/resources/about_gallery.js");

/***/ }),

/***/ "./resources/assets/js/admin/resources/about_gallery.js":
/*!**************************************************************!*\
  !*** ./resources/assets/js/admin/resources/about_gallery.js ***!
  \**************************************************************/
/***/ (() => {

function _typeof(obj) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (obj) { return typeof obj; } : function (obj) { return obj && "function" == typeof Symbol && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }, _typeof(obj); }

var redirectToList = function redirectToList() {
  window.location.reload();
};

$("input[name='images']").on("change", function (e) {
  var imageCount = document.getElementById("images").files.length;
  $(".gallery.w-background").remove();

  var _loop = function _loop() {
    image = document.getElementById("images").files[i];

    if (!image.type.includes("image")) {
      showModalSmallResponse("Selecione apenas imagens! (Formatos jpg, png ou gif)", 'error');
      return {
        v: false
      };
    }

    var div = $(".preview-img.div-to-add").clone();
    div.removeClass("div-to-add");
    div.find(".alt-text").removeAttr("hidden");
    reader = new FileReader();

    reader.onload = function (e) {
      div.css('background-image', 'url(' + e.target.result + ')').addClass("w-background");
    };

    reader.readAsDataURL(image);
    $(".div-to-add").before(div);
  };

  for (var i = 0; i < imageCount; i++) {
    var image;
    var reader;

    var _ret = _loop();

    if (_typeof(_ret) === "object") return _ret.v;
  }
});
$("form#edit-about-gallery").submit(function (e) {
  e.preventDefault();
  var imageCount = document.getElementById("images").files.length;

  if (imageCount > 20) {
    showModalSmallResponse("Selecione 20 imagens por vez! (Formatos jpg, png ou gif)", 'error');
    return false;
  }

  if (imageCount == 0) {
    showModalSmallResponse("Selecione ao menos uma imagem para poder fazer o upload.", 'error');
    return false;
  } // Loading


  var values = new FormData();
  values.append('image_count', imageCount);
  var image_alt = [];
  $("input[name='image_alt[]']").each(function () {
    image_alt.push($(this).val());
  });
  values.append('image_alt', image_alt);

  for (var i = 0; i < imageCount; i++) {
    var image = document.getElementById("images").files[i];

    if (!image.type.includes("image")) {
      showModalSmallResponse("Selecione apenas imagens! (Formatos jpg, png ou gif)", 'error');
      return false;
    }

    var div = $(".preview-img.div-to-add").clone();
    div.removeClass("div-to-add");
    values.append('image' + i, image);
  }

  $('input[type="submit"]').addClass('disabled');
  $.ajax({
    xhr: function xhr() {
      var xhr = new window.XMLHttpRequest();
      xhr.upload.addEventListener("progress", function (evt) {
        if (evt.lengthComputable) {
          var percentComplete = evt.loaded / evt.total * 100;
          percentComplete = Math.round(percentComplete);
          $(".loading-form").width(percentComplete + '%');
        }
      }, false);
      return xhr;
    },
    url: '/addAboutGallery',
    type: "POST",
    data: values,
    processData: false,
    contentType: false,
    dataType: 'json',
    beforeSend: function beforeSend() {
      $(".loading-form").width('0%');
    },
    success: function success(retorno) {
      $('input[type="submit"]').removeClass('disabled');

      if (retorno.status == 1) {
        showModalSmallResponse(retorno.msg, 'success');
        setTimeout(redirectToList(), 2000);
      } else {
        showModalSmallResponse(retorno.msg, 'error');
      }
    },
    error: function error(retorno) {
      $('input[type="submit"]').removeClass('disabled');
      showModalSmallResponse("Ocorreu um erro ao efetuar a operação. Por favor, entre em contato com o Suporte.", 'error');
    }
  });
});
$(".input_image_alt").on("blur", function () {
  var id = $(this).parents(".image-item").find(".id").val();
  var image_alt = $(this).parent().find(".alt").val();
  $(".input_image_alt").addClass("disabled");
  $.ajax({
    url: '/updateAboutGalleryAlt',
    type: 'POST',
    dataType: 'JSON',
    data: {
      id: id,
      alt_text: image_alt
    },
    success: function success(retorno) {
      $(".input_image_alt").removeClass("disabled");

      if (retorno.status != 1) {
        showModalSmallResponse(retorno.msg, 'error');
      }
    },
    error: function error(retorno) {
      $(".input_image_alt").removeClass("disabled");
      showModalSmallResponse("Ocorreu um erro interno de sistema, tente novamente mais tarde.", 'error');
    }
  });
});
$(".remove-gallery-image").click(function () {
  var id = $(this).data("value");
  var confirma = confirm('Deseja realmente remover este item? Esta ação é irreversível.');

  if (confirma) {
    $.ajax({
      url: '/deleteAboutGallery',
      type: 'POST',
      dataType: 'JSON',
      data: {
        id: id
      },
      success: function success(retorno) {
        if (retorno.status == 1 || retorno.status == 2) {
          showModalSmallResponse(retorno.msg, 'success');
          setTimeout(redirectToList, 2000);
        }
      }
    });
  }
});

/***/ }),

/***/ "./resources/assets/js/admin/resources/admins.js":
/*!*******************************************************!*\
  !*** ./resources/assets/js/admin/resources/admins.js ***!
  \*******************************************************/
/***/ (() => {

var redirectToList = function redirectToList() {
  window.location.href = '/content-adm/lista-gestores';
};

var validatePassword = function validatePassword() {
  var password = $('input[name="password"]');
  var re_password = $('input[name="confirm_password"]');

  if (re_password.val() !== password.val()) {
    password.addClass("red-border").focus();
    re_password.addClass("red-border").focus();
    showModalSmallResponse("As senhas precisam ser iguais.", 'error');
    return false;
  }

  return true;
};

var ajaxSubmit = function ajaxSubmit(id, route) {
  var data = new FormData(document.getElementById(id));
  $.ajax({
    xhr: function xhr() {
      var xhr = new window.XMLHttpRequest();
      xhr.upload.addEventListener("progress", function (evt) {
        if (evt.lengthComputable) {
          var percentComplete = evt.loaded / evt.total * 100;
          percentComplete = Math.round(percentComplete);
          $(".loading-form").width(percentComplete + '%');
        }
      }, false);
      return xhr;
    },
    url: '/' + route,
    type: 'POST',
    dataType: 'JSON',
    data: data,
    processData: false,
    contentType: false,
    beforeSend: function beforeSend() {
      $(".loading-form").width('0%');
    },
    success: function success(retorno) {
      $('input[type="submit"]').removeClass('disabled');

      if (retorno.status == 1) {
        showModalSmallResponse(retorno.msg, 'success');
        setTimeout(redirectToList(), 2000);
      } else {
        showModalSmallResponse(retorno.msg, 'error');
      }
    },
    error: function error(retorno) {
      $('input[type="submit"]').removeClass('disabled');
      showModalSmallResponse("Ocorreu um erro ao efetuar a operação. Por favor, entre em contato com o Suporte.", 'error');
    }
  });
};

$('form#add-admin').submit(function (e) {
  var form = $(this);
  e.preventDefault();

  if (validateInputs(form) && validatePassword()) {
    $('input[type="submit"]').addClass('disabled');
    ajaxSubmit("add-amin", "addAdmin");
  }
});
$('form#edit-admin').submit(function (e) {
  var form = $(this);
  var okGo = true;
  e.preventDefault();

  if ($('input[name="password"]').val() != '') {
    $('input[name="password"]').addClass('required');
    $('input[name="confirm_password"]').addClass('required');

    if (validateInputs(form)) {
      if (!validatePassword()) {
        okGo = false;
      }
    } else {
      okGo = false;
    }
  } else {
    $('input[name="password"]').removeClass('required');
    $('input[name="confirm_password"]').removeClass('required');

    if (!validateInputs(form)) {
      okGo = false;
    }
  }

  if (okGo) {
    $('input[type="submit"]').addClass('disabled');
    ajaxSubmit("edit-amin", "changeAdmin");
  }
});
$(".remove-admin").click(function () {
  var id = $(this).data("value");
  var confirma = confirm('Deseja realmente remover este item? Esta ação é irreversível.');

  if (confirma) {
    $.ajax({
      url: '/deleteAdmin',
      type: 'PUT',
      dataType: 'JSON',
      data: {
        id: id
      },
      success: function success(retorno) {
        if (retorno.status == 1 || retorno.status == 2) {
          showModalSmallResponse(retorno.msg, 'success');
          setTimeout(redirectToList, 2000);
        }
      }
    });
  }
});
$(".remove-multiple-admins").click(function () {
  var inputs = [];
  $("input[name = 'delete-admins[]']").each(function () {
    if ($(this).prop("checked")) {
      inputs.push($(this).val());
    }
  });
  var confirma = confirm('Deseja realmente remover estes itens? Esta ação é irreversível.');

  if (confirma) {
    $.ajax({
      url: '/deleteMultipleAdmin',
      type: 'PUT',
      dataType: 'JSON',
      data: {
        inputs: inputs
      },
      success: function success(retorno) {
        if (retorno.status == 1 || retorno.status == 2) {
          showModalSmallResponse(retorno.msg, 'success');
          setTimeout(redirectToList(), 2000);
        }
      }
    });
  }
});

/***/ }),

/***/ "./resources/assets/js/admin/resources/donation_options.js":
/*!*****************************************************************!*\
  !*** ./resources/assets/js/admin/resources/donation_options.js ***!
  \*****************************************************************/
/***/ (() => {

var redirectToList = function redirectToList() {
  window.location.href = '/content-adm/lista-opcoes-doacao';
};

var ajaxSubmit = function ajaxSubmit(id, route) {
  var data = new FormData(document.getElementById(id));
  $.ajax({
    xhr: function xhr() {
      var xhr = new window.XMLHttpRequest();
      xhr.upload.addEventListener("progress", function (evt) {
        if (evt.lengthComputable) {
          var percentComplete = evt.loaded / evt.total * 100;
          percentComplete = Math.round(percentComplete);
          $(".loading-form").width(percentComplete + '%');
        }
      }, false);
      return xhr;
    },
    url: '/' + route,
    type: 'POST',
    dataType: 'JSON',
    data: data,
    processData: false,
    contentType: false,
    beforeSend: function beforeSend() {
      $(".loading-form").width('0%');
    },
    success: function success(retorno) {
      $('input[type="submit"]').removeClass('disabled');

      if (retorno.status == 1) {
        showModalSmallResponse(retorno.msg, 'success');
        setTimeout(redirectToList(), 2000);
      } else {
        showModalSmallResponse(retorno.msg, 'error');
      }
    },
    error: function error(retorno) {
      $('input[type="submit"]').removeClass('disabled');
      showModalSmallResponse("Ocorreu um erro ao efetuar a operação. Por favor, entre em contato com o Suporte.", 'error');
    }
  });
};

$('form#add-donation-option').submit(function (e) {
  var form = $(this);
  e.preventDefault();

  if (validateInputs(form)) {
    $('input[type="submit"]').addClass('disabled');
    ajaxSubmit("add-donation-option", "addDonationOptions");
  }
});
$('form#edit-donation-option').submit(function (e) {
  var form = $(this);
  e.preventDefault();

  if (validateInputs(form)) {
    $('input[type="submit"]').addClass('disabled');
    ajaxSubmit("edit-donation-option", "changeDonationOptions");
  }
});
$(".remove-donation-option").click(function () {
  var id = $(this).data("value");
  var confirma = confirm('Deseja realmente remover este item? Esta ação é irreversível.');

  if (confirma) {
    $.ajax({
      url: '/deleteDonationOptions',
      type: 'PUT',
      dataType: 'JSON',
      data: {
        id: id
      },
      success: function success(retorno) {
        if (retorno.status == 1 || retorno.status == 2) {
          showModalSmallResponse(retorno.msg, 'success');
          setTimeout(redirectToList, 2000);
        }
      }
    });
  }
});
$(".remove-multiple-donation-options").click(function () {
  var inputs = [];
  $("input[name = 'delete-donation-options[]']").each(function () {
    if ($(this).prop("checked")) {
      inputs.push($(this).val());
    }
  });
  var confirma = confirm('Deseja realmente remover estes itens? Esta ação é irreversível.');

  if (confirma) {
    $.ajax({
      url: '/deleteMultipleDonationOptions',
      type: 'PUT',
      dataType: 'JSON',
      data: {
        inputs: inputs
      },
      success: function success(retorno) {
        if (retorno.status == 1 || retorno.status == 2) {
          showModalSmallResponse(retorno.msg, 'success');
          setTimeout(redirectToList(), 2000);
        }
      }
    });
  }
});

/***/ }),

/***/ "./resources/assets/js/admin/resources/login.js":
/*!******************************************************!*\
  !*** ./resources/assets/js/admin/resources/login.js ***!
  \******************************************************/
/***/ (() => {

$('form#form-login').submit(function (e) {
  console.log('oi');
  e.preventDefault();
  var valores = $(this).serialize();
  $.ajax({
    type: 'POST',
    url: '/loginAdmin',
    data: valores,
    complete: function complete(retorno) {
      if (retorno.responseText == 1) {
        $('.error-text').css({
          opacity: 0,
          visibility: 'hidden'
        });
        window.location = '/content-adm/dashboard';
        return;
      } else {
        $('.error-text').css({
          opacity: 1,
          visibility: 'visible'
        });
        return false;
      }
    }
  });
});

/***/ }),

/***/ "./resources/assets/js/admin/resources/pages.js":
/*!******************************************************!*\
  !*** ./resources/assets/js/admin/resources/pages.js ***!
  \******************************************************/
/***/ (() => {

var redirectToList = function redirectToList() {
  window.location.reload();
};

var ajaxSubmit = function ajaxSubmit(id, route) {
  var data = new FormData(document.getElementById(id));
  $.ajax({
    xhr: function xhr() {
      var xhr = new window.XMLHttpRequest();
      xhr.upload.addEventListener("progress", function (evt) {
        if (evt.lengthComputable) {
          var percentComplete = evt.loaded / evt.total * 100;
          percentComplete = Math.round(percentComplete);
          $(".loading-form").width(percentComplete + '%');
        }
      }, false);
      return xhr;
    },
    url: '/' + route,
    type: "POST",
    data: data,
    mimeType: "multipart/form-data",
    dataType: 'json',
    contentType: false,
    cache: false,
    processData: false,
    beforeSend: function beforeSend() {
      $(".loading-form").width('0%');
    },
    success: function success(retorno) {
      $('input[type="submit"]').removeClass('disabled');

      if (retorno.status == 1) {
        showModalSmallResponse(retorno.msg, 'success');
        setTimeout(redirectToList(), 2000);
      } else {
        showModalSmallResponse(retorno.msg, 'error');
      }
    },
    error: function error(retorno) {
      $('input[type="submit"]').removeClass('disabled');
      $('#carregando').hide();
      $('#fields').show();
      showModalSmallResponse("Ocorreu um erro ao efetuar a operação. Por favor, entre em contato com o Suporte.", 'error');
    }
  });
};

$('form#edit-page-home').submit(function (e) {
  var form = $(this);
  e.preventDefault();

  if (validateInputs(form) && validateImages(form)) {
    $('input[type="submit"]').addClass('disabled');
    ajaxSubmit("edit-page-home", "changePageHome");
  }
});

/***/ }),

/***/ "./resources/assets/js/admin/resources/partners.js":
/*!*********************************************************!*\
  !*** ./resources/assets/js/admin/resources/partners.js ***!
  \*********************************************************/
/***/ (() => {

var redirectToList = function redirectToList() {
  window.location.href = '/content-adm/lista-parceiros';
};

var ajaxSubmit = function ajaxSubmit(id, route) {
  var data = new FormData(document.getElementById(id));
  $.ajax({
    xhr: function xhr() {
      var xhr = new window.XMLHttpRequest();
      xhr.upload.addEventListener("progress", function (evt) {
        if (evt.lengthComputable) {
          var percentComplete = evt.loaded / evt.total * 100;
          percentComplete = Math.round(percentComplete);
          $(".loading-form").width(percentComplete + '%');
        }
      }, false);
      return xhr;
    },
    url: '/' + route,
    type: 'POST',
    dataType: 'JSON',
    data: data,
    processData: false,
    contentType: false,
    beforeSend: function beforeSend() {
      $(".loading-form").width('0%');
    },
    success: function success(retorno) {
      $('input[type="submit"]').removeClass('disabled');

      if (retorno.status == 1) {
        showModalSmallResponse(retorno.msg, 'success');
        setTimeout(redirectToList(), 2000);
      } else {
        showModalSmallResponse(retorno.msg, 'error');
      }
    },
    error: function error(retorno) {
      $('input[type="submit"]').removeClass('disabled');
      showModalSmallResponse("Ocorreu um erro ao efetuar a operação. Por favor, entre em contato com o Suporte.", 'error');
    }
  });
};

$('form#add-partner').submit(function (e) {
  var form = $(this);
  e.preventDefault();

  if (validateInputs(form)) {
    $('input[type="submit"]').addClass('disabled');
    ajaxSubmit("add-partner", "addPartner");
  }
});
$('form#edit-partner').submit(function (e) {
  var form = $(this);
  e.preventDefault();

  if (validateInputs(form)) {
    $('input[type="submit"]').addClass('disabled');
    ajaxSubmit("edit-partner", "changePartner");
  }
});
$(".remove-partner").click(function () {
  var id = $(this).data("value");
  var confirma = confirm('Deseja realmente remover este item? Esta ação é irreversível.');

  if (confirma) {
    $.ajax({
      url: '/deletePartner',
      type: 'PUT',
      dataType: 'JSON',
      data: {
        id: id
      },
      success: function success(retorno) {
        if (retorno.status == 1 || retorno.status == 2) {
          showModalSmallResponse(retorno.msg, 'success');
          setTimeout(redirectToList, 2000);
        }
      }
    });
  }
});
$(".remove-multiple-partners").click(function () {
  var inputs = [];
  $("input[name = 'delete-partners[]']").each(function () {
    if ($(this).prop("checked")) {
      inputs.push($(this).val());
    }
  });
  var confirma = confirm('Deseja realmente remover estes itens? Esta ação é irreversível.');

  if (confirma) {
    $.ajax({
      url: '/deleteMultiplePartner',
      type: 'PUT',
      dataType: 'JSON',
      data: {
        inputs: inputs
      },
      success: function success(retorno) {
        if (retorno.status == 1 || retorno.status == 2) {
          showModalSmallResponse(retorno.msg, 'success');
          setTimeout(redirectToList(), 2000);
        }
      }
    });
  }
});

/***/ }),

/***/ "./resources/assets/js/admin/resources/site_configuration.js":
/*!*******************************************************************!*\
  !*** ./resources/assets/js/admin/resources/site_configuration.js ***!
  \*******************************************************************/
/***/ (() => {

var redirectToList = function redirectToList() {
  window.location.href = '/content-adm/editar-configuracoes-site';
};

var ajaxSubmit = function ajaxSubmit(id, route) {
  var data = new FormData(document.getElementById(id));
  $.ajax({
    xhr: function xhr() {
      var xhr = new window.XMLHttpRequest();
      xhr.upload.addEventListener("progress", function (evt) {
        if (evt.lengthComputable) {
          var percentComplete = evt.loaded / evt.total * 100;
          percentComplete = Math.round(percentComplete);
          $(".loading-form").width(percentComplete + '%');
        }
      }, false);
      return xhr;
    },
    url: '/' + route,
    type: 'POST',
    dataType: 'JSON',
    data: data,
    processData: false,
    contentType: false,
    beforeSend: function beforeSend() {
      $(".loading-form").width('0%');
    },
    success: function success(retorno) {
      $('input[type="submit"]').removeClass('disabled');

      if (retorno.status == 1) {
        showModalSmallResponse(retorno.msg, 'success');
        setTimeout(redirectToList(), 2000);
      } else {
        showModalSmallResponse(retorno.msg, 'error');
      }
    },
    error: function error(retorno) {
      $('input[type="submit"]').removeClass('disabled');
      showModalSmallResponse("Ocorreu um erro ao efetuar a operação. Por favor, entre em contato com o Suporte.", 'error');
    }
  });
};

$('form#edit-site-configuration').submit(function (e) {
  var form = $(this);
  e.preventDefault();

  if (validateInputs(form)) {
    $('input[type="submit"]').addClass('disabled');
    ajaxSubmit("edit-site-configuration", "changeSiteConfigurations");
  }
});

/***/ }),

/***/ "./resources/assets/js/admin/resources/volunteering.js":
/*!*************************************************************!*\
  !*** ./resources/assets/js/admin/resources/volunteering.js ***!
  \*************************************************************/
/***/ (() => {

var redirectToList = function redirectToList() {
  window.location.href = '/content-adm/lista-voluntariados';
};

var ajaxSubmit = function ajaxSubmit(id, route) {
  var data = new FormData(document.getElementById(id));
  $.ajax({
    xhr: function xhr() {
      var xhr = new window.XMLHttpRequest();
      xhr.upload.addEventListener("progress", function (evt) {
        if (evt.lengthComputable) {
          var percentComplete = evt.loaded / evt.total * 100;
          percentComplete = Math.round(percentComplete);
          $(".loading-form").width(percentComplete + '%');
        }
      }, false);
      return xhr;
    },
    url: '/' + route,
    type: 'POST',
    dataType: 'JSON',
    data: data,
    processData: false,
    contentType: false,
    beforeSend: function beforeSend() {
      $(".loading-form").width('0%');
    },
    success: function success(retorno) {
      $('input[type="submit"]').removeClass('disabled');

      if (retorno.status == 1) {
        showModalSmallResponse(retorno.msg, 'success');
        setTimeout(redirectToList(), 2000);
      } else {
        showModalSmallResponse(retorno.msg, 'error');
      }
    },
    error: function error(retorno) {
      $('input[type="submit"]').removeClass('disabled');
      showModalSmallResponse("Ocorreu um erro ao efetuar a operação. Por favor, entre em contato com o Suporte.", 'error');
    }
  });
};

$('form#add-volunteering').submit(function (e) {
  var form = $(this);
  e.preventDefault();

  if (validateInputs(form)) {
    $('input[type="submit"]').addClass('disabled');
    ajaxSubmit("add-volunteering", "addVolunteering");
  }
});
$('form#edit-volunteering').submit(function (e) {
  var form = $(this);
  e.preventDefault();

  if (validateInputs(form)) {
    $('input[type="submit"]').addClass('disabled');
    ajaxSubmit("edit-volunteering", "changeVolunteering");
  }
});
$(".remove-volunteering").click(function () {
  var id = $(this).data("value");
  var confirma = confirm('Deseja realmente remover este item? Esta ação é irreversível.');

  if (confirma) {
    $.ajax({
      url: '/deleteVolunteering',
      type: 'PUT',
      dataType: 'JSON',
      data: {
        id: id
      },
      success: function success(retorno) {
        if (retorno.status == 1 || retorno.status == 2) {
          showModalSmallResponse(retorno.msg, 'success');
          setTimeout(redirectToList, 2000);
        }
      }
    });
  }
});
$(".remove-multiple-volunteerings").click(function () {
  var inputs = [];
  $("input[name = 'delete-volunteerings[]']").each(function () {
    if ($(this).prop("checked")) {
      inputs.push($(this).val());
    }
  });
  var confirma = confirm('Deseja realmente remover estes itens? Esta ação é irreversível.');

  if (confirma) {
    $.ajax({
      url: '/deleteMultipleVolunteering',
      type: 'PUT',
      dataType: 'JSON',
      data: {
        inputs: inputs
      },
      success: function success(retorno) {
        if (retorno.status == 1 || retorno.status == 2) {
          showModalSmallResponse(retorno.msg, 'success');
          setTimeout(redirectToList(), 2000);
        }
      }
    });
  }
});
$(".remove-volunteering-submition").click(function () {
  var id = $(this).data("value");
  var confirma = confirm('Deseja realmente remover este item? Esta ação é irreversível.');

  if (confirma) {
    $.ajax({
      url: '/deleteVolunteeringSubmition',
      type: 'PUT',
      dataType: 'JSON',
      data: {
        id: id
      },
      success: function success(retorno) {
        if (retorno.status == 1 || retorno.status == 2) {
          showModalSmallResponse(retorno.msg, 'success');
          setTimeout(function () {
            window.location.reload();
          }, 2000);
        }
      }
    });
  }
});
$(".remove-multiple-volunteerings-submitions").click(function () {
  var inputs = [];
  $("input[name = 'delete-volunteerings-submitions[]']").each(function () {
    if ($(this).prop("checked")) {
      inputs.push($(this).val());
    }
  });
  var confirma = confirm('Deseja realmente remover estes itens? Esta ação é irreversível.');

  if (confirma) {
    $.ajax({
      url: '/deleteMultipleVolunteeringSubmition',
      type: 'PUT',
      dataType: 'JSON',
      data: {
        inputs: inputs
      },
      success: function success(retorno) {
        if (retorno.status == 1 || retorno.status == 2) {
          showModalSmallResponse(retorno.msg, 'success');
          setTimeout(function () {
            window.location.reload();
          }, 2000);
        }
      }
    });
  }
});

/***/ }),

/***/ "./resources/assets/js/site/mascaras.js":
/*!**********************************************!*\
  !*** ./resources/assets/js/site/mascaras.js ***!
  \**********************************************/
/***/ (() => {

function _typeof(obj) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (obj) { return typeof obj; } : function (obj) { return obj && "function" == typeof Symbol && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }, _typeof(obj); }

//Máscaras
window.Mascara = function (o, f) {
  v_obj = o;
  v_fun = f;
  setTimeout("execmascara()", 1);
};

window.Tempo = function (v) {
  v = v.replace(/\D/g, ""); //Remove tudo o que não é dígito

  v = v.replace(/(\d{1})(\d{2})(\d{2})/, "$1:$2.$3");
  return v;
};

window.Hora = function (v) {
  v = v.replace(/\D/g, ""); //Remove tudo o que não é dígito

  v = v.replace(/(\d{2})(\d)/, "$1:$2");
  return v;
};

window.execmascara = function () {
  v_obj.value = v_fun(v_obj.value);
};

window.leech = function (v) {
  v = v.replace(/o/gi, "0");
  v = v.replace(/i/gi, "1");
  v = v.replace(/z/gi, "2");
  v = v.replace(/e/gi, "3");
  v = v.replace(/a/gi, "4");
  v = v.replace(/s/gi, "5");
  v = v.replace(/t/gi, "7");
  return v;
};

window.Integer = function (v) {
  return v.replace(/\D/g, "");
};

window.Login = function (v) {
  return v.replace(/\W/g, "");
};

window.Telefone = function (v) {
  v = v.replace(/\D/g, "");
  v = v.replace(/^(\d\d)(\d)/g, "($1) $2");

  if (v.length == 13) {
    v = v.replace(/(\d{4})(\d)/, "$1-$2");
  } else if (v.length == 14) {
    v = v.replace(/(\d{1})(\d{4})(\d)/, "$1$2-$3");
  }

  return v;
};

window.Cpf = function (v) {
  v = v.replace(/\D/g, "");
  v = v.replace(/(\d{3})(\d)/, "$1.$2");
  v = v.replace(/(\d{3})(\d)/, "$1.$2");
  v = v.replace(/(\d{3})(\d{1,2})$/, "$1-$2");
  return v;
};

window.CardNumber = function (v) {
  v = v.replace(/\D/g, "");
  v = v.replace(/(\d{4})(\d)/, "$1 $2");
  v = v.replace(/(\d{4})(\d)/, "$1 $2");
  v = v.replace(/(\d{4})(\d)/, "$1 $2");
  return v;
};

window.Cnpj = function (v) {
  v = v.replace(/\D/g, "");
  v = v.replace(/^(\d{2})(\d)/, "$1.$2");
  v = v.replace(/^(\d{2})\.(\d{3})(\d)/, "$1.$2.$3");
  v = v.replace(/\.(\d{3})(\d)/, ".$1/$2");
  v = v.replace(/(\d{4})(\d)/, "$1-$2");
  return v;
};

window.Cep = function (v) {
  v = v.replace(/\D/g, "");
  v = v.replace(/^(\d{5})(\d)/, "$1-$2");
  return v;
};

window.Data = function (v) {
  v = v.replace(/\D/g, "");
  v = v.replace(/(\d{2})(\d)/, "$1/$2");
  v = v.replace(/(\d{2})(\d)/, "$1/$2");
  return v;
};

window.checkMail = function (mail) {
  var er = new RegExp(/^[A-Za-z0-9_\-\.]+@[A-Za-z0-9_\-\.]{2,}\.[A-Za-z0-9]{2,}(\.[A-Za-z0-9])?/);

  if (typeof mail == "string") {
    if (er.test(mail)) {
      return true;
    }
  } else if (_typeof(mail) == "object") {
    if (er.test(mail.value)) {
      return true;
    }
  } else {
    return false;
  }
};

window.Valor = function (v) {
  v = v.replace(/\D/g, ""); //Remove tudo o que não é dígito

  v = v.replace(/(\d)(\d{11})$/, "$1,$2"); //coloca o ponto dos milhões

  v = v.replace(/(\d)(\d{8})$/, "$1,$2"); //coloca o ponto dos milhões

  v = v.replace(/(\d)(\d{5})$/, "$1,$2"); //coloca o ponto dos milhares

  v = v.replace(/(\d)(\d{2})$/, "$1.$2"); //coloca a virgula antes dos 2 últimos dígitos

  return v;
};

/***/ }),

/***/ "./resources/assets/less/content-adm/style_admin.less":
/*!************************************************************!*\
  !*** ./resources/assets/less/content-adm/style_admin.less ***!
  \************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./resources/assets/less/site/style.less":
/*!***********************************************!*\
  !*** ./resources/assets/less/site/style.less ***!
  \***********************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = __webpack_modules__;
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/chunk loaded */
/******/ 	(() => {
/******/ 		var deferred = [];
/******/ 		__webpack_require__.O = (result, chunkIds, fn, priority) => {
/******/ 			if(chunkIds) {
/******/ 				priority = priority || 0;
/******/ 				for(var i = deferred.length; i > 0 && deferred[i - 1][2] > priority; i--) deferred[i] = deferred[i - 1];
/******/ 				deferred[i] = [chunkIds, fn, priority];
/******/ 				return;
/******/ 			}
/******/ 			var notFulfilled = Infinity;
/******/ 			for (var i = 0; i < deferred.length; i++) {
/******/ 				var [chunkIds, fn, priority] = deferred[i];
/******/ 				var fulfilled = true;
/******/ 				for (var j = 0; j < chunkIds.length; j++) {
/******/ 					if ((priority & 1 === 0 || notFulfilled >= priority) && Object.keys(__webpack_require__.O).every((key) => (__webpack_require__.O[key](chunkIds[j])))) {
/******/ 						chunkIds.splice(j--, 1);
/******/ 					} else {
/******/ 						fulfilled = false;
/******/ 						if(priority < notFulfilled) notFulfilled = priority;
/******/ 					}
/******/ 				}
/******/ 				if(fulfilled) {
/******/ 					deferred.splice(i--, 1)
/******/ 					var r = fn();
/******/ 					if (r !== undefined) result = r;
/******/ 				}
/******/ 			}
/******/ 			return result;
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/jsonp chunk loading */
/******/ 	(() => {
/******/ 		// no baseURI
/******/ 		
/******/ 		// object to store loaded and loading chunks
/******/ 		// undefined = chunk not loaded, null = chunk preloaded/prefetched
/******/ 		// [resolve, reject, Promise] = chunk loading, 0 = chunk loaded
/******/ 		var installedChunks = {
/******/ 			"/js/admin/index": 0,
/******/ 			"css/site/style": 0,
/******/ 			"css/admin/style_admin": 0
/******/ 		};
/******/ 		
/******/ 		// no chunk on demand loading
/******/ 		
/******/ 		// no prefetching
/******/ 		
/******/ 		// no preloaded
/******/ 		
/******/ 		// no HMR
/******/ 		
/******/ 		// no HMR manifest
/******/ 		
/******/ 		__webpack_require__.O.j = (chunkId) => (installedChunks[chunkId] === 0);
/******/ 		
/******/ 		// install a JSONP callback for chunk loading
/******/ 		var webpackJsonpCallback = (parentChunkLoadingFunction, data) => {
/******/ 			var [chunkIds, moreModules, runtime] = data;
/******/ 			// add "moreModules" to the modules object,
/******/ 			// then flag all "chunkIds" as loaded and fire callback
/******/ 			var moduleId, chunkId, i = 0;
/******/ 			if(chunkIds.some((id) => (installedChunks[id] !== 0))) {
/******/ 				for(moduleId in moreModules) {
/******/ 					if(__webpack_require__.o(moreModules, moduleId)) {
/******/ 						__webpack_require__.m[moduleId] = moreModules[moduleId];
/******/ 					}
/******/ 				}
/******/ 				if(runtime) var result = runtime(__webpack_require__);
/******/ 			}
/******/ 			if(parentChunkLoadingFunction) parentChunkLoadingFunction(data);
/******/ 			for(;i < chunkIds.length; i++) {
/******/ 				chunkId = chunkIds[i];
/******/ 				if(__webpack_require__.o(installedChunks, chunkId) && installedChunks[chunkId]) {
/******/ 					installedChunks[chunkId][0]();
/******/ 				}
/******/ 				installedChunks[chunkId] = 0;
/******/ 			}
/******/ 			return __webpack_require__.O(result);
/******/ 		}
/******/ 		
/******/ 		var chunkLoadingGlobal = self["webpackChunk"] = self["webpackChunk"] || [];
/******/ 		chunkLoadingGlobal.forEach(webpackJsonpCallback.bind(null, 0));
/******/ 		chunkLoadingGlobal.push = webpackJsonpCallback.bind(null, chunkLoadingGlobal.push.bind(chunkLoadingGlobal));
/******/ 	})();
/******/ 	
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module depends on other loaded chunks and execution need to be delayed
/******/ 	__webpack_require__.O(undefined, ["css/site/style","css/admin/style_admin"], () => (__webpack_require__("./resources/assets/js/admin/index.js")))
/******/ 	__webpack_require__.O(undefined, ["css/site/style","css/admin/style_admin"], () => (__webpack_require__("./resources/assets/less/content-adm/style_admin.less")))
/******/ 	var __webpack_exports__ = __webpack_require__.O(undefined, ["css/site/style","css/admin/style_admin"], () => (__webpack_require__("./resources/assets/less/site/style.less")))
/******/ 	__webpack_exports__ = __webpack_require__.O(__webpack_exports__);
/******/ 	
/******/ })()
;
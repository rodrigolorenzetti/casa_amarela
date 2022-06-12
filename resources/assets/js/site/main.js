var pathArray = window.location.pathname.split('/');

var currentLocation = pathArray[1];

window.openModal = function(modal) {

	if (modal != "") {
		$("#" + modal).addClass("show")

		$("body").css({
			overflow: 'hidden',
		})
	}

}

window.closeModal = function(modal) {

	if (modal != "") {
		$("#" + modal).removeClass("show")

		$("body").css({
			overflow: 'auto',
		})
	}

}

$(".custom-modal .background, .custom-modal .close-modal").on("click", function () {
	let id = $(this).parents(".custom-modal").attr("id")

	closeModal(id)
})

window.removeEffects = function () {

	if ($(window).width() < 1200) {

		$('.rightShow').removeClass('rightShow').addClass("sequenced-bottom");
		$('.leftShow').removeClass('leftShow').addClass("sequenced-bottom");
		$('.slide-left').removeClass('slide-left').addClass("sequenced-bottom");
		$('.slide-right').removeClass('slide-right').addClass("sequenced-bottom");
		$('.slide-up').removeClass('slide-up').addClass("sequenced-bottom");

	}

}

window.setEffects = function () {

	window.sr = ScrollReveal({ reset: false, distance: '80px' });

	sr.reveal('.efeito');

	sr.reveal('.fadeIn', { duration: 1400 });

	sr.reveal('.rightShow', {
		origin: 'right',
		duration: 1200
	});

	sr.reveal('.leftShow', {
		origin: 'left',
		duration: 1200
	});

	sr.reveal('.topShow', {
		origin: 'top',
		duration: 1200
	});

	sr.reveal('.bottomShow', {
		origin: 'bottom',
		duration: 1200
	});

	var slideBottom = {
		distance: '200%',
		origin: 'bottom',
		duration: 1200,
		reset: false,
		interval: 50,
	};
	ScrollReveal().reveal('.slide-up', slideBottom);


	var slideLeft = {
		distance: '200%',
		origin: 'left',
		duration: 1200,
		reset: false,
		interval: 50,
	};
	ScrollReveal().reveal('.slide-left', slideLeft);

	var slideRight = {
		distance: '200%',
		origin: 'right',
		duration: 1200,
		reset: false
	};
	ScrollReveal().reveal('.slide-right', slideRight);

	var slideTop = {
		distance: '200%',
		origin: 'top',
		duration: 1200,
		reset: false
	};
	ScrollReveal().reveal('.slide-top', slideTop);

	var slideSequencedLeft = {
		origin: 'left',
		reset: false,
		duration: 1200,
		interval: 300
	};
	ScrollReveal().reveal('.sequenced-left', slideSequencedLeft);

	var slideSequencedRight = {
		origin: 'right',
		reset: false,
		duration: 1200,
		interval: 300
	};
	ScrollReveal().reveal('.sequenced-right', slideSequencedRight);

	var slideSequencedTop = {
		origin: 'top',
		reset: false,
		duration: 1200,
		interval: 300
	};
	ScrollReveal().reveal('.sequenced-top', slideSequencedTop);

	var slideSequencedBottom = {
		origin: 'bottom',
		reset: false,
		duration: 1200,
		interval: 300
	};
	ScrollReveal().reveal('.sequenced-bottom', slideSequencedBottom);

}

window.clickOnLinksBehavior = function () {

	$('a[href*="#"]').not('[href="#"]').not('[href="#0"]').not('[data-toggle]').click(function (event) {
		if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {

			var target = $(this.hash);
			target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');

			if (target.length) {

				event.preventDefault();

				$('html, body').animate({
					scrollTop: target.offset().top
				}, 600);
			}
		}
	});

}

window.checkViewport = function () {

	var scrollPos = $(document).scrollTop();

	if (currentLocation == "") {
		if (scrollPos < 40) {
			$("header").removeClass("shadowed")
		} else {
			$("header").addClass("shadowed")
		}

	} else {
		$("header").addClass("shadowed")
	}
}

window.closeMenuByBackground = function () {
	$(".nav-default .background").on("click", function () {
		$(this).parents("nav").toggleClass("menu-mobile-opened")
		checkMenuOpened();
	})
}

$(".nav-toggle .nav-button").on("click", function () {
	$(this).parents("nav").toggleClass("menu-mobile-opened")

	checkMenuOpened();
})

window.checkMenuOpened = function() {
	if ($(".nav-default").hasClass("menu-mobile-opened")) {
		$("body").css({
			overflow: 'hidden',
		})
	} else {
		$("body").css({
			overflow: 'auto',
		})
	}
}

window.closeMenuOnLinkClick = function() {
	$(".nav-default a").on("click", function () {
		$(this).parents("nav").toggleClass("menu-mobile-opened")
		checkMenuOpened();
	})
}

window.setLeftPosition = async function() {

	let defaultMarginLeft = $('.container').css('margin-left');

	if (defaultMarginLeft != 'auto') {

		defaultMarginLeft = defaultMarginLeft.replace('px', '');
		defaultMarginLeft = +defaultMarginLeft + 25;

	} else {

		defaultMarginLeft = '30';

	}

	$('.home-products-slider.swiper-container').css('padding-left', defaultMarginLeft + 'px');

}

window.loadBannerSwiper = async function() {

	new Swiper('.banner-swiper.swiper-container', {
		autoplay: {
			delay: 5000,
		},
		slidesPerView: 1,
		effect: 'fade',
		fadeEffect: {
			crossFade: true
		},
		navigation: {
			nextEl: '.banner-swiper .swiper-button-next',
			prevEl: '.banner-swiper .swiper-button-prev',
		},
	})
}

$(window).scroll(function () {

	/* Caso o header mude de cor*/
	checkViewport();

});


$(document).ready(async function () {
	/* para swipers que devem estar alinhados com o container */
	// await setLeftPosition()

	removeEffects();
	setEffects();
	clickOnLinksBehavior();

	/* Caso o header mude de cor*/
	checkViewport();

	/* se tiver swipers: */
	// await loadBannerSwiper();

	if ($(window).width() < 1200) {
		closeMenuByBackground();
		// adjustBody();
		closeMenuOnLinkClick()
	}
});

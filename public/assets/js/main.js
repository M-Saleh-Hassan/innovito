//Global var to avoid any conflicts
var CRUMINA = {};

(function ($) {

	// USE STRICT
	"use strict";

	//----------------------------------------------------/
	// Predefined Variables
	//----------------------------------------------------/
	var $window = $(window),
		$document = $(document),
		$body = $('body'),
        $sidebar = $('.fixed-sidebar'),
		$preloader = $('#hellopreloader');

	/* -----------------------
	 * Preloader
	 * --------------------- */

	CRUMINA.preloader = function () {
		$window.scrollTop(0);
		setTimeout(function () {
			$preloader.fadeOut(800);
		}, 500);
		return false;
	};

	//Scroll to top.
        jQuery('.back-to-top').on('click', function () {
            $('html,body').animate({
                scrollTop: 0
            }, 1200);
            return false;
        });


    /* -----------------------
    * Input Number Quantity
   	* --------------------- */

	$(document).on("click",".quantity-plus",function(){
		var val = parseInt($(this).prev('input').val());
		$(this).prev('input').val(val + 1).change();
		return false;
	});

	$(document).on("click",".quantity-minus",function(){
		var val = parseInt($(this).next('input').val());
		if (val !== 1) {
			$(this).next('input').val(val - 1).change();
		}
		return false;
	});


	/* -----------------------------
	 Custom input type="number"
	 https://bootsnipp.com/snippets/featured/bootstrap-number-spinner-on-click-hold
	 * ---------------------------*/

	$(function () {
		var action;
		$(document).on("touchstart mousedown",".number-spinner button",function(){
			var btn = $(this);
			var input = btn.closest('.number-spinner').find('input');
			btn.closest('.number-spinner').find('button').prop("disabled", false);

			if (btn.attr('data-dir') == 'up') {
				action = setInterval(function () {
					if (input.attr('max') == undefined || parseInt(input.val()) < parseInt(input.attr('max'))) {
						input.val(parseInt(input.val()) + 1);
					} else {
						btn.prop("disabled", true);
						clearInterval(action);
					}
				}, 50);
			} else {
				action = setInterval(function () {
					if (input.attr('min') == undefined || parseInt(input.val()) > parseInt(input.attr('min'))) {
						input.val(parseInt(input.val()) - 1);
					} else {
						btn.prop("disabled", true);
						clearInterval(action);
					}
				}, 50);
			}
		});
		$(document).on("touchend mouseup",".number-spinner button",function() {
			clearInterval(action);
		});
	});

	/* -----------------------------
	 * Toggle functions
	 * ---------------------------*/

    $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
        var target = $(e.target).attr("href"); // activated tab
        if('#events' === target){
            $('.fc-state-active').click();
        }
    });

	// Toggle aside panels
	$(".js-sidebar-open").on('click', function () {
		var mobileWidthApp = $('body').outerWidth();
		if(mobileWidthApp <= 768) {
			$(this).closest('body').find('.popup-chat-responsive').removeClass('open-chat');
			$(this).removeClass('open');
		}
		if(mobileWidthApp >= 768) {
			$(this).addClass('open');
		}

        $(this).toggleClass('active');
        $(this).closest($sidebar).toggleClass('open');
        return false;
    });

	// Close on "Esc" click
    // $window.keydown(function (eventObject) {
    //     if (eventObject.which == 27 && $sidebar.is(':visible')) {
    //         $sidebar.removeClass('open');
    //     }
    // });

    // Close on click outside elements.
    $document.on('click', function (event) {
        if (!$(event.target).closest($sidebar).length && $sidebar.is(':visible')) {
            $('.fixed-sidebar-responsive').removeClass('open');
        }
    });

    // Toggle inline popups

    var $popup = $('.window-popup');

    $(".js-open-popup").on('click', function (event) {
        var target_popup = $(this).data('popup-target');
        var current_popup = $popup.filter(target_popup);
        var offset = $(this).offset();
        current_popup.addClass('open');
        current_popup.css('top', (offset.top - (current_popup.innerHeight() / 2)));
        $body.addClass('overlay-enable');
        return false;
    });

    // Close on "Esc" click
    $window.keydown(function (eventObject) {
        if (eventObject.which == 27) {
            $popup.removeClass('open');
            $body.removeClass('overlay-enable');
			$('.profile-menu').removeClass('expanded-menu');
			$('.popup-chat-responsive').removeClass('open-chat');
			$('.profile-settings-responsive').removeClass('open');
			$('.header-menu').removeClass('open');
			$('.js-sidebar-open').removeClass('active');
        }
    });

    // Close on click outside elements.
    $document.on('click', function (event) {
        if (!$(event.target).closest($popup).length) {
            $popup.removeClass('open');
            $body.removeClass('overlay-enable');
			$('.profile-menu').removeClass('expanded-menu');
			$('.header-menu').removeClass('open');
			$('.profile-settings-responsive').removeClass('open');
        }
    });

    // Close active tab on second click.
    $('[data-toggle=tab]').on('click', function(){
		/*$body.toggleClass('body--fixed');*/
        if ($(this).hasClass('active') && $(this).closest('ul').hasClass('mobile-app-tabs')){
            $($(this).attr("href")).toggleClass('active');
            $(this).removeClass('active');
            return false;
        }
    });


    // Close on "X" click
    $(".js-close-popup").on('click', function () {
        $(this).closest($popup).removeClass('open');
        $body.removeClass('overlay-enable');
        return false
    });

	$(".profile-settings-open").on('click', function () {
		$('.profile-settings-responsive').toggleClass('open');
		return false
	});

	$(".js-expanded-menu").on('click', function () {
		$('.header-menu').toggleClass('expanded-menu');
		return false
	});

	$(".js-chat-open").on('click', function () {
		$('.popup-chat-responsive').toggleClass('open-chat');
		return false
	});
    $(".js-chat-close").on('click', function () {
        $('.popup-chat-responsive').removeClass('open-chat');
        return false
    });

	$(".js-open-responsive-menu").on('click', function () {
		$('.header-menu').toggleClass('open');
		return false
	});

	$(".js-close-responsive-menu").on('click', function () {
		$('.header-menu').removeClass('open');
		return false
	});


	$(".comments-shared .comments-show").on('click', function () {
		$(this).closest('.ui-block').children('.comments-list').toggleClass('d-block');
		$(this).closest('.ui-block').children('.comment-form').toggleClass('d-block');
		$(this).closest('.ui-block').children('.more-comments').toggleClass('d-block');
		return false
	});


	//controol more comments
	$(".ui-block .more-comments").click(
		function() {
		if($(".ui-block .comments-list .hiden").hasClass('d-none')){
			$(this).parent().find("  .hiden").removeClass( "d-none" ).addClass("d-block");
			$(this).parent().find(".more-comments").text('View less comments');

		} else {

			$(this).parent().find("  .hiden").removeClass( "d-block" ).addClass("d-none ");
			$(this).parent().find(".more-comments").text('View more comments');

			  }
		}
	  );
	/* -----------------------------
		 * Scrollmagic scenes animation
	* ---------------------------*/

	CRUMINA.CallToActionAnimation = function () {
		var controller = new ScrollMagic.Controller();

		new ScrollMagic.Scene({triggerElement: ".call-to-action-animation"})
			.setVelocity(".first-img", {opacity: 1, bottom: "0", scale: "1"}, 1200)
			.triggerHook(1)
			.addTo(controller);

		new ScrollMagic.Scene({triggerElement: ".call-to-action-animation"})
			.setVelocity(".second-img", {opacity: 1, bottom: "50%", right: "40%"}, 1500)
			.triggerHook(1)
			.addTo(controller);
	};

	CRUMINA.ImgScaleAnimation = function () {
		var controller = new ScrollMagic.Controller();

		new ScrollMagic.Scene({triggerElement: ".img-scale-animation"})
			.setVelocity(".main-img", {opacity: 1, scale: "1"}, 200)
			.triggerHook(0.3)
			.addTo(controller);

		new ScrollMagic.Scene({triggerElement: ".img-scale-animation"})
			.setVelocity(".first-img1", {opacity: 1, scale: "1"}, 1200)
			.triggerHook(0.8)
			.addTo(controller);

		new ScrollMagic.Scene({triggerElement: ".img-scale-animation"})
			.setVelocity(".second-img1", {opacity: 1, scale: "1"}, 1200)
			.triggerHook(1.1)
			.addTo(controller);

		new ScrollMagic.Scene({triggerElement: ".img-scale-animation"})
			.setVelocity(".third-img1", {opacity: 1, scale: "1"}, 1200)
			.triggerHook(1.4)
			.addTo(controller);
	};

	CRUMINA.SubscribeAnimation = function () {
		var controller = new ScrollMagic.Controller();

		new ScrollMagic.Scene({triggerElement: ".subscribe-animation"})
			.setVelocity(".plane", {opacity: 1, bottom: "auto", top: "-20", left: "50%", scale: "1"}, 1200)
			.triggerHook(1)
			.addTo(controller);

	};

	CRUMINA.PlanerAnimation = function () {
		var controller = new ScrollMagic.Controller();

		new ScrollMagic.Scene({triggerElement: ".planer-animation"})
			.setVelocity(".planer", {opacity: 1, left: "80%", scale: "1"}, 2000)
			.triggerHook(0.1)
			.addTo(controller);

	};

	CRUMINA.ContactAnimationAnimation = function () {
		var controller = new ScrollMagic.Controller();

		new ScrollMagic.Scene({triggerElement: ".contact-form-animation"})
			.setVelocity(".crew", {opacity: 1, left: "77%", scale: "1"}, 1000)
			.triggerHook(0.1)
			.addTo(controller);
	};

	CRUMINA.perfectScrollbarInit = function () {
		var $chatContainer = $('.popup-chat-responsive .mCustomScrollbar');
		var $containers = $('.mCustomScrollbar');

		$containers.perfectScrollbar({wheelPropagation:false});

		if(!$chatContainer.length){
			return;
		}

		$chatContainer.scrollTop( $chatContainer.prop( "scrollHeight" ) );
		$chatContainer.perfectScrollbar('update');
	};


	/* -----------------------------
 * Responsive
 * ---------------------------*/
	CRUMINA.responsive = {
		$profilePanel: null,
		$desktopContainerPanel: null,
		$responsiveContainerPanel: null,
		init: function () {
			this.$profilePanel = jQuery('#profile-panel');
			this.$desktopContainerPanel = jQuery('#desktop-container-panel > .ui-block');
			this.$responsiveContainerPanel = jQuery('#responsive-container-panel .ui-block');
			this.update();
		},
		mixPanel: function () {
			if (window.matchMedia("(max-width: 1024px)").matches) {
				this.$responsiveContainerPanel.append(this.$profilePanel);

			} else {
				this.$desktopContainerPanel.append(this.$profilePanel);
			}
		},
		update: function () {
			var _this = this;
			var resizeTimer = null;
			var resize = function () {
				resizeTimer = null;

				// Methods
				_this.mixPanel();
			};

			$(window).on('resize', function () {
				if (resizeTimer === null) {
					resizeTimer = window.setTimeout(function () {
						resize();
					}, 300);
				}
			}).resize();
		}
	};

	/* -----------------------------
	 * On DOM ready functions
	 * ---------------------------*/

	$document.ready(function () {

		CRUMINA.preloader();

		CRUMINA.perfectScrollbarInit();

		// Row background animation
		if ($('.call-to-action-animation').length) {
			CRUMINA.CallToActionAnimation();
		}

		if ($('.img-scale-animation').length) {
			CRUMINA.ImgScaleAnimation()
		}

		if ($('.subscribe-animation').length) {
			CRUMINA.SubscribeAnimation()
		}

		if ($('.planer-animation').length) {
			CRUMINA.PlanerAnimation()
		}

		if ($('.contact-form-animation').length) {
			CRUMINA.ContactAnimationAnimation()
		}

        // Run scripts only if they included on page.

        if (typeof $.fn.gifplayer !== 'undefined'){
            $('.gif-play-image').gifplayer();
        }
        if (typeof $.fn.mediaelementplayer !== 'undefined'){
            $('#mediaplayer').mediaelementplayer({
                "features": ['prevtrack', 'playpause', 'nexttrack', 'loop', 'shuffle', 'current', 'progress', 'duration', 'volume']
            });
        }

		CRUMINA.responsive.init();

	});
})(jQuery);

// $('#accordion').accordion({ collapsible:true, active:false, autoHeight:false, disabled:false});
// $('#accordion h3.ui-accordion-header').click(function(){
//     var _this = $(this);
//     $('.ui-accordion-header-icon', _this).toggleClass('ui-icon-triangle-1-e ui-icon-triangle-1-s');
//     _this.next().slideToggle();
//     return false;
// });
// $('.accordion-expand-all').click(function(){
//     var headers = $('#accordion h3.ui-accordion-header');
//     $('.ui-accordion-header-icon', headers).removeClass('ui-icon-triangle-1-e').addClass('ui-icon-triangle-1-s');
//     headers.next().slideDown();
// });
// $('.accordion-collapse-all').click(function(){
//     var headers = $('#accordion h3.ui-accordion-header');
//     $('.ui-accordion-header-icon', headers).removeClass('ui-icon-triangle-1-s').addClass('ui-icon-triangle-1-e');
//     headers.next().slideUp();
// });
$.fn.togglepanels = function(){
	return this.each(function(){
	  $(this).addClass("ui-accordion ui-accordion-icons ui-widget ui-helper-reset")
	.find("h3")
	  .addClass("ui-accordion-header ui-helper-reset ui-state-default ui-corner-top ui-corner-bottom")
	  .hover(function() { $(this).toggleClass("ui-state-hover"); })
	  .prepend('<span class="ui-icon ui-icon-triangle-1-e"></span>')
	  .click(function() {
		$(this)
		  .toggleClass("ui-accordion-header-active ui-state-active ui-state-default ui-corner-bottom")
		  .find("> .ui-icon").toggleClass("ui-icon-triangle-1-e ui-icon-triangle-1-s").end()
		  .next().slideToggle();
		return false;
	  })
	  .next()
		.addClass("ui-accordion-content ui-helper-reset ui-widget-content ui-corner-bottom")
		.hide();
	});
  };
  $( "#create-lesson #tabs" ).tabs();
  $( "#create-quiz #tabs" ).tabs();
  $("#accordion").togglepanels();
  $( "#create-survey #tabs" ).tabs();
  $(".tabs").tabs();

// ================================================
// ================================================
// ===== Duplicating and remove divs of quiz ======
// ================================================
// ================================================


$(document).ready(function(){



	$(".addquest").click(function(){
		$("#Question" ).clone().appendTo("#cont");
		$(".Question:last-child").removeClass("d-none");
		$('.Question:last-child').removeAttr('id');
		$('.Question:last-child #answerspace').removeAttr('id');

	});
	  $(document).on('click', '.addanswer', function(){
		var i = $(this).closest(".Question").index()+1;
		$("#answerspace").clone().appendTo($(".Question:nth-child("+i+")" ));
	  });


	  // ====remove=================


	$(document).on('click', '.removeanswer', function(){
		$(this).closest(".answer").remove();
	  });
	$(document).on('click', '.removequ', function(){
		$(this).closest(".Question").remove();
	});

});

// ================================================
// ================================================
// ========== Control survey questions ============
// ================================================
// ================================================


$(document).ready(function(){

	$(document).on('change', '#s-type', function(){
		var type = $("#s-type option:selected").val();

		if(type == "text"){

			$("#text" ).clone().appendTo($("#s-cont"));
			$(".text:last-child").removeClass("d-none");
			$('.text:last-child').removeAttr('id');
			$('.text:last-child #answerspace').removeAttr('id');

			$('#s-type option[value="free"]').attr("selected",true);
			$('#s-type option[value="free"]').attr("selected",false);



		}
		else if (type == "number"){
			$("#number" ).clone().appendTo($("#s-cont"));
			$(".number:last-child").removeClass("d-none");
			$('.number:last-child').removeAttr('id');
			$('.number:last-child #answerspace').removeAttr('id');

			$('#s-type option[value="free"]').attr("selected",true);
			$('#s-type option[value="free"]').attr("selected",false);


		}
		else if (type == "radio"){
			$("#radio" ).clone().appendTo($("#s-cont"));
			$(".radio:last-child").removeClass("d-none");
			$('.radio:last-child').removeAttr('id');
			$('.radio:last-child #answerspace').removeAttr('id');

			$('#s-type option[value="free"]').attr("selected",true);
			$('#s-type option[value="free"]').attr("selected",false);


		}
		else if (type == "checkbox"){
			$("#checkbox" ).clone().appendTo($("#s-cont"));
			$(".checkbox:last-child").removeClass("d-none");
			$('.checkbox:last-child').removeAttr('id');
			$('.checkbox:last-child #answerspace').removeAttr('id');

			$('#s-type option[value="free"]').attr("selected",true);
			$('#s-type option[value="free"]').attr("selected",false);


		}
		else if (type == "select"){
			$("#select" ).clone().appendTo($("#s-cont"));
			$(".select:last-child").removeClass("d-none");
			$('.select:last-child').removeAttr('id');
			$('.select:last-child #answerspace').removeAttr('id');

			$('#s-type option[value="free"]').attr("selected",true);
			$('#s-type option[value="free"]').attr("selected",false);


		}

	})
})






	// $(".addquest").click(function(){
	// 	$("#Question" ).clone().appendTo("#cont");
	// 	$(".Question:last-child").removeClass("d-none");
	// 	$('.Question:last-child').removeAttr('id');
	// 	$('.Question:last-child #answerspace').removeAttr('id');

	// });
	//   $(document).on('click', '.addanswer', function(){
	// 	var i = $(this).closest(".Question").index()+1;
	// 	$("#answerspace").clone().appendTo($(".Question:nth-child("+i+")" ));
	//   });


	//   // ====remove=================


	// $(document).on('click', '.removeanswer', function(){
	// 	$(this).closest(".answer").remove();
	//   });
	// $(document).on('click', '.removequ', function(){
	// 	$(this).closest(".Question").remove();
	// });






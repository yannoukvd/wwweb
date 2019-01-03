/*--------------------
----------------------
***** JAVASCRIPT *****
----------------------
--------------------*/

/*-----------------------
***** DEFINE JQUERY *****
-----------------------*/

/*jslint browser: true*/
/*global $, jQuery, alert*/


/*-------------------------------
***** RUN IF PAGE IS LOADED *****
-------------------------------*/

$(document).ready(function () {

	/*--- Use strict ---*/
	'use strict';

    $('#loading_wrap').hide();

	/*--- Nav ---*/

	/* Active */
	$('nav a[href$="' + location.pathname + '"]').addClass('active');
	$('nav a[href$="' + location.pathname + '"]').addClass('active');

	/*--- PHOTO FULLSCREEN ---*/
	$(".fullscreen").hide();
	$(".post-image").each(function () {
		$(this).click(function () {
			var src = $(this).attr("style").replace(/^background-image: url|[\(\'\")]/g, '');
			$(this).next().fadeIn(200);
			$(this).next().children().children().children().children().attr("src", src);
		});
	});
	$(".profile-pic").each(function () {
		$(this).click(function () {
			var src = $(this).children().attr("style").replace(/^background-image: url|[\(\'\")]/g, '');
			$(this).next().fadeIn(200);
			$(this).next().children().children().children().children().attr("src", src);
		});
	});
	$(".post-image3").each(function () {
		$(this).click(function () {
			var src = $(this).attr("src");
			$(this).next().fadeIn(200);
			$(this).next().children().children().children().children().attr("src", src);
		});
	});
	$(".fullscreen").click(function () {
		$(".fullscreen").fadeOut(200);
	});


	/*--- Mobile nav ---*/

	/* Slide toggle nav on button click */
	$(".m-mainNav-btn").click(function () {
		$(this).toggleClass('open');
		$(".m-mainNav").slideToggle(500);
		$('open').delay(1000).removeClass('m-mainNav-btn-white');
		$('.langNav').slideToggle();
	});


	/* Slide nav up on window resize */
	$(window).resize(function () {
		$(".m-mainNav").slideUp(500);
		$(".m-mainNav-btn").removeClass('open');
		$('.langNav').hide();
	});


	/*--- Smooth Scroll ---*/
	$(function () {
		$('a[href*="#"]:not([href="#"])').click(function () {
			if (location.pathname.replace(/^\//, '') === this.pathname.replace(/^\//, '') && location.hostname === this.hostname) {
				var target = $(this.hash);
				target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
				if (target.length) {
					$('html, body').animate({
						scrollTop: target.offset().top
					}, 1000);
					return false;
				}
			}
		});
	});

	/*--- HOME ---*/
	$(".btn-comments").click(function(e) {
		e.preventDefault();
		$(this).parent().parent().prev().slideToggle();
	});


	/*--- CONFIG ---*/
	$(".config-checkbox").change(function() {
	    if(this.checked) {
	        $(this).parent().next().fadeIn();
	    } else {
	    	$(this).parent().next().fadeOut();
	    }
	});

	$(".config-input").on('input', function() {
	    $(".config-btn").fadeIn();
	});

	$(".config-label").click(function() {
	    $(this).previous().checked();
	});
	

});

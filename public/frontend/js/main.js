$(function() {
  'use strict';

  /* Register
  =======================================================*/
  $('.nav__register').on('click', function() {
    $('.signup').show();
  });

  $('.signup__close, .login__close, .email__close, .mobileRegister__close').on('click', function() {
    $('.signup').hide();
    $('.login').hide();
    $('.email').hide();
    $('.mobileRegister').hide();
  });

  $('.signup__login').on('click', function() {
    $('.signup').hide();
    $('.login').show();
  });

  $('.login__signup').on('click', function() {
    $('.login').hide();
    $('.signup').show();
  });

  $('.login__buttonsEmail, .signup__buttonsEmail').on('click', function() {
    $('.login, .signup').hide();
    $('.email').show();
  });

  $('.email__buttonsMobile').on('click', function() {
    $('.login, .signup, .email').hide();
    $('.mobileRegister').show();
  });

  /*  Search Page Actions
  =======================================================*/
  $('.overlay__submit').on('click', function(event) {
    event.preventDefault();
    $('.overlay').hide();
    $("#form").submit();
  });

  $('.reservform__inputSearch').focus(function() {
    $('.city').show();
  });

  $('.city__checkInput').on('click', function() {
    if ($(this).prop("checked") == true) {
      $('.booking').show();
      $('.city').hide();
      $('input').prop('checked', false);
    }
  });

  $('.booking__checkInput').on('click', function() {
    if ($(this).prop("checked") == true) {
      $('.booking-time').show();
      $('.booking').hide();
      $('input').prop('checked', false);
    }
  });

  $('.booking__back').on('click', function() {
    $('.booking').hide();
    $('.city').show();
  });

  $('.booking-time__back').on('click', function() {
    $('.booking-time').hide();
    $('.booking').show();
  });

  $('.booking-time__continue').on('click', function() {
    $('.booking-time').hide();
    $('.guests').show();
  });

  $('.guests__back').on('click', function() {
    $('.guests').hide();
    $('.booking-time').show();
  });

  /*  Number Count
  =======================================================*/
  $('.guests__minus').click(function () {
    var $input = $(this).parent().find('input');
    var count = parseInt($input.val()) - 1;
    count = count < 1 ? 1 : count;
    $input.val(count);
    $input.change();
    return false;
	});

  $('.guests__plus').click(function () {
    var $input = $(this).parent().find('input');
    $input.val(parseInt($input.val()) + 1);
    $input.change();
    return false;
  });

   /*  Filter Show | Hide
  =======================================================*/
  $('.subHeader__filter').on('click', function() {
    $('.filter').show();
  });

  /*  Direct Link
  =======================================================*/
  $('.subHeader__search').click(function() {
   window.location = "search.html";
  });

  /*  Overview
  =======================================================*/
  $('.policy-btn').on('click', function() {
    $('.policy').show();
  });

  $('.terms-btn').on('click', function() {
    $('.terms').show();
  });

  $('.add__review').on('click', function() {
    $('.addReview').show();
  });

  /*  Booking
  =======================================================*/
  $('.bookingPage__btnEdit').on('click', function() {
    $('.bookingPage__time').show();
  });

  $('.details__btn').on('click', function() {
    $('.bookingPage__success').show();
    setTimeout(function(){
        window.location = 'booking-main.html';
        }, 1000);
  });

  /*  Booking Tabs
  =======================================================*/
  $(window).on('load', function() {
    $('.active').click();
  });

	$('.bookingTabs__tab').on('click', function () {
		$(this).addClass('active').parent().siblings().find('button').removeClass('active');
	});

  /*  Points
  =======================================================*/
  $('.points__submit, .invite__submit').on('click', function(event) {
    event.preventDefault();
  });
});

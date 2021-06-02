/**
* Template Name: Selecao - v2.3.1
* Template URL: https://bootstrapmade.com/selecao-bootstrap-template/
* Author: BootstrapMade.com
* License: https://bootstrapmade.com/license/
*/
!(function($) {
  "use strict";

  // Smooth scroll for the navigation menu and links with .scrollto classes
  var scrolltoOffset = $('#header').outerHeight() - 1;
  $(document).on('click', '.nav-menu a, .mobile-nav a, .scrollto', function(e) {
    if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
      var target = $(this.hash);
      if (target.length) {
        e.preventDefault();

        var scrollto = target.offset().top - scrolltoOffset;

        if ($(this).attr("href") == '#header') {
          scrollto = 0;
        }

        $('html, body').animate({
          scrollTop: scrollto
        }, 1500, 'easeInOutExpo');

        if ($(this).parents('.nav-menu, .mobile-nav').length) {
          $('.nav-menu .active, .mobile-nav .active').removeClass('active');
          $(this).closest('li').addClass('active');
        }

        if ($('body').hasClass('mobile-nav-active')) {
          $('body').removeClass('mobile-nav-active');
          $('.mobile-nav-toggle i').toggleClass('icofont-navigation-menu icofont-close');
          $('.mobile-nav-overly').fadeOut();
        }
        return false;
      }
    }
  });

  // Activate smooth scroll on page load with hash links in the url
  $(document).ready(function() {
    if (window.location.hash) {
      var initial_nav = window.location.hash;
      if ($(initial_nav).length) {
        var scrollto = $(initial_nav).offset().top - scrolltoOffset;
        $('html, body').animate({
          scrollTop: scrollto
        }, 1500, 'easeInOutExpo');
      }
    }
  });

  // Mobile Navigation
  if ($('.nav-menu').length) {
    var $mobile_nav = $('.nav-menu').clone().prop({
      class: 'mobile-nav d-lg-none'
    });
    $('body').append($mobile_nav);
    $('body').prepend('<button type="button" class="mobile-nav-toggle d-lg-none"><i class="icofont-navigation-menu"></i></button>');
    $('body').append('<div class="mobile-nav-overly"></div>');

    $(document).on('click', '.mobile-nav-toggle', function(e) {
      $('body').toggleClass('mobile-nav-active');
      $('.mobile-nav-toggle i').toggleClass('icofont-navigation-menu icofont-close');
      $('.mobile-nav-overly').toggle();
    });

    $(document).on('click', '.mobile-nav .drop-down > a', function(e) {
      e.preventDefault();
      $(this).next().slideToggle(300);
      $(this).parent().toggleClass('active');
    });

    $(document).click(function(e) {
      var container = $(".mobile-nav, .mobile-nav-toggle");
      if (!container.is(e.target) && container.has(e.target).length === 0) {
        if ($('body').hasClass('mobile-nav-active')) {
          $('body').removeClass('mobile-nav-active');
          $('.mobile-nav-toggle i').toggleClass('icofont-navigation-menu icofont-close');
          $('.mobile-nav-overly').fadeOut();
        }
      }
    });
  } else if ($(".mobile-nav, .mobile-nav-toggle").length) {
    $(".mobile-nav, .mobile-nav-toggle").hide();
  }

  // Navigation active state on scroll
  var nav_sections = $('section');
  var main_nav = $('.nav-menu, #mobile-nav');

  $(window).on('scroll', function() {
    var cur_pos = $(this).scrollTop() + 200;

    nav_sections.each(function() {
      var top = $(this).offset().top,
        bottom = top + $(this).outerHeight();

      if (cur_pos >= top && cur_pos <= bottom) {
        if (cur_pos <= bottom) {
          main_nav.find('li').removeClass('active');
        }
        main_nav.find('a[href="#' + $(this).attr('id') + '"]').parent('li').addClass('active');
      }
      if (cur_pos < 300) {
        $(".nav-menu ul:first li:first").addClass('active');
      }
    });
  });

  // Toggle .header-scrolled class to #header when page is scrolled
  $(window).scroll(function() {
    if ($(this).scrollTop() > 100) {
      $('#header').addClass('header-scrolled');
    } else {
      $('#header').removeClass('header-scrolled');
    }
  });

  if ($(window).scrollTop() > 100) {
    $('#header').addClass('header-scrolled');
  }

  // Intro carousel
  var heroCarousel = $("#heroCarousel");

  heroCarousel.on('slid.bs.carousel', function(e) {
    $(this).find('h2').addClass('animate__animated animate__fadeInDown');
    $(this).find('p, .btn-get-started').addClass('animate__animated animate__fadeInUp');
  });

  // Back to top button
  $(window).scroll(function() {
    if ($(this).scrollTop() > 100) {
      $('.back-to-top').fadeIn('slow');
    } else {
      $('.back-to-top').fadeOut('slow');
    }
  });

  $('.back-to-top').click(function() {
    $('html, body').animate({
      scrollTop: 0
    }, 1500, 'easeInOutExpo');
    return false;
  });

  // Porfolio isotope and filter
  $(window).on('load', function() {
    var portfolioIsotope = $('.portfolio-container').isotope({
      itemSelector: '.portfolio-item'
    });

    $('#portfolio-flters li').on('click', function() {
      $("#portfolio-flters li").removeClass('filter-active');
      $(this).addClass('filter-active');

      portfolioIsotope.isotope({
        filter: $(this).data('filter')
      });
      aos_init();
    });

    // Initiate venobox (lightbox feature used in portofilo)
    $(document).ready(function() {
      $('.venobox').venobox();
    });
  });

  // Testimonials carousel (uses the Owl Carousel library)
  $(".testimonials-carousel").owlCarousel({
    autoplay: true,
    dots: true,
    loop: true,
    responsive: {
      0: {
        items: 1
      },
      768: {
        items: 2
      },
      900: {
        items: 3
      }
    }
  });

  // Portfolio details carousel
  $(".portfolio-details-carousel").owlCarousel({
    autoplay: true,
    dots: true,
    loop: true,
    items: 1
  });

  // Init AOS
  function aos_init() {
    AOS.init({
      duration: 1000,
      easing: "ease-in-out",
      once: true,
      mirror: false
    });
  }
  $(window).on('load', function() {
    aos_init();
  });

})(jQuery);


var counties =  new Object();

counties = {
  "MACHAKOS":['Masinga','Yatta','Kangundo','Matungulu','Kathiani','Mavoko','Machakos Town','Mwala'],
  "MAKUENI":['Mbooni','Kilome','Kaiti','Makueni','Kibwezi East','Kibwezi West'],
  "NYANDARUA":['Kinangop','kipipiri','Ol Kalou','Ol Jorok','Ndaragwa'],
  "NYERI":['Tetu','Kieni', 'Mathira', 'Othaya', 'Mukurweini', 'Nyeri Town'],
  "KIRINYAGA":['Mwea','Ndia','Kirinyaga Central'],
  "MURANGA" :['Kangema', 'Mathioya', 'Kiharu', 'Kigumo', 'Maragwa', 'Kandara', 'Gatanga'],
  "KIAMBU":['Gatundu South','Gatundu North','Juja','Thika Town','Ruiru','Githunguri','Kiambu','Kiambaa','Kabete','Kikuyu','Limuru','Lari'],
  "TURKANA":['Turkana North', 'Turkana West', 'Turkana Central', 'Loima', 'Turkana South', 'Turkana East'],
  "WEST POKOT":['Kapenguria','Sigor','Kacheliba','Pokot South'],
  "SAMBURU":['Samburu West','Samburu North','Samburu East'],
  "TRANS NZOIA":['Kwanza','Endebess','Saboti','Kiminini','Cherangany'],
  "UASIN GISHU":['Soy','Turbo','Moiben','Ainabkoi','Kapseret','Kesses'],
  "ELGEYO/MARAKWET":['Marakwet East','Marakwet West','Keiyo North','Keiyo South'],
  "NANDI":['Tinderet','Aldai','Nandi Hills','Chesumei','Emgwen','Mosop'],
  "BARINGO":['Tiaty','Baringo North','Baringo Central','Baringo South','Mogotio','Eldama Ravine'],
  "LAIKIPIA":['Laikipia West','Laikipia East','Laikipia North'],
  "NAKURU":['Molo','Njoro','Naivasha','Gilgil','Kuresoi South','Kuresoi North','Subukia','Rongai','Bahati','Nakuru Town West','Nakuru Town East'],
  "NAROK":['Kilgoris','Emurua Dikirr','Narok North','Narok East','Narok South','Narok West'],
  "KAJIADO":['Kajiado North','Kajiado Central','Kajiado East','Kajiado West','Kajiado South'],
  "KERICHO":['Kipkelion East','Kipkelion West','Ainamoi','Bureti','Belgut','Sigowet–Soin'],
  "BOMET":['Sotik','Chepalungu','Bomet East','Bomet Central','Konoin'],
  "KAKAMEGA":['Lugari','Likuyani','Malava','Lurambi','Navakholo','Mumias West','Mumias East','Matungu','Butere','Khwisero','Shinyalu','Ikolomani'],
  "VIHIGA":['Vihiga','Sabatia','Hamisi','Luanda','Emuhaya'],
  "BUNGOMA":['Mount Elgon','Sirisia','Kabuchai','Bumula','Kanduyi','Webuye East','Webuye West','Kimilili','Tongaren'],
  "BUSIA":['Teso North','Teso South','Nambale','Matayos','Butula','Funyula','Budalangi'],
  "SIAYA":['Ugenya','Ugunja','Alego Usonga','Gem','Bondo','Rarieda'],
  "KISUMU":['Kisumu East', 'Kisumu West',' Kisumu Central',' Seme', 'Nyando', 'Muhoroni', 'Nyakach'],
  "HOMA BAY":['Kasipul','Kabondo Kasipul','Karachuonyo','Rangwe','Homa Bay Town','Ndhiwa','Mbita','Suba'],
  "MIGORI":['Rongo','Awendo','Suna East','Suna West','Uriri','Nyatike','Kuria West','Kuria East'],
  "KISII":['Bonchari','South Mugirango','Bomachoge Borabu','Bobasi','Bomachoge Chache','Nyaribari Masaba','Nyaribari Chache','Kitutu Chache North','Kitutu Chache South'],
  "NYAMIRA":['Kitutu Masaba','West Mugirango','North Mugirango','Borabu'],
  "NAIROBI CITY":['Westlands','Dagoretti North','Dagoretti South','Langata','Kibra','Roysambu','Kasarani','Ruaraka','Embakasi South','Embakasi North','Embakasi Central','Embakasi East','Embakasi West','Makadara','Kamukunji','Starehe','Mathare'],
  'MOMBASA':['Changamwe', 'Jomvu', 'Kisauni', 'Nyali', 'Likoni', 'Mvita'],
  "KWALE":['Msambweni','Lunga Lunga','Matuga','Kinango'],
  "KILIFI":['Kilifi North','Kilifi South','Kaloleni','Rabai','Ganze','Malindi','Magarini'],
  "TANA RIVER":['Garsen','Galole','Bura'],
  "LAMU":['Lamu East','Lamu West'],
  "TAITA TAVETA":['Taveta','Wundanyi','Mwatate','Voi'],
  "GARISSA":['Garissa Township','Balambala','Lagdera','Dadaab','Fafi','Ijara'],
  "WAJIR":['Wajir North','Wajir East','Tarbaj','Wajir West','Eldas','Wajir South'],
  "MANDERA":['Mandera West','Banissa','Mandera North','Mandera South','Mandera East','Lafey'],
  "MARSABIT":['Moyale','North Horr','Saku','Laisamis'],
  "ISIOLO":['Isiolo North','Isiolo South'],
  "MERU":[' Igembe South','Igembe Central','Igembe North','Tigania West','Tigania East','North Imenti','Buuri','Central Imenti','South Imenti'],
  "THARAKA - NITHI":['Maara','Chuka/Igambangombe','Tharaka'],
  "EMBU":['Manyatta','Runyenjes','Mbeere South','Mbeere North'],
  "KITUI":['Mwingi North','Mwingi West','Mwingi Central','Kitui West','Kitui Rural','Kitui Central','Kitui East','Kitui South']
}


function setConstituency(){

  var county = document.getElementById('county').value;

  pickedCounty(county);
}



function pickedCounty(county){
  setPickedConstituency(counties[county]);
}

function setPickedConstituency(e){
  console.log(e);
  var options;
  for(var i = 0; i < e.length; i++){
    options += '<option value='+ e[i] +'>'+e[i]+'</option>';
  }

  document.getElementById('constituency').innerHTML = options;
}
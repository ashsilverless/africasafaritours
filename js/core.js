jQuery(document).ready(function( $ ) {

/* ADD CLASS ON LOAD*/

$("html").delay(100).queue(function(next) {
  $(this).addClass("loaded");
  next();
});

/* ADD CLASS ON SCROLL*/
	
	$(window).scroll(function() {    
    var scroll = $(window).scrollTop();

    if (scroll >= 30) {
        $("header").addClass("scrolled");
    } else {
        $("header").removeClass("scrolled");
    }
});

var owl = $("#testimonial");
  owl.owlCarousel();
  // Custom Navigation Events
  $(".next").click(function(){
    owl.trigger('owl.next');
  })
  $(".prev").click(function(){
    owl.trigger('owl.prev');
  })

$(".toggle").click(function() {   
  	$('.toggle.active').removeClass("active"); 
    $(this).addClass("active");   
});

//ADD CLASS ON PAGE LOAD 

$(document).ready(function( $ ) {
  $( ".toggle" ).first().addClass( "active" );
});

/* CLASS AND FOCUS ON CLICK */

$(".openTrigger").click(function(event) { 
  $('.content__hidden').addClass("show");   
  $(this).addClass("hide");   
});

$(".closeTrigger").click(function(event) { 
  $('.content__hidden').removeClass("show");   
  $('.openTrigger').removeClass("hide");     
});

$('div.header__trigger').click(function() {
  $('.hamburger').toggleClass('is-active');  
  $("header").toggleClass("menuOpen");  
  $(".navigation").toggleClass("expand");  
});

$('.contactPanel__trigger').click(function() {
  $(".contactPanel__inner").toggleClass("expand");  
  });

$('.bio-expand').click(function() {
  $( this ).parent().parent().addClass( "active" );  
  $( this ).hide();    
});

$('.bio-close').click(function() {
  $( this ).parent().parent().removeClass( "active" );  
  $('.bio-expand').show();    
});

$('.expand-form').click(function() {
  $( this ).parent().addClass( "expand" );  
    $( this ).hide();    
      $('.first-submit').hide();    
});

$('.filterType').click(function() {
  $(this).addClass('active');
  $( '.filterLocation' ).removeClass( "active" );    
  $( '.typeFilter' ).addClass( "reveal" );  
  $( '.locationFilter' ).removeClass( "reveal" );  
});

$('.filterLocation').click(function() {
  $(this).addClass('active');
  $( '.filterType' ).removeClass( "active" );    
  $( '.typeFilter' ).removeClass( "reveal" );  
  $( '.locationFilter' ).addClass( "reveal" );  
});



$('.filterLocation').click(function() {
  $( '.typeFilter' ).removeClass( "reveal" );  
  $( '.locationFilter' ).addClass( "reveal" );  
});

// ========== Controller for lightbox elements

$(document).ready(function() {
// This will create a single gallery from all elements that have class "gallery-item"
$('.camp-gallery').magnificPopup({
  type: 'image',
  gallery:{
    enabled:true
  }
  });
});

// ========== Filtering controller (mixitup)

if($('#mixitup-camps').length) {

var campsMixer = mixitup('#mixitup-camps', {
    load: {
        filter: 'all'
    },
    selectors: {
        control: '.mixitup-control'
    },
    pagination: {
        limit: 6,
        maintainActivePage: false,
        loop: true,
        hidePageListIfSinglePage: true
    },
    callbacks: {
        onMixEnd: function() {
            jQuery(window).trigger('resize').trigger('scroll');
        }
    }
});
}

if($('#mixitup-camps-villas').length) {

    var campsVillasMixer = mixitup('#mixitup-camps-villas', {
        load: {
            filter: 'all'
        },
        selectors: {
            control: '.mixitup-control'
        },
        pagination: {
            limit: 18,
            maintainActivePage: false,
            loop: true,
            hidePageListIfSinglePage: true
        },
        callbacks: {
            onMixEnd: function() {
                jQuery(window).trigger('resize').trigger('scroll');
            }
        }
    });
}

if($('#mixitup-posts-from-past').length) {

    var postMixer = mixitup('#mixitup-posts-from-past', {
        load: {
            filter: 'all'
        },
        selectors: {
            control: '.mixitup-control'
        },
        pagination: {
            limit: 6,
            maintainActivePage: false,
            loop: true,
            hidePageListIfSinglePage: true
        },
        callbacks: {
            onMixEnd: function() {
                jQuery(window).trigger('resize').trigger('scroll');
            }
        }
    });
}

//=========Where Map Toggle===========

$(document).ready(function( $ ) {
    $( "#botswana" ).addClass( "active" );
    $('#bot').addClass('highlight');
});

$('#bot').click(function() {
    $('.target').removeClass('highlight');
    $(this).addClass('highlight');
    $('.cardCta__where.active').removeClass('active'); 
    $('#botswana').addClass('active'); 
});

$('#nam').click(function() {
    $('.target').removeClass('highlight');
    $(this).addClass('highlight');
    $('.cardCta__where.active').removeClass('active'); 
    $('#namibia').addClass('active'); 
});

$('#sou').click(function() {
    $('.target').removeClass('highlight');
    $(this).addClass('highlight');
    $('.cardCta__where.active').removeClass('active'); 
    $('#south-africa').addClass('active'); 
});

$('#zim').click(function() {
    $('.target').removeClass('highlight');
    $(this).addClass('highlight');
    $('.cardCta__where.active').removeClass('active'); 
    $('#zimbabwe').addClass('active'); 
});

$('#moz').click(function() {
    $('.target').removeClass('highlight');
    $(this).addClass('highlight');
    $('.cardCta__where.active').removeClass('active'); 
    $('#mozambique').addClass('active'); 
});

$('#sey-highlight').click(function() {
    $('.target').removeClass('highlight');
    $(this).addClass('highlight');
    $('.cardCta__where.active').removeClass('active'); 
    $('#seychelles').addClass('active'); 
});

$('#tan').click(function() {
    $('.target').removeClass('highlight');
    $(this).addClass('highlight');
    $('.cardCta__where.active').removeClass('active'); 
    $('#tanzania').addClass('active'); 
});

});//Don't remove ---- end of jQuery wrapper

$(document).ready(function(){
  inView.threshold(0.5);
  inView('.footer').on('enter', el => {
      el.classList.add("visible");
      })
    .on('exit', el => {
        el.classList.remove("visible");
    });
});



















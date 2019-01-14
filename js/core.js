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

/* SMOOTH SCROOL TO ANCHOR 

document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();

        document.querySelector(this.getAttribute('href')).scrollIntoView({
            behavior: 'smooth'
        });
    });
});
*/

/* ADD CLASS ON PAGE LOAD 

$(document).ready(function( $ ) {

$( "ul.nav li.nav-item" ).first().find('a').addClass( "active" );
$( ".tab-pane" ).first().addClass( "active" );
});
*/

/* GLOBAL OWL CAROUSEL SETTINGS 

$('.sl-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    navText: [" Previous", " Next"],
	navClass: ['owl-prev', 'owl-next'],
    dots:false,
    responsiveClass:true,
    responsive:{
        0:{
            items:1,
            nav:true
        },
        600:{
            items:2,
            nav:true
        },
        1000:{
            items:4,
            nav:true,
            loop:true
        }
    }
})*/

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
          filter: 'all-locs',
          filter: 'all-types'
      },
      selectors: {
          control: '.mixitup-control'
      },
      pagination: {
          limit: 99,
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



















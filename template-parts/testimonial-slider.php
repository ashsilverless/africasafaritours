<div id="testimonial" class="owl-carousel owl-theme testimonialSlider">  
  <?php if (have_rows('testimonial', 'option')):
  while (have_rows('testimonial', 'option')) : the_row();
  ?>
    <div class="testimonialSlider__item">	            
      <p><?php the_sub_field('testimonial', 'option');?>
      <span><?php the_sub_field('attribution', 'option');?></span>
      </p>
    </div>
  <?php endwhile;  endif; ?>
</div>

<script>
$('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    dots: false,
          navText : ['<i class="fa fa-angle-left" aria-hidden="true"></i>','<i class="fa fa-angle-right" aria-hidden="true"></i>'],
    responsive:{
        0:{
            items:1
        },
        2000:{
            items:1
        }
    }
})
</script>
	
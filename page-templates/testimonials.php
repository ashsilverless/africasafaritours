<?php
/**
 * ============== Template Name: Testimonial
 *
 * @package SLMaster
 */
get_header();?>

<div class="container">

  <?php get_template_part( 'template-parts/hero', 'image' );?>

  <div class="row mb3">
    
    <div class="col-lg-3 col-sm-4">
	<?php wp_nav_menu( array( 
	'theme_location' => 'about-menu', 
	'container_class' => 'planning-menu-class',
	'before'            => '<h3 class="headingSupporting headingSupporting__sm"><i class="fas fa-angle-right"></i>',
	'after' => '</h3>'
	 ) ); 	
 ?>		     
    </div>
    
    <div class="col-sm-8">

<div class="testimonialSlider layoutBlock">  
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
  
    </div><!--col6-->
  </div><!--row-->  

<div class="row"><!-- CTA Itinerary Block-->
  
    <?php get_template_part( 'template-parts/cta', 'itinerary' );?>
  
</div>

  <div class="row mt1">

    <div class="col-lg-3">  
      <h2 class="headingSupporting headingSupporting__lg mb2">What They Say</h2>
    </div>

    <div class="col-lg-6">
      <div class="mb2"><!--testimonial block-->
        <?php get_template_part( 'template-parts/testimonial', 'slider');?>     
        </div>
    </div>
    
  </div><!--r--> 
       
</div><!--container-->

<?php get_footer();?>
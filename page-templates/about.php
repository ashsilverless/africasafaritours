<?php
/**
 * ============== Template Name: About
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

<!--TEXT CONTENT-->
      <?php if( get_field('body_copy') ): ?>
        <div class="content__lead">   
          <?php the_field('body_copy'); 
          if( get_field('body_copy_more') ): ?>
          <a class="button button__trigger button__alt openTrigger">Read More</a>
          <?php endif; ?>
        </div>
      <?php endif; ?>      
      
      <?php if( get_field('body_copy_more') ): ?>
        <div class="content__hidden">
          <?php the_field('body_copy_more'); ?>  
          <a class="button button__trigger button__alt closeTrigger">Read Less</a>
        </div>
      <?php endif; ?>

<!--TEAM CONTENT-->

<?php 
  if( have_rows('team') ): 
    while ( have_rows('team') ) : the_row(); 
    $teamImg = get_sub_field('image'); ?>
    
<div class="bio">
    <img src="<?php echo $teamImg['url']; ?>"/>
		
		<h3 class="headingBrand headingBrand__sm mb05"><?php the_sub_field('name'); ?></h3>

		<p class="headingSupporting headingSupporting__sm mb1"><?php the_sub_field('titleappointment'); ?></p>


        <div class="bio__lead">   
          <?php the_sub_field('bio_intro'); 
          if( get_sub_field('bio_read_more') ): ?>
          <a class="button button__trigger button__alt bio-expand">Read More</a>
          <?php endif; ?>
        </div>

        <div class="bio__more">
          <?php the_sub_field('bio_read_more'); ?>  
          <a class="button button__trigger button__alt bio-close">Read Less</a>
        </div>


</div>
			
<?php endwhile;?>
<?php endif;?>

<!--FAQ CONTENT-->
<div class="toggleWrapper">
<?php if( have_rows('faq') ): 	
    $i = 0; 
		while ( have_rows('faq') ) : the_row(); 
    $i++;?>
    
<div class="toggle mb2">

  <div class="toggle__question" role="tab">    
      <p class="headingSupporting headingSupporting__sm">
        <span class="headingSupporting__lightWeight">Q<?php echo $i; ?></span>
        <?php the_sub_field('question'); ?>
        <i class="fas fa-times close-toggle"></i>
      </p>
  </div>

  <div class="toggle__answer" role="tabpanel">
    <p><?php the_sub_field('answer'); ?></p>
  </div>

</div>
		
<?php 
  $tCount = $i;
  endwhile; 
  endif;
?>
</div><!--togglewrapper-->
  
    </div><!--col6-->
  </div><!--row-->  

<div class="row"><!-- CTA Itinerary Block-->
  
    <?php get_template_part( 'template-parts/cta', 'itinerary' );?>
  
</div>

  <div class="row mt1">

    <div class="col-lg-3">  
      <h2 class="headingSupporting headingSupporting__lg mb2">What They Say</h2>
    </div>

    <div class="col-lg-6 mt1">
      <div class="mb2"><!--testimonial block-->
        <?php get_template_part( 'template-parts/testimonial', 'slider');?>     
        </div>
    </div>
    
  </div><!--r--> 
       
</div><!--container-->

<?php get_footer();?>
<?php
/**
 * ============== Template Name: Contact
 *
 * @package SLMaster
 */
get_header();?>

<div class="container">
  
  <div class="textBanner">
    <h1 class="headingBrand headingBrand__lgPlus text-center"><?php the_title();?></h1>
  </div>

  <div class="row"><!--Breadcrumbs block -->
    <div class="col-sm-6 offset-sm-3">  
  <?php if ( function_exists('yoast_breadcrumb') ) {
    yoast_breadcrumb( '<p id="breadcrumbs" class="breadcrumbs">','</p>' );
  } ?>
    </div>
  </div><!--row-->
  
  <div class="row mb3">
    
    <div class="col-sm-3 mb2">
<p><strong><?php the_field('telephone_number', 'option');?></strong></p>
<p><?php the_field('email_address', 'option');?></p>

<p class="mb0"><strong>African Safari Tours</strong>
<?php the_field('address', 'option');?></p>

<div class="contactSocials">
            <?php if( have_rows('social_links', 'option') ): while( have_rows('social_links', 'option') ): the_row(); ?>
              <a href="<?php the_sub_field('page_link'); ?>"><i class="fab fa-<?php the_sub_field('name'); ?>"></i></a>
            <?php endwhile; endif; ?>  
</div>
            
    </div>
    
    <div class="col-lg-6 col-sm-9">

<?php echo do_shortcode('[contact-form-7 id="537" title="Main Contact Form"]');?>
  
    </div><!--col6-->
  </div><!--row-->  

<div class="row"><!-- CTA Itinerary Block-->
  
    <?php get_template_part( 'template-parts/cta', 'itinerary' );?>
  
</div>
       
</div><!--container-->

<?php get_footer();?>
<?php
/*
* =============== Single Camp Template
 * @package Africa Safari Tours
 */
get_header();?>

 <?php $mapbox = get_field('mapbox', $pageID); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); 
  
$descr = get_field('description', $pageID); ?>

<div class="container">

<!--Banner Image-->
  <?php get_template_part( 'template-parts/hero', 'image' );?>

  <div class="row mb2">

    <div class="col-lg-3 col-sm-4">
      <div class="sidebarFeatures">
      <?php
        if( have_rows('camp_features') ): 
        while( have_rows('camp_features') ): the_row();?>
        
        <p class="sidebarFeatures__feature"><?php the_sub_field('feature'); ?></p>
                                 
        <?php endwhile; endif; ?>
      </div>
    </div>

    <div class="col-lg-6 col-sm-8">
      
      <div class="layoutBlock content">
      
        <div class="content__lead">   
          <?php the_field('description'); ?>
          <a class="button button__trigger button__alt openTrigger">Read More</a>
        </div>
        
        <div class="content__hidden">
          <?php the_field('description_more'); ?>  
          <a class="button button__trigger button__alt closeTrigger">Read Less</a>
        </div>
      
      </div>
            
    </div>

  </div><!--r-->
  
<div class="row">

<div class="col-lg-6 offset-lg-3">
  
      <h2 class="headingSupporting headingSupporting__lg mb2">Weather In <?php the_title(); ?></h2>
      <div class="layoutBlock season mt2">
 
      <?php
        if( have_rows('seasons') ): 
        while( have_rows('seasons') ): the_row();
        
          get_template_part( 'template-parts/seasons');  
                                 
        endwhile; endif; ?>
     
      </div><!--season-->  
  
</div>  
   
</div><!--r-->

<div class="row"><!--Highlights Block -->
  
  <div class="col-lg">
    <h2 class="headingSupporting headingSupporting__lg mb1">Where Is <br/><?php the_title(); ?>?</h2>
  </div>
  
</div><!--row-->

<div class="layoutBlock dropShadow">

  <?php echo do_shortcode('[wp_mapbox_gl_js map_id="'.$mapbox.'"]');?>

</div>


<div class="row"><!--Gallery Block -->
<div class="col-lg-12">
<?php 
$images = get_field('gallery');
if( $images ): ?>

<h2 class="headingSupporting headingSupporting__lg mb1"><?php the_title(); ?> <br/>Gallery</h2>
<div class="gallery layoutBlock darkPanelWrapper desat">

  <?php foreach( $images as $image ): ?>
  <a href="<?php echo $image['url']; ?>" class="camp-gallery gallery__item darkPanel desat__item"  alt="<?php echo $image['alt']; ?>" style="background-image: url(<?php echo $image['url']; ?>);">
  
  </a>

<?php endforeach; ?>
</div> 
<?php endif; ?>

</div><!--row-->
</div>

<div class="layoutBlock wrapper__cardCamp mt1">
  <div class="row"><!--Combines Block -->

    <?php $post_objects = get_field('combines'); ?>
    
    <?php if( $post_objects ): ?>

    <div class="col-lg-12">
      <h2 class="headingSupporting headingSupporting__lg mb1">Combines Well With</h2>
    </div>

				    <?php foreach( $post_objects as $post): 
					        setup_postdata($post); 
					        $leaderImg = get_field('leader_image', $term);
				    ?>


      <div class="col-lg-3 col-6">
        <a href="<?php the_permalink() ?>">
          
          <div class="cardCamp" style="background-image: url(<?php echo $leaderImg['url']; ?>);">
            <div class="highlightBorderH"></div>
            <div class="highlightBorderV"></div>
            <h3 class="headingSupporting headingSupporting__md cardCamp__heading"><?php the_title() ?></h3>
          </div><!--cardCamp-->
          </a>
    </div>


				    <?php endforeach; ?>
	<?php endif; ?>

</div><!--r-->
</div>

<div class="row"><!-- CTA Itinerary Block-->
  
    <?php get_template_part( 'template-parts/cta', 'itinerary' );?>
  
</div>

  </div><!--r-->
</div><!--c-->		

 <?php endwhile; ?>
 <?php endif; ?>
 
		<?php get_footer();?>
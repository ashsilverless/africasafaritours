<?php
/*
* =============== Single Itinerary Template
 * @package Africa Safari Tours
 */
get_header();?>
<?php $mapbox = get_field('map_box'); ?>
<?php 
  if ( have_posts() ) : 
    while ( have_posts() ) : the_post(); 
  
$descr = get_field('description', $pageID); ?>

<div class="container">

  <!--Banner Image-->
  <?php get_template_part( 'template-parts/hero', 'image' );?>

  <div class="row">

    <div class="col-lg-3">
      <div class="sidebarFeatures">
      <?php
        if( have_rows('camp_features') ): 
        while( have_rows('camp_features') ): the_row();?>
        
        <p class="sidebarFeatures__feature"><?php the_sub_field('feature'); ?></p>
                                 
        <?php endwhile; endif; ?>
      </div>
    </div>

    <div class="col-lg-6">
      
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
      
      <div class="layoutBlock season mt2">
  
<?php
  if( have_rows('seasons') ): 
  while( have_rows('seasons') ): the_row();
  
    get_template_part( 'template-parts/seasons');  
                           
  endwhile; endif;
?>
     
      </div><!--season-->  
      
    </div>  
     
  </div><!--r-->

  <div class="dailyActivityWrapper layoutBlock dropShadow">
    <div class="row">
    
<?php
  if( have_rows('daily_activity') ): 
    $i = 0; 
    while( have_rows('daily_activity') ): the_row();
    $i++;
?>    

    <div class="dailyActivity">
        <div class="col-sm-6 col-12">
            <div class="sidebar sticky">
              
              <h3 class="headingBrand headingBrand__md headingBrand__light mb1">Day <?php echo $i; ?></h3>
              
                <?php the_sub_field('activity_description'); ?>
                
                <?php $postid = get_sub_field('stay_at_camp') ?>						
              
              <h4 class="headingSupporting headingSupporting__sm headingSupporting__light mt2">Stay At  
                <a href="<?php echo get_permalink( $postid ); ?>"><?php echo get_the_title($postid); ?> <i class="fas fa-angle-right"></i></a>
              </h4> 
              
            </div>
        </div>
        
        <div class="col-sm-6 hide-xs">
    <?php   
      if( have_rows('imagery') ): 
      while( have_rows('imagery') ): the_row();
      $intineraryImg = get_sub_field('image');
    ?>			
        
          <img src="<?php echo $intineraryImg['url']; ?>"/>      
        
    <?php  
      endwhile; 
      endif;
    ?>
        </div>
    </div><!--dailyactivity-->
          
 <?php  
  endwhile; 
  $tCount = $i;
  endif;
?>           

    </div><!--r-->
  </div><!--dailyactivitywrapper-->

  <div class="layoutBlock wrapper__cardCamp mt1">
    <div class="row"><!--Combines Block -->

<?php 
  $post_objects = get_field('combines'); 
  if( $post_objects ): 
?>

    <div class="col-lg-12">
      <h2 class="headingSupporting headingSupporting__lg mb1">Combines Well With</h2>
    </div>

<?php 
  foreach( $post_objects as $post): 
    setup_postdata($post); 
    $leaderImg = get_field('leader_image');			
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

<?php 
  endforeach; 
  endif; 
?>

    </div><!--r-->
  </div>

    <div class="layoutBlock dropShadow">
  
      <?php echo do_shortcode('[wp_mapbox_gl_js map_id="'.$mapbox.'"]');?>

    </div>

  </div><!--r-->
</div><!--c-->		

 <?php endwhile; ?>
 <?php endif; ?>
 
		<?php get_footer();?>
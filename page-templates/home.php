<?php
/**
 * ============== Template Name: Home
 *
 * @package SLMaster
 */
get_header();?>

<div class="container">

  <div class="row mb3">
  
    <h1 class="headingSupporting headingSupporting__sm text-center mt3">Born Of Africa</h1>
    <h3 class="headingBrand headingBrand__xl text-center">Meticulously</h3>
    <h3 class="headingBrand headingBrand__lgPlus text-center">Planned Journeys</h3>	        
  
  </div><!--r-->

<div class="gallery layoutBlock appearBlock darkPanelWrapper desat"><!--Gallery Block -->
     
  <?php if( have_rows('countries_panel') ): 
  while( have_rows('countries_panel') ): the_row();?>
  
  <?php 
    $countryImg = get_sub_field('background_image'); 
    $countryTitle = get_sub_field('country'); 
    $countryLink = get_sub_field('link_target');       
    ?>

    <a href="/where/<?php echo $countryLink; ?>" class="gallery__item gallery__item__country darkPanel desat__item"  alt="<?php echo $image['alt']; ?>" style="background-image: url(<?php echo $countryImg['url']; ?>);">
      visit 
      <h2 class="headingSupporting headingSupporting__sm headingSupporting__light"><?php echo $countryTitle; ?></h2>
    </a>

  <?php endwhile; endif; ?>

 </div> 
     
  <div class="row"><!--Descriptions block -->
    
    <div class="col-lg-3 col-sm-4">
      <h2 class="headingSupporting headingSupporting__lg mb1-xs">What We Do</h2>
    </div>
    
    <div class="col-lg-6 col-sm-8">
      <div class="layoutBlock content">
        
        <div class="content__lead">
          <?php the_field('home_description');?>
        </div>
  
        <a class="button button__trigger button__alt openTrigger">Read More</a>
  
       <div class="content__hidden">       
        <?php the_field('home_description_more');?>
        <a class="button button__trigger button__alt closeTrigger">Read Less</a>
       </div>
       
      </div>
    </div>
    
  </div><!--row-->        
        
  <div class="layoutBlock dropShadow">		
    
    <div class="row no-gutters desat darkPanelWrapper"><!-- Leader Block-->

     <?php if( have_rows('leaders') ): 
      while( have_rows('leaders') ): the_row();?>

      <?php 
        $leaderImg = get_sub_field('background_image'); 
        $leaderTitle = get_sub_field('heading'); 
        $leaderLink = get_sub_field('link_target');       
        ?>

        <a href="<?php echo $leaderLink; ?>" class="cardMonth cardMonth__home darkPanel desat__item" style="background-image: url(<?php echo $leaderImg['url']; ?>);">


          <h4 class="headingBrand headingBrand__md headingBrand__light"><?php echo $leaderTitle; ?></h4>
          <p><span>find out</span>more<i class="fas fa-angle-right"></i></p>
        </a>
    
    <?php endwhile; endif; ?>
  
  </div><!--r-->  

</div>        

<div class="row mt1">

    <div class="col-lg-3 col-sm-4">  
      <h2 class="headingSupporting headingSupporting__lg mb2 mb1-xs">What They Say</h2>
    </div>

    <div class="col-lg-6 col-sm-8">
      <div class="mb2"><!--testimonial block-->
        <?php get_template_part( 'template-parts/testimonial', 'slider');?>     
        </div>
    </div>
    
  </div><!--r--> 
        
</div><!--container-->
    
<?php get_footer();?>
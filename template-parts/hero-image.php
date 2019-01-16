<div class="">

  <div class="roww"><!--Hero block -->
  
  <?php 
    $term = get_queried_object();
    $bannerImg = get_field('banner_image', $term);
  ?>
  
  <section class="banner appearBlock" style="background-image: url(<?php echo $bannerImg['url']; ?>);">
  
  <div class="banner__heading">
    
    <?php if( get_field('heading') ): ?>
      <h1 class="headingBrand headingBrand__xl headingBrand__light text-center"><?php the_field('heading');?></h1>
      <?php endif;?>
      
      <h1 class="headingBrand headingBrand__xl headingBrand__light">
        <?php $taxonomy = ('where');
        $queried_term = get_query_var($taxonomy);
        $term = get_term_by( 'slug', $queried_term, $taxonomy );
        echo $term->name; ?>
        
        <?php $taxonomy = ('when');
        $queried_term = get_query_var($taxonomy);
        $term = get_term_by( 'slug', $queried_term, $taxonomy );
        echo $term->name; ?>
        
        <?php $taxonomy = ('what');
        $queried_term = get_query_var($taxonomy);
        $term = get_term_by( 'slug', $queried_term, $taxonomy );
        echo $term->name; ?>
        
        <?php if ( is_single() ) { 
          the_title(); 
          } ?>
      </h1>
   
    <?php if( get_field('sub_heading') ): ?>
      <h2><?php the_field('sub_heading');?></h2>
    <?php endif; ?>
  
  </div>
  </section>
  
  </div><!--row-->
  
  <div class="row"><!--Breadcrumbs block -->
    <div class="col-lg-6 offset-lg-3">  
  <?php if ( function_exists('yoast_breadcrumb') ) {
    yoast_breadcrumb( '<p id="breadcrumbs" class="breadcrumbs mb2-xs">','</p>' );
  } ?>
    </div>
  </div><!--row-->
</div>
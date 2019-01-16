<?php
/*
* =============== Locations (where) Taxonomy Template	
 * @package Africa Safari Tours
 */

get_header();

$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) ); 

	function get_lowest_taxonomy_terms( $terms ) {
	    // if terms is not array or its empty don't proceed
	    if ( ! is_array( $terms ) || empty( $terms ) ) {
	        return false;
    }
    $filter = function($terms) use (&$filter) {
        $return_terms = array();
        $term_ids = array();

        foreach ($terms as $t){
            $term_ids[] = $t->term_id;
        }
        foreach ( $terms as $t ) {
            if( $t->parent == false || !in_array($t->parent,$term_ids) )  {
                //remove this term
            }
            else{
                $return_terms[] = $t;
            }
        }
        if( count($return_terms) ){
            return $filter($return_terms);  
        }
        else {
            return $terms;
        }
    };
    return $filter($terms);
}

//Find Children
$taxonomy_name = get_queried_object()->taxonomy; // Get the name of the taxonomy
$term_id = get_queried_object_id(); // Get the id of the taxonomy
$termchildren = get_term_children( $term_id, $taxonomy_name ); // Get the children of  taxonomy

// Declare all ACF Fields as vars
$bannerImg = get_field('banner_image', $term);
$leaderImg = get_field('leader_image', $term);
$locDesc = get_field('location_description', $term);
$locDescMore = get_field('location_description_more', $term);
$mapImg = get_field('location_map', $term);
$glanceSubject = get_sub_field('subject', $term);
$glanceInfo = get_sub_field('information', $term);

?>

<?php if( $term->parent == 0 ) : ?><!-- Conditional for parent or child content -->

<!--=========PARENT FIELDS==========-->
<div class="container">
  
  <?php get_template_part( 'template-parts/hero', 'image' );?>

  <div class="row"><!--Descriptions block -->
    
    <div class="col-lg-3">
      <h2 class="headingSupporting headingSupporting__lg">Introduction to <br/><?php echo $term->name; ?></h2>
    </div>
    
    <div class="col-lg-6">
      <div class="layoutBlock content">
        
        <div class="content__lead">
        <?php echo $locDesc;?>
        </div>

        <a class="button button__trigger button__alt openTrigger">Read More</a>
 
       <div class="content__hidden">       
        <?php echo $locDescMore; ?>
        <a class="button button__trigger button__alt closeTrigger">Read Less</a>
       </div>
       
      </div>
    </div>
    
  </div><!--row-->
  
  <div class="row"><!--Highlights Block -->
    
    <div class="col-lg">
      <h2 class="headingSupporting headingSupporting__lg mb1"><?php echo $term->name; ?> <br/>Highlights</h2>
    </div>
    
  </div><!--row-->
  
  <div class="layoutBlock wrapper__cardCta dropShadow mt1">
    <div class="row no-gutters">
    <?php 
      foreach ( $termchildren as $child ) {
        $childterm = get_term_by( 'id', $child, $taxonomy_name );
        $childLeaderImg = get_field('leader_image', $childterm);  ?>
        <div class="col">
          <?php echo '<a href="' . get_term_link( $childterm->name, $taxonomy_name ) . '">';?>
            <div class="cardCta darkPanel" style="background-image: url(<?php echo $childLeaderImg ['url'];?>);">
              <h3 class="headingBrand headingBrand__md headingBrand__light cardCta__heading"><?php echo $childterm->name; ?></h3>
              <p>find out <span>more</span></p>
            </div><!--cardCTA-->
            </a>
      </div>
    <?php } ?>
    </div><!--row-->
  </div>

  <div class="row"><!--Map Image block -->
    
    <div class="col-lg-3">
      <h2 class="headingSupporting headingSupporting__lg"><?php echo $term->name; ?> <br/>Map</h2>
    </div>

    <div class="col-lg-6">
      <div class="layoutBlock locationMap">
        <img src="<?php echo $mapImg ['url'];?>"/>
      </div>
    </div>
  </div><!--row-->

  <div class="row"><!--At A Glance block -->
    
    <div class="col-lg-3">
      <h2 class="headingSupporting headingSupporting__lg mb1"><?php echo $term->name; ?> <br/>At A Glance</h2>
    </div>

    <div class="col-lg-6">
      <div class="layoutBlock detailList">
      <?php if( have_rows('location_glance', $term) ): while( have_rows('location_glance', $term) ): the_row();   ?>
      
      <div class="detailList__item">
        <div class="row">
          
          <div class="col-lg-3 col-xs-5">
            <div class="detailList__subject"><?php the_sub_field('subject', $term);?></div>
          </div>
  
          <div class="col-lg-9 col-xs-7">
            <div class="detailList__info"><?php the_sub_field('information', $term);?></div>
          </div>
          </div><!--row-->
      </div>
      <?php endwhile; endif; ?>
      </div>
    </div>

  </div><!--row-->

  <div class="row"><!--Seasons block -->
    
    <div class="col-lg-3">
      
    </div>

    <div class="col-lg-6">
      <h2 class="headingSupporting headingSupporting__lg mb2">Seasons In <?php echo $term->name; ?></h2>
      <div class="layoutBlock season mt2">
      <?php
      
      //Seasons Block  
        if( have_rows('location_seasons', $term) ): 
        while( have_rows('location_seasons', $term) ): the_row();?>
      <?php get_template_part( 'template-parts/seasons');?>      
                                
        <?php endwhile; endif; ?>
      </div><!--season-->
    </div>
    
  </div><!--row-->    
  
  <div class="row">
    <div class="col-lg-12">
      <h2 class="headingSupporting headingSupporting__lg mb1">Accommodation<br/> in <?php echo $term->name; ?></h2>         
    </div>
  </div><!--row-->  
     
   <div class="layoutBlock wrapper__cardCamp mt1">
  
    <div class="row"><!--Camps block -->


      <?php $campterm = get_queried_object(); 
        $loop = new WP_Query(
            array(
              'post_type' 	 => 'camp',
              'orderby' 		 => 'name',
              'order'   		 => 'ASC',
              'tax_query' => array(
              array(
              'taxonomy' => 'where',
              'field'    => 'slug',
              'terms'    => $campterm->slug,
            ),
          )
        )
      );
  
      if ($loop->have_posts()) : while ($loop->have_posts()) : $loop->the_post();?>

        <div class="col-lg-3">
          <a href="<?php the_permalink() ?>">
            <div class="cardCamp" style="background-image: url(<?php the_field('leader_image');?>);">
              <h3 class="headingSupporting headingSupporting__md cardCamp__heading"><?php the_title() ?></h3>
            </div><!--cardCamp-->
            </a>
      </div>
  
      <?php endwhile; endif; ?>
    </div><!--row-->
  
  </div>    




</div><!--container-->

<!--=========END OF PARENT FIELDS==========-->

<?php else:?>

<!--=========CHILD FIELDS==========-->

<?php $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) ); ?>

<div class="container">
  
  <?php get_template_part( 'template-parts/hero', 'image' );?>

  <div class="row"><!--Descriptions block -->
    
    <div class="col-lg-3">
      <h2 class="headingSupporting headingSupporting__lg">Introduction to <br/><?php echo $term->name; ?></h2>
    </div>
    
    <div class="col-lg-6">
      <div class="layoutBlock content">
        
        <div class="content__lead">
        <?php echo $locDesc;?>
        </div>

        <a class="button button__trigger button__alt openTrigger">Read More</a>
 
       <div class="content__hidden">       
        <?php echo $locDescMore; ?>
        <a class="button button__trigger button__alt closeTrigger">Read Less</a>
       </div>
       
      </div>
    </div>
    
  </div><!--row-->

  <div class="row"><!--Seasons block -->

    <div class="col-lg-6 offset-lg-3">
      <h2 class="headingSupporting headingSupporting__lg mb2">Seasons In <?php echo $term->name; ?></h2>
      <div class="layoutBlock season mt2">
      <?php
      
      //Seasons Block  
        if( have_rows('location_seasons', $term) ): 
        while( have_rows('location_seasons', $term) ): the_row();
          get_template_part( 'template-parts/seasons');  
        endwhile; endif; ?>
      </div><!--season-->
    </div>
    
  </div><!--row-->    

  <div class="row">
    <div class="col-lg-12">
      <h2 class="headingSupporting headingSupporting__lg mb1">Accommodation<br/> in <?php echo $term->name; ?></h2>         
    </div>
  </div><!--row-->  

 <div class="layoutBlock wrapper__cardCamp mt1">
  
    <div class="row"><!--Camps block -->


      <?php $campterm = get_queried_object(); 
        $loop = new WP_Query(
            array(
              'post_type' 	 => 'camp',
              'orderby' 		 => 'name',
              'order'   		 => 'ASC',
              'tax_query' => array(
              array(
              'taxonomy' => 'where',
              'field'    => 'slug',
              'terms'    => $campterm->slug,
            ),
          )
        )
      );
  
      if ($loop->have_posts()) : while ($loop->have_posts()) : $loop->the_post();?>

        <div class="col-lg-3">
          <a href="<?php the_permalink() ?>">
            <div class="cardCamp" style="background-image: url(<?php the_field('leader_image');?>);">
              <h3 class="headingSupporting headingSupporting__md cardCamp__heading"><?php the_title() ?></h3>
            </div><!--cardCamp-->
            </a>
      </div>
  
      <?php endwhile; endif; ?>
    </div><!--row-->
  
  </div>    


<div class="row"><!-- CTA Itinerary Block-->
  
    <?php get_template_part( 'template-parts/cta', 'itinerary' );?>
  
</div>


</div><!--container-->
<? endif;?><!-- End conditional for parent or child content -->
<?php get_footer();
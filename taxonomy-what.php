<?php
/*
* =============== Type (what) Taxonomy Template	
 * @package Africa Safari Tours
 */

get_header();

$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) ); ?>

<?php 
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

// Declare all ACF Fields as vars
$bannerImg = get_field('banner_image', $term);
$leaderImg = get_field('leader_image', $term);
$typeDesc = get_field('description', $term);
$typeDescMore = get_field('description_more', $term);
$mapImg = get_field('location_map', $term);
$glanceSubject = get_sub_field('subject', $term);
$glanceInfo = get_sub_field('information', $term);

?>

<?php $terms = get_terms( array(
    'taxonomy' => 'what',
    'hide_empty' => false,
) ); 
?>

<div class="container">
  
  <?php get_template_part( 'template-parts/hero', 'image' );?>

<div class="row"><!--Descriptions block -->
    
    <div class="col-lg-3">
      <h2 class="headingSupporting headingSupporting__lg">Introduction to <br/><?php echo $term->name; ?></h2>
    </div>
    
    <div class="col-lg-6">
      <div class="layoutBlock content">
        
        <div class="content__lead">
        <?php echo $typeDesc;?>
        </div>

        <a class="button button__trigger button__alt openTrigger">Read More</a>
 
       <div class="content__hidden">       
        <?php echo $typeDescMore; ?>
        <a class="button button__trigger button__alt closeTrigger">Read Less</a>
       </div>
       
      </div>
    </div>
    
  </div><!--row-->

<!-- OUTPUT FILTER HEADINGS-->

<?php
  $loop = new WP_Query(
    array(
      'post_type' 	 => 'camp',
      'tax_query' => array(
    		array(
    			'taxonomy' => 'what',
    			'field'    => 'slug',
  				'terms'    => $term->slug,
    		),
    	)
    )
  );
?>

<div class="mix-container layoutBlock">

<div class="row">
  
  <div class="col-lg-3">
    <h2 class="headingSupporting headingSupporting__lg mb1">Accommodation In <?php echo $term->name; ?></h2>
  </div>
    
  <div class="col-lg-6 col-md-12">

    <div class="filter mb1">
  	  
  	<a id="#mixitup-camps" data-filter="all" class="mixitup-control <?php if($term->slug == get_queried_object()->slug) { echo ' active'; } ?> filter__item filter__item--root">All</a>
  
    <?php if ($loop->have_posts()) :  
    $filters = array(); 
    
    while ($loop->have_posts()) : $loop->the_post();
      $terms = get_the_terms( get_the_ID(), 'where' ); 
      
      //if ( ! empty( $terms ) && ! is_wp_error( $terms ) ): 
      foreach ( $terms as $term ): 
      
        if (!in_array($term, $filters)) {
          array_push($filters, $term);
        } 
      endforeach; 
    endwhile; ?>
  
    <?php if( $filters ): 
      foreach( $filters as $single_filter ): 
        if( $single_filter->parent == 0 ) : ?>
  
          <a data-filter=".<?php echo $single_filter->slug; ?>" class="mixitup-control <?php echo $single_filter->slug; ?><?php if($single_filter->slug == get_queried_object()->slug) { echo ' active'; } ?> filter__item">
            <?php echo $single_filter->name; ?>
          </a>
        <?endif;
      
      endforeach; endif; ?>
      </div><!--filter-->
  <?php endif; ?>
  </div><!--col-->
   
</div><!--r-->

<!-- OUTPUTTING CAMPS WITH THIS TAX ASSOC WITH IT-->

<div id="mixitup-camps" class="mixitup-camps d-flex flex-wrap align-item-strech">

  <?php
  $taxonomy_name = get_queried_object()->taxonomy; // Get the name of the taxonomy
  $term_id = get_queried_object_id(); // Get the id of the taxonomy
  
  $term = get_queried_object(); 
    $loop = new WP_Query(
      array(
      'post_type' 	 => 'camp',
      'orderby' 		 => 'name',
      'order'   		 => 'ASC',
        'tax_query' => array(
        array(
        'taxonomy' => 'what',
        'field'    => 'slug',
        'terms'    => $term->slug,
        ),
      )
    )
  );
  if ($loop->have_posts()) :  ?>
  <div class="row ">
	<?php while ($loop->have_posts()) : $loop->the_post();
	
    $terms = get_the_terms( get_the_ID(), 'where' ); 
    $leaderImg = get_field('leader_image', $term);?>
    
    <div class="col-lg-3 col-md-4 col-6">
    			<a href="<?php the_permalink(); ?>" class="mix <?php foreach( $terms as $term)  echo ' '.$term->slug;  ?> filterCard" style="background-image: url(<?php echo $leaderImg['url']; ?>);">
            <div class="highlightBorderH"></div>
            <div class="highlightBorderV"></div>      			
    				<h3 class="headingSupporting headingSupporting__sm filterCard__heading" ><?php the_title()?></h3>
    			</a>
    </div>
    
	<?php endwhile;?>
  </div><!--r-->
	<?php endif; ?>
</div><!--#mixitup-camps-->

</div><!--mix-container-->

  <div class="row"><!-- CTA Itinerary Block-->
    
      <?php get_template_part( 'template-parts/cta', 'itinerary' );?>
    
  </div><!--r-->

<div class="layoutBlock dropShadow">		
  
  <div class="row no-gutters darkPanelWrapper desat"><!-- Other Months Block-->

  <?php $terms = get_terms("what",array('number' => 4, 'orderby' => 'rand', 'exclude' => $term_id)); 

    // Randomize Term Array
    shuffle( $terms );
    
    // Grab Indices 0 - 5, 6 in total
    $random_terms = array_slice( $terms, 0, 6 );

    foreach ( $terms as $term ) { 
      $leaderImg = get_field('leader_image', $term);
        
  ?>
                        <a href="<?php echo $term->slug; ?>" class="cardMonth darkPanel desat__item" style="background-image: url(<?php echo $leaderImg['url']; ?>);">

              <h4 class="headingBrand headingBrand__md headingBrand__light"><?php echo $term->name; ?></h4>
              <p><span>find out</span>more</p>
</a>
  <?php } ?>  
  </div><!--r-->

</div>

</div><!--container-->

<?php get_footer();
<?php
/**
 * ============== Template Name: Itinerary
 *
 * @package SLMaster
 */
get_header();?>


<div class="container">

  <div class="row">
    
    <div class="col-lg-6 offset-lg-3 mb2">
      <h1 class="headingBrand headingBrand__lgPlus text-center mb1 mt2">Itineraries</h1>
      <p>Aenean viverra in justo in iaculis. Nunc lacinia sagittis feugiat. Suspendisse potenti. Fusce nec ligula iaculis, faucibus orci feugiat, porttitor justo. Nulla elit mauris, lobortis ac semper dictum, pretium ac tellus. Proin tempor felis nulla, a condimentum massa gravida non. Aliquam sollicitudin elit a pellentesque pharetra.</p>
    </div>
  
  </div><!-- r-->

  <div id="mixitup-camps" class="controls text-center mb3">  
    
    <a class="button button__filter filterLocation active"><span>Filter By</span>Location</a>   
        
    <a class="button button__filter filterType"><span>Filter By</span>Type</a>       
 
    <div class="locationFilter reveal">
      <a class="control <?php if($term->slug == get_queried_object()->slug) { echo ' active'; } ?> filter__item filter__item--root" data-filter="all">All</a>
              
<?php 
  $terms = get_terms( 'itinerarywhere' );
  $filters = array(); 
  
  //if ( ! empty( $terms ) && ! is_wp_error( $terms ) ): 
  foreach ( $terms as $term ): 
  
  if (!in_array($term, $filters)) {
  array_push($filters, $term);
  } 
  endforeach; 
?>
    
<?php 
  if( $filters ): 
    foreach( $filters as $single_filter ): 
      if( $single_filter->parent == 0 ) : 
?>
  
      <a class="control <?php echo $single_filter->slug; ?><?php if($single_filter->slug == get_queried_object()->slug) { echo ' active'; } ?> filter__item" data-filter=".<?php echo $single_filter->slug; ?>"><?php echo $single_filter->name; ?></a>
              
 <?
  endif;
    endforeach; 
      endif; 
?>
    </div><!--locationFilter-->

    <div class="typeFilter">
      <a class="control <?php if($term->slug == get_queried_object()->slug) { echo ' active'; } ?> filter__item filter__item--root" data-filter="all">All</a>
              
<?php 
  $terms = get_terms( 'itinerarytype' );
  $filters = array(); 
  
  //if ( ! empty( $terms ) && ! is_wp_error( $terms ) ): 
  foreach ( $terms as $term ): 
  
  if (!in_array($term, $filters)) {
  array_push($filters, $term);
  } 
  endforeach; 
?>
    
<?php 
  if( $filters ): 
    foreach( $filters as $single_filter ): 
      if( $single_filter->parent == 0 ) : 
?>
  
      <a class="control <?php echo $single_filter->slug; ?><?php if($single_filter->slug == get_queried_object()->slug) { echo ' active'; } ?> filter__item" data-filter=".<?php echo $single_filter->slug; ?>"><?php echo $single_filter->name; ?></a>
              
 <?
  endif;
    endforeach; 
      endif; 
?>
    </div><!--typeFilter-->
  
  </div>
  
<div class="row no-gutters layoutBlock"  data-ref="mixitup-container">          

<?php 
$posts = get_posts(array(
	'posts_per_page'	=> -1,
	'post_type'			=> 'itinerary'
));

if( $posts ): foreach( $posts as $post ): 

  $nightNum = get_field( 'number_of_nights' );	
  $leaderImg = get_field('leader_image');			
  $leaderDesc = get_field('description');			
  setup_postdata( $post ); 
  $terms = get_the_terms( get_the_ID(), 'itinerarywhere' ); 
  $itintypes = get_the_terms( get_the_ID(), 'itinerarytype' ); 
?>



  <div class="col-md-6 mix <?php foreach( $terms as $term)  echo ' '.$term->slug;?> <?php foreach( $itintypes as $itintype)  echo ' '.$itintype->slug;?>"  data-ref="mixitup-target" >
    <a href="<?php the_permalink(); ?>" class="cardItinerary" style="background-image: url(<?php echo $leaderImg['url']; ?>);">
      
  		<div class="meta">
  		  <p><?php echo $nightNum;?> Nights</p>
  		</div>
  		
  		<div class="description">

    		<h2 class="headingBrand headingBrand__md headingBrand__light mb1"><?php the_title(); ?></h2>
  			<p><?php echo $leaderDesc;?></p>
  		</div>
  		
  		<div class="link">  				
  			<p>find out <span>more</span></p>
  		</div>  				
    				
    </a>
  </div><!--col-->
  
<?php 
  endforeach; 
  wp_reset_postdata(); 
  endif; 
?>

</div><!--r-->

<script>
var containerEl = document.querySelector('[data-ref~="mixitup-container"]');
var mixer = mixitup(containerEl, {
    selectors: {
        target: '[data-ref~="mixitup-target"]'
    }
});
</script>

</div><!--c-->
    
<?php get_footer();?>
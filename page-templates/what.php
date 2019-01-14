<?php
/**
 * ============== Template Name: What
 *
 * @package SLMaster
 */
get_header();?>

<div class="container">

  <div class="row">
    
    <div class="col-lg-12 mb1">
      <h1 class="headingBrand headingBrand__lgPlus text-center mb1 mt2">Types Of Safari</h1>
    </div>
  
  </div><!-- r-->
        
<div class="layoutBlock">

			<?php $terms = get_terms( array(
			    'taxonomy' => 'what',
			    'parent'   => $term->term_id,
			    'hide_empty' => false,
			) );

			foreach ( $terms as $term ): 
			$leaderImage = get_field('leader_image', $term);
			?>
			
			
  			  <div class="row">		
    			  <div class="cardActivity mb2">
			<div class="col-lg-3">
				<?php echo "<h2 class='headingBrand headingBrand__sm '>" . $term->name . "</h2>";
				$desc = get_field('description', $term);
				echo "<p>" . $desc  . "</p>";
				?>
			</div>
			<div class="col-lg-9">
				<a href="<?php echo esc_url( get_term_link( $term ) ); ?>" class="headingSupporting headingSupporting__sm cardActivity__item" style="background-image: url(<?php echo $leaderImage['url']; ?>);"></a>
			</div>
			        </div><!--r-->
			</div><!--card-->
			
			<?php endforeach; ?>	 

</div>

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
        
</div><!--c-->
    
<?php get_footer();?>
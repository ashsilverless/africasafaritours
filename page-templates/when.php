<?php
/**
 * ============== Template Name: When
 *
 * @package SLMaster
 */
get_header();?>

<div class="container">

  <div class="row">

      <h1 class="headingBrand headingBrand__lgPlus text-center mb1 mt2">
        <?php the_field('heading');?>
      </h1>
    
    <div class="col-md-6 offset-md-3 mb2">

      <?php the_field('copy');?>
    </div>
  
  </div><!-- r-->

  
    		<?php $terms = get_terms( array(
    		    'taxonomy' => 'when',
    		    'parent'   => $term->term_id,
    		    'hide_empty' => false,
    			'orderby' => 'term_order', 
    			'order'   		 => 'ASC',
    		) );?>

          <div class="monthGrid layoutBlock darkPanelWrapper desat">
            <?php $counter = 1;  ?>
        		<?php foreach ( $terms as $term ): 
                $leaderImage = get_field('leader_image', $term);?>
              <a href="<?php echo esc_url( get_term_link( $term ) ); ?>" class="monthGrid__item darkPanel desat__item"  alt="<?php echo $leaderImage['alt']; ?>" style="background-image: url(<?php echo $leaderImage['url']; ?>);">			
        
        				<h4 class="headingBrand headingBrand__md headingBrand__light"><?php echo $counter; ?></h4>
        				<p><span>travel in</span><?php echo $term->name; ?></p>	
        				
              </a>	
              <?php $counter++; ?>
            <?php endforeach; ?>	 
    
          </div>
    
  
  <div class="row mt1">

    <div class="col-lg-3">  
      <h2 class="headingSupporting headingSupporting__lg mb2 mb1-xs">What They Say</h2>
    </div>

    <div class="col-lg-6">
      <div class="mb2"><!--testimonial block-->
        <?php get_template_part( 'template-parts/testimonial', 'slider');?>     
        </div>
    </div>
    
  </div><!--r--> 
</div><!--container-->

<?php get_footer();?>
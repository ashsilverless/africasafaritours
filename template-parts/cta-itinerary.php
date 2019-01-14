<?php if( have_rows('cta_itinerary', 'option') ): while( have_rows('cta_itinerary', 'option') ): the_row();?>
<div class="col-lg-8 offset-lg-2">
  <div class="layoutBlock ctaPanel" style="background-image: url(<?php the_sub_field('background_image', 'option');?>);">  
    
    <div class="ctaPanel__topLeft">
      <h3 class="headingSupporting headingSupporting__md"><?php the_sub_field('type', 'option');?></h3>
      <h4 class="headingBrand headingBrand__lg headingBrand__light"><?php the_sub_field('heading', 'option');?></h4>    
      <h4 class="headingSupporting headingSupporting__sm headingSupporting__light"><?php the_sub_field('sub_heading', 'option');?></h4>
    </div>
    
    <div class="ctaPanel__bottomLeft">
      <p class="headingSupporting headingSupporting__md headingSupporting__light headingSupporting__longForm"><?php the_sub_field('copy', 'option');?></p>
    </div>
    
    <div class="ctaPanel__bottomRight">
      <a href="<?php the_sub_field('button_target', 'option');?>" class="button button__framed"><?php the_sub_field('button_copy', 'option');?></a>

    </div>    
        
  </div>
</div>
<?php endwhile; endif;?>
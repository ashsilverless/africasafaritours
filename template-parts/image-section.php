<?php if (have_rows('image_repeater')):
    while (have_rows('image_repeater')) : the_row();
        ?>

	<div class="col-sm-<?php the_sub_field('width');?>">
		
		<?php if( get_sub_field('link') ): ?>	
		
			<a href="<?php the_sub_field('link');?>" class="">	

		<?php endif;?>   
		
		<div class="image-wrapper">
		    <img src="<?php the_sub_field('image');?>"/>
		
			<div class="content-wrapper">
				
				<p><?php the_sub_field('text_overlay');?></p>	
				
			</div>
			
			<?php if( get_sub_field('image_caption') ): ?>		    
			
			<div class="caption-wrapper">
			
				<p><?php the_sub_field('image_caption');?></p>
				
			</div>
			<?php endif;?>    
		</div>  
		
		<?php if( get_sub_field('link') ): ?>	
		
			</a>	

		<?php endif;?>  		
		  
	</div>

        <?php
    endwhile;
	else :
endif;
?>




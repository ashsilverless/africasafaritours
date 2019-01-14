
</div></div><!--close row and container -->

<?php
if( get_sub_field('type') == 'image' ): ?>

<section class="sl-hero <?php the_sub_field('height');?>-height" style="background-image: url(<?php the_sub_field('hero_image'); ?>);">
<?php endif; ?>

<?php if( get_sub_field('type') == 'video' ): ?>
<section class="sl-hero auto-height sl-video" style="background-image: url(<?php the_sub_field('video_background_image'); ?>);">

<div class="video-wrapper">
<div id="muteYouTubeVideoPlayer"></div>
<iframe src="https://www.youtube.com/embed/<?php the_sub_field('hero_video');?>?modestbranding=0&controls=0&mute=1&showinfo=0&rel=0&autoplay=1&loop=1" frameborder="0" allowfullscreen></iframe>
</div>
<?php endif; ?>

<div class="content-wrapper">
	
<?php if( get_sub_field('hero_image_text_-_line_one') ): ?>
<p><?php the_sub_field('hero_image_text_-_line_one');?></p>
<?php endif; ?>

<?php if( get_sub_field('hero_image_text_-_line_two') ): ?>
<h1><?php the_sub_field('hero_image_text_-_line_two');?></h1>
<?php endif; ?>

<?php

// check if the repeater field has rows of data
if( have_rows('button') ): ?>

<div class="button-wrapper"> 

 	<?php while ( have_rows('button') ) : the_row(); ?>
 	
 	<a href="<?php the_sub_field('button_target');?>" class="sl-button" style="background-color:<?php the_sub_field('button_colour');?>; color: <?php the_sub_field('text_colour');?>; "><?php the_sub_field('button_text');?></a>

<?php endwhile;
else :
endif;
?>

</div><!--end content wrapper-->

</section>

<div class="container"><!--reopen row and container -->
<div class="row">
	
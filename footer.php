<?php
/**
 * The template for displaying the footer
 * Contains the closing of the #content div and all content after.
 * @package Africa Safari Tours
 */
?>

</main>
<footer class="footer"> 
<?php get_template_part( 'template-parts/contact', 'panel');?>

  <div class="container">

      <div class="footer__static"></div>
            
      <div class="footer__socket">
        <div class="row">
          
          <div class="col-lg-3 socials">
            <?php if( have_rows('social_links', 'option') ): while( have_rows('social_links', 'option') ): the_row(); ?>
              <a href="<?php the_sub_field('page_link'); ?>"><i class="fab fa-<?php the_sub_field('name'); ?>"></i></a>
            <?php endwhile; endif; ?>  
          </div> 		
          
          <div class="col-lg-6 footer__socket__colophon">	
          &copy; African Safari Tours <?php echo date ('Y');?>
          <a href="">Terms</a>
          <a href="">Privacy</a> 
          <a href="">Created by Silverless</a>
          </div> 		
          
        </div><!--row-->
      </div><!--socket-->
  
  </div><!--container-->    	
</footer>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
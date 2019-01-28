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
<!--Start of Zendesk Chat Script-->
<script type="text/javascript">
window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=
d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
_.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute("charset","utf-8");
$.src="https://v2.zopim.com/?3BYATUfl1SoOtzKo4AvGDjcCos3MtwAp";z.t=+new Date;$.
type="text/javascript";e.parentNode.insertBefore($,e)})(document,"script");
</script>


<!--End of Zendesk Chat Script-->
</body>
</html>
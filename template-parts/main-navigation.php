<nav class="navigation__panel">

  <div class="header__trigger hamburger hamburger--collapse">
    <div class="hamburger-box">
      <div class="hamburger-inner"></div>
    </div>
  </div>
  
  <div class="navigation__panel__brand">
    <img src="<?php echo get_stylesheet_directory_uri(); ?>/inc/img/ast-logo-vert.png"/>
  </div>

  <div class="navigation__panel__menu">
    <?php
    wp_nav_menu( array( 
    'theme_location' => 'main-menu', 
    'container_class' => 'mainMenu' ) ); 
    ?>    
  </div>
  
  <?php if( have_rows('promotion', 'option') ): 
  while( have_rows('promotion', 'option') ): the_row();?>
    
    <div class="navigation__panel__promo" style="background:url(<?php the_sub_field('background_image', 'option');?>)">
        <a href="<?php the_sub_field('target', 'option');?>">
          <h2 class="headingBrand headingBrand__md headingBrand__light"><?php the_sub_field('heading', 'option');?></h2>
          <?php the_sub_field('copy', 'option');?>
      </a>
    </div>
  
  <?php endwhile; endif; ?>

  <div class="navigation__panel__details">
    <h4 class="headingSupporting headingSupporting__sm"><?php the_field('telephone_number', 'option');?>  </h4>
    <p><strong><?php the_field('email_address', 'option');?> </strong></p> 
    <p class="mb0"><strong>African Safari Tours</strong></p>
    <?php the_field('address', 'option');?>  
  </div>

</nav>